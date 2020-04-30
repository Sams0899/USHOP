Alur Project
1. Buat model untuk menampung data yang ada pada database.
2. Buat model untuk penarikkan dan pengiriman data pada database (db_conn).
2. Segala koneksi pengiriman dan penarikan data yang dilakukan antara halaman web dengan database dilakukan oleh model db_conn
3. Setiap view memiliki controller yang kemudian terkoneksi dengan model db_conn.
4. db_conn menarik dan mengirim data untuk kemudian digunakan pada masing-masing view. 
5. Segala bentuk transaksi (CRUD) pada database harus melalui proses login sehingga index dari project merupakan login form.
6. Tidak dapat mendaftarkan user baru jika tidak dapat login sebagai admin. 