import cv2
from ultralytics import YOLO
import requests

# YOLO model
model = YOLO('yolov8n.pt')

# Laravel API endpoint
API_URL = "http://127.0.0.1:8000/api/update-slot-status"  

# Subzona ID
SUBZONA_ID = 2

# Video file path
video_path = "source/car1.mp4"
cap = cv2.VideoCapture(video_path)

# Parking slot coordinates
parking_slots = [
    [52, 112, 328, 371],  # Slot 1
    [281, 112, 569, 375],  # Slot 2
    [454, 119, 792, 364],  # Slot 3
]

while cap.isOpened():
    ret, frame = cap.read()
    if not ret:
        break

    results = model(frame)
    detected_classes = results[0].names
    detected_labels = results[0].boxes.cls
    detected_boxes = results[0].boxes.xyxy

    slot_status = {}
    occupied_slots = 0
    empty_slots = 0

    for idx, slot in enumerate(parking_slots):
        x1, y1, x2, y2 = slot
        slot_detected = False

        for i, box in enumerate(detected_boxes):
            if detected_classes[int(detected_labels[i])] == 'car':
                bx1, by1, bx2, by2 = [int(coord) for coord in box]
                if bx1 >= x1 and bx2 <= x2 and by1 >= y1 and by2 <= y2:
                    slot_detected = True
                    break

        status = "Terisi" if slot_detected else "Tersedia"
        slot_status[f"Slot {idx + 1}"] = status
        if slot_detected:
            occupied_slots += 1
        else:
            empty_slots += 1

    # Print the status of each slot
    print("Status Slot Parkir:")
    for name, status in slot_status.items():
        print(f"{name}: {status}")

    # Annotate the frame with the number of available and occupied slots
    font = cv2.FONT_HERSHEY_SIMPLEX
    cv2.putText(frame, f"Slot Terisi: {occupied_slots}", (50, 50), font, 1, (0, 0, 255), 2, cv2.LINE_AA)
    cv2.putText(frame, f"Slot Tersedia: {empty_slots}", (50, 100), font, 1, (0, 255, 0), 2, cv2.LINE_AA)

    # Display the annotated frame
    cv2.imshow("Parking Slot Detection", frame)

    # Prepare payload and send to API
    payload = {
        "subzona_id": SUBZONA_ID,
        "slots": [{"nomor_slot": idx + 1, "keterangan": status} for idx, status in enumerate(slot_status.values())]
    }

    response = requests.post(API_URL, json=payload)
    if response.status_code == 200:
        print("Data berhasil dikirim ke database")
    else:
        print(f"Error: {response.status_code}, {response.text}")

    # Exit if 'q' is pressed
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

cap.release()
cv2.destroyAllWindows()
