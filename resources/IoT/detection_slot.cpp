// Implementasikan kode berikut pada Arduino IDE dan menggunakan alat-alat yang berkaitan :

#include <WiFi.h>
#include <HTTPClient.h>

// WiFi credentials
const char* ssid = "";
const char* password = "";

// Laravel API URL
const char* serverUrl = "http://(sesuaikan dengan APP_URL pada .env):8000/api/update-slot";

// Obstacle Sensor Pins
const int obstaclePins[5] = {21, 19, 18, 5, 23}; // Pin untuk 5 obstacle sensor
const int subzonaId = 2; // ID subzona tetap

void setup() {
  Serial.begin(115200);
  WiFi.begin(ssid, password);

  // Wait for WiFi connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi");
  Serial.println("IP Address: " + WiFi.localIP().toString());
  
  // Set pin mode untuk semua obstacle sensor
  for (int i = 0; i < 5; i++) {
    pinMode(obstaclePins[i], INPUT);
  }
}

void loop() {
  Serial.println("Membaca status slot parkir...");

  // Loop untuk membaca semua obstacle sensor
  for (int i = 0; i < 5; i++) {
    int sensorValue = digitalRead(obstaclePins[i]);
    String status = (sensorValue == HIGH) ? "Terisi" : "Tersedia";

    // Output status slot ke Serial Monitor
    Serial.print("Slot ");
    Serial.print(i + 1);
    Serial.print(" : ");
    Serial.println(status);

    // Menyiapkan JSON payload
    String jsonPayload = String("{\"subzona_id\":") + subzonaId + 
                         String(",\"nomor_slot\":") + (i + 1) + 
                         String(",\"keterangan\":\"") + status + String("\"}");

    // Mengirim data ke Laravel API jika WiFi terhubung
    if (WiFi.status() == WL_CONNECTED) {
      HTTPClient http;

      // Memulai koneksi ke server Laravel
      http.begin(serverUrl); // URL API Laravel
      http.addHeader("Content-Type", "application/json"); // Menentukan tipe konten

      // Mengirim POST request
      int httpResponseCode = http.POST(jsonPayload);

      // Debugging Response
      Serial.print("Slot ");
      Serial.print(i + 1);
      Serial.print(" - HTTP Response Code: ");
      Serial.println(httpResponseCode); // Cetak kode respon

      if (httpResponseCode > 0) {
        // Respons berhasil diterima dari server
        String response = http.getString();
        Serial.println("Server Response:");
        Serial.println(response);
      } else {
        // Error dalam mengirim POST
        Serial.print("Slot ");
        Serial.print(i + 1);
        Serial.print(" - Error on sending POST: ");
        Serial.println(http.errorToString(httpResponseCode).c_str());
      }

      http.end(); // Menutup koneksi HTTP
    } else {
      // Jika WiFi tidak terhubung
      Serial.println("WiFi not connected");
    }
  }

  Serial.println("--------------------------------------");
  delay(5000); // Tunggu 5 detik sebelum mengirim ulang
}


Notes : 
const char* serverUrl = "http://192.168.216.13:8000/api/update-slot"; sesuai sama wifi yang tersambung

Board : ESP32-WROOM-DA Module

tidak php artisan serve, tpi ini :

php artisan serve --host=192.168.1.105 --port=8000
sesuai in sma jaringan

APP_URL=http://192.168.216.13:8000
sesuain ama jaringan laptop

esp32, breadboard, obstacle, jumper male to male (buat bagi gnd dan 3.3v), male(ada jarum) to female

Sensor	OUT ke Pin ESP32	Alternatif GPIO
Sensor 1	D21	GPIO21
Sensor 2	D19	GPIO19
Sensor 3	D18	GPIO18
Sensor 4	D5	GPIO5
Sensor 5	D23	GPIO23

Obstacle Sensor Pin	Koneksi ke ESP32
VCC	3.3V
GND	GND
OUT	Pin 21, 19, 18, 17, 16 (masing-masing sensor)