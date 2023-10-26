-- ---------- --
-- Kode Error --
-- ---------- --
drop table if exists tbErrorCode;
create table tbErrorCode(
  errorCode		varchar(4),		-- Kode Error
  errorMessage	text,			-- Pesan kesalahan
  primary key (errorCode));

drop function if exists errorMessage;
delimiter $$
create function errorMessage(kode varchar(4)) returns text DETERMINISTIC
begin
  declare pesan text;
  if (exists(select * from tbErrorCode where (errorCode=kode))) then
    select errorMessage into pesan from tbErrorCode where (errorCode=kode);
    return (pesan);
  else 
    return ('Error Message not found !');
  end if;
end $$
delimiter ;






-- --------------------------------- --
-- Status Log Audit Stored Procedure --
-- --------------------------------- --
drop table if exists tbAuditLog;
create table tbAuditLog (
  auditNamaSP 	varchar(30), 			-- Nama stored procedure
  auditStatus	tinyint default 0,		-- Status audit log 0: Tidak Aktif 1: Aktif
  primary key (auditNamaSP));

drop function if exists auditStatus;
delimiter $$
create function auditStatus(namaSP varchar(30)) returns tinyint DETERMINISTIC
begin
  declare kondisi tinyint; set kondisi = 0;
  if (exists(select * from tbAuditLog where (auditNamaSP = namaSP))) then
    select auditStatus into kondisi from tbAuditLog where (auditNamaSP = namaSP);
    return (kondisi);
  else
    return (0);
  end if;
end $$
delimiter ;




-- ------------------------------ --
-- Log Kegiatan Pengguna Aplikasi --
-- ------------------------------ --
drop table if exists tbLog;
create table tbLog (
  logID			varchar(20),	-- ID Log
  logUser		varchar(15),	-- ID Pengguna
  logIPAddress	varchar(15),	-- Alamat IP Pengguna
  logWaktu		datetime,		-- Waktu kejadian
  logType		varchar(1),	    -- Jenis kejadian R: Read W: Write (Insert/Update) D: Delete P: Print I: Import X:Export
  logMenu	    varchar(100),	-- Kode lokasi kejadian
  logKegiatan	text,			-- Informasi kejadian yang terjadi
  primary key (logID));

drop procedure if exists logSet;
delimiter $$
create procedure logSet (IN pengguna varchar(50), alamat varchar(15), tipe varchar(1), menu varchar(100), kegiatan text)
begin
  declare id varchar(20);
  declare jumlah int;
  set id = date_format(now(),"%Y%m%d");
  select (ifnull(max(right(logID,5)),0)+1) into jumlah from tbLog where logID like concat(id, '%');
  set id = concat(id, right(concat('00000',jumlah),5));
  if (exists(select * from tbPenduduk where md5(peopleID)=pengguna)) then
    select peopleID into pengguna from tbPenduduk where md5(peopleID)=pengguna;
  else
    select memberID into pengguna from tbMemberKhusus where md5(memberID)=pengguna;
  end if;
  insert into tbLog(logID, logUser, logIPAddress, logWaktu, logType, logMenu, logKegiatan)
  values (id, pengguna, alamat, now(), tipe, menu, kegiatan);
end $$
delimiter ;
