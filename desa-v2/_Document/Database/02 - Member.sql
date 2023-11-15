drop table if exists tbMemberJenis;
create table tbMemberJenis (	
  jenisID			varchar(8),					-- ID jenis member
  jenisNama			varchar(50) not null,		-- Nama jenis member
  jenisDeskripsi	text,						-- Deskripsi jenis member				
  jenisStatus		tinyint default 0,			-- Status jenis member
  jenisTglBuat		datetime default now(),		-- Tanggal dan jam pembuatan data
  jenisUserBuat		varchar(15),				-- ID pembuat data
  jenisTglEdit		datetime default now(),		-- Tanggal dan jam perubahan data
  jenisUserEdit		varchar(15),				-- ID pengubah data	
  primary key (jenisID));
  
/*
drop procedure if exists userGroupGet;
delimiter $$
create procedure userGroupGet(IN keyword varchar(200), kondisi tinyint)
begin
  drop table if exists temp; drop table if exists temp1;
  create temporary table temp select * from tbUserGroup;
  create temporary table temp1 select * from temp; delete from temp1;
  
  if (keyword <> '') then 
    insert into temp1 select * from temp where (groupID=keyword) or (groupName like concat('%',keyword,'%'));
    delete from temp; insert into temp select * from temp1; delete from temp1;
  end if;
  if (kondisi <> -1) then delete from temp where groupStatus <> kondisi; end if;
  
  select * from temp; -- select * from temp1;
  drop table temp; drop table temp1;
end $$
delimiter $$
*/  
  
  
  
  
  
create table tbMemberKhusus(
  memberID			varchar(15),					-- ID member
  memberNama		varchar(100),					-- Nama lengkap member
  memberFoto		varchar(5),						-- Foto member
  memberLogin		varchar(45),					-- Nama akun member
  memberPassword	varchar(45),					-- Kata kunci member
  memberRole		varchar(8),						-- Jenis hak member
  memberSalah		tinyint,						-- Jumlah kesalahan proses login
  memberStatus		tinyint default 0,				-- Status member 0: Tidak Aktif 1: Aktif 2: Dikunci administrator
  memberTglLogin	datetime,						-- Tanggal dan jam login terakhir
  memberTglLock		datetime,						-- Tanggal dan jam akun terkunci
  memberCatatan		text,							-- Catatan administrator
  primary key (memberID),
  constraint fk_jenis_member foreign key (memberRole) references tbMemberJenis(jenisID));

create table tbPenduduk(
  peopleID			varchar(15),					-- ID member
  peopleNama		varchar(100),					-- Nama lengkap member
  peopleFoto		varchar(5),						-- Foto member
  peopleLogin		varchar(45),					-- Nama akun member
  peoplePassword	varchar(45),					-- Kata kunci member
  peopleRole		varchar(8) default '000002',	-- Jenis hak member
  peopleSalah		tinyint,						-- Jumlah kesalahan proses login
  peopleStatus		tinyint default 0,				-- Status member 0: Tidak Aktif 1: Aktif 2: Dikunci administrator 3: Daftar
  peopleTglLogin	datetime,						-- Tanggal dan jam login terakhir
  peopleTglLock		datetime,						-- Tanggal dan jam akun terkunci
  peopleKeyTgl		datetime,						-- Tanggal dan jam key khusus
  peopleKeyValue	varchar(20),					-- Isi atau nilai key khusus
  peopleCatatan		text,							-- Catatan administrator
  primary key (peopleID),
  constraint fk_jenis_people foreign key (peopleRole) references tbMemberJenis(jenisID));
  
drop view if exists vPengguna;
create view vPengguna as 
  select md5(memberID) as id, memberNama as nama, if (trim(ifnull(memberFoto,''))='','nophoto.gif',concat(memberID,'.',memberFoto)) as foto,
  memberLogin as akun, memberPassword as kunci, md5(memberRole) as hak from tbMemberKhusus where memberStatus=1
  union all   
  select md5(peopleID) as id, peopleNama as nama, if (trim(ifnull(peopleFoto,''))='','nophoto.gif',concat(peopleID,'.',peopleFoto)) as foto,
  peopleLogin as akun, peoplePassword as kunci, md5(peopleRole) as hak from tbPenduduk where peopleStatus=1;
    
drop procedure if exists penggunaLogin;
delimiter $$
create procedure penggunaLogin(IN pengguna varchar(200), kataKunci varchar(200))
begin
  declare jumlah decimal(1);
  if ((trim(pengguna) = '') or (trim(kataKunci) = '')) then
	select true as ErrCode, concat('UAR001 - ', errorMessage('0008')) as ErrMsg;
  else  
    if (exists(select * from vPengguna where (akun=sha1(pengguna)) and (kunci=sha1(kataKunci)))) then
      select false as ErrCode, errorMessage('0000') as ErrMsg, id, nama, foto, hak from vPengguna where (akun=sha1(pengguna)) and (kunci=sha1(kataKunci));
      if (exists(select * from tbPenduduk where (peopleLogin=sha1(pengguna)) and (peoplePassword=sha1(kataKunci)))) then
        update tbPenduduk set peopleSalah=0, peopleTglLogin=now(), peopleTglLock=null,peopleKeyTgl=null, peopleKeyValue=null
        where (peopleLogin=sha1(pengguna)) and (peoplePassword=sha1(kataKunci));
      else
        update tbMemberKhusus set memberSalah=0, memberTglLogin=now(), memberTglLock=null where (memberLogin=sha1(pengguna)) and (memberPassword=sha1(kataKunci));
      end if;
    else 
      select true as ErrCode, concat('UAR002 - ', errorMessage('0008')) as ErrMsg;
      if (exists(select * from tbPenduduk where (peopleLogin=sha1(pengguna)))) then
        update tbPenduduk set peopleSalah=peopleSalah+1 where peopleLogin=sha1(pengguna);
        update tbPenduduk set peopleStatus=0, peopleTglLock=now(), peopleKeyTgl=null, peopleKeyValue=null where (peopleSalah >= 3) and (peopleStatus=1);
	  else
        update tbMemberKhusus set memberSalah=memberSalah+1 where memberLogin=sha1(pengguna);
        update tbMemberKhusus set memberStatus=0, memberTglLock=now() where (memberSalah >= 3) and (memberStatus=1) and (memberID <> 'MK20220001') and (memberID <> 'MK20220002');        
      end if;
    end if;
  end if;
end $$
delimiter ;  





drop table if exists tbPesanJenis;
create table tbPesanJenis (
  jenisID		varchar(20),				-- ID kelompok pesan
  jenisNama		varchar(150),				-- Nama kelompok pesan
  jenisPemilik	varchar(15) default '',		-- ID pemilik kelompok pesan '': semua pengguna
  jenisStatus	tinyint default 1,			-- Status kelompok pesan 0: Tidak aktif 1: Aktif
  primary key (jenisID));
  

drop table if exists tbPesanMember;
create table tbPesanMember (
  pesanID		varchar(20),			-- ID pesan
  pesanJenis	varchar(20),			-- Kelompok pesan
  pesanTgl		datetime default now(),	-- Tanggal dan waktu pesan
  pesanAsal		varchar(15),			-- ID pengirim pesan
  pesanTarget	varchar(15),			-- ID penerima pesan
  pesanUpper	varchar(20),			-- ID pesan sebelumnya
  pesanIsi		text,					-- Isi pesan
  pesanStatus	tinyint default 0,		-- Status pesan 0: Baru 1: Dibaca 2: Direspon
  primary key (pesanID),
  constraint fk_jenis_pesan foreign key (pesanJenis) references tbPesanJenis(jenisID));
  
drop procedure if exists pesanGet;
delimiter $$
create procedure pesanGet(IN keyword varchar(100), jenis varchar(50), kelompok varchar(50), penerima varchar(50), kondisi tinyint, 
  menu varchar(50), pengguna varchar(50), pass varchar(50), lokasi varchar(20))
begin
  declare kondisiTeks varchar(10) default "Semua";
  if ((trim(jenis)<>'') and not(exists(select * from tbPesanJenis where md5(jenisID)=jenis))) or not(exists(select * from vPengguna 
     where id=penerima)) or (kondisi < -1) or (kondisi > 2) or not(exists(select * from tbMenu where menuTrans=menu)) or 
     (trim(lokasi)='') or not(exists(select * from vPengguna where (id=pengguna) and (kunci=pass))) then
    select true as ErrCode, concat('MSG001 - ', errorMessage('0002')) as ErrMsg;
  else
    drop table if exists temp; drop table if exists temp1;
    create temporary table temp select  md5(pesanUpper) as kelompokKode, md5(pesanID) as id, md5(pesanJenis) as jenisKode, 
      j.jenisNama as jenisNama, pesanTgl as tanggal, md5(pesanAsal) as asalKode, if (exists(select * from tbPenduduk 
      where peopleID=pesanAsal),(select peopleNama from tbPenduduk where peopleID=pesanAsal),(select memberNama from tbMemberKhusus 
      where memberID=pesanAsal)) as asalNama, md5(pesanTarget) as targetKode, if (exists(select * from tbPenduduk 
      where peopleID=pesanTarget),(select peopleNama from tbPenduduk where peopleID=pesanTarget),(select memberNama from tbMemberKhusus 
      where memberID=pesanTarget)) as targetNama, pesanIsi as isi, pesanStatus as statusKode, if(pesanStatus=0,'Baru',
      if(pesanStatus=1,'Dibaca','Direspon')) as statusNama from tbPesanMember p 
      left join tbPesanJenis j on j.jenisID=p.pesanJenis order by pesanTgl desc;
	create temporary table temp1 select * from temp; delete from temp1;
    if (trim(keyword)<>'') then
      insert into temp1 select * from temp where id=keyword; delete from temp;
      insert into temp select * from temp1; delete from temp1;
      if exists(select * from tbPesanMember where md5(pesanID)=keyword) then select pesanID into keyword from tbPesanMember where md5(pesanID)=keyword; end if;
	end if;
    if (trim(jenis)<>'') then delete from temp where jenisKode <> jenis; select jenisNama into jenis from tbPesanJenis where md5(jenisID)=jenis; end if; 
    if (trim(kelompok)<>'') then 
      delete from temp where kelompokKode <> kelompok; 
      if exists(select * from tbPesanMember where md5(pesanID)=kelompok) then select pesanID into kelompok from tbPesanMember where md5(pesanID)=kelompok; end if;
    end if;
    if (trim(penerima)<>'') then delete from temp where targetKode <> penerima; select nama into penerima from vPengguna where id=penerima; end if;
    if (kondisi <> -1) then 
      delete from temp where statusKode <> kondisi; 
      if (kondisi=0) then set kondisiTeks='Baru'; elseif (kondisi=1) then set kondisiTeks='Baca'; elseif (kondisi=2) then set kondisiTeks='Respon'; end if;
    end if;
	if (auditStatus('pesanGet')=1) then call logSet (pengguna, lokasi, 'R', menu, concat('Pesan : ', keyword, ' - ',  jenis, ' - ', kelompok, ' - ', penerima, ' - ', kondisi)); end if;    
    if exists(select * from temp) then
      select false as ErrCode, errorMessage('0000') as ErrMsg, temp.* from temp;
    else
      select true as ErrCode, errorMessage('0001') as ErrMsg;
    end if;
    drop table temp; drop table temp1;
  end if;
end $$
delimiter ;

