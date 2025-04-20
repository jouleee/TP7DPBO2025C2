# TP7DPBO2025C2
Tugas Praktikum 7 DPBO C2

## Janji
Saya **Julian Dwi Satrio** mengerjakan evaluasi Tugas Praktikum 7 dalam mata kuliah **Desain Pemrograman Berbasis Objek** untuk keberkahan-Nya, maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Desain Program

Aplikasi ini terdiri dari 3 entitas utama:

1. **Pengguna (pelanggan)**
   - Menyimpan data penyewa lapangan
   - Atribut: `id_pengguna`, `nama`, `email`, `nomor_hp`

2. **Lapangan**
   - Menyimpan data lapangan yang tersedia
   - Atribut: `id_lapangan`, `nama_lapangan`, `jenis_lapangan`, `lokasi`

3. **Transaksi (Booking)**
   - Menyimpan data pemesanan lapangan oleh pengguna
   - Atribut: `id_transaksi`, `id_pengguna`, `id_lapangan`, `tanggal`, `waktu_mulai`, `waktu_selesai`

## 🔄 Alur Aplikasi

### 1. Halaman Utama (`index.php`)
- Menampilkan navigasi ke menu Pengguna, Lapangan, dan Booking
- Meng-include header, footer, dan tampilan utama sesuai `$_GET['page']`

### 2. CRUD Pengguna
- **Create:** Form tambah pengguna (nama, email, telepon)
- **Read:** Tabel daftar pengguna
- **Update:** Form edit pengguna
- **Delete:** Tombol hapus pengguna

### 3. CRUD Lapangan
- **Create:** Tambah data lapangan baru
- **Read:** Tabel lapangan tersedia
- **Update:** Edit data lapangan
- **Delete:** Hapus lapangan

### 4. CRUD Transaksi Booking
- **Create:** Tambah booking dengan memilih pengguna, lapangan, tanggal & waktu
- **Read:** Tabel seluruh booking
- **Searching**: Proses pencarian berdasarkan kode booking

---

## Keamanan & Best Practices

- ✅ Menggunakan **Prepared Statement** untuk mencegah SQL Injection
- ✅ Kode terpisah antara tampilan (`view/`) dan logika (`class/`)
- ✅ Menggunakan PDO untuk perantara ke Database
- ✅ Modularisasi melalui pemisahan `class` dan include view

## Dokumentasi

https://github.com/user-attachments/assets/3ebea681-34fe-4abd-8463-0c32cd80a061

