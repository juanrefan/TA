delete from tbMemberJenis;
insert into tbMemberJenis(jenisID, jenisNama, jenisStatus) values
('000000','Master',1), ('000001','Umum',1), ('000002','Penduduk',1), ('000003','Administrator',1);

delete from tbMemberKhusus; 
insert into tbMemberKhusus(memberID, memberNama, memberLogin, memberPassword, memberRole, memberStatus) values 
('MK20220001','Tamu',sha1('tmUsrDftAdm'),sha1('-jjGSKJDksjs92-sk'),'000001',1),
('MK20220002','FTI UK Maranatha',sha1('masterAdmin'),sha1('superADMIN@2022'),'000000',1);
('MK20220003','warga',sha1('wargaDesa'),sha1('wargadesa123'),'000002',1);

delete from tbPesanJenis;
insert into tbPesanJenis(jenisID,jenisNama,jenisPemilik,jenisStatus) values
('0000','Kotak Surat','',1),('0001','Tempat Sampah','',1);