# Inventory Management System (IMS) 
IMS bertugas mengelola keluar masuknya barang pada gudang penyimpanan. Masuknya barang mengartikan perusahaan melakukan pembelian sejumlah barang terhadap supplier, sedangkan keluarnya barang mengartikan adanya pembelian sejumlah barang dari pelanggan.

## Product & Category
Produk memiliki kategori sesuai jenisnya masing-masing. Produk yang memiliki status aktif dan jumlah lebih dari 0 bisa dibeli oleh pelanggan atau tersedia di online shop site. 

## Purchase (Inventory In)
Pembelian barang dilakukan kepada supplier dimana supplier tersebut harus terdaftar dalam sistem.
Purchase Order (PO) number hanya bisa menangani pembelian kepada 1 supplier saja, artinya ketika melakukan 'create purchase', barang yang tersedia untuk dibeli adalah barang-barang yang berelasi dengan supplier yang dipilih saja.
Setelah puchase terbentuk, purchasing admin bisa merubah status purchase menjadi completed/uncompleted. Jika barang sudah dibayar, maka secara otomatis jumlah uang yang sudah dibayarkan akan masuk ke laporan pengeluaran. Sedangkan barang yang belum dibayar, tagihan akan masuk ke laporan hutang.

## Sales (Inventory Out)
Penjualan barang dilakukan kepada customer dimana customer tersebut harus terdaftar dalam sistem.
Sales Order (SO) number hanya bisa menangani pembelian kepada 1 customer saja, dimana pembeli hanya bisa membeli produk yang memiliki status aktif dengan jumlah barang yang tersedia. 
Setelah sales terbentuk, sales admin bisa merubah status sales order menjadi completed/uncompleted. Jika barang sudah dibayar, maka secara otomatis jumlah uang yang sudah dibayarkan akan masuk ke laporan pemasukan. Sedangkan barang yang belum dibayar, tagihan akan masuk ke laporan piutang.

## Order Status (Sales/Purchase)
Terdapat 4 order status.
- Accepted: order telah diterima oleh pihak penjual
- Shipped: produk yang dipesan telah dikirim kepada pembeli (belum sampai tujuan)
- Paid: order sudah dibayar oleh pembeli
- Recived: barang sudah diterima oleh pembeli
Jika semua status tersebut sudah terpenuhi, maka status order mendjadi completed dan tidak bisa diubah kembali (Hanya superadmin yang bisa merubahnya).
Sedangkan jika status paid sudah terpenuhi, maka jumlah uang yang dibayarkan/diterima akan masuk ke laporan keuangan.

## Customer & Supplier
Data pelanggan dan supplier disimpan di sistem untuk kebutuhan purchase dan sales, sehingga perusahaan mengetahui membeli dari supplier mana dan menjual kepada pelanggan mana.

## Report
Menginformasikan kepada admin mengenai jumlah sales order, jumlah purchase order, beserta statusnya masing-masing.
Juga menginformasikan jumlah pengeluaran, pendapatan, hutang, piutang, gross income, dan net income. Data yang disajikan berbentuk chart dan table.

## Users Role
- admin: all
- purchase: create purchase, view purchase, report
- sale: create sale, view sale, report

## Use case
image

## ERD
![prism-test-erd](https://lh3.googleusercontent.com/RAZJ_bX8pmW7XmeRCD9Og82s2E4OuFFSBADseTZTrnI8tAk-j-feIp2OzPJ92QU63yrVgcTp6wwUxOZkA62a4K4MU4ESwIaoUKM8n9v6yBRw_LV24_oKyh6kuoHxoT4dIq836KeUtc8pz_FELMaxTIgQsYXkKpwglFCtXYuIsWxBTy-l4c5CpTUu-NKQVkWZe1LaFEoQFMWSUZ_cybej6u1EDX9ogl7rXgTw1fB7RZkOUi-KG0Cd-eVp8lhrM7sWDF4ZMTZ5J8tFF4R-54C8XkaXzWECN-ET5LwHoDIR9d0g3aIty9o7LNh3hmVVY3YQpqEdakgzATd0xFfe2D8jduOgTLLpg4NnQTHH5ycYMGEHoYsxW8q7ukUWDyRkmj6CiBqPSfFo8wqga4JK1qYxML8jnGkDQ_ntoH4eFTPdmhctq9tdEMstEe80AjmC4bBy8-JidvDECg6ru7NFTa7YEVh7weScW3Y89TCXMkJhGPrvTqJDoezRaRSchR9DkyOnehjeBs1T5Qj7PCA0YMaxyPQscBLs3foJjetG_lOKWBEBZnA2Y_1kr9jD8Dh32z1ZTdv1vaXrxL_5qNZgRAGIqUCha31cbIcsgAt8y1gjqpjezxSD=w975-h491-no)

## Class Diagram
image

## Environment
### Back-end
- PHP >= 5.3
- Codeigniter 3.1.2 (PHP Framework)
- IonAuth v2.5.2 (Authentication library)

### Front-end
- MySql Ver 14.14 Distrib 5.7.16
- Twitter Bootstrap v3.3.7 (CSS Framework)
- jQuery v3.13 (JS Library)
- AngularJS v1.3.6 (JS Framework)
- Morris v0.5.0 (Chart JS Library)
- Fontawesome v4.7.0 (Font Library)
- Datatables v1.10.13 (Table JS Library)


## How to run this app?
1. Setting database
- create dabase in your mysql with db nama: prism-test
- import `sql/prism-test.sql`
- change this line in `application/config/database.php`
```php
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost', // your hostname
	'username' => 'root', // mysql username
	'password' => 'root', // mysql password
	'database' => 'prism-test', // database name (prism-test)
	.
	.
	.
]
```

2. Seeting Base Url
- change this line in `application/config/config.php`
`$config['base_url'] = 'http://localhost/prism-test/';` to `$config['base_url'] = 'http://your-site-url/'`

3. Run on your browser `http://your-site-url/`

4. Login
- Superadmin
username: admin
password: password
- Purchase Employee
username: purchase
password: password
- Sales Employee
username: sales
password: password

## Demo
try the demo [here](kresna-prism-test.pe.hu)
