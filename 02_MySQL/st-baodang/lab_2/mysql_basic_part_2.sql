-- Question 1
SELECT `TenHang` 
FROM `MATHANG`
    JOIN `NHACUNGCAP` USING(`MaCongTy`)
WHERE `TenCongTy` LIKE '%Công ty%Việt Tiến%'

-- Question 2
SELECT DISTINCT
    `TenCongTy`, 
    `DiaChi` 
FROM `NHACUNGCAP`
    JOIN `MATHANG` USING(`MaCongTy`)
    JOIN `LOAIHANG` USING(`MaLoaiHang`)
WHERE `TenLoaiHang` = 'Thực phẩm';

-- Question 3
SELECT DISTINCT kh.`TenGiaoDich`
FROM `CHITIETDATHANG` c
    JOIN `MATHANG` m ON c.`MaHang` = m.`MaHang` AND `TenHang` LIKE '%Sữa%' AND `DonViTinh` = 'Hộp'
    JOIN `DONDATHANG` d USING(`SoHoaDon`)
    JOIN `KHACHHANG` kh USING(`MaKhachHang`);


-- Question 4
SELECT 
    kh.`TenCongTy`,
    CONCAT(`Ho`, ' ', `Ten`) as TenNhanVien, 
    `NgayGiaoHang`, 
    `NoiGiaoHang` 
FROM `DONDATHANG` d 
    JOIN `KHACHHANG` kh ON kh.`MaKhachHang` = d.`MaKhachHang`
    JOIN `NHANVIEN`n ON n.`MaNhanVien` = d.`MaNhanVien` 
WHERE `SoHoaDon` = 1;

-- Question 5
SELECT 
    CONCAT(`Ho`, ' ', `Ten`) as TenNhanVien, 
    (`LuongCoBan` + IFNULL(`PhuCap`, 0)) as Luong 
FROM `NHANVIEN`;

-- Question 6
SELECT 
    `TenHang`, 
    (c.`SoLuong` * (`GiaBan` - `MucGiamGia`)) as SoTien 
FROM `CHITIETDATHANG` c
    JOIN `MATHANG` m ON c.`MaHang` = m.`MaHang`
WHERE `SoHoaDon` = 3;

-- Question 7
EXPLAIN SELECT 
    kh.`TenCongTy` 
FROM `KHACHHANG` kh
    JOIN `NHACUNGCAP` n ON kh.`TenGiaoDich` = n.`TenGiaoDich`;

-- Question 8 (No case to test)
EXPLAIN SELECT 
    DISTINCT CONCAT(n1.`Ho`, ' ', n1.`Ten`) as HoTen,
    n1.`NgaySinh` 
FROM `NHANVIEN` n1 
    JOIN `NHANVIEN` n2 ON n1.`NgaySinh` = n2.`NgaySinh` AND n1.`MaNhanVien` <> n2.`MaNhanVien`
ORDER BY n1.`NgaySinh`;

-- Question 9
SELECT 
    d.`SoHoaDon`, 
    kh.`TenCongTy` 
FROM `DONDATHANG` d
    JOIN `KHACHHANG` kh ON d.`MaKhachHang` = kh.`MaKhachHang`
WHERE d.`NoiGiaoHang` = kh.`DiaChi`;

-- Question 10
SELECT `MaHang`, `TenHang`
FROM `MATHANG`
    LEFT JOIN `CHITIETDATHANG` USING(`MaHang`)
WHERE `SoHoaDon` IS NULL;

-- Question 11 (No case to test)
SELECT 
    `MaNhanVien`, 
    CONCAT(`Ho`, ' ', `Ten`) as HoTen 
FROM `NHANVIEN`
    LEFT JOIN `DONDATHANG` USING(`MaNhanVien`)
WHERE `SoHoaDon` IS NULL;

-- Question 12
SELECT
    CONCAT(`Ho`, ' ', `Ten`) as HoTen
FROM `NHANVIEN`
WHERE `LuongCoBan` = (
    SELECT MAX(`LuongCoBan`) FROM `NHANVIEN`
);

-- Question 13
SELECT
    `TenCongTy`, 
    c.`SoHoaDon`, 
    c.`SoTien` 
FROM `DONDATHANG` d
    JOIN (SELECT 
            `SoHoaDon`, 
            SUM(`SoLuong` * (`GiaBan` - `MucGiamGia`)) as SoTien
        FROM `CHITIETDATHANG`
        GROUP BY `SoHoaDon`
    ) c ON d.`SoHoaDon` = c.`SoHoaDon`
    JOIN `KHACHHANG` kh ON d.`MaKhachHang` = kh.`MaKhachHang`;

-- Question 14
SELECT `MaHang`, `TenHang`
FROM `CHITIETDATHANG`
    JOIN `DONDATHANG` USING(`SoHoaDon`)
    JOIN `MATHANG` USING(`MaHang`)
GROUP BY `MaHang`, `TenHang`
HAVING COUNT(`MaHang`) = 1;

-- Question 15
SELECT 
    `TenCongTy`, 
    SUM(SoTien) as TongSoTien
FROM `DONDATHANG` d
    JOIN (SELECT 
            `SoHoaDon`, 
            SUM(`SoLuong` * (`GiaBan` - `MucGiamGia`)) as SoTien
        FROM `CHITIETDATHANG`
        GROUP BY `SoHoaDon`
    ) c ON d.`SoHoaDon` = c.`SoHoaDon`
    JOIN `KHACHHANG` kh ON d.`MaKhachHang` = kh.`MaKhachHang`
GROUP BY kh.`MaKhachHang`;


-- Question 16
SELECT 
    Ho, Ten, 
    COUNT(d.`MaNhanVien`) as SoDonHang
FROM `NHANVIEN` n
    LEFT JOIN `DONDATHANG` d ON d.`MaNhanVien` = n.`MaNhanVien`
GROUP BY Ho, Ten;

-- Question 17
SELECT 
    MONTH(`NgayDatHang`) as Thang, 
    SUM(`SoLuong` * (`GiaBan` - `MucGiamGia`)) as SoTien
FROM `DONDATHANG` d
    JOIN `CHITIETDATHANG` c ON c.`SoHoaDon` = d.`SoHoaDon`
WHERE YEAR(`NgayDatHang`) = 2007
GROUP BY MONTH(`NgayDatHang`);

-- Question 18
SELECT 
    m.`MaHang`, 
    m.`TenHang`, 
    SUM(c.`SoLuong` * (`GiaBan` - `MucGiamGia` - `GiaHang`)) as TienLoi
FROM `CHITIETDATHANG` c
    JOIN `MATHANG` m ON c.`MaHang` = m .`MaHang`
    JOIN `DONDATHANG` d ON c.`SoHoaDon` = d.`SoHoaDon`
WHERE YEAR(`NgayDatHang`) = 2007
GROUP BY m.`MaHang`, m.`TenHang`;

-- Question 19
SELECT 
    m.`MaHang`, 
    m.`TenHang`, 
    IFNULL(SUM(IFNULL(c.`SoLuong`,0)), 0) as SoLuongDaBan,
    IFNULL(IFNULL(m.`SoLuong`,0) - SUM(c.`SoLuong`), m.`SoLuong`) as SoLuongConLai
FROM `MATHANG` m
    LEFT JOIN `CHITIETDATHANG` c ON c.`MaHang` = m.`MaHang`
GROUP BY m.`MaHang`, m.`TenHang`;

-- Question 20
WITH TSL AS (
    SELECT 
            `MaNhanVien`, 
            SUM(`SoLuong`) as TongSoLuong
        FROM `DONDATHANG` d
            JOIN `CHITIETDATHANG` c ON c.`SoHoaDon` = d.`SoHoaDon`
        GROUP BY `MaNhanVien`
)
SELECT 
    CONCAT(`Ho`, ' ', `Ten`) as HoTen, 
    `TongSoLuong`
FROM `NHANVIEN` n
    JOIN TSL d ON n.`MaNhanVien` = d.`MaNhanVien`
WHERE `TongSoLuong` = (SELECT MAX(`TongSoLuong`) from TSL);


-- Question 21
WITH TSL AS (
    SELECT 
        `SoHoaDon`, 
        SUM(`SoLuong`) as TongSoLuong
    FROM `CHITIETDATHANG`
    GROUP BY `SoHoaDon`
)
SELECT * 
FROM TSL
WHERE `TongSoLuong` = (SELECT MIN(`TongSoLuong`) FROM TSL);

-- Question 22
SELECT 
    kh.`MaKhachHang`, 
    kh.`TenCongTy`, 
    MAX(TongSoTien) as SoTienNhieuNhat 
FROM `KHACHHANG` kh
    JOIN(SELECT 
            d.`MaKhachHang`, 
            c.`SoHoaDon`, 
            SUM(`SoLuong` * (`GiaBan` - `MucGiamGia`)) as TongSoTien
        FROM `CHITIETDATHANG` c
            JOIN `DONDATHANG` d ON c.`SoHoaDon` = d.`SoHoaDon`
        GROUP BY d.`SoHoaDon`
    ) tst ON kh.`MaKhachHang` = tst.`MaKhachHang`
GROUP BY kh.`MaKhachHang`, kh.`TenCongTy`;

-- Question 23

-- //Info: Cách 1 (Dùng GROUP_CONCAT), khó truy vấn
SELECT 
    `SoHoaDon`, 
    GROUP_CONCAT(`TenHang` SEPARATOR '\n') as DanhSachMatHang, 
    SUM(c.`SoLuong` * (`GiaBan` - `MucGiamGia`)) as Tien
FROM `CHITIETDATHANG` c
    JOIN `MATHANG` m ON c.`MaHang` = m.`MaHang` 
GROUP BY `SoHoaDon`;

-- //Info: Cách 2 (Dùng UNION), dễ truy vấn hơn.
SELECT 
    `SoHoaDon`, 
    `TenHang`, 
    c.`SoLuong` * (`GiaBan` - `MucGiamGia`) as SoTien
FROM `CHITIETDATHANG` c
    JOIN `MATHANG` m ON c.`MaHang` = m.`MaHang` 
UNION ALL
    SELECT 
        `SoHoaDon`, 
        'ALL' as TenHang, 
        SUM(`SoLuong` * (`GiaBan` - `MucGiamGia`)) as SoTien
    FROM `CHITIETDATHANG`
    GROUP BY `SoHoaDon`
ORDER BY `SoHoaDon` ASC, IF(`TenHang` = 'ALL',0,`TenHang`) DESC;


-- Question 24
SELECT 
    l.`MaLoaiHang`,
    m.`TenHang`,
    m.`SoLuong`
FROM `LOAIHANG` l
    JOIN `MATHANG` m ON l.`MaLoaiHang` = m.`MaLoaiHang`
UNION ALL
    SELECT
        `MaLoaiHang`,
        'ALL',
        SUM(`SoLuong`) as SoLuong
    FROM `MATHANG`
    GROUP BY `MaLoaiHang`
UNION ALL
    SELECT
        'ALL',
        'ALL',
        SUM(`SoLuong`) as SoLuong
    FROM `MATHANG`
ORDER BY 
    IF(`MaLoaiHang`='ALL',0, `MaLoaiHang`) DESC, 
    IF(`TenHang`='ALL',1,`TenHang`) DESC;

-- Question 25
SELECT 
    m.`MaHang`, 
    m.`TenHang`,
    SUM(IF(MONTH(`NgayDatHang`) = 1, c.`SoLuong`, 0)) as T1,
    SUM(IF(MONTH(`NgayDatHang`) = 2, c.`SoLuong`, 0)) as T2,
    SUM(IF(MONTH(`NgayDatHang`) = 3, c.`SoLuong`, 0)) as T3,
    SUM(IF(MONTH(`NgayDatHang`) = 4, c.`SoLuong`, 0)) as T4,
    SUM(IF(MONTH(`NgayDatHang`) = 5, c.`SoLuong`, 0)) as T5,
    SUM(IF(MONTH(`NgayDatHang`) = 6, c.`SoLuong`, 0)) as T6,
    SUM(IF(MONTH(`NgayDatHang`) = 7, c.`SoLuong`, 0)) as T7,
    SUM(IF(MONTH(`NgayDatHang`) = 8, c.`SoLuong`, 0)) as T8,
    SUM(IF(MONTH(`NgayDatHang`) = 9, c.`SoLuong`, 0)) as T9,
    SUM(IF(MONTH(`NgayDatHang`) = 10, c.`SoLuong`, 0)) as T10,
    SUM(IF(MONTH(`NgayDatHang`) = 11, c.`SoLuong`, 0)) as T11,
    SUM(IF(MONTH(`NgayDatHang`) = 12, c.`SoLuong`, 0)) as T12,
    SUM(IFNULL(c.`SoLuong`,0)) as 'ALL'
FROM `MATHANG` m
    LEFT JOIN `CHITIETDATHANG` c ON m.`MaHang` = c.`MaHang`
    LEFT JOIN `DONDATHANG` d ON d.`SoHoaDon` = c.`SoHoaDon`
GROUP BY m.`MaHang`, m.`TenHang`;

-- Question 26
UPDATE `DONDATHANG` d1
    JOIN `DONDATHANG` d2 ON d1.`SoHoaDon` = d2.`SoHoaDon`
SET d1.`NgayChuyenHang` = d2.`NgayDatHang`
WHERE d1.`NgayChuyenHang` IS NULL;

-- Question 27
UPDATE `MATHANG` m
    JOIN `NHACUNGCAP` USING(`MaCongTy`)
SET `SoLuong` = `SoLuong` * 2
WHERE `TenGiaoDich` LIKE '%VINAMILK';

-- Question 28
UPDATE `DONDATHANG` d
    JOIN `KHACHHANG` kh ON d.`MaKhachHang` = kh.`MaKhachHang`
SET d.`NoiGiaoHang` = kh.`DiaChi`
WHERE d.`NoiGiaoHang` IS NULL;

-- Question 29
UPDATE `KHACHHANG` kh
    JOIN `NHACUNGCAP` n ON kh.`TenCongTy` = n.`TenCongTy` AND kh.`TenGiaoDich` = n.`TenGiaoDich`
SET 
    kh.`DiaChi` = n.`DiaChi`,
    kh.`DienThoai` = n.`DienThoai`,
    kh.`Email` = n.`Email`;

-- Question 30
UPDATE `NHANVIEN`
    JOIN (
        SELECT `MaNhanVien`
        FROM `CHITIETDATHANG` c
            JOIN `DONDATHANG` d USING(`SoHoaDon`)
        WHERE YEAR(`NgayDatHang`) = 2003
        GROUP BY `MaNhanVien`
        HAVING SUM(`SoLuong`) > 100
    ) c USING(`MaNhanVien`)
SET `LuongCoBan` = `LuongCoBan` * 1.5;

-- Question 31
WITH TSL AS (
    SELECT 
        `MaNhanVien`, 
        SUM(`SoLuong`) as TongSL
    FROM `CHITIETDATHANG` c
        JOIN `DONDATHANG` d USING(`SoHoaDon`)
    GROUP BY `MaNhanVien`
)
UPDATE `NHANVIEN`
    JOIN (
        SELECT `MaNhanVien` 
        FROM TSL 
        WHERE TongSL = (
            SELECT MAX(TongSL) FROM TSL
        )
    ) ts USING(`MaNhanVien`)
SET `PhuCap` = `LuongCoBan` / 2;

-- Question 32
UPDATE `NHANVIEN` n
    LEFT JOIN (
        SELECT DISTINCT `MaNhanVien` 
        FROM `DONDATHANG`
        WHERE YEAR(`NgayDatHang`) = 2003
    ) d USING(`MaNhanVien`)
SET `LuongCoBan` = `LuongCoBan` * 3 / 4
WHERE d.`MaNhanVien` IS NULL;

-- Question 33
UPDATE `DONDATHANG` d
    JOIN (
        SELECT 
            `SoHoaDon`, 
            SUM(`SoLuong` * (`GiaBan` - `MucGiamGia`)) as TongST 
        FROM `DONDATHANG` d
            JOIN `CHITIETDATHANG` c USING(`SoHoaDon`)
        GROUP BY `SoHoaDon`
    ) tst USING (`SoHoaDon`)
SET SoTien = TongST;

-- Question 34
DELETE FROM `NHANVIEN` 
WHERE (YEAR(CURDATE()) - YEAR(`NgayLamViec`)) > 40;

-- Question 35
DELETE FROM `DONDATHANG` 
WHERE YEAR(`NgayDatHang`) < 2000;

-- Question 36
DELETE l
FROM `LOAIHANG` l
    LEFT JOIN `MATHANG` m USING(`MaLoaiHang`)
WHERE m.`MaLoaiHang` IS NULL;

-- Question 37
DELETE kh
FROM `KHACHHANG` kh
    LEFT JOIN `DONDATHANG` d USING(`MaKhachHang`)
WHERE d.`MaKhachHang` IS NULL;
-- Question 38
DELETE m
FROM `MATHANG` m
    LEFT JOIN `CHITIETDATHANG` c USING(`MaHang`)
WHERE m.`SoLuong` = 0 AND c.`MaHang` IS NULL;

-- Question 39
SELECT `MaKhachHang`
FROM `DONDATHANG`
    JOIN `CHITIETDATHANG` USING (`SoHoaDon`)
GROUP BY `MaKhachHang`
HAVING COUNT(CASE WHEN `MaHang` = 'TP07' THEN 1 END) = COUNT(`MaHang`);

-- Question 40
SELECT `TenCongTy`
FROM `KHACHHANG`
    JOIN (
        SELECT `MaKhachHang`
        FROM `DONDATHANG`
            JOIN `CHITIETDATHANG` USING (`SoHoaDon`)
        GROUP BY `MaKhachHang`
        HAVING COUNT(DISTINCT `MaHang`) >= 2 
            AND COUNT(CASE WHEN `MaHang` = 'MM01' THEN 1 END) = 0 
            AND COUNT(CASE WHEN `MaHang` = 'TP07' THEN 1 END) > 0
    ) n USING (`MaKhachHang`);

-- Question 41
SELECT `SoHoaDon` FROM `CHITIETDATHANG`
GROUP BY `SoHoaDon`
HAVING COUNT(CASE WHEN `MaHang` = 'DT01' THEN 1 END) > 0
    AND COUNT(CASE WHEN `MaHang` = 'DT02' THEN 1 END) > 0
    AND COUNT(CASE WHEN `MaHang` = 'DT03' THEN 1 END) > 0
    AND COUNT(CASE WHEN `MaHang` = 'DT04' THEN 1 END) > 0
    AND (
        COUNT(CASE WHEN `MaHang` = 'DC01' THEN 1 END) = 0 
        OR COUNT(CASE WHEN `MaHang` = 'TP03' THEN 1 END) = 0
    );
