-- *** UPDATE *** --

-- Cau 26 --
update DONDATHANG
set NgayChuyenHang = NgayDatHang
where NgayChuyenHang is null;

-- Cau 27 --
update MATHANG
join NHACUNGCAP using(MaCongTy)
set SoLuong = SoLuong * 2
where TenGiaoDich = 'VINAMILK';

-- Cau 28 --
update DONDATHANG
join KHACHHANG using(MaKhachHang)
set NoiGiaoHang = DiaChi
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
update NHANVIEN NV
join SOLUONGHANG using(MaNhanVien)
set PhuCap = LuongCoBan * 0.5
where SoLuongHang = (select max(SoLuongHang) from SOLUONGHANG);

-- Cau 32 --
update NHANVIEN NV
left join DONDATHANG DH using(MaNhanVien)
set LuongCoBan = LuongCoBan * 3/4
where year(NgayDatHang) = 2003 and DH.MaNhanVien is null;

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
delete LH
from LOAIHANG LH
left join MATHANG MH using(MaLoaiHang)
where MH.MaLoaiHang is null;

-- Cau 37 --
delete KH
from KHACHHANG KH
left join DONDATHANG DH using(MaKhachHang)
where DH.MaKhachHang is null;

-- Cau 38 --
delete MH
from MATHANG MH
left join CHITIETDATHANG CT using(MaHang)
where MH.SoLuong = 0 and CT.MaHang is null;


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

