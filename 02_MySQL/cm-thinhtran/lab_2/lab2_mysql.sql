-- Câu 1  
SELECT TenHang
FROM MATHANG m JOIN NHACUNGCAP n ON m.MaCongTy = n.MaCongTy
WHERE n.TenCongTy = 'Công ty may mặc Việt Tiến';

-- Câu 2
SELECT distinct n.TenCongTy, n.DiaChi, m.MaLoaiHang
FROM MATHANG m JOIN NHACUNGCAP n ON m.MaCongTy = n.MaCongTy;

-- Câu 3
SELECT DISTINCT k.TenGiaoDich
FROM KHACHHANG k JOIN DONDATHANG d JOIN CHITIETDATHANG c JOIN MATHANG m ON k.MaKhachHang = d.MaKhachHang AND d.SoHoaDon = c.SoHoaDon AND c.MaHang = m.MaHang
WHERE m.TenHang LIKE '%Sữa%' AND m.DonViTinh = 'Hộp';

-- Câu 4
SELECT k.MaKhachHang, k.TenCongTy, d.MaNhanVien, d.NgayDatHang, d.NoiGiaoHang
FROM DONDATHANG d JOIN KHACHHANG k ON d.MaKhachHang = k.MaKhachHang
WHERE d.SoHoaDon = 1;

-- Câu 5
SELECT n.Ho, n.Ten, (n.LuongCoBan + n.PhuCap) AS Luong
FROM NHANVIEN n;

-- Câu 6
SELECT m.TenHang, (c.GiaBan * c.SoLuong - c.SoLuong * c.MucGiamGia) as TienPhaiTra
FROM DONDATHANG d JOIN CHITIETDATHANG c JOIN MATHANG m ON d.SoHoaDon = c.SoHoaDon AND c.MaHang = m.MaHang
WHERE d.SoHoaDon = 3;

-- Câu 7
SELECT k.TenCongTy, k.TenGiaoDich
FROM KHACHHANG k, NHACUNGCAP n
WHERE k.TenGiaoDich = n.TenGiaoDich;

-- Câu 8
SELECT DISTINCT n.Ho, n.Ten, n.NgaySinh
FROM NHANVIEN n JOIN NHANVIEN n1 on DAY(n.NgaySinh) = DAY(n1.NgaySinh) AND n.MaNhanVien != n1.MaNhanVien;

-- Câu 9
SELECT k.TenCongTy, d.*
FROM KHACHHANG k JOIN DONDATHANG d ON k.MaKhachHang = d.MaKhachHang
WHERE k.DiaChi = d.NoiGiaoHang;

-- Câu 10
SELECT m.*
FROM MATHANG m LEFT JOIN CHITIETDATHANG c ON m.MaHang = c.MaHang
WHERE c.SoHoaDon IS NULL ;

-- Câu 11
SELECT n.*
FROM NHANVIEN n LEFT JOIN DONDATHANG d ON n.MaNhanVien = d.MaNhanVien			
WHERE d.MaNhanVien IS NULL;

-- Câu 12
SELECT * 
FROM NHANVIEN n
WHERE n.LuongCoBan = (SELECT MAX(LuongCoBan) FROM NHANVIEN);

-- Câu 13
SELECT c.SoHoaDon, SUM((c.GiaBan * c.SoLuong - c.SoLuong * c.MucGiamGia)) as TienPhaiTra
FROM CHITIETDATHANG c 
GROUP BY c.SoHoaDon;

-- Câu 14 
SELECT c.MaHang
FROM DONDATHANG d JOIN CHITIETDATHANG c on d.SoHoaDon = c.SoHoaDon
WHERE YEAR(d.NgayDatHang) = 2007 
GROUP BY c.MaHang
HAVING COUNT(d.SoHoaDon) = 1;

-- Câu 15
SELECT d.MaKhachHang, SUM((c.GiaBan * c.SoLuong - c.SoLuong * c.MucGiamGia)) as TienPhaiTra
FROM CHITIETDATHANG c JOIN DONDATHANG d ON c.SoHoaDon = d.SoHoaDon 
GROUP BY d.MaKhachHang;

-- Câu 16
SELECT n.MaNhanVien, n.Ho, n.Ten , COUNT(SoHoaDon) AS SoDonDaLap
FROM NHANVIEN n LEFT JOIN DONDATHANG d ON n.MaNhanVien = d.MaNhanVien
GROUP BY n.MaNhanVien;

-- Câu 17
SELECT n.MaCongTy, n.TenCongTy, SUM(c.GiaBan * c.SoLuong - c.SoLuong * c.MucGiamGia) as TongTienHangThuDuoc, MONTH(d.NgayDatHang) AS Thang
FROM NHACUNGCAP n JOIN MATHANG m JOIN CHITIETDATHANG c JOIN DONDATHANG d ON n.MaCongTy = m.MaCongTy AND m.MaHang = c.MaHang AND c.SoHoaDon = d.SoHoaDon
WHERE YEAR(d.NgayDatHang) = 2007
GROUP BY n.MaCongTy, MONTH(d.NgayDatHang) ;

-- Câu 18
SELECT n.MaCongTy, n.TenCongTy, SUM(c.GiaBan * c.SoLuong - c.SoLuong * c.MucGiamGia) - SUM(m.GiaHang * c.SoLuong ) as TongTienHangThuDuoc
FROM NHACUNGCAP n JOIN MATHANG m JOIN CHITIETDATHANG c JOIN DONDATHANG d ON n.MaCongTy = m.MaCongTy AND m.MaHang = c.MaHang AND c.SoHoaDon = d.SoHoaDon
WHERE YEAR(d.NgayDatHang) = 2007
GROUP BY n.MaCongTy;

-- Câu 19
SELECT n.TenCongTy, m.MaHang, (m.SoLuong - (IF(c.SoLuong IS NULL, 0, c.SoLuong)) )
FROM NHACUNGCAP n JOIN MATHANG m ON n.MaCongTy = m.MaCongTy LEFT JOIN CHITIETDATHANG c ON m.MaHang = c.MaHang 
GROUP BY n.MaCongTy, m.MaHang;

-- Câu 20
SELECT T.MaNhanVien, T.HoTen ,T.SoLuongBanDuoc
FROM(
 SELECT d.MaNhanVien, CONCAT(n.Ho , " ", n.Ten) AS HoTen, SUM(c.SoLuong) AS SoLuongBanDuoc
 FROM DONDATHANG d JOIN CHITIETDATHANG c JOIN NHANVIEN n ON d.SoHoaDon = c.SoHoaDon AND d.MaNhanVien = n.MaNhanVien
 GROUP BY d.MaNhanVien
) AS T
WHERE 
 T.SoLuongBanDuoc = (
  SELECT MAX(T.SoLuongBanDuoc) 
  FROM (
   SELECT d.MaNhanVien, SUM(c.SoLuong) AS SoLuongBanDuoc	
   FROM DONDATHANG d JOIN CHITIETDATHANG c ON d.SoHoaDon = c.SoHoaDon 
   GROUP BY d.MaNhanVien
  ) AS T 
 );
 
-- Câu 21
SELECT *
FROM(
 SELECT c.SoHoaDon, SUM(c.SoLuong) AS TongSoLuong
 FROM CHITIETDATHANG c 
 GROUP BY c.SoHoaDon 
) AS T
WHERE T.TongSoLuong = (
 SELECT MIN(T.TongSoLuong) FROM(
  SELECT c.SoHoaDon, SUM(c.SoLuong) AS TongSoLuong
  FROM CHITIETDATHANG c 
  GROUP BY c.SoHoaDon 
 ) AS T
);

-- Câu 22
SELECT SUM((c.GiaBan * c.SoLuong - c.SoLuong * c.MucGiamGia)) as TienPhaiTraNhieuNhat
FROM CHITIETDATHANG c
GROUP BY c.SoHoaDon
ORDER BY TienPhaiTraNhieuNhat DESC
LIMIT 1;

-- Câu 23
SELECT c.SoHoaDon, GROUP_CONCAT(m.TenHang SEPARATOR ' | ') AS CacMatHangDatMua, SUM((c.GiaBan * c.SoLuong - c.SoLuong * c.MucGiamGia)) AS TongTienDonHang
FROM CHITIETDATHANG c JOIN MATHANG m ON c.MaHang = m.MaHang
GROUP BY c.SoHoaDon;

-- Câu 24
SELECT m.MaCongTy, m.MaHang, SUM(m.SoLuong) AS TongSoLuong, T.TongSoLuongSanPhamTrongCongTy
FROM MATHANG m JOIN (SELECT m.MaCongTy, SUM(m.SoLuong) AS TongSoLuongSanPhamTrongCongTy FROM MATHANG m GROUP BY m.MaCongTy ) AS T ON m.MaCongTy = T.MaCongTy
GROUP BY m.MaCongTy,m.MaHang;

-- Câu 25
SELECT c.MaHang, m.TenHang, 
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 1 THEN c.SoLuong END), 0) Thang_1,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 2 THEN c.SoLuong END), 0) Thang_2,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 3 THEN c.SoLuong END), 0) Thang_3,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 4 THEN c.SoLuong END), 0) Thang_4,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 5 THEN c.SoLuong END), 0) Thang_5,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 6 THEN c.SoLuong END), 0) Thang_6,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 7 THEN c.SoLuong END), 0) Thang_7,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 8 THEN c.SoLuong END), 0) Thang_8,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 9 THEN c.SoLuong END), 0) Thang_9,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 10 THEN c.SoLuong END), 0) Thang_10,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 11 THEN c.SoLuong END), 0) Thang_11,
 COALESCE(sum(CASE WHEN MONTH(d.NgayDatHang) = 12 THEN c.SoLuong END), 0) Thang_12,
 SUM(c.SoLuong) Nam_2007
FROM DONDATHANG d JOIN CHITIETDATHANG c JOIN MATHANG m ON d.SoHoaDon = c.SoHoaDon AND c.MaHang = m.MaHang
WHERE YEAR(d.NgayDatHang) = 2007
GROUP BY c.MaHang;

-- Câu 26
UPDATE DONDATHANG
SET NgayChuyenHang = NgayDatHang
WHERE NgayChuyenHang IS NULL;

-- Câu 27
UPDATE MATHANG m JOIN NHACUNGCAP n on m.MaCongTy = n.MaCongTy
SET m.SoLuong = 2 * m.SoLuong
WHERE n.TenGiaoDich = 'VINAMILK';

-- Câu 28
UPDATE DONDATHANG d JOIN KHACHHANG k ON d.MaKhachHang = k.MaKhachHang
SET d.NoiGiaoHang = k.DiaChi
WHERE d.NoiGiaoHang IS NULL;

-- Câu 29
UPDATE KHACHHANG k JOIN NHACUNGCAP n ON k.TenCongTy = n.TenCongTy AND k.TenGiaoDich = n.TenGiaoDich
SET k.DiaChi = n.DiaChi, k.DienThoai = n.DienThoai, k.Fax = n.Fax, k.Email = n.Email;

-- Câu 30
UPDATE NHANVIEN n JOIN (SELECT d.MaNhanVien, CONCAT(n.Ho , " ", n.Ten) AS HoTen, SUM(c.SoLuong) AS SoLuongBanDuoc, YEAR(d.NgayDatHang) AS Nam
 FROM DONDATHANG d JOIN CHITIETDATHANG c JOIN NHANVIEN n ON d.SoHoaDon = c.SoHoaDon AND d.MaNhanVien = n.MaNhanVien
 GROUP BY d.MaNhanVien, YEAR(d.NgayDatHang)) AS T ON n.MaNhanVien = T.MaNhanVien
SET n.LuongCoBan = 1.5 * n.LuongCoBan
WHERE SoLuongBanDuoc > 100 AND T.Nam = 2003;

-- Câu 31
UPDATE NHANVIEN n JOIN (SELECT T.MaNhanVien, T.HoTen ,T.SoLuongBanDuoc
FROM(
 SELECT d.MaNhanVien, CONCAT(n.Ho , " ", n.Ten) AS HoTen, SUM(c.SoLuong) AS SoLuongBanDuoc
 FROM DONDATHANG d JOIN CHITIETDATHANG c JOIN NHANVIEN n ON d.SoHoaDon = c.SoHoaDon AND d.MaNhanVien = n.MaNhanVien
 GROUP BY d.MaNhanVien
) AS T
WHERE 
 T.SoLuongBanDuoc = (
  SELECT MAX(T.SoLuongBanDuoc) 
  FROM (
   SELECT d.MaNhanVien, SUM(c.SoLuong) AS SoLuongBanDuoc	
   FROM DONDATHANG d JOIN CHITIETDATHANG c ON d.SoHoaDon = c.SoHoaDon 
   GROUP BY d.MaNhanVien
  ) AS T 
 )) AS T1 ON n.MaNhanVien = T1.MaNhanVien
 SET n.PhuCap = n.LuongCoBan / 2;
 
-- Câu 32
UPDATE NHANVIEN n
SET n.LuongCoBan = n.LuongCoBan*0.75
WHERE n.MaNhanVien NOT IN (SELECT d.MaNhanVien FROM DONDATHANG d WHERE YEAR(NgayDatHang) = 2003);

-- Câu 33
ALTER TABLE DONDATHANG
ADD SoTien NUMERIC(38,2);

UPDATE DONDATHANG d JOIN (SELECT c.SoHoaDon, SUM((c.GiaBan * c.SoLuong - c.SoLuong * c.MucGiamGia)) as TienPhaiTra
 FROM CHITIETDATHANG c 
 GROUP BY c.SoHoaDon) AS T ON d.SoHoaDon = T.SoHoaDon
SET d.SoTien = T.TienPhaiTra;

-- Câu 34
 DELETE FROM NHANVIEN 
 WHERE DATEDIFF(NOW(), NgayLamViec ) / 365 > 40;
 
-- Câu 35
DELETE d, c FROM DONDATHANG d JOIN CHITIETDATHANG c ON d.SoHoaDon = c.SoHoaDon
WHERE YEAR(d.NgayDatHang) < 2000;

-- Câu 36
DELETE FROM LOAIHANG
WHERE MaLoaiHang NOT IN (SELECT DISTINCT m.MaLoaiHang FROM MATHANG m);

-- Câu 37
DELETE FROM KHACHHANG
WHERE MaKhachHang NOT IN(
 SELECT DISTINCT d.MaKhachHang
 FROM DONDATHANG d);
 
 -- Câu 38
 DELETE FROM MATHANG
 WHERE SoLuong = 0 AND MaHang NOT IN (SELECT DISTINCT MaHang FROM CHITIETDATHANG);
 
 -- Câu 39
SELECT d.MaKhachHang, GROUP_CONCAT(c.MaHang) AS CacMaLoaiHang, COUNT(d.MaKhachHang) AS SoLuongLoaiHang
FROM DONDATHANG d JOIN CHITIETDATHANG c ON d.SoHoaDon = c.SoHoaDon
GROUP BY d.MaKhachHang 
HAVING CacMaLoaiHang = 'TP03' AND SoLuongLoaiHang = 1;

-- Câu 40
SELECT d.MaKhachHang, GROUP_CONCAT(c.MaHang) AS CacMaLoaiHang, COUNT(d.MaKhachHang) AS SoLuongLoaiHang
FROM DONDATHANG d JOIN CHITIETDATHANG c ON d.SoHoaDon = c.SoHoaDon
GROUP BY d.MaKhachHang 
HAVING CacMaLoaiHang LIKE '%TP07%' AND CacMaLoaiHang NOT LIKE '%MM01%' AND SoLuongLoaiHang >= 2;

-- Câu 41
 SELECT d.SoHoaDon, GROUP_CONCAT(c.MaHang) AS CacMaLoaiHang, COUNT(d.MaKhachHang) AS SoLuongLoaiHang
 FROM DONDATHANG d JOIN CHITIETDATHANG c ON d.SoHoaDon = c.SoHoaDon
 GROUP BY d.MaKhachHang 
 HAVING CacMaLoaiHang LIKE '%DT01%'
  AND CacMaLoaiHang LIKE '%DT02%'
  AND CacMaLoaiHang LIKE '%DT03%'
  AND CacMaLoaiHang LIKE '%DT04%'
  AND (CacMaLoaiHang NOT LIKE '%DC01%'
  OR CacMaLoaiHang NOT LIKE '%TP03%');