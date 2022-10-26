CREATE TABLE pegawai (
  id serial PRIMARY KEY,
  nip varchar(50) NOT NULL,
  nama varchar(100) DEFAULT NULL,
  alamat varchar(200) DEFAULT NULL,
  tempat_lahir varchar(100) DEFAULT NULL,
  tanggal_lahir date DEFAULT NULL
);
