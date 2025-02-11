<div align="center">
<img src="https://github.com/user-attachments/assets/1acf9b47-f773-44bd-9c95-d0b3b5d426ef" width="180" alt="DPMPTSP Kota Padang Logo">

# Sistem Penerimaan Tamu DPMPTSP Kota Padang
### Guest Reception System

[![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?style=flat-square&logo=laravel)](https://laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind-3.4.17-38B2AC?style=flat-square&logo=tailwind-css)](https://tailwindcss.com)
[![PHP](https://img.shields.io/badge/PHP-≥8.2-777BB4?style=flat-square&logo=php)](https://php.net)
</div>

## 📋 Tentang Sistem
Sistem Penerimaan Tamu digital untuk Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu (DPMPTSP) Kota Padang. Sistem ini menggantikan buku tamu manual dengan platform digital yang efisien untuk pencatatan dan pelacakan kunjungan tamu.

## ⭐ Fitur Utama

### 📱 Form Registrasi Tamu
- Input data tamu (nama, instansi, nomor HP)
- Pemilihan tujuan kunjungan

### 👥 Manajemen Tamu
- Database tamu terintegrasi
- Riwayat kunjungan tamu
- Pencarian data tamu
- Export data tamu (Excel, PDF)
- Filter data berdasarkan periode

### 📊 Dashboard & Laporan
- Statistik kunjungan real-time
- Grafik kunjungan harian/bulanan
- Laporan detail kunjungan
- Analisis tren kunjungan
- Export laporan

### 🔐 Fitur Admin
- Manajemen pengguna sistem
- Pengaturan tujuan kunjungan
- Konfigurasi template notifikasi
- Backup database tamu

## 🛠️ Teknologi

### Tech Stack
- **Backend:** Laravel 11
- **Frontend:** Tailwind CSS + Alpine.js
- **Database:** MySQL

### Prasyarat Sistem
```bash
PHP >= 8.2
Composer
Node.js & NPM
MySQL
```

## 💻 Instalasi & Penggunaan

1. Clone repositori
```bash
git clone https://github.com/kp-dpmptsp-padang/reservation.git
cd reservation
```

2. Install dependensi
```bash
composer install
npm install
```

3. Setup environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Konfigurasi database & WhatsApp API di file .env
```bash
DB_DATABASE=guest_system
```

5. Migrasi database
```bash
php artisan migrate --seed
```

6. Jalankan sistem
```bash
php artisan serve
npm run dev
```

## 📖 Dokumentasi
- 📘 Panduan Penggunaan Sistem
- 📗 Dokumentasi API
- 📙 Troubleshooting Guide
- 📕 Panduan Konfigurasi

## 👨‍💻 Tim Pengembang

### Developer
- **Mustafa Fathur Rahman**
- **Khalied Nauly Maturino**

## 📞 Kontak & Dukungan

### DPMPTSP Kota Padang
🌐 [dpmptsp.padang.go.id](https://dpmptsp.padang.go.id)  
📧 [dpmptsp@padang.go.id](mailto:dpmptsp@padang.go.id)  
📱 [+62 813-7407-8088](tel:+6281374078088)

### Dukungan Teknis
- Jam kerja: Senin-Jumat (08.00-16.00 WIB)

## 🙏 Penghargaan
Terima kasih kepada:
- Pimpinan dan Staf DPMPTSP Kota Padang
- Tim IT DPMPTSP Kota Padang
- Semua kontributor proyek

---
<div align="center">

**© 2025 DPMPTSP Kota Padang. All Rights Reserved.**
</div>
