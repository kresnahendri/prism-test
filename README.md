# Inventory Management System (IMS) 
IMS bertugas mengelola keluar masuknya barang pada gudang penyimpanan. Masuknya barang mengartikan perusahaan melakukan pembelian sejumlah barang terhadap supplier, sedangkan keluarnya barang mengartikan adanya pembelian sejumlah barang dari pelanggan. IMS yang sudah dikenal di dunia internet antara lain tradegecko.com, zoho.com, unleashedsoftware.com, dsb.

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
- **Accepted**: order telah diterima oleh pihak penjual
- **Shipped**: produk yang dipesan telah dikirim kepada pembeli (belum sampai tujuan)
- **Paid**: order sudah dibayar oleh pembeli
- **Recived**: barang sudah diterima oleh pembeli
Jika semua status tersebut sudah terpenuhi, maka status order menjadi completed dan tidak bisa diubah kembali (Hanya superadmin yang bisa merubahnya).
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
![prism-test-usecase](https://lh3.googleusercontent.com/1QkhA9cdqy3JBR0U-Pr95a35FP36gplm7PfAPyapWjvtkIdOHNp_F-Z5B2V3Wtpjr-lYWnML4XtVcLh1MdFGqCZkkjzLXvqMD-HxTHblO9upZFoN7BZmClSH2UtPVJxjT0dyPaa5XUYMv23Xal2HTDsww9MvEiGLzXPYRRNbkEFFiNUjNVPNlrVwcBOzrtAIap64NDXq-quFN257kzhXcBUz-aGqvDyHgZihYZl2gJwK8D0O1acaSVPldGULym9D0oxzEMYN5zzxzod7q6aou4c6-vnGjW4x5wlXYM7mE2RpaJKk3vSKYIx62gbvKALPD_Y-e9cdEqY9l9WgO0pfPVkJn-9QPx2C8XHIed5PGewb7bsCtYYTzs0WVuuD00-TeR0QiabXFG8kCbERTmgGC3FXw81GlVlhb5blzXa7v-J5nsXtPxwhictEaQY4MzS9BL16bhkZbBtLM6LQSKRj8vV-xl0RY6E8DP6yM5ItLd_mnS_RxUNKOCPI3Y84b_50wEnnvaErIsxyQt1oFDaDk7CrJ8esCHvqsE0GHK561bWu9VGVACRI7eQhKUXvr9Qzb6mD_DCXGGyGfeCU1B2J0HrG1oqXXplWlFB1L0s08Mppeym3=w1366-h569-no)

## ERD
![prism-test-erd](https://lh3.googleusercontent.com/RAZJ_bX8pmW7XmeRCD9Og82s2E4OuFFSBADseTZTrnI8tAk-j-feIp2OzPJ92QU63yrVgcTp6wwUxOZkA62a4K4MU4ESwIaoUKM8n9v6yBRw_LV24_oKyh6kuoHxoT4dIq836KeUtc8pz_FELMaxTIgQsYXkKpwglFCtXYuIsWxBTy-l4c5CpTUu-NKQVkWZe1LaFEoQFMWSUZ_cybej6u1EDX9ogl7rXgTw1fB7RZkOUi-KG0Cd-eVp8lhrM7sWDF4ZMTZ5J8tFF4R-54C8XkaXzWECN-ET5LwHoDIR9d0g3aIty9o7LNh3hmVVY3YQpqEdakgzATd0xFfe2D8jduOgTLLpg4NnQTHH5ycYMGEHoYsxW8q7ukUWDyRkmj6CiBqPSfFo8wqga4JK1qYxML8jnGkDQ_ntoH4eFTPdmhctq9tdEMstEe80AjmC4bBy8-JidvDECg6ru7NFTa7YEVh7weScW3Y89TCXMkJhGPrvTqJDoezRaRSchR9DkyOnehjeBs1T5Qj7PCA0YMaxyPQscBLs3foJjetG_lOKWBEBZnA2Y_1kr9jD8Dh32z1ZTdv1vaXrxL_5qNZgRAGIqUCha31cbIcsgAt8y1gjqpjezxSD=w975-h491-no)

## Class Diagram
![prism-test-class-diagram](https://lh3.googleusercontent.com/QnGRzyFNU4VN6JdMCqn3cqu010dRvtcNyYePRi-Ut8u0rPd4_0AT4zbGiwaoWgzLghA69nTEOD_4Ntm0ZLAqfKUtYl-YIqdgiYa43Vb5nJooClCaWZP1oGkGYwHzMjEN5J91nmkepZbNah06aWNccfNN4CFcxFsUqLJ-gya-rNPOPgBlFOQtBEJAWNC85NI2VtWF1TEnlD2S8o97KjM4at5gFS-L0tT8UM8ydiKljPEDoboIYEGJpMzso0l3RdfaFOSCsPBS0MjXcaPL8Kv07I7FXl9ctYd_RYMpU5PMmeixMnMbE1oM5cuuN4M6sPk4VdOY7yxLK51dxCeCe4W9s4RLIxsItUV63KJpN-AXJ82B2TE1khJ5iKZ3q7nuoE1FO9VE8DxuRj893LiR7V6Wi4o05DE-xF3C22x3zP2TMs3HWyytq3qyI-De0sqWr50OvPLhkGwJhIGyk5HTdm9ByElt5Rhv80WcKBuz9KLXA8FyaZyR55NU2PtQjnQrqUfgz1IHSDj51-GQkyTuY-bvDDct3P3ueQx49nn-SOX90FKch8lbZK1rgun75bLX7s78ID1jKrGIa6bBDpSRVA8OVImMrZWYpRetgtsQIiarEW8sTXp1=w584-h593-no)

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
### Setting database
1. create dabase in your mysql with db nama: prism-test
2. import `sql/prism-test.sql`
3. change this line in `application/config/database.php`
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

### Seeting Base Url
1. change this line in `application/config/config.php`.

from `$config['base_url'] = 'http://localhost/prism-test/';` to `$config['base_url'] = 'http://your-site-url/'`

2. Run app on your web browser `http://your-site-url/`

3. Tada!! The app is ready

#### Login
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

## Notes
If you get error like this:
`Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated . . . this is incompatible with sql_mode=only_full_group_by`

run this code in your mysql console.
```sql
SET GROUP BY
mysql> set global sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
mysql> set session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
```