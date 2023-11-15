-- ------------ --
-- Running Teks --
-- ------------ --
drop table if exists tbRunningTeks;
create table tbRunningTeks (
  teksID 			varchar(15),				-- ID teks
  teksIsi			varchar(200),				-- Isi teks
  teksTglMulai		date default '1900-01-01',	-- Tgl mulai tayang teks
  teksTglAkhir		date default '1900-01-01',	-- Tgl akhir tayang teks
  teksStatus		tinyint default 0,			-- Status tayang teks 0: Tidak aktif 1: Aktif
  teksBuatTgl		datetime default now(),		-- Tgl dan jam buat teks
  teksBuatOrang		varchar(15),				-- ID pembuat teks
  primary key (teksID));
  
drop procedure if exists runningGet;
delimiter $$
create procedure runningGet(IN keyword varchar(50), kondisi tinyint, menu varchar(50), pengguna varchar(50), pass varchar(50), 
  lokasi varchar(20))
begin
  if (kondisi <-1) or (kondisi > 1) or not(exists(select * from tbMenu where menuTrans=menu)) or (trim(lokasi)='') or
     not(exists(select * from vPengguna where (id=pengguna) and (kunci=pass))) then
    select true as ErrCode, concat('RNT001 - ', errorMessage('0002')) as ErrMsg;
  else
    update tbRunningTeks set teksStatus=0 where (TIMESTAMPDIFF(SECOND,concat(teksTglAkhir,' 23:59:59'), now()) >= 0) and (teksTglAKhir<>'1900-01-01') and (teksStatus=1);
    drop table if exists temp; drop table if exists temp1;
    create temporary table temp select md5(teksID) as id, teksIsi as teks, teksTglMulai as tglMulai,
	  teksTglAkhir as tglAkhir, teksStatus as statusKode, if (teksStatus=0,'Tidak Aktif','Aktif') as statusTeks, teksBuatTgl as tglBuat,
      md5(teksBuatOrang) as pembuatID, ifnull(if (exists(select * from tbMemberKhusus where memberID=teksBuatOrang), (select memberNama 
      from tbMemberKhusus where memberID=teksBuatOrang), (select peopleNama from tbPenduduk where peopleID=teksBuatOrang)), '') as pembuatNama 
      from tbRunningTeks order by teksTglMulai;
	create temporary table temp1 select * from temp; delete from temp1;
    if (trim(keyword)<>'') then
      insert into temp1 select * from temp where id=keyword; delete from temp;
      insert into temp select * from temp1; delete from temp1;
	end if;
    if (kondisi<>-1) then delete from temp where statusKode <> kondisi; end if;
    if exists(select * from temp) then
      select false as ErrCode, errorMessage('0000') as ErrMsg, temp.* from temp;
	else
      select true as ErrCode, concat('RNT002 - ', errorMessage('0001')) as ErrMsg;
    end if;
    drop table temp; drop table temp1;
  end if;
end $$
delimiter ;  

drop procedure if exists runningSet;
delimiter $$
create procedure runningSet(IN kode varchar(50), isi varchar(200), mulai date, akhir date, kondisi tinyint, 
  menu varchar(50), pengguna varchar(50), pass varchar(50), lokasi varchar(20))
begin
  declare urutan varchar(15);
  set kode=trim(kode); set isi=trim(isi); set mulai=trim(mulai); set akhir=trim(akhir); set kondisi=trim(kondisi);
  if ((kode<>'') and not(exists(select * from tbRunningTeks where md5(teksID)=kode))) or (isi='') or (kondisi < 0) or 
     (kondisi > 1) or not(exists(select * from tbMenu where menuTrans=menu)) or (trim(lokasi)='') or 
     not(exists(select * from vPengguna where (id=pengguna) and (kunci=pass))) then
    select true as ErrCode, concat('RNT003 - ', errorMessage('0002')) as ErrMsg;
  else
	if (auditStatus('runningSet')=1) then call logSet (pengguna, lokasi, 'W', menu, concat('Running Teks: ',isi,' - ',mulai,' - ',akhir,' - ',kondisi)); end if;  
    select ifnull(teksID,'') into kode from tbRunningTeks where md5(teksID)=kode;
    if (kode='') then
      set kode=date_format(now(),'%Y%m');
      select ifnull(max(right(teksID,4)),0)+1 into urutan from tbRunningTeks where teksID like concat(kode,'%');
      set kode=concat(kode, right(concat('0000',urutan),4));
      insert into tbRunningTeks(teksID) values (kode);
    end if;
    if exists(select * from tbMemberKhusus where md5(memberID)=pengguna) then
      select memberID into pengguna from tbMemberKhusus where md5(memberID)=pengguna;
	else
      select peopleID into pengguna from tbPenduduk where md5(peopleID)=pengguna;
    end if;
    update tbRunningTeks set teksIsi=isi, teksTglMulai=mulai, teksTglAkhir=akhir, teksStatus=kondisi, teksBuatTgl=now(), 
	teksBuatOrang=pengguna where teksID=kode;
    select false as ErrCode, errorMessage('0003') as ErrMsg;
  end if;
end $$
delimiter ;

drop procedure if exists runningDel;
delimiter $$
create procedure runningDel(IN kode varchar(50), menu varchar(50), pengguna varchar(50), pass varchar(50), lokasi varchar(20))
begin
  declare pesan text default '';
  if ((kode<>'') and not(exists(select * from tbRunningTeks where md5(teksID)=kode))) or not(exists(select * from tbMenu 
     where menuTrans=menu)) or (trim(lokasi)='') or not(exists(select * from vPengguna where (id=pengguna) and (kunci=pass))) then
    select true as ErrCode, concat('RNT001 - ', errorMessage('0002')) as ErrMsg;
  else
    select concat(teksIsi,' - ',teksTglMulai,' - ',teksTglAkhir,' - ',teksStatus,' - ',teksBuatTgl,' - ',teksBuatOrang) into pesan from tbRunningTeks where md5(teksID)=kode;
	if (auditStatus('runningDel')=1) then call logSet (pengguna, lokasi, 'D', menu, concat('Running Teks: ',pesan)); end if;  
    delete from tbRunningTeks where md5(teksID)=kode;
    select false as ErrCode, errorMessage('0004') as ErrMsg;
  end if;
end $$
delimiter ;  
  

  
  
  
  


-- ------------ --
-- Running Teks --
-- ------------ --
drop table if exists tbSliderImage;
create table tbSliderImage (
  sliderID 			varchar(15),					-- ID teks
  sliderTeks		varchar(200),					-- Teks slider
  sliderImg			varchar(4),						-- Ekstensi gambar slider
  sliderLink		text,							-- URL tautan slider lebih lanjut  
  sliderTglMulai	datetime default now(),			-- Tgl mulai tayang teks
  sliderTglAkhir	datetime default '1900-01-01',	-- Tgl akhir tayang teks
  sliderStatus		tinyint default 0,				-- Status tayang teks 0: Tidak aktif 1: Aktif
  sliderBuatTgl		datetime default now(),			-- Tgl dan jam buat teks
  sliderBuatOrang	varchar(15),					-- ID pembuat teks
  primary key (sliderID));

drop procedure if exists sliderGet;
delimiter $$
create procedure sliderGet(IN keyword varchar(50), kondisi tinyint, menu varchar(50), pengguna varchar(50), pass varchar(50), 
  lokasi varchar(20))
begin
  if (kondisi <-1) or (kondisi > 1) or not(exists(select * from tbMenu where menuTrans=menu)) or (trim(lokasi)='') or
     not(exists(select * from vPengguna where (id=pengguna) and (kunci=pass))) then
    select true as ErrCode, concat('SLD001 - ', errorMessage('0002')) as ErrMsg;
  else
    update tbSliderImage set sliderStatus=0;
    update tbSliderImage set sliderStatus=1 where (TIMESTAMPDIFF(SECOND,sliderTglMulai, now()) >= 0);
    update tbSliderImage set sliderStatus=0 where (TIMESTAMPDIFF(SECOND,sliderTglAkhir, now()) >= 0) and (sliderTglAKhir<>'1900-01-01');
    drop table if exists temp; drop table if exists temp1;
    create temporary table temp select md5(sliderID) as id, sliderTeks as teks, ifnull(sliderLink,'') as link, if(trim(sliderImg)='','',
      concat(sliderID,'.',sliderImg)) as gambar, sliderTglMulai as tglMulai, sliderTglAkhir as tglAkhir, sliderStatus as statusKode, 
      if (sliderStatus=0,'Tidak Aktif','Aktif') as statusTeks, sliderBuatTgl as tglBuat, md5(sliderBuatOrang) as pembuatID, 
      ifnull(if (exists(select * from tbMemberKhusus where memberID=sliderBuatOrang), (select memberNama from tbMemberKhusus where memberID=sliderBuatOrang),
      (select peopleNama from tbPenduduk where peopleID=sliderBuatOrang)), '') as pembuatNama from tbSliderImage order by sliderTglMulai;
	create temporary table temp1 select * from temp; delete from temp1;
    if (trim(keyword)<>'') then
      insert into temp1 select * from temp where id=keyword; delete from temp;
      insert into temp select * from temp1; delete from temp1;
	end if;
    if (kondisi<>-1) then delete from temp where statusKode <> kondisi; end if;
    if exists(select * from temp) then
      select false as ErrCode, errorMessage('0000') as ErrMsg, temp.* from temp;
	else
      select true as ErrCode, concat('SLD002 - ', errorMessage('0001')) as ErrMsg;
    end if;
    drop table temp; drop table temp1;
  end if;
end $$
delimiter ; 




