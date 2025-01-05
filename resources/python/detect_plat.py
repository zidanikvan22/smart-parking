from PIL import Image
import pytesseract
import cv2

# Path ke Tesseract
pytesseract.pytesseract.tesseract_cmd = r'C:\Program Files\Tesseract-OCR\tesseract.exe'

image_path = "source/plate6.jpg"  # Sesuaikan dengan path gambar 
image = cv2.imread(image_path)


if image is None:
    print("Gambar tidak ditemukan! Periksa path.")
else:
    print("Gambar berhasil di-load.")

# Konversi ke grayscale
gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)

# Terapkan thresholding untuk meningkatkan kontras
_, binary = cv2.threshold(gray, 150, 255, cv2.THRESH_BINARY)

# menerapkan morphological operations untuk mengurangi noise
kernel = cv2.getStructuringElement(cv2.MORPH_RECT, (2, 2))
processed = cv2.morphologyEx(binary, cv2.MORPH_CLOSE, kernel)

# meyimpan gambar yang sudah diproses untuk debugging
cv2.imwrite("processed_image.jpg", processed)

# Menampilkan gambar original dan hasil praproses
cv2.imshow("Original Image", image)
cv2.imshow("Processed Image", processed)
cv2.waitKey(0)
cv2.destroyAllWindows()

# Ekstrak teks menggunakan Tesseract
custom_config = r'--psm 6'  # Mode Tesseract yang cocok untuk satu baris teks
text = pytesseract.image_to_string(processed, config=custom_config)

print("Teks yang dideteksi:", text)