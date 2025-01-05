// Implementasikan kode berikut pada Arduino IDE dan menggunakan alat-alat yang berkaitan :

#include <SPI.h>
#include <MFRC522.h>
#include <ESP32Servo.h> 
#include <WiFi.h>
#include <HTTPClient.h>

#define RST_PIN 22
#define SDA_PIN 21

MFRC522 mfrc522(SDA_PIN, RST_PIN);
Servo servo;

const int obstaclePin = 34;
const int buzzerPin = 32;
const int OPEN_POSITION = 90;    // Posisi terbuka dalam derajat
const int CLOSED_POSITION = 0;   // Posisi tertutup dalam derajat
const int SERVO_SPEED = 15;      // Kecepatan pergerakan servo (derajat per langkah)
const int SERVO_DELAY = 50;      // Delay antara setiap langkah (ms)

const char* ssid = "";
const char* password = "";
const char* serverURL = "http://(sesuaikan dengan APP_URL pada .env)/api/transaksi";

void setup() {
  Serial.begin(115200);
  SPI.begin();
  mfrc522.PCD_Init();
  
  servo.attach(13);
  moveServoSmooth(CLOSED_POSITION);  // Inisialisasi posisi tertutup
  
  pinMode(obstaclePin, INPUT);
  pinMode(buzzerPin, OUTPUT);

  connectToWiFi();
}

void loop() {
  if (mfrc522.PICC_IsNewCardPresent() && mfrc522.PICC_ReadCardSerial()) {
    String uid = "";
    for (byte i = 0; i < mfrc522.uid.size; i++) {
      uid += String(mfrc522.uid.uidByte[i], HEX);
    }
    Serial.println("RFID Tag Detected: " + uid);
    playBuzzerTone();
    openGate();
    sendTransaction();
  }
}

void moveServoSmooth(int targetPosition) {
  int currentPosition = servo.read();
  
  // Menentukan arah pergerakan
  int step = (targetPosition > currentPosition) ? SERVO_SPEED : -SERVO_SPEED;
  
  // Gerakan servo secara bertahap
  while (abs(currentPosition - targetPosition) > abs(step)) {
    currentPosition += step;
    servo.write(currentPosition);
    delay(SERVO_DELAY);
  }
  
  // Memastikan mencapai posisi target yang tepat
  servo.write(targetPosition);
}

void openGate() {
  Serial.println("Membuka gate...");
  playBuzzerTone();
  moveServoSmooth(OPEN_POSITION);
  
  // Tunggu sampai obstacle sensor mendeteksi kendaraan lewat
  Serial.println("Menunggu kendaraan lewat...");
  int timeout = 0;
  const int MAX_TIMEOUT = 20000; // 10 detik timeout
  
  while (digitalRead(obstaclePin) == HIGH && timeout < MAX_TIMEOUT) {
    delay(100);
    timeout += 100;
  }
  
  // Berikan delay tambahan untuk memastikan kendaraan sudah lewat sepenuhnya
  delay(2000);
  closeGate();
}

void closeGate() {
  Serial.println("Menutup gate...");
  playBuzzerTone();
  moveServoSmooth(CLOSED_POSITION);
  Serial.println("Gate tertutup");
}

void sendTransaction() {
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(serverURL);
    http.addHeader("Content-Type", "application/json");

    String jsonData = "{\"id_pengguna\":3,\"zona_id\":2,\"status_transaksi\":\"aktif\"}";
    int httpResponseCode = http.POST(jsonData);

    if (httpResponseCode > 0) {
      String response = http.getString();
      Serial.println("Response: " + response);
    } else {
      Serial.println("Error in sending transaction data");
    }
    http.end();
  } else {
    Serial.println("WiFi disconnected");
  }
}

void connectToWiFi() {
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi");
}

void playBuzzerTone() {
  tone(buzzerPin, 1000, 200);  // Nada lebih singkat
  delay(250);
  noTone(buzzerPin);
}


Notes : 
const char* serverUrl = "http://192.168.216.13:8000/api/transaksi"; sesuai sama wifi yang tersambung

Board : ESP32-WROOM-DA Module

tidak php artisan serve, tpi ini :

php artisan serve --host=192.168.1.105 --port=8000
sesuai in sma jaringan

APP_URL=http://192.168.216.13:8000
sesuain ama jaringan laptop

Petunjuk Pemasangan Kabel

RFID RC522 ke ESP32

SDA -> Pin D21
SCK -> Pin D18
MOSI -> Pin D23
MISO -> Pin D19
GND -> GND
RST -> Pin D22
3.3V -> 3.3V

Obstacle Sensor ke ESP32

VCC -> 3.3V
GND -> GND
OUT -> Pin D34

Microservo SG90 ke ESP32

Signal -> Pin D25
VCC -> 5V
GND -> GND

Buzzer ke ESP32

Signal -> Pin D32
VCC -> 3.3V
GND -> GND

*Sesuaikan dengan kode maupun alat