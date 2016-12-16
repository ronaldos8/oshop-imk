create database tubes_imk;
use tubes_imk;
create table admin(
	id int primary key auto_increment,
	nama varchar(50) not null,
	username varchar(20) not null,
	password varchar(35) not null
);

create table kategori(
	id_kategori int primary key auto_increment,
	nama_kategori varchar(50) not null
);

create table subkategori(
	id_sub int primary key auto_increment,
	nama_sub varchar(30) not null,
	kategori int not null,
	foreign key (kategori) references kategori(id_kategori)
);

create table produk(
	id_produk int primary key auto_increment,
	nama_produk varchar(50) not null,
	detail_produk longtext not null,
	stock_produk int not null,
	kondisi_produk int not null,
	brand_produk varchar(50) not null,
	harga_produk int not null,
	kategori_produk int not null,
	foto_produk varchar(100) not null,
	foreign key (kategori_produk) references subkategori(id_sub)
);

create table pembeli(
	id_pembeli int primary key auto_increment,
	nama_pembeli varchar(50) not null,
	jk_pembeli varchar(10) not null,
	alamat_pembeli longtext not null
);

create table transaksi(
	ID int primary key auto_increment,
	no_transaksi varchar(15) not null,
	id_pembeli int not null,
	id_produk int not null,
	foreign key (id_pembeli) references pembeli(id_pembeli),
	foreign key (id_produk) references produk(id_produk)
);

create table review(
	id_review int primary key auto_increment,
	nama varchar(50) not null,
	pesan varchar(225) not null
);

create table whishlist(
	whishlist_id int primary key auto_increment,
	id_pembeli int not null,
	id_produk int not null,
	foreign key (id_pembeli) references pembeli(id_pembeli),
	foreign key (id_produk) references produk(id_produk)
);