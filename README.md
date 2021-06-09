# RPL Tim 7

# Kopikimo
![Kopikimo](https://github.com/rakaryuto/RPL-Team7/blob/master/public/asset/logo-brand.svg)

## Paralel 1

## Asisten Praktikum
1. Indah Puspita
2. Qoriatul Khairunnisa

## Anggota
| Nama | Email | Role |
| ---- | ----- | ---- |
| Akaasyah Nurfath | indo14nurfath@apps.ipb.ac.id) | Backend Developer|
| Muhammad Alifio Ghitrif Al'bazij | alifioghitrif@apps.ipb.ac.id | UI/UX Designer |
| Andra Setiyo Wicaksono | andrawicaksono@apps.ipb.ac.id | Backend Developer |
| Ramadhan Agung Karyuto | rakaryuto23karyuto@apps.ipb.ac.id | Project Manager & Frontend Developer |

## Deskripsi Singkat Aplikasi
   Kopikimo adalah perangkat lunak e-commerce berbasis aplikasi web yang berfungsi sebagai pusat pemasaran produk Kopikimo. Pelanggan dan penjual produk Kopikimo akan bertransaksi melalui perangkat lunak ini. Kopikimo akan mengubah metode bertransaksi yang konvensional menjadi lebih modern, yaitu secara daring. Dengan metode ini, diharapkan proses transaksi menjadi lebih efektif dan efisien. Kopikimo mempermudah proses transaksi ini melalui fitur-fitur yang disediakan. Selain itu, informasi terkait branding merk Kopikimo beserta jajaran produk yang ditawarkan Kopikimo juga tersedia di perangkat lunak ini. 


## User Story
- Sebagai pembeli, saya ingin melihat informasi toko berupa alamat dan kontak toko agar saya mengetahui toko yang produknya akan saya beli.
- Sebagai pembeli, saya ingin melihat list produk yang dijual agar saya dapat memilih produk yang akan saya beli.
- Sebagai pembeli saya ingin memiliki kendali penuh untuk mengatur keranjang saya agar saya dapat memutuskan untuk membeli produk atau tidak.
- Sebagai pembeli, saya ingin melakukan pembayaran produk yang saya beli agar transaksi saya sukses.
- Sebagai penjual, saya ingin mengelola produk yang saya jual agar produk lebih tertata.
- Sebagai penjual saya ingin memasukkan konten toko saya agar pelanggan mendapat manfaat dari konten tersebut.
- Sebagai penjual saya ingin melihat data penjualan saya agar saya mengetahui penjualan saya.

## Spesifikasi teknis lingkungan pengembangan
### Software
- Operating System: Windows 10, Mac OS Big Sur
- Framework: Laravel, React.js
- Text Editor: Visual Studio Code
- Design: Figma
- Database: MySQL
- Localhost: Apache

### Hardware
- Macbook
- Asus X550ZE
- Acer Aspire 3

### Tech Stack
- Web Hosting: Heroku
- Version Control System: Github, Git
- Project Management: Trello
- Lain-lain: HTML, CSS, Javascript, PHP

## Hasil dan Pembahasan
### Use case diagram
![UCD](https://github.com/rakaryuto/RPL-Team7/blob/master/images/Untitled%20Diagram-Page-1%20(3).png)
### Activity diagram
### Class diagram
### Entity Relationship Diagram
![ERD](https://github.com/rakaryuto/RPL-Team7/blob/master/images/messageImage_1620012973058.jpg)
### Arsitektur sistem
### Fungsi utama yang dikembangkan
- Memesan produk 
- Menambahkan jumlah produk 
- Memasukan produk ke dalam cart 
- Membeli langsung produk 
- Mengatur spesifikasi produk
- Menghapus produk dari cart 
- Menghitung jumlah harga yang harus dibayar
- Memasukan data diri dan alamat 
- Memasukan bukti pembayaran 
- Melakukan pembayaran

### Fungsi CRUD
| User | Create | Read | Update | Delete |
| ---- | ------ | ---- | ------ | ------ |
| Potential Customer | Memasukkan produk ke halaman cart | Mengetahui info produk | Melakukan pembaruan kuantitas produk di cart | Menghapus produk di cart |
| | Memasukkan produk untuk dibeli langsung | Mengetahui info testimoni | Melakukan pembaruan terhadap spesifikasi produk | |
| | Memasukkan bukti pembayaran | melihat harga produk | | |
| | | Melihat harga produk | | |
| | | Melihat harga ongkos kirim | | |
| | | Mengetahui keseluruhan harga | | |
| | | Mengetahui alamat pengiriman uang (rekening penjual) | | |
| | | Mengetahui kondisi pengiriman | | |
| Admin | | Melihat tabel produk | Mengganti harga produk | |
| | | Melihat tabel pemesanan | Mengganti jumlah stok produk | |
| | | Melihat bukti pembayaran | Mengonfirmasi pembayaran | |


## Hasil implementasi
### Screenshot sistem
![PC](https://github.com/rakaryuto/RPL-Team7/blob/master/images/Screenshot%20(297).png)
![Smartphone](https://github.com/rakaryuto/RPL-Team7/blob/master/images/Screenshot_2021-06-07-11-08-46-545_com.android.chrome.jpg)
### [Link aplikasi](http://fathomless-fortress-50783.herokuapp.com)

## Testing (Test cases)

### Positive Cases
- Penjual bisa mengetahui lebih cepat pesanan yang ada
- Pembeli tidak perlu menanyakan stok barang dan menu karena sudah tertera di website
- Pemesanan produk antar wilayah menjadi lebih mudah

### Negative Cases
- Akan kalah saing oleh aplikasi ojek online jika pemesan memiliki lokasi yang bisa dijangkau oleh ojek online tersebut

## Saran untuk pengembangan selanjutnya
- Sebaiknya dikembangkan lebih baik, lebih matang ,dan lebih rapi lagi supaya pembeli dan penjual akan nyaman dengan eksistensi website Kopikimo.
- Pengembangan web dimulai degnan membuat design system sehingga memudahkan untuk pengembangan frontend. 
- Pengembangan web dimulai lebih awal agar memiliki banyak waktu untuk mengembangkan fitur yang lainnya. 
- Pengembangan web dengan memperhatikan spesifikasi end user 
- Menggunakan akses secure
