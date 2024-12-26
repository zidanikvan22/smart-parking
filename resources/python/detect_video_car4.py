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
video_path = "source/car2.mp4"
cap = cv2.VideoCapture(video_path)

# Parking slot coordinates and names
parking_slots = [
    [290, 446, 490, 690],  # Slot 1
    [420, 449, 607, 686],  # Slot 2
    [500, 440, 723, 692],  # Slot 3
    [686, 454, 835, 683],  # Slot 4
    [829, 469, 980, 666],  # Slot 5
    [928, 461, 1080, 693],  # Slot 6
    [1065, 470, 1215, 673],  # Slot 7
    [1189, 471, 1365, 684],  # Slot 8
    [1308, 475, 1492, 688],  # Slot 9
    [1431, 477, 1628, 694],  # Slot 10
]
slot_names = [f"Slot {i+1}" for i in range(len(parking_slots))]

# Set ukuran window display
window_width = 800
window_height = 600

# Tentukan ukuran window sebelum menampilkan frame
cv2.namedWindow("Parking Slot Detection", cv2.WINDOW_NORMAL)
cv2.resizeWindow("Parking Slot Detection", window_width, window_height)

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

        # Draw bounding box for the slot
        cv2.rectangle(frame, (x1, y1), (x2, y2), (0, 255, 0), 2)  # Green box for slots
        cv2.putText(frame, slot_names[idx], (x1, y1 - 10), cv2.FONT_HERSHEY_SIMPLEX, 0.5, (255, 255, 255), 1)

        # Check if a vehicle is detected within this slot's coordinates
        for i, box in enumerate(detected_boxes):
            class_name = detected_classes[int(detected_labels[i])]
            if class_name in ['car', 'bus', 'truck']:
                # Check if the vehicle's bounding box is completely inside the parking slot
                bx1, by1, bx2, by2 = [int(coord) for coord in box]
                if bx1 >= x1 and bx2 <= x2 and by1 >= y1 and by2 <= y2:
                    slot_detected = True

                    # Draw bounding box and label on the detected vehicle
                    cv2.rectangle(frame, (bx1, by1), (bx2, by2), (0, 0, 255), 2)  # Red box for detected vehicle
                    cv2.putText(frame, class_name, (bx1, by1 - 10), cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0, 255, 255), 1)
                    break

        # Update the slot status and counters
        status = "Terisi" if slot_detected else "Tersedia"
        slot_status[slot_names[idx]] = status
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
