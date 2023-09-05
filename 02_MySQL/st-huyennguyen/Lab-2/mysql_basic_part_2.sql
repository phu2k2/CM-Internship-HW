-- Cau 1 --
select TenHang 
from MATHANG 
where MaCongTy in (select MaCongTy from NHACUNGCAP where TenCongTy like '%Việt Tiến%');

-- Cau 2 --
select TenCongTy, DiaChi 
from NHACUNGCAP
where MaCongTy in (
	select MaCongTy from MATHANG 
	where MaLoaiHang = (select MaLoaiHang from LOAIHANG where TenLoaiHang = 'Thực phẩm'));

-- Cau 3 --
select TenGiaoDich
from KHACHHANG KH
join DONDATHANG DH using(MaKhachHang)
join CHITIETDATHANG using(SoHoaDon)
where MaHang in (
	select MaHang from MATHANG 
    where TenHang like '%Sữa hộp%');

-- Cau 4 --
select KH.TenGiaoDich as TenKhachHang, 
	concat(NV.Ho,' ',NV.Ten) as TenNhanVien, 
    DH.NgayGiaoHang, DH.NoiGiaoHang
from DONDATHANG DH
join KHACHHANG KH using(MaKhachHang)
join NHANVIEN NV using(MaNhanVien)
where DH.SoHoaDon = 1;

-- Cau 5 --
select Concat(Ho,' ',Ten) as TenNhanVien, 
    (LuongCoBan + ifnull(PhuCap,0)) as Luong 
from NHANVIEN;

-- Cau 6 --
select MH.TenHang, 
	(CT.SoLuong *(CT.GiaBan - ifnull(CT.MucGiamGia,0))) as ThanhTien 
from CHITIETDATHANG CT
join MATHANG MH using(MaHang) 
where CT.SoHoaDon = 3;

-- Cau 7 --
select KH.TenCongTy 
from KHACHHANG KH
join NHACUNGCAP NCC using(TenGiaoDich);

-- Cau 8 --
select distinct concat(NV1.Ho,' ',NV1.Ten) as TenNhanVien, NV1.NgaySinh
from NHANVIEN NV1
join NHANVIEN NV2 on NV1.NgaySinh = NV2.NgaySinh 
	and NV1.MaNhanVien <> NV2.MaNhanVien
order by NV1.NgaySinh;

-- Cau 9 --
select distinct DH.SoHoaDon, KH.TenCongTy 
from DONDATHANG DH
join KHACHHANG KH using(MaKhachHang) 
where DH.NoiGiaoHang = KH.DiaChi;

-- Cau 10 --
select TenHang 
from MATHANG
where MaHang not in(select distinct MaHang from CHITIETDATHANG);

-- Cau 11 --
select concat(Ho,' ',Ten) as TenNhanVien
from NHANVIEN
where MaNhanVien not in(select distinct MaNhanVien from DONDATHANG);

-- Cau 12 --
select concat(Ho,' ',Ten) as TenNhanVien 
from NHANVIEN
where LuongCoBan = (select max(LuongCoBan) from NHANVIEN);

-- Cau 13 --
select KH.TenCongTy as KhachHang, DH.SoHoaDon, 
	sum((CT.SoLuong *(CT.GiaBan - ifnull(CT.MucGiamGia,0)))) as TongThanhToan
from DONDATHANG DH
join CHITIETDATHANG CT using(SoHoaDon)
join KHACHHANG KH using(MaKhachHang)
group by DH.MaKhachHang, DH.SoHoaDon;

-- Cau 14 --
select MH.TenHang 
from CHITIETDATHANG CT
join MATHANG MH using(MaHang) 
join DONDATHANG DH using(SoHoaDon)
where year(NgayDatHang) = 2007 
group by MaHang
having count(MaHang) = 1;

--  Cau 15 --
select KH.TenCongTy as KhachHang, 
	sum((CT.SoLuong *(CT.GiaBan - ifnull(CT.MucGiamGia,0)))) as TongThanhToan
from DONDATHANG DH
join CHITIETDATHANG CT using(SoHoaDon)
join KHACHHANG KH using(MaKhachHang)
group by DH.MaKhachHang;

-- Cau 16 --
select concat(NV.Ho,' ',NV.Ten) as TenNhanVien, 
	count(DH.SoHoaDon) as Count_HoaDon
from NHANVIEN NV
left join DONDATHANG DH using(MaNhanVien)
group by NV.MaNhanVien;

-- Cau 17 --
select month(DH.NgayDatHang) as Thang, 
	sum((CT.SoLuong *(CT.GiaBan - ifnull(CT.MucGiamGia,0)))) as TongThu
from DONDATHANG DH
join CHITIETDATHANG CT using(SoHoaDon)
where year(DH.NgayDatHang) = 2007
group by Thang;

-- Cau 18 --
select MH.TenHang, 
	sum((CT.SoLuong *(CT.GiaBan - ifnull(CT.MucGiamGia,0) - MH.GiaHang))) as LoiNhuan
from CHITIETDATHANG CT
join MATHANG MH using(MaHang)
join DONDATHANG DH using(SoHoaDon)
where year(DH.NgayDatHang) = 2007
group by CT.MaHang;

-- Cau 19 --
select MH.TenHang,
    ifnull(sum(CT.SoLuong),0) as SoLuongDaBan, 
    (MH.SoLuong - ifnull(sum(CT.SoLuong),0)) as SoLuongHienCo 
from MATHANG MH
left join CHITIETDATHANG CT using(MaHang)
group by MH.MaHang;

-- Cau 20 --
with SOLUONGHANG as (
select DH.MaNhanVien, sum(CT.SoLuong) as SoLuongHang 
	from DONDATHANG DH
	join CHITIETDATHANG CT using(SoHoaDon)
    group by DH.MaNhanVien
)
select concat(NV.Ho,' ',NV.Ten) as TenNhanVien, SoLuongHang
from NHANVIEN NV
join SOLUONGHANG SLH using(MaNhanVien)
where SoLuongHang = (select max(SoLuongHang) from SOLUONGHANG);

-- Cau 21 --
with MIN as (
	select  SoHoaDon, sum(SoLuong) as SoLuongHang
	from CHITIETDATHANG
	group by SoHoaDon
)
select  SoHoaDon, SoLuongHang
from MIN
where SoLuongHang = (select min(SoLuongHang) from MIN);

-- Cau 22 --
with DH as (
	select KH.TenCongTy,CT.SoHoaDon, 
		sum(CT.SoLuong * (CT.GiaBan - CT.MucGiamGia)) as TongTien 
	from KHACHHANG KH
	join DONDATHANG DDH using(MaKhachHang)
	join CHITIETDATHANG CT using(SoHoaDon)
	group by CT.SoHoaDon
)
select * from DH
where TongTien = (select max(TongTien) from DH as DH2 where TenCongTy = DH.TenCongTy);

-- Cau 23 --
select SoHoaDon, TenHang, 
	sum(CT.SoLuong * (GiaBan - MucGiamGia)) as TongTien
from CHITIETDATHANG as CT
join MATHANG as MH using(MaHang)
group by SoHoaDon, TenHang
union all
select SoHoaDon, 'ALL', sum(SoLuong * (GiaBan - MucGiamGia)) as TongTien
from CHITIETDATHANG 
group by SoHoaDon
order by 
	SoHoaDon asc,
    if(TenHang = 'ALL', 0, TenHang) desc;

--  Cau 24 --
select MaLoaiHang, TenLoaiHang, TenHang, SoLuong
	from MATHANG MH
	join LOAIHANG LH using(MaLoaiHang)
union all
select MaLoaiHang, TenLoaiHang,'ALL', sum(ifnull(SoLuong,0))
	from MATHANG MH
	join LOAIHANG LH using(MaLoaiHang)
 	group by MaLoaiHang
union all
select 'ALL','ALL','ALL',sum(ifnull(SoLuong,0)) from MATHANG
order by 
	MaLoaiHang desc, 
	if(TenHang = 'ALL', 0, TenHang) desc;

-- Cau 25 --
select MH.MaHang, MH.TenHang,
	sum(if(month(DH.NgayDatHang)= 1,CT.SoLuong,0)) as Thang1,
    sum(if(month(DH.NgayDatHang)= 2,CT.SoLuong,0)) as Thang2,
    sum(if(month(DH.NgayDatHang)= 3,CT.SoLuong,0)) as Thang3,
    sum(if(month(DH.NgayDatHang)= 4,CT.SoLuong,0)) as Thang4,
    sum(if(month(DH.NgayDatHang)= 5,CT.SoLuong,0)) as Thang5,
    sum(if(month(DH.NgayDatHang)= 6,CT.SoLuong,0)) as Thang6,
    sum(if(month(DH.NgayDatHang)= 7,CT.SoLuong,0)) as Thang7,
    sum(if(month(DH.NgayDatHang)= 8,CT.SoLuong,0)) as Thang8,
    sum(if(month(DH.NgayDatHang)= 9,CT.SoLuong,0)) as Thang9,
    sum(if(month(DH.NgayDatHang)= 10,CT.SoLuong,0)) as Thang10,
    sum(if(month(DH.NgayDatHang)= 11,CT.SoLuong,0)) as Thang11,
    sum(if(month(DH.NgayDatHang)= 12,CT.SoLuong,0)) as Thang12,
    sum(CT.SoLuong) as TongNam
from CHITIETDATHANG CT 
join MATHANG MH using(MaHang)
join DONDATHANG DH using(SoHoaDon)
where year(DH.NgayDatHang) = 2007
group by MH.MaHang, MH.TenHang;

