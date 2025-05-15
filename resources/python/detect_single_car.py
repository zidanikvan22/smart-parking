import cv2
from ultralytics import YOLO
import requests
import time

# Inisialisasi model
model = YOLO('yolov8n.pt')
print("Model YOLO berhasil dimuat")

# Konfigurasi API
API_URL = "http://127.0.0.1:8000/api/update-slot-status"
SUBZONA_ID = 2
print(f"API endpoint: {API_URL}")

# Inisialisasi kamera
cap = cv2.VideoCapture(1)
if not cap.isOpened():
    print("Error: Tidak bisa mengakses kamera")
    exit()

# Area parkir (sesuaikan dengan posisi di kamera Anda)
parking_slot = [100, 100, 300, 400]  # x1, y1, x2, y2
slot_name = "A1"

# Variabel status
current_status = "Tersedia"
last_api_update = time.time()
api_cooldown = 2  # detik

print("\n===== Sistem Deteksi Parkir Aktif =====")
print(f"Memantau slot: {slot_name}")
print(f"Status awal: {current_status}\n")

while True:
    # Baca frame
    ret, frame = cap.read()
    if not ret:
        print("Warning: Gagal membaca frame kamera")
        continue

    # Deteksi objek
    results = model(frame, verbose=False)  # Nonaktifkan output default YOLO

    # Visualisasi area parkir
    cv2.rectangle(frame, (parking_slot[0], parking_slot[1]),
                 (parking_slot[2], parking_slot[3]), (0, 255, 0), 2)
    cv2.putText(frame, slot_name, (parking_slot[0], parking_slot[1]-10),
               cv2.FONT_HERSHEY_SIMPLEX, 0.5, (255,255,255), 1)

    # Cek objek yang relevan (mobil, motor, truk, orang)
    slot_occupied = False
    for r in results:
        for box in r.boxes:
            class_id = int(box.cls)
            class_name = model.names[class_id]

            # Hanya proses objek yang kita minati
            if class_name.lower() in ['car', 'truck', 'motorcycle', 'person', 'bus']:
                # Koordinat bounding box
                x1, y1, x2, y2 = map(int, box.xyxy[0])

                # Hitung overlap dengan area parkir
                overlap_x1 = max(parking_slot[0], x1)
                overlap_y1 = max(parking_slot[1], y1)
                overlap_x2 = min(parking_slot[2], x2)
                overlap_y2 = min(parking_slot[3], y2)

                # Area overlap
                overlap_area = max(0, overlap_x2 - overlap_x1) * max(0, overlap_y2 - overlap_y1)
                box_area = (x2-x1)*(y2-y1)

                # Jika overlap signifikan (min 25% area objek)
                if overlap_area > 0.25 * box_area:
                    slot_occupied = True
                    # Gambar bounding box
                    cv2.rectangle(frame, (x1,y1), (x2,y2), (0,0,255), 2)
                    cv2.putText(frame, class_name, (x1,y1-10),
                               cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0,255,255), 1)

                    print(f"Deteksi: {class_name} di area parkir", end='\r')
                    break

    # Update status
    new_status = "Terisi" if slot_occupied else "Tersedia"
    status_color = (0, 0, 255) if new_status == "Terisi" else (0, 255, 0)

    # Tampilkan status di frame
    cv2.putText(frame, f"Status: {new_status}", (20, 30),
               cv2.FONT_HERSHEY_SIMPLEX, 0.7, status_color, 2)

    # Kirim ke API jika status berubah atau cooldown terpenuhi
    current_time = time.time()
    if new_status != current_status or (current_time - last_api_update) >= api_cooldown:
        payload = {
            "subzona_id": SUBZONA_ID,
            "slots": [{"nomor_slot": 1, "keterangan": new_status}]
        }

        print(f"\n[API] Mengirim data: {payload}")

        try:
            response = requests.post(API_URL, json=payload, timeout=3)
            if response.status_code == 200:
                print(f"[API] Berhasil! Respon: {response.text}")
                current_status = new_status
                last_api_update = current_time
            else:
                print(f"[API] Error {response.status_code}: {response.text}")
        except Exception as e:
            print(f"[API] Gagal terhubung: {str(e)}")

    # Tampilkan frame
    cv2.imshow("Parking Detection", frame)

    # Exit dengan tombol 'q'
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

print
