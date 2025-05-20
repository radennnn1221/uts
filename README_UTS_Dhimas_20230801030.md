
# Proyek UTS Keamanan Informasi - Data Pembayaran

## Informasi Mahasiswa
- Nama: Dhimas Aditya Pratama
- NIM: 20230801030
- Mata Kuliah: CIE406 - Keamanan Informasi
- Dosen: Hani Dewi Ariessanti S.Kom,M.Kom
- Tanggal: 20 Mei 2024

## Deskripsi Proyek
Aplikasi ini dibangun menggunakan Laravel 12 dan Filament v3 sebagai admin panel.
Tujuannya adalah untuk mengelola dan mengamankan data pembayaran yang masuk, dengan menerapkan prinsip-prinsip keamanan informasi (Confidentiality, Integrity, Availability).

## Fitur Utama
- CRUD Data Pembayaran
- Middleware Autentikasi dan Authorisasi
- Validasi Input Data
- Hash dan Enkripsi Data Sensitif
- Activity Log (Audit Trail)
- Backup Data (Opsional)

## Instalasi
1. Clone repositori ini
2. Jalankan perintah:
```
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed (jika ada)
php artisan serve
```
3. Login ke `/admin` (default route Filament) setelah registrasi user

## Struktur Database
Tabel `pembayarans` mencakup:
- `id`
- `nama_pengirim`
- `jumlah`
- `metode`
- `tanggal_pembayaran`
- `created_at`, `updated_at`

## Essay UTS
Jawaban essay UTS terdapat dalam file: [`Jawaban_Essay_Dhimas_20230801030.pdf`](./Jawaban_Essay_Dhimas_20230801030.pdf)

---

**Catatan**: Semua dikerjakan menggunakan Laravel 12 + Filament 3.
