-- *** UPDATE *** --

-- Cau 26 --
update DONDATHANG
set NgayChuyenHang = NgayDatHang
where NgayChuyenHang is null;

-- Cau 27 --
update MATHANG 
set SoLuong = SoLuong * 2 
where  MaCongTy = (select MaCongTy from NHACUNGCAP where TenGiaoDich = 'VINAMILK');

-- Cau 28 --
 update DONDATHANG D1
 set NoiGiaoHang = (select DiaChi from KHACHHANG where D1.MaKhachHang = MaKhachHang)
 where NoiGiaoHang is null;

--  Cau 29 --
 update KHACHHANG KH, NHACUNGCAP NCC
 set KH.DiaChi = NCC.DiaChi, KH.DienThoai = NCC.DienThoai, 
 	KH.Fax = NCC.Fax, KH.Email = NCC.Email
 where KH.TenCongTy = NCC.TenCongTy and KH.TenGiaoDich = NCC.TenGiaoDich;

--  Cau 30 --
update NHANVIEN NV1 
join (select MaNhanVien 
	from DONDATHANG DH 
	join CHITIETDATHANG CT using(SoHoaDon) 
    where year(DH.NgayDatHang) = 2003 
    group by MaNhanVien
    having sum(SoLuong) > 100) NV2 using(MaNhanVien)
set LuongCoBan = LuongCoBan * 1.5;

-- Cau 31 --
with SOLUONGHANG as (
select DH.MaNhanVien, sum(CT.SoLuong) as SoLuongHang 
	from DONDATHANG DH
	join CHITIETDATHANG CT using(SoHoaDon)
    group by DH.MaNhanVien
)
update NHANVIEN
set PhuCap = LuongCoBan * 0.5
where MaNhanVien in (
	select MaNhanVien from SOLUONGHANG 
	where SoLuongHang = (select max(SoLuongHang) from SOLUONGHANG));

-- Cau 32 --
update NHANVIEN
set LuongCoBan = LuongCoBan * 3/4 
where MaNhanVien not in (
	select distinct MaNhanVien 
	from DONDATHANG 
	where year(NgayDatHang) = 2003);

-- Cau 33 --
update DONDATHANG D1
join (
	select SoHoaDon, sum(SoLuong*(GiaBan - MucGiamGia)) as SoTien
	from CHITIETDATHANG
    group by SoHoaDon) D2 using(SoHoaDon)
set D1.SoTien = D2.SoTien;


-- *** DELETE *** --
-- Cau 34 --
delete from NHANVIEN
where year(curdate()) - year(NgayLamViec) > 40;

-- Cau 35 -- 
delete from DONDATHANG 
where year(NgayDatHang) < 2000; 
 
-- Cau 36 --
delete from LOAIHANG
where MaLoaiHang not in(select distinct MaLoaiHang from MATHANG);

-- Cau 37 --
delete from KHACHHANG
where MaKhachHang not in(select distinct MaKhachHang from DONDATHANG); 

-- Cau 38 --
delete from MATHANG 
where SoLuong = 0 and MaHang not in(select distinct MaHang from CHITIETDATHANG);


-- *** SELECT *** --
-- Cau 39 --
select KH.MaKhachHang, KH.TenCongTy, KH.TenGiaoDich
from KHACHHANG KH
join DONDATHANG DH using(MaKhachHang)
join CHITIETDATHANG CT using(SoHoaDon)
group by KH.MaKhachHang, KH.TenCongTy
having count(distinct CT.MaHang) = 1
	and count(case when MaHang = 'TP07' then 1 end) > 0;

-- Cau 40 --
select KH.MaKhachHang, KH.TenCongTy, KH.TenGiaoDich
from DONDATHANG DH
join KHACHHANG KH using(MaKhachHang)
join CHITIETDATHANG CT using(SoHoaDon)
group by DH.MaKhachHang, KH.TenCongTy
having count(distinct CT.MaHang) >= 2
	and count(case when MaHang = 'TP07' then 1 end) > 0
    and count(case when MaHang = 'MM01' then 1 end) = 0;

-- Cau 41 --
select SoHoaDon
from CHITIETDATHANG
group by SoHoaDon
having count(case when MaHang = 'DC01' then 1 end) > 0
	and count(case when MaHang = 'DC02' then 1 end) > 0
    and count(case when MaHang = 'DC03' then 1 end) > 0
    and (count(case when MaHang = 'DT01' then 1 end) = 0
		or count(case when MaHang = 'TP03' then 1 end) = 0);

