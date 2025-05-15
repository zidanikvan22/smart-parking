import cv2
from ultralytics import YOLO
import requests
import time

# Inisialisasi model YOLO
# Catatan: Jika deteksi kurang akurat, coba ganti dengan 'yolov8s.pt' untuk akurasi lebih baik
model = YOLO('yolov8n.pt')
print("Model YOLO berhasil dimuat")

# Konfigurasi API
API_URL = "http://127.0.0.1:8000/api/update-slot-status"
SUBZONA_ID = 3
print(f"API endpoint: {API_URL}")

# Inisialisasi kamera
cap = cv2.VideoCapture(1)  # Ganti ke 0 jika menggunakan kamera default
if not cap.isOpened():
    print("Error: Tidak bisa mengakses kamera")
    exit()

# Periksa resolusi kamera
frame_width = int(cap.get(cv2.CAP_PROP_FRAME_WIDTH))
frame_height = int(cap.get(cv2.CAP_PROP_FRAME_HEIGHT))
print(f"Resolusi kamera: {frame_width}x{frame_height}")

# Daftar slot parkir: [x1, y1, x2, y2], nama_slot
# Sesuaikan koordinat sesuai resolusi kamera Anda
slots = [
    {"area": [100, 100, 250, 250], "nama": "A1", "status": "Tersedia"},
    {"area": [270, 100, 420, 250], "nama": "A2", "status": "Tersedia"},
    {"area": [440, 100, 590, 250], "nama": "A3", "status": "Tersedia"},
    {"area": [610, 100, 760, 250], "nama": "A4", "status": "Tersedia"},
]

# Validasi koordinat slot
for slot in slots:
    x1, y1, x2, y2 = slot["area"]
    if x2 > frame_width or y2 > frame_height:
        print(f"Warning: Koordinat slot {slot['nama']} ({x1},{y1},{x2},{y2}) di luar resolusi kamera ({frame_width}x{frame_height})")
    print(f"Slot {slot['nama']}: Area [{x1}, {y1}, {x2}, {y2}]")

# Waktu pembaruan terakhir ke API
last_api_update = time.time()
api_cooldown = 2  # detik

print("\n===== Sistem Deteksi Parkir Aktif =====")
for slot in slots:
    print(f"Memantau slot: {slot['nama']} - Status awal: {slot['status']}")
print()

while True:
    ret, frame = cap.read()
    if not ret:
        print("Warning: Gagal membaca frame kamera")
        continue

    # Cetak resolusi frame untuk debugging
    print(f"Frame berhasil dibaca. Resolusi: {frame.shape}")

    # Jalankan deteksi YOLO
    results = model(frame, verbose=False)

    # Reset status sementara setiap loop
    for slot in slots:
        slot['occupied'] = False

    # Evaluasi semua objek deteksi
    for r in results:
        for box in r.boxes:
            class_id = int(box.cls)
            class_name = model.names[class_id]
            print(f"Deteksi: {class_name}, Koordinat: {box.xyxy[0]}")

            if class_name.lower() in ['car', 'truck', 'motorcycle', 'person', 'bus']:
                bx1, by1, bx2, by2 = map(int, box.xyxy[0])
                box_area = (bx2 - bx1) * (by2 - by1)

                # Gambar kotak objek
                cv2.rectangle(frame, (bx1, by1), (bx2, by2), (0, 0, 255), 2)
                cv2.putText(frame, class_name, (bx1, by1 - 10), cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0, 255, 255), 1)

                # Cek ke semua slot
                for slot in slots:
                    x1, y1, x2, y2 = slot["area"]

                    overlap_x1 = max(x1, bx1)
                    overlap_y1 = max(y1, by1)
                    overlap_x2 = min(x2, bx2)
                    overlap_y2 = min(y2, by2)

                    overlap_area = max(0, overlap_x2 - overlap_x1) * max(0, overlap_y2 - overlap_y1)
                    overlap_ratio = overlap_area / box_area if box_area > 0 else 0

                    print(f"Slot {slot['nama']}: Overlap Area: {overlap_area}, Box Area: {box_area}, Ratio: {overlap_ratio:.2f}")

                    # Turunkan threshold untuk sensitivitas lebih tinggi
                    if overlap_ratio > 0.1:  # Sebelumnya 0.25
                        print(f"Slot {slot['nama']} terisi oleh {class_name}")
                        slot["occupied"] = True

    update_needed = False

    # Update tampilan dan status
    for i, slot in enumerate(slots):
        x1, y1, x2, y2 = slot["area"]
        slot_name = slot["nama"]

        new_status = "Terisi" if slot["occupied"] else "Tersedia"
        status_color = (0, 0, 255) if new_status == "Terisi" else (0, 255, 0)

        # Gambar area slot
        cv2.rectangle(frame, (x1, y1), (x2, y2), status_color, 2)
        cv2.putText(frame, f"{slot_name}: {new_status}", (x1, y2 + 20), cv2.FONT_HERSHEY_SIMPLEX, 0.6, status_color, 2)

        # Cek apakah status berubah
        if new_status != slot["status"]:
            update_needed = True
            slot["status"] = new_status
            print(f"Slot {slot_name} berubah status menjadi: {new_status}")

    # Kirim ke API jika ada perubahan atau cooldown habis
    current_time = time.time()
    if update_needed or (current_time - last_api_update) >= api_cooldown:
        payload = {
            "subzona_id": SUBZONA_ID,
            "slots": [{"nomor_slot": i + 1, "keterangan": s["status"]} for i, s in enumerate(slots)]
        }
        print(f"\n[API] Mengirim data: {payload}")

        try:
            response = requests.post(API_URL, json=payload, timeout=3)
            if response.status_code == 200:
                print(f"[API] Berhasil! Respon: {response.text}")
                last_api_update = current_time
            else:
                print(f"[API] Error {response.status_code}: {response.text}")
        except Exception as e:
            print(f"[API] Gagal terhubung: {str(e)}")

    # Tampilkan frame
    cv2.imshow("Deteksi Parkir - 4 Slot", frame)

    # Tekan 'q' untuk keluar
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

# Bersihkan
cap.release()
cv2.destroyAllWindows()
