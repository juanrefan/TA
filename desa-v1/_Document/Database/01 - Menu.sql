-- ------------------ --
-- Data menu aplikasi --
-- ------------------ --
drop table if exists tbMenu;
create table tbMenu(
  menuID     varchar(10),			-- ID Menu
  menuUpper  varchar(10),			-- Menu Induk
  menuUrut   decimal(3),			-- Urutan Menu
  menuTeks   varchar(50),			-- Judul Menu
  menuTrans  varchar(50),			-- Nama Panggil Menu
  menuLink	 varchar(100),			-- Alamat link file
  menuStatus tinyint default 0,		-- Kode status menu 0: Tidak Aktif 1: Aktif 2: Tidak tampil
  primary key(menuID));
  
drop procedure if exists menuGet;  
delimiter $$
create procedure menuGet(IN idMenu varchar(50), idUpperMenu varchar(50), kondisi decimal(1), menu varchar(50), pengguna varchar(50), 
       pass varchar(50), lokasi varchar(20))
begin
  if ((trim(idMenu)<>'') and not(exists(select * from tbMenu where md5(menuID)=idMenu))) or 
	 ((trim(idUpperMenu)<>'') and (idUpperMenu<>md5('000000')) and (not(exists(select * from tbMenu where md5(menuID)=idUpperMenu)))) or
     (kondisi < -1) or (kondisi > 2) or (trim(lokasi)='') or not(exists(select * from tbMenu where menuTrans=menu)) or
     not(exists(select * from vPengguna where (id=pengguna) and (kunci=pass))) then
     select true as ErrCode, concat('MN001 - ', errorMessage('0002')) as ErrMsg;   
  else 
     if (idUpperMenu = md5('000000')) then set idUpperMenu = '000000'; else select ifnull(menuID,'') into idUpperMenu from tbMenu where md5(menuID)=idUpperMenu; end if;
     if (auditStatus('menuGet')=1) then call logSet (pengguna, lokasi, 'R', menu, concat(idMenu,' - ',idUpperMenu,' - ',kondisi)); end if; 
	 drop table if exists temp1; drop table if exists temp2;
     create temporary table temp1 as select md5(menuID) as id, md5(menuUpper) as kelompok, menuUrut as urutan, menuTeks as judul, menuTrans as panggil, 
	   ifnull(menuLInk,'') as linkFile, menuStatus as statusKode, if (menuStatus=0, 'Tidak Aktif','Aktif') as statusTeks, 0 as hak
       from tbMenu where (menuStatus = 1) and (menuUpper=idUpperMenu) order by menuUrut;
	 create temporary table temp2 as select * from temp1; delete from temp2;
     if exists(select * from tbHakKhusus where md5(hakUser)=pengguna) then
       update temp1 set hak=ifnull((select hakValue from tbHakKhusus where (md5(hakUser)=pengguna) and (md5(hakMenu)=id) and (hakStatus=1)),0);
     else 
       select hak into pengguna from vPengguna where id=pengguna;
       update temp1 set hak=ifnull((select hakValue from tbHakMaster where (md5(hakMenu)=id) and (md5(hakRole)=pengguna) and (hakStatus=1)),0);
     end if;
     delete from temp1 where hak=0;
     if (trim(idMenu)<>'') then
       insert into temp2 select * from temp1 where (id=idMenu) or (judul like concat('%',idMenu,'%')) or (panggil=idMenu);
       delete from temp1; insert into temp1 select * from temp2; delete from temp2;
     end if;
     if (kondisi <> -1) then delete from temp1 where statusKode <> kondisi; end if;
     if (exists(select * from temp1)) then
       select false as ErrCode, errorMessage('') as ErrMsg, temp1.* from temp1;
 	 else 
       select true as ErrCode, concat('MN002 - ', errorMessage('0001')) as ErrMsg;   
	 end if;
	 drop table temp1; drop table temp2;
  end if;
end $$
delimiter ;

drop procedure if exists menuLink;
delimiter $$
create procedure menuLink(IN menu varchar(50), pengguna varchar(50), pass varchar(50), lokasi varchar(20))
begin
  if ((trim(menu)<> '') and not(exists(select * from tbMenu where menuTrans=menu))) or 
     not(exists(select * from vPengguna where (id=pengguna) and (kunci=pass))) or (trim(lokasi)='') then
	select true as ErrCode, concat('MN001 - ', errorMessage('0002')) as ErrMsg;   
  else
    drop table if exists temp;
    create temporary table temp select md5(menuID) as id, menuUrut as urut, menuTeks as judul, menuTrans as trans, menuLink as link, 0 as hakPengguna
    from tbMenu where menuTrans=menu; if (trim(menu)='') then set menu=md5('000000'); else select md5(menuID) into menu from tbMenu where menuTrans=menu; end if;
    insert into temp select md5(menuID) as id, menuUrut as urut, menuTeks as judul, menuTrans as trans, menuLink as link, 0 as hakPengguna
    from tbMenu where md5(menuUpper)=menu;
    if (exists(select * from tbHakKhusus where md5(hakUser)=pengguna)) then
	  update temp set hakPengguna=ifnull((select hakValue from tbHakKhusus where (md5(hakUser)=pengguna) and (md5(hakMenu)=id)),0);
    else
      select hak into pengguna from vPengguna where (id=pengguna); 
      update temp set hakPengguna=ifnull((select hakValue from tbHakMaster where (md5(hakRole)=pengguna) and (md5(hakMenu)=id)),0);
    end if;
    delete from temp where (trim(link)='#') or (trim(link)='') or (hakPengguna=0);
    if exists(select * from temp) then
      select false as ErrCode, errorMessage('0000') as ErrMsg, temp.* from temp order by urut limit 1;
	else
      select true as ErrCode, errorMessage('0002') as ErrMsg;
	end if;
    drop table temp;
  end if;
end $$
delimiter ;





-- ------------------ --
-- Default User Right --
-- ------------------ --
drop table if exists tbHakMaster;
create table tbHakMaster(
  hakMenu		varchar(10),		-- ID Menu
  hakRole		varchar(15),		-- ID Role Pengguna
  hakValue		decimal(5),			-- Hak pengguna 1: View 2: Edit 4: Delete 8: Print 16: Import 32:Export
  hakStatus		tinyint default 0,	-- Status 0: Tidak Aktif 1: Aktif
  primary key (hakMenu, hakRole),
  constraint fk_default_role foreign key (hakRole) references tbMemberJenis(jenisID),
  constraint fk_default_menu foreign key (hakMenu) references tbMenu(menuID));
  
  
-- ----------------- --
-- Custom User Right --
-- ----------------- --
drop table if exists tbHakKhusus;
create table tbHakKhusus(
  hakMenu		varchar(10),		-- ID Menu
  hakUser		varchar(15),		-- ID Pengguna
  hakValue		decimal(5),			-- Hak pengguna 1: View 2: Edit 4: Delete 8: Print 16: Import 32:Export
  hakStatus		tinyint default 0,	-- Status 0: Tidak Aktif 1: Aktif
  primary key (hakMenu, hakUser),
  constraint fk_custom_menu foreign key (hakMenu) references tbMenu(menuID));