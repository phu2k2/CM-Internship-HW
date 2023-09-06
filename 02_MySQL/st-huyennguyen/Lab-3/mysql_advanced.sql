-- Cau 1
-- Tao stored procedure cap nhat Luong --
delimiter //
create procedure updateSalary(n int(11))
begin
	update NHANVIEN NV
    join (select MaNhanVien 
		from DONDATHANG DH 
		join CHITIETDATHANG CT using(SoHoaDon)
		group by MaNhanVien 
		order by sum(SoLuong) desc limit n
	) SL on NV.MaNhanVien = SL.MaNhanVien
	set LuongCoBan = LuongCoBan + 500000;
end// 
delimiter ;

call updateSalary(1);
call updateSalary(3);


-- Cau 2
-- Tao function tinh luong theo MaNhanVien --
delimiter //
create function calcSalary (MNV char(4))
returns decimal
begin
	declare Luong decimal default 0;
    select (LuongCoBan + PhuCap + ifnull(sum(GiaBan * SoLuong * 10/100),0)) into Luong
	from NHANVIEN NV
	left join DONDATHANG DH on DH.MaNhanVien = NV.MaNhanVien
	left join CHITIETDATHANG CT on DH.SoHoaDon = CT.SoHoaDon
	group by NV.MaNhanVien
    having MaNhanVien = MNV;
    return Luong;
end//
delimiter ;

-- Test function --
select calcSalary ('A011') as Luong;


-- Cau 3 --
-- Them column TongTien vao table DONDATHANG --
alter table DONDATHANG
add column TongTien decimal(15,2);

-- Tao trigger cap nhat TongTien sau khi insert --
delimiter //
create trigger after_CHITIETDATHANG_insert
after insert on CHITIETDATHANG 
for each row
begin
	 update DONDATHANG 
	 set TongTien = ifnull(TongTien,0) + NEW.SoLuong*(NEW.GiaBan - NEW.MucGiamGia)
     where SoHoaDon = NEW.SoHoaDon;
end//
delimiter ;

-- Test trigger --
INSERT INTO CHITIETDATHANG VALUES
(4, 'DC03', 7500, 1000, 0);

select * from DONDATHANG;


-- Cau 4 --
-- Tao va them du lieu bang PHONGBAN --
 create table PHONGBAN (
	MaPhongBan char(3) primary key,
    TenPhongBan varchar(30),
    SoLuongNhanVien int
 );
 insert into PHONGBAN values
 ('PNS','Phòng Nhân Sự',10),
 ('NVS','Nhân viên bán hàng',0);
 
--  Tao bang trung gian --
 create table NHANVIENPHONGBAN (
	MaPhongBan char(3),
    MaNhanVien char(4),
    constraint PK_NHANVIENPHONGBAN PRIMARY KEY(MaPhongBan,MaNhanVien),
    foreign key (MaPhongBan) references PHONGBAN(MaPhongBan),
    foreign key (MaNhanVien) references NHANVIEN(MaNhanVien)
 );
 
--  Tao trigger cap nhat  so luong table PHONGBAN sau khi insert --
delimiter //
create trigger after_NHANVIENPHONGBAN_insert   
after insert on NHANVIENPHONGBAN  
for each row     
begin   
	update PHONGBAN         
    set SoLuongNhanVien = (ifnull(SoLuongNhanVien,0) + 1)         
    where MaPhongBan = NEW.MaPhongBan;     
end//
delimiter ; 
 
-- Tao trigger cap nhat so luong table PHONGBAN sau khi delete --
delimiter //
create trigger affer_NHANVIENPHONGBAN_delete
after delete on NHANVIENPHONGBAN     
for each row     
begin   
    update PHONGBAN         
    set SoLuongNhanVien = (ifnull(SoLuongNhanVien,0) - 1)         
    where MaPhongBan = OLD.MaPhongBan;     
end//
delimiter ;

-- Test trigger --
insert into NHANVIENPHONGBAN values
('PNS','A001'),
('NVS','H003');

delete from NHANVIENPHONGBAN
where MaPhongBan = 'PNS' and MaNhanVien = 'A001';
select * from PHONGBAN;


-- Cau 5 --
-- Tao trigger kiem tra truoc khi insert --
delimiter //
create trigger  before_NHANVIEN_insert
before insert on NHANVIEN
for each row
begin
	if (year(curdate()) - year(NEW.NgaySinh) not between 18 and 60) then
		signal sqlstate '45000'
        set message_text = 'Nhan vien phai tu 18 tuoi den 60';
    end if;
end//
delimiter ;

-- Tao trigger kiem tra truoc khi update --
delimiter //
create trigger  before_NHANVIEN_update
before insert on NHANVIEN
for each row
begin
	if (year(curdate()) - year(NEW.NgaySinh) not between 18 and 60) then
		signal sqlstate '45000'
        set message_text = 'Nhan vien phai tu 18 tuoi den 60';
    end if;
end//
delimiter ;

-- Test trigger --
INSERT INTO NHANVIEN VALUES
('H021', 'Hoàng Hoa' , 'Thám', '2008/07/07','2009/03/01', 'Đà Nẵng', '056-647995', 10000000, 1000000); 

INSERT INTO NHANVIEN VALUES
('B001', 'Nguyễn Văn' , 'Hoàng', '2005/07/07','2009/03/01', 'Đà Nẵng', '056-647995', 10000000, 1000000);
