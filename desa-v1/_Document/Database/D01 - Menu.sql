delete from tbMenu;
insert into tbMenu(menuUpper,menuID,menuUrut,menuTeks,menuTrans,menuLink,menuStatus) values
('000000','FFFFFD',997,'Form Lupa Password','Forget','mbmmng/usrfgt.php',2),
('000000','FFFFFE',998,'Form Recovery Password','Recovery','mbmmng/usrrcv.php',2),
('000000','FFFFFF',999,'Form Pendaftaran Baru','Register','mbmmng/usrrgs.php',2),
('000000','010000',001,'Beranda','Beranda','news/usrmnpg.php',1),
('000000','020000',002,'Berita','Berita','#',1),
   ('020000','020100',001,'Seputar Desa','Berita_Desa','news/sptdsvw.php',1),
   ('020000','020200',002,'Program Kerja Desa','Berita_Program','news/prgdsvw.php',1),
   ('020000','020300',003,'Detail Berita','Berita_Detail','news/dtlbrtvw.php',2),
   ('020000','020400',004,'Agenda Kegiatan','Berita_Agenda','news/schdsvw.php',1),
('000000','030000',003,'Galeri','Galeri','#',1),
   ('030000','030100',001,'Galeri Foto','Galeri_Foto','news/glftvw.php',1),
   ('030000','030200',002,'Galeri Video','Galeri_Video','news/glvdvw.php',1),
('000000','040000',004,'Profil Desa','Desa','#',1),
   ('040000','040100',001,'Sejarah Desa','Desa_Sejarah','desa/lclhstry.php',1),
   ('040000','040200',002,'Wilayah Desa','Desa_Wilayah','desa/lclwlyh.php',1),
   ('040000','040300',003,'Lambang Desa','Desa_Lambang','desa/lcllmbg.php',1),
   ('040000','040400',004,'Indeks Desa Membangun','Desa_IDM','desa/lclidm.php',1),
   ('040000','040500',005,'Profil Wilayah Administrasi','Desa_Administrasi','desa/rkpwlyh.php',1),
   ('040000','040600',006,'Profil Kependudukan','Desa_Penduduk','desa/rkpmbm.php',1),
('000000','050000',005,'Pemerintahan','Govern','#',1),
   ('050000','050100',001,'Visi, Misi, dan Tujuan','Govern_Visi','desa/lclvmtvw.php',1),
   ('050000','050200',002,'Susunan Aparatur Desa','Govern_Aparatur','desa/lclaprtvw.php',1),
   ('050000','050300',003,'Badan Permusyawaratan Desa','Govern_BPD','desa/lclbpdvw.php',1),
   ('050000','050400',004,'Transparansi Keuangan','Govern_Transparan','desa/nrcdsvw.php',1),
   ('050000','050500',005,'Peraturan Desa','Govern_Aturan','desa/prdhkvw.php',1),
   ('050000','050600',006,'Lembaga Kemasyarakatan','Govern_LPM','desa/lcllmvw.php',1),
('000000','060000',006,'Potensi Desa','Potensi','#',1),
   ('060000','060100',001,'Produk Unggulan','Potensi_Produk','produk/ptnprdds.php',1),
   ('060000','060200',002,'Wisata Desa','Potensi_Wisata','produk/ptnwstds.php',1),
('000000','070000',007,'Layanan Desa','Layanan','#',1),
   ('070000','070100',001,'Informasi Layanan','Layanan_Info','layanan/srvcinf.php',1),
   ('070000','070200',002,'Pengajuan Layanan','Layanan_Request','layanan/srvcrqst.php',1),
   ('070000','070300',003,'Status Pengajuan','Layanan_Status','layanan/srvcstt.php',1),
   ('070000','070400',004,'Survei Kepuasan','Layanan_Survei','mbmmng/pbsrvent.php',1),
   ('070000','070500',005,'Komentar Pengunjung','Layanan_Komentar','mbmmng/pbcmtent.php',1),
('000000','080000',008,'Pesan','Pesan','#',1),
   ('080000','080100',001,'Surat Elektronik','Pesan_Mail','layanan/psnml.php',1),
   ('080000','080200',002,'Pesan Elektronik','Pesan_Notif','layanan/psnntf.php',1),
('000000','F10000',901,'Dashboard','Dashboard_Admin','mstmng/dshbadm.php',1),
('000000','F20000',902,'Data Desa','Desa_Manage','#',1),
   ('F20000','F20100',001,'Identitas Desa','Desa_Identitas','desa/lclidwlyh.php',1),
   ('F20000','F20200',002,'Sejarah Desa','Desa_History','desa/lclsjrhmng.php',1),
   ('F20000','F20300',003,'Lambang Desa','Desa_Logo','desa/lcllgmng.php',1),
   ('F20000','F20400',004,'Visi, Misi & Tujuan','Desa_VMST','desa/lclvmtmng.php',1),
   ('F20000','F20500',005,'Pemerintahan Desa','Desa_Pemerintahan','desa/lclpmrth.php',1),
   ('F20000','F20600',006,'Media Sosial Desa','Desa_Medsos','desa/lclmdsmng.php',1),
   ('F20000','F20700',007,'Wilayah Administratif','Desa_Administratif','desa/lclwlyhmng.php',1),
   ('F20000','F20800',008,'Indeks Desa Membangun','Desa_Indeks','desa/lclidmmng.php',1),
   ('F20000','F20900',009,'Badan Permusyawaratan Desa','Desa_Musyawarah','desa/lclbpdmng.php',1),
   ('F20000','F20A00',010,'Lembaga Kemasyarakatan','Desa_Lemmas','desa/lcllmmng.php',1),
('000000','F30000',903,'Administrasi Desa','Administrasi','#',1),
   ('F30000','F30100',001,'Jenis Produk Hukum','Admin_Jenis','desa/admjnshk.php',1),
   ('F30000','F30200',002,'Data Produk Hukum','Admin_Produk','desa/prdhkmng.php',1),
   ('F30000','F30300',003,'Buku Kas Desa','Admin_Kas','desa/fncdsmng.php',1),
   ('F30000','F30400',004,'Buku Tanah Desa','Admin_Tanah','desa/lnddsmng.php',1),
   ('F30000','F30500',005,'Keuangan Desa','Admin_Transparan','desa/nrcdsmng.php',1),
('000000','F40000',904,'Potensi Desa','Product','#',1),
   ('F40000','F40100',001,'Jenis Produk Unggulan','Product_Type','produk/ptnprdjns.php',1),
   ('F40000','F40200',002,'Data Produk Unggulan','Product_Data','produk/ptnprdmng.php',1),
   ('F40000','F40300',003,'Jenis Wisata','Product_Jenis','produk/ptnwstjns.php',1),
   ('F40000','F40400',004,'Data Wisata Desa','Product_Wisata','produk/ptnwstmng.php',1),
('000000','F50000',905,'Kependudukan','People','#',1),
   ('F50000','F50100',001,'Data Keluarga','People_Keluarga','mbrmng/mbrkelmng.php',1),
   ('F50000','F50200',002,'Data Penduduk Tetap','People_Tetap','mbrmng/mbrttp.php',1),
   ('F50000','F50300',003,'Data Penduduk Sementara','People_Sementara','mbrmng/mbrsmt.php',1),
   ('F50000','F50400',004,'Jenis Bantuan Masyarakat','People_JenisBantuan','mbrmng/hlpjns.php',1),
   ('F50000','F50500',005,'Data Bantuan Masyarakat','People_Bantuan','mbrmng/hlpmbr.php',1),
   ('F50000','F50600',006,'Rekapitulasi Data Penduduk','People_RekapTetap','mbrmng/rkptmbr.php',1),
   ('F50000','F50700',007,'Rekapitulasi Data Bantuan','People_RekapBantuan','mbrmng/rkpthlp.php',1),
('000000','F60000',906,'Berita','News','#',1),
   ('F60000','F60100',001,'Teks Berjalan','News_Running','news/rntksmng.php',1),
   ('F60000','F60200',002,'Slider','News_Slider','news/sldmng.php',1),
   ('F60000','F60300',003,'Seputar Desa','News_Seputar','news/sptdsmng.php',1),
   ('F60000','F60400',004,'Program Kerja Desa','News_Program','news/prgdsmng.php',1),
   ('F60000','F60500',005,'Galeri Foto','News_Foto','news/glftmng.php',1),
   ('F60000','F60600',006,'Galeri Video','News_Video','news/glvdmng.php',1),
   ('F60000','F60700',007,'Agenda Kegiatan','News_Schedule','news/schdsmng.php',1),
('000000','F70000',907,'Layanan Masyarakat','Services','#',1),
   ('F70000','F70100',001,'Jenis Layanan Masyarakat','Services_Jenis','layanan/srvcjns.php',1),
   ('F70000','F70200',002,'Permohonan Layanan','Services_Mohon','layanan/srvcmng.php',1),
('000000','F80000',908,'Peta Desa','Peta','#',1),
   ('F80000','F80100',001,'Pengaturan Peta Utama','Peta_Utama','maps/mpmng.php',1),
   ('F80000','F80200',002,'Jenis Lokasi','Peta_Jenis','maps/jnsloc.php',1),
   ('F80000','F80300',003,'Pengelolaan Lokasi','Peta_Lokasi','maps/itmmng.php',1),
   ('F80000','F80400',004,'Lihat Peta','Peta_View','maps/cmbmpvw.php',1),
('000000','FE0000',998,'Pengaturan','Setting','#',1),
   ('FE0000','FE0100',001,'Parameter Aplikasi','Setting_Parameter','mstmng/prmmng.php',1),
   ('FE0000','FE0200',002,'Pesan Kesalahan','Setting_Pesan','mstmng/msgmng.php',1),
   ('FE0000','FE0300',003,'Kode Wilayah','Setting_Wilayah','mstmng/wlyhmng.php',1),
   ('FE0000','FE0400',004,'Jenis Pekerjaan','Setting_Pekerjaan','mstmng/wrkmng.php',1),
   ('FE0000','FE0500',005,'Media Komunikasi','Setting_Komunikasi','mstmng/usrcmmng.php',1),
   ('FE0000','FE0600',006,'Media Sosial','Setting_Sosial','mstmng/usrsclmng.php',1),
   ('FE0000','FE0700',007,'Tingkat Pendidikan','Setting_Pendidikan','mstmng/usrschmng.php',1),
   ('FE0000','FE0800',008,'Menu Aplikasi','Setting_Menu','mstmng/mstmnmng.php',1),
   ('FE0000','FE0900',009,'Jenis Pengguna','Setting_Jenis','mstmng/usrjnsmng.php',1),
   ('FE0000','FE0A00',010,'Akun Pengguna','Setting_Akun','mstmng/usraccmng.php',1),
('000000','FF0000',999,'Log Aplikasi','Log','#',1),
   ('FF0000','FF0100',001,'Manajemen Transaksi','Log_Audit','log/adtmng.php',1),
   ('FF0000','FF0200',002,'Transaksi Pengguna','Log_Transaksi','log/trnusrvw.php',1),
   ('FF0000','FF0300',003,'Masalah Aplikasi','Log_Error','log/errapp.php',1),
   ('FF0000','FF0400',004,'Data Kunjungan','Log_Visitor','log/hitdtl.php',1),
   ('FF0000','FF0500',005,'Survei Pengunjung','Log_Survei','mbmmng/pbsrvvw.php',1),
   ('FF0000','FF0600',006,'Komentar Pengunjung','Log_Comment','mbmmng/pbcmtvw.php',1);
   
delete from tbHakMaster;
insert into tbHakMaster(hakMenu,hakRole,hakValue,hakStatus) values -- 1: View 2: Edit 4: Delete 8: Print 16: Import 32:Export
('FFFFFD','000001',3,1),		('FFFFFE','000001',3,1),		('FFFFFF','000001',3,1),		('010000','000001',1,1),				
('020000','000001',1,1),		('020100','000001',1,1),		('020200','000001',1,1),		('020300','000001',1,1),
('020400','000001',1,1),		('030000','000001',1,1),		('030100','000001',1,1),		('030200','000001',1,1),
('040000','000001',1,1),		('040100','000001',1,1),		('040200','000001',1,1),		('040300','000001',1,1),
('040400','000001',1,1),		('040500','000001',1,1),		('040600','000001',1,1),		('050000','000001',1,1),
('050100','000001',1,1),		('050200','000001',1,1),		('050300','000001',1,1),		('050400','000001',1,1),
('050500','000001',1,1),		('050600','000001',1,1),		('060000','000001',1,1),		('060100','000001',1,1),
('060200','000001',1,1),		('070000','000001',1,1),		('070100','000001',1,1),
				
('010000','000002',1,1),		('020000','000002',3,1),		('020100','000002',3,1),		('020200','000002',3,1),
('020300','000002',3,1),		('020400','000002',3,1),		('030000','000002',3,1),		('030100','000002',3,1),
('030200','000002',3,1),		('040000','000002',3,1),		('040100','000002',3,1),		('040200','000002',3,1),
('040300','000002',3,1),		('040400','000002',3,1),		('040500','000002',3,1),		('040600','000002',3,1),
('050000','000002',3,1),		('050100','000002',3,1),		('050200','000002',3,1),		('050300','000002',3,1),
('050400','000002',3,1),		('050500','000002',3,1),		('050600','000002',3,1),		('060000','000002',3,1),
('060100','000002',3,1),		('060200','000002',3,1),		('070000','000002',3,1),		('070100','000002',3,1),
('070200','000002',3,1),		('070300','000002',3,1),		('070400','000002',3,1),		('070500','000002',3,1),
('080000','000002',3,1),		('080100','000002',3,1),		('080200','000002',3,1),
				
('F10000','000000',63,1),		('F20000','000000',63,1),		('F20100','000000',63,1),		('F20200','000000',63,1),
('F20300','000000',63,1),		('F20400','000000',63,1),		('F20500','000000',63,1),		('F20600','000000',63,1),
('F20700','000000',63,1),		('F20800','000000',63,1),		('F20900','000000',63,1),		('F20A00','000000',63,1),
('F30000','000000',63,1),		('F30100','000000',63,1),		('F30200','000000',63,1),		('F30300','000000',63,1),
('F30400','000000',63,1),		('F30500','000000',63,1),		('F40000','000000',63,1),		('F40100','000000',63,1),
('F40200','000000',63,1),		('F40300','000000',63,1),		('F40400','000000',63,1),		('F50000','000000',63,1),
('F50100','000000',63,1),		('F50200','000000',63,1),		('F50300','000000',63,1),		('F50400','000000',63,1),
('F50500','000000',63,1),		('F50600','000000',63,1),		('F50700','000000',63,1),		('F60000','000000',63,1),
('F60100','000000',63,1),		('F60200','000000',63,1),		('F60300','000000',63,1),		('F60400','000000',63,1),
('F60500','000000',63,1),		('F60600','000000',63,1),		('F60700','000000',63,1),		('F70000','000000',63,1),
('F70100','000000',63,1),		('F70200','000000',63,1),		('F80000','000000',63,1),		('F80100','000000',63,1),
('F80200','000000',63,1),		('F80300','000000',63,1),		('F80400','000000',63,1),		('FE0000','000000',63,1),
('FE0100','000000',63,1),		('FE0200','000000',63,1),		('FE0300','000000',63,1),		('FE0400','000000',63,1),
('FE0500','000000',63,1),		('FE0600','000000',63,1),		('FE0700','000000',63,1),		('FE0800','000000',63,1),
('FE0900','000000',63,1),		('FE0A00','000000',63,1),		('FF0000','000000',63,1),		('FF0100','000000',63,1),
('FF0200','000000',63,1),		('FF0300','000000',63,1),		('FF0400','000000',63,1),		('FF0500','000000',63,1),
('FF0600','000000',63,1),
    
('F10000','000003',63,1),		('F20000','000003',63,1),		('F20100','000003',63,1),		('F20200','000003',63,1),
('F20300','000003',63,1),		('F20400','000003',63,1),		('F20500','000003',63,1),		('F20600','000003',63,1),
('F20700','000003',63,1),		('F20800','000003',63,1),		('F20900','000003',63,1),		('F20A00','000003',63,1),
('F30000','000003',63,1),		('F30100','000003',63,1),		('F30200','000003',63,1),		('F30300','000003',63,1),
('F30400','000003',63,1),		('F30500','000003',63,1),		('F40000','000003',63,1),		('F40100','000003',63,1),
('F40200','000003',63,1),		('F40300','000003',63,1),		('F40400','000003',63,1),		('F50000','000003',63,1),
('F50100','000003',63,1),		('F50200','000003',63,1),		('F50300','000003',63,1),		('F50400','000003',63,1),
('F50500','000003',63,1),		('F50600','000003',63,1),		('F50700','000003',63,1),		('F60000','000003',63,1),
('F60100','000003',63,1),		('F60200','000003',63,1),		('F60300','000003',63,1),		('F60400','000003',63,1),
('F60500','000003',63,1),		('F60600','000003',63,1),		('F60700','000003',63,1),		('F70000','000003',63,1),
('F70100','000003',63,1),		('F70200','000003',63,1),		('F80000','000003',63,1),		('F80100','000003',63,1),
('F80200','000003',63,1),		('F80300','000003',63,1),		('F80400','000003',63,1),		('FE0000','000003',63,1),
('FE0400','000003',63,1),		('FE0500','000003',63,1),		('FE0600','000003',63,1),		('FE0700','000003',63,1),
('FE0900','000003',63,1),		('FE0A00','000003',63,1),		('FF0000','000003',63,1),		('FF0400','000003',63,1),
('FF0500','000003',63,1),		('FF0600','000003',63,1);
    
    
    
/*
FFFFFD		Form Lupa Password		
FFFFFE		Form Recovery Password		
FFFFFF		Form Pendaftaran Baru		
				
010000		Beranda		
	010100		Running Teks	
	010100		Slider View	
	010200		Hasil Pencarian Berita	
	010300		Arsip Berita (Terbaru & Terpopuler)	
	010300		Statistik Pengunjung	
	010300		Lokasi Kantor Desa	
	010300		Data Kontak Kantor Desa	
				
020000		Berita		
	020100		Seputar Desa	
	020200		Program Kerja Desa	
	020300		Detail Berita	
	020400		Agenda Kegiatan	
				
030000		Galeri		
	030100		Galeri Foto	
	030200		Galeri Video	
				
040000		Profil Desa		
	040100		Sejarah Desa	
	040200		Wilayah Desa	
	040300		Lambang Desa	
	040400		Indeks Desa Membangun	
	040500		Profil Wilayah Administrasi	
	040600		Profil Kependudukan	
				
050000		Pemerintahan		
	050100		Visi, Misi, dan Tujuan	
	050200		Susunan Aparatur Desa	
	050300		Badan Permusyawaratan Desa	
	050400		Transparansi Keuangan	
	050500		Peraturan Desa	
	050600		Lembaga Kemasyarakatan	
				
060000		Potensi Desa		
	060100		Produk Unggulan	
	060200		Wisata Desa	
				
070000		Layanan Desa		
	070100		Informasi Layanan	
	070200		Pengajuan Layanan	
	070300		Status Pengajuan	
	070400		Survei Kepuasan	
	070500		Komentar Pengunjung	
				
080000		Pesan		
	080100		Surat Elektronik	
	080200		Pesan Elektronik	
				
				
				
				
F10000		Dashboard		
				
F20000		Data Desa		
	F20100		Identitas Desa	
	F20200		Sejarah Desa	
	F20300		Lambang Desa	
	F20400		Visi, Misi & Tujuan	
	F20500		Pemerintahan Desa	
	F20600		Media Sosial Desa	
	F20700		Wilayah Administratif	
	F20800		Indeks Desa Membangun	
	F20900		Badan Permusyawaratan Desa	
	F20A00		Lembaga Kemasyarakatan	
				
F30000		Administrasi Desa		
	F30100		Jenis Produk Hukum	
	F30200		Data Produk Hukum	
	F30300		Buku Kas Desa	
	F30400		Buku Tanah Desa	
	F30500		Keuangan Desa	
				
F40000		Potensi Desa		
	F40100		Jenis Produk Unggulan	
	F40200		Data Produk Unggulan	
	F40300		Jenis Wisata	
	F40400		Data Wisata Desa	
				
F50000		Kependudukan		
	F50100		Data Keluarga	
	F50200		Data Penduduk Tetap	
	F50300		Data Penduduk Sementara	
	F50400		Jenis Bantuan Masyarakat	
	F50500		Data Bantuan Masyarakat	
	F50600		Rekapitulasi Data Penduduk	
	F50700		Rekapitulasi Data Bantuan	
				
F60000		Berita		
	F60100		Teks Berjalan	
	F60200		Slider	
	F60300		Seputar Desa	
	F60400		Program Kerja Desa	
	F60500		Galeri Foto	
	F60600		Galeri Video	
	F60700		Agenda Kegiatan	
				
F70000		Layanan Masyarakat		
	F70100		Jenis Layanan Masyarakat	
	F70200		Permohonan Layanan	
				
F80000		Peta Desa		
	F80100		Pengaturan Peta Utama	
	F80200		Jenis Lokasi	
	F80300		Pengelolaan Lokasi	
	F80400		Lihat Peta	
				
FE0000		Pengaturan		
	FF0100		Parameter Aplikasi	
	FE0200		Pesan Kesalahan	
	FE0300		Kode Wilayah	
	FE0400		Jenis Pekerjaan	
	FE0500		Media Komunikasi	
	FE0600		Media Sosial	
	FE0700		Tingkat Pendidikan	
	FE0800		Menu Aplikasi	
	FE0900		Jenis Pengguna	
	FE0A00		Akun Pengguna	
				
FF0000		Log Aplikasi		
	FF0100		Manajemen Transaksi	
	FF0200		Transaksi Pengguna	
	FF0300		Masalah Aplikasi	
	FF0400		Data Kunjungan	
	FF0500		Survei Pengunjung	
	FF0600		Komentar Pengunjung	
*/    