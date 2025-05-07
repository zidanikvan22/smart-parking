# SIPPP | Data driven smart parking system powered by IoT and Big Data Analytics

## Description

Parkwell" adalah sistem parkir pintar berbasis website yang menggunakan teknologi IoT. Sistem ini memanfaatkan data secara real-time untuk memberikan solusi parkir yang lebih cerdas, mengurangi waktu yang diperlukan untuk mencari tempat parkir. Sistem ini dirancang untuk parkir off-street baik bagi motor dan mobil, sehingga memungkinkan pengaturan parkir yang lebih terstruktur. 

   ![Poster](https://pbl.polibatam.ac.id/apps/image.php?file=dXBsb2Fkcy9wYmwvMzAwMC8zMDAwX1BPU1RFUi1QQkxfMjAyNTAxMDUucG5n)

---

## Teams
Project Manager:  
Miratul Khusna Mufida, S.ST, M.Sc 

Leader:  
3312301007 - Muhammad Adib Fakhri Siregar

Member:  
3312301025 – Nayla Nabillah Arishima  
3312301046 – Meizua Muhsana 
3312311133 - Grey Ari Daniel Simatupang 

---

## How to Start the Project

### 1. Clone this repository
***Clone repository ke komputer lokal Anda menggunakan perintah berikut:***
 ```bash
git clone https://github.com/zidanikvan22/smart-parking.git
```

### 2. Masuk ke Direktori Proyek  
***Setelah repository berhasil di-clone, pindah ke direktori proyek:***
```bash
cd Smart_parking
```

### 3. Install Dependencies
***Pastikan Composer dan node.js sudah terpasang di sistem Anda, lalu jalankan::***
```bash
composer install
```
```bash
npm install
```

### 4. Update Composer Autoload and Dependencies
***Jalankan perintah berikut untuk memperbarui autoload dan dependencies:***
```bash
composer dump-autoload
```

### 5. Rename File .env-example ke .env
***Ubah nama file .env-example menjadi .env. Anda bisa melakukannya langsung di terminal:***
```bash
mv .env-example .env
```

### 6. Generate Application Key
***Generate application key Laravel menggunakan perintah berikut:***
```bash
php artisan key:generate
```

### 7. Launch the App
***Untuk menjalankan aplikasi, gunakan perintah berikut:***
1. Jalankan Laravel Development Server:
```bash
php artisan serve
```
2. Jalankan Vite untuk development assets:
```bash
npm run dev
```

