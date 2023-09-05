-- Câu 1
SELECT MaHang, TenHang, TenCongTy 
FROM NHACUNGCAP 
JOIN MATHANG USING(MaCongTy)
WHERE MaCongTy = 'MVT';

-- Câu 2
SELECT DISTINCT MaCongTy, TenCongTy, DiaChi 
FROM NHACUNGCAP 
JOIN MATHANG USING(MaCongTy)
JOIN LOAIHANG USING (MaLoaiHang)
WHERE TenLoaiHang LIKE '%Thực Phẩm%';

-- Câu 3
SELECT DISTINCT TenGiaoDich 
FROM MATHANG 
JOIN CHITIETDATHANG USING(MaHang)
JOIN DONDATHANG USING(SoHoaDon)
JOIN KHACHHANG USING(MaKhachHang)
WHERE TenHang LIKE '%Sửa%' AND DonViTinh LIKE '%Hộp%';

-- Câu 4
SELECT TenCongTy, CONCAT(Ho, ' ', Ten) AS HoTen, NgayGiaoHang, NoiGiaoHang
FROM KHACHHANG 
JOIN DONDATHANG USING(MaKhachHang) 
JOIN NHANVIEN USING(MaNhanVien)
WHERE SoHoaDon = 1;

-- Câu 5
SELECT MaNhanVien, CONCAT(Ho, ' ', Ten) AS HoTen, (IFNULL(LuongCoBan,0) + IFNULL(PhuCap,0)) AS Luong
FROM NHANVIEN;

-- Câu 6
SELECT MaHang, TenHang, (ctdh.SoLuong * GiaBan - ctdh.SoLuong * MucGiamGia) AS SoTienPhaiTra
FROM MATHANG JOIN CHITIETDATHANG ctdh USING(MaHang);

-- Câu 7
SELECT MaKhachHang, kh.TenCongTy, kh.TenGiaoDich 
FROM KHACHHANG kh JOIN NHACUNGCAP USING(TenGiaoDich);

-- Câu 8
Select nv1.MaNhanVien, CONCAT(nv1.Ho, ' ', nv1.Ten) AS HoTen, nv1.NgaySinh
FROM NHANVIEN nv1 
JOIN NHANVIEN nv2 ON (nv2.NgaySinh) = (nv1.NgaySinh)
WHERE nv2.MaNhanVien != nv1.MaNhanVien;

-- Câu 9
SELECT SoHoaDon, TenCongTy, NgayDatHang, NoiGiaoHang
FROM KHACHHANG
JOIN DONDATHANG USING(MaKhachHang)
WHERE DiaChi = NoiGiaoHang;

-- Câu 10
SELECT mh.MaHang, TenHang
FROM MATHANG mh
LEFT JOIN CHITIETDATHANG ct USING(MaHang)
WHERE ct.MaHang IS NULL;

-- Câu 11
SELECT MaNhanVien, CONCAT(Ho, ' ', Ten) AS HoTen
FROM NHANVIEN nv
LEFT JOIN DONDATHANG USING(MaNhanVien)
WHERE nv.MaNhanVien IS NULL;

-- Câu 12
SELECT MaNhanVien, CONCAT(Ho, ' ', Ten) AS HoTen, LuongCoBan
FROM NHANVIEN WHERE LuongCoBan = (SELECT MAX(LuongCoBan) FROM NHANVIEN);

-- Câu 13
SELECT MaKhachHang, TenCongTy, SUM(ctdh.SoLuong * GiaBan - ctdh.SoLuong * MucGiamGia) AS ThanhToan
FROM KHACHHANG 
JOIN DONDATHANG ddh USING(MaKhachHang) 
JOIN CHITIETDATHANG ctdh USING(SoHoaDon)
GROUP BY MaKhachHang, TenCongTy;

-- Câu 14
SELECT mh.MaHang, mh.TenHang, NgayDatHang
FROM MATHANG mh
JOIN CHITIETDATHANG ctdh USING(MaHang)
JOIN DONDATHANG USING(SoHoaDon)
WHERE YEAR(NgayDatHang) = 2007
GROUP BY mh.MaHang, mh.TenHang, NgayDatHang
HAVING COUNT(ctdh.MaHang) = 1;

-- Câu 15
SELECT MaKhachHang, TenCongTy, TenGiaoDich, SUM(ctdh.SoLuong * GiaBan - ctdh.SoLuong * MucGiamGia) AS ThanhToan
FROM KHACHHANG 
JOIN DONDATHANG USING(MaKhachHang)
JOIN CHITIETDATHANG ctdh USING(SoHoaDon)
GROUP BY MaKhachHang, TenCongTy, TenGiaoDich;

-- Câu 16
SELECT MaNhanVien, CONCAT(Ho, ' ', Ten) AS HoTen, COUNT(SoHoaDon) AS TongSoHoaDon
FROM NHANVIEN 
LEFT JOIN DONDATHANG USING(MaNhanVien)
GROUP BY MaNhanVien;

-- Câu 17
SELECT MONTH(NgayDatHang), SUM(ctdh.SoLuong * GiaBan - ctdh.SoLuong * MucGiamGia) AS TongTien
FROM DONDATHANG 
JOIN CHITIETDATHANG ctdh USING(SoHoaDon)
WHERE YEAR(NgayDatHang) = 2007
GROUP BY MONTH(NgayDatHang);

-- Câu 18
SELECT MaHang, TenHang, (SUM(ctdh.SoLuong * GiaBan - ctdh.SoLuong * MucGiamGia) - SUM(ctdh.SoLuong * GiaBan)) AS TienLai
FROM MATHANG
JOIN CHITIETDATHANG ctdh USING(MaHang)
JOIN DONDATHANG USING(SoHoaDon)
WHERE YEAR(NgayDatHang) = 2007
GROUP BY MaHang, TenHang;

-- Câu 19
SELECT mh.MaHang, mh.TenHang,mh.SoLuong AS TongSoLuong, IFNULL(SUM(ctdh.SoLuong),0) AS TongHangDaBan,mh.SoLuong - IFNULL(SUM(ctdh.SoLuong),0) AS SoLuongConLai
FROM MATHANG mh
LEFT JOIN CHITIETDATHANG ctdh USING(MaHang)
GROUP BY mh.MaHang, mh.TenHang, mh.SoLuong;

-- Câu 20
SELECT MaNhanVien, CONCAT(Ho, ' ', Ten) AS HoTen, SUM(SoLuong) AS TongSoLuong
FROM NHANVIEN 
JOIN DONDATHANG USING(MaNhanVien)
JOIN CHITIETDATHANG USING(SoHoaDon)
GROUP BY MaNhanVien, HoTen
HAVING SUM(SoLuong) = (
    SELECT MAX(TongSoLuong)
    FROM (
        SELECT MaNhanVien, SUM(SoLuong) AS TongSoLuong
        FROM NHANVIEN 
        JOIN DONDATHANG USING(MaNhanVien)
        JOIN CHITIETDATHANG USING(SoHoaDon)
        GROUP BY MaNhanVien
    ) AS Sub
);

-- Câu 21
SELECT SoHoaDon, SUM(SoLuong) AS TongSoLuong
FROM DONDATHANG
JOIN CHITIETDATHANG USING(SoHoaDon)
GROUP BY SoHoaDon
HAVING SUM(SoLuong) = (
	SELECT MIN(TongSoLuong) 
    FROM ( SELECT SoHoaDon, SUM(SoLuong) AS TongSoLuong
    FROM DONDATHANG 
    JOIN CHITIETDATHANG USING(SoHoaDon)
    GROUP BY SoHoaDon
	) AS Sub
);

-- Câu 22 
SELECT MAX(TongTien) AS SoTienNhieuNhat
FROM (
    SELECT dh.MaKhachHang, SUM(ctdh.SoLuong * GiaBan - ctdh.SoLuong * MucGiamGia) AS TongTien
    FROM DONDATHANG dh
    JOIN CHITIETDATHANG ctdh ON dh.SoHoaDon = ctdh.SoHoaDon
    GROUP BY dh.MaKhachHang
) AS Sub;

-- Câu 23
SELECT ddh.SoHoaDon, ctdh.MaHang, TenHang, SUM(ctdh.SoLuong * GiaBan - ctdh.SoLuong * MucGiamGia) AS TongTien
FROM DONDATHANG ddh
JOIN CHITIETDATHANG ctdh USING(SoHoaDon)
JOIN MATHANG USING (MaHang)
GROUP BY ddh.SoHoaDon, ctdh.MaHang, TenHang;

-- Câu 24
SELECT MaLoaiHang, TenLoaiHang, TenHang, SoLuong
FROM MATHANG 
JOIN LOAIHANG lh USING(MaLoaiHang)
UNION ALL
SELECT MaLoaiHang, TenLoaiHang,'ALL', sum(SoLuong)
FROM MATHANG 
JOIN LOAIHANG USING(MaLoaiHang)
GROUP BY MaLoaiHang
UNION ALL
SELECT 'ALL','ALL','ALL',sum(SoLuong) FROM MATHANG
ORDER BY MaLoaiHang DESC,TenHang DESC;

-- Câu 25
SELECT ctdh.MaHang, TenHang,
SUM(CASE MONTH(NgayDatHang) WHEN 1 THEN ctdh.SoLuong ELSE 0 END) AS Thang1,
SUM(CASE MONTH(NgayDatHang) WHEN 2 THEN ctdh.SoLuong ELSE 0 END) AS Thang2,
SUM(CASE MONTH(NgayDatHang) WHEN 3 THEN ctdh.SoLuong ELSE 0 END) AS Thang3,
SUM(CASE MONTH(NgayDatHang) WHEN 4 THEN ctdh.SoLuong ELSE 0 END) AS Thang4,
SUM(CASE MONTH(NgayDatHang) WHEN 5 THEN ctdh.SoLuong ELSE 0 END) AS Thang5,
SUM(CASE MONTH(NgayDatHang) WHEN 6 THEN ctdh.SoLuong ELSE 0 END) AS Thang6,
SUM(CASE MONTH(NgayDatHang) WHEN 7 THEN ctdh.SoLuong ELSE 0 END) AS Thang7,
SUM(CASE MONTH(NgayDatHang) WHEN 8 THEN ctdh.SoLuong ELSE 0 END) AS Thang8,
SUM(CASE MONTH(NgayDatHang) WHEN 9 THEN ctdh.SoLuong ELSE 0 END) AS Thang9,
SUM(CASE MONTH(NgayDatHang) WHEN 10 THEN ctdh.SoLuong ELSE 0 END) AS Thang10,
SUM(CASE MONTH(NgayDatHang) WHEN 11 THEN ctdh.SoLuong ELSE 0 END) AS Thang11,
SUM(CASE MONTH(NgayDatHang) WHEN 12 THEN ctdh.SoLuong ELSE 0 END) AS Thang12,
SUM(ctdh.SoLuong) AS CaNam
FROM DONDATHANG 
JOIN CHITIETDATHANG ctdh USING(SoHoaDon)
JOIN MATHANG USING(MaHang)
WHERE YEAR(NgayDatHang) = 2007
GROUP BY ctdh.MaHang, TenHang;

-- Câu 26
SET SQL_SAFE_UPDATES=0;
UPDATE DONDATHANG
SET NgayChuyenHang = NgayDatHang
WHERE NgayChuyenHang IS NULL;

-- Câu 27
UPDATE MATHANG
JOIN NHACUNGCAP USING(MaCongTy)
SET MATHANG.SoLuong = MATHANG.SoLuong * 2
WHERE NHACUNGCAP.TenGiaoDich = 'VINAMILK';

-- Câu 28
UPDATE DONDATHANG
JOIN KHACHHANG USING(MaKhachHang)
SET NoiGiaoHang = DiaChi
WHERE NoiGiaoHang IS NULL;

-- Câu 29
UPDATE KHACHHANG kh
JOIN NHACUNGCAP ncc USING(TenCongTy)
SET kh.DiaChi = ncc.DiaChi, 
kh.DienThoai = ncc.DienThoai,
kh.fax = ncc.fax,
kh.email = ncc.email;

-- Câu 30
UPDATE NHANVIEN
SET LuongCoBan = LuongCoBan * 1.5
WHERE MaNhanVien IN (
SELECT MaNhanVien
FROM DONDATHANG
JOIN CHITIETDATHANG USING (SoHoaDon)
WHERE YEAR(NgayGiaoHang) = 2003
GROUP BY MaNhanVien
HAVING SUM(SoLuong) > 100
);

-- Câu 31
UPDATE NHANVIEN
SET PhuCap = LuongCoBan * 0.5
WHERE MaNhanVien IN (
  SELECT MaNhanVien
  FROM CHITIETDATHANG
  GROUP BY MaNhanVien
  HAVING SUM(SoLuong) = (
    SELECT MAX(TongSoLuong)
    FROM (
      SELECT SUM(SoLuong) AS TongSoLuong
      FROM CHITIETDATHANG
      GROUP BY MaNhanVien
    ) AS TongSoLuongNV
  )
);

-- Câu 32
UPDATE NHANVIEN 
SET LuongCoBan = LuongCoBan - LuongCoBan * 0.25
WHERE NOT EXISTS (
SELECT MaNhanVien 
FROM DONDATHANG 
WHERE DONDATHANG.MaNhanVien=NHANVIEN.MaNhanVien
);

-- Câu 33
ALTER TABLE DONDATHANG
ADD SoTien NUMERIC(38,2);
UPDATE DONDATHANG 
SET SoTien = (SELECT SUM(SoLuong*GiaBan - SoLuong*MucGiamGia) 
FROM CHITIETDATHANG WHERE DONDATHANG.SoHoaDon = CHITIETDATHANG.SoHoaDon);

UPDATE DONDATHANG
SET SOTIEN = (
    SELECT SUM(CHITIETDATHANG.SoLuong * (MATHANG.GiaHang - CHITIETDATHANG.MucGiamGia))
    FROM CHITIETDATHANG
    INNER JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
    WHERE CHITIETDATHANG.SoHoaDon = DONDATHANG.SoHoaDon
)
WHERE SOTIEN IS NULL;

-- Câu 34
DELETE FROM NHANVIEN
WHERE TIMESTAMPDIFF(year, NgayLamViec, NOW()) > 40;

-- Câu 35
DELETE FROM DONDATHANG
WHERE NgayDatHang < '2000-01-01';

-- Câu 36
DELETE FROM LOAIHANG
WHERE MaLoaiHang NOT IN (SELECT DISTINCT mh.MaLoaiHang FROM MATHANG mh);

-- Câu 37
DELETE FROM KHACHHANG
WHERE NOT EXISTS (
SELECT SoHoaDon 
FROM DONDATHANG
WHERE MaKhachHang = DONDATHANG.MaKhachHang);

-- Câu 38
DELETE FROM MATHANG
WHERE SoLuong = 0 AND 
NOT EXISTS (
SELECT SoHoaDon 
FROM CHITIETDATHANG
WHERE MaHang = MATHANG.MaHang);

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
