-- Công ty Việt Tiến đã cung cấp những mặt hàng nào?

SELECT * 
FROM MATHANG
WHERE MaCongTy = 'MVT';
Loại hàng thực phẩm do những công ty nào cung cấp, địa chỉ của công ty đó?

SELECT DISTINCT NHACUNGCAP.TenCongTy, NHACUNGCAP.DiaChi
FROM MATHANG
INNER JOIN NHACUNGCAP ON MATHANG.MaCongTy = NHACUNGCAP.MaCongTy
INNER JOIN LOAIHANG ON MATHANG.MaLoaiHang = LOAIHANG.MaLoaiHang
WHERE LOAIHANG.MaLoaiHang = 'TP';
-- Những khách hàng nào (tên giao dịch) đã đặt mua mặt hàng sữa hộp của công ty?

SELECT DISTINCT KHACHHANG.TenGiaoDich
FROM CHITIETDATHANG
INNER JOIN DONDATHANG ON CHITIETDATHANG.SoHoaDon = DONDATHANG.SoHoaDon
INNER JOIN KHACHHANG ON DONDATHANG.MaKhachHang = KHACHHANG.MaKhachHang
INNER JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
WHERE MATHANG.TenHang LIKE '%sữa hộp%' ;
-- Đơn đặt hàng số 1 do ai đặt và do nhân viên nào lập, thời gian và địa điểm giao hàng là ở đâu?

SELECT KHACHHANG.TenGiaoDich AS KhachHangDatHang, NHANVIEN.Ten AS NhanVienLapDon,
       DONDATHANG.NgayDatHang, DONDATHANG.NoiGiaoHang
FROM DONDATHANG
INNER JOIN KHACHHANG ON DONDATHANG.MaKhachHang = KHACHHANG.MaKhachHang
INNER JOIN NHANVIEN ON DONDATHANG.MaNhanVien = NHANVIEN.MaNhanVien
WHERE DONDATHANG.SoHoaDon = 1;
-- Hãy cho biết số tiền lương mà công ty phải trả cho mỗi nhân viên là bao nhiêu (lương=lương cơ bản+phụ cấp)?

SELECT MaNhanVien, (LuongCoBan + PhuCap) AS Luong
FROM NHANVIEN;
-- Trong đơn đặt hàng số 3 đặt mua những mặt hàng nào và số tiền mà khách hàng phải trả cho mỗi mặt hàng là bao nhiêu (số tiền phải trả=số lượng x giá bán – số lượng x mức giảm giá)?

SELECT MATHANG.TenHang, (CHITIETDATHANG.SoLuong * (MATHANG.GiaHang - CHITIETDATHANG.MucGiamGia)) AS SoTien
FROM CHITIETDATHANG
INNER JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
WHERE CHITIETDATHANG.SoHoaDon = 3;
-- Hãy cho biết có những khách hàng nào lại chính là đối tác cung cấp hàng cho công ty (tức là có cùng tên giao dịch)?

SELECT DISTINCT KHACHHANG.TenGiaoDich
FROM KHACHHANG
INNER JOIN NHACUNGCAP ON KHACHHANG.TenGiaoDich = NHACUNGCAP.TenGiaoDich;
-- Trong công ty có những nhân viên nào có cùng ngày tháng năm sinh?

SELECT NgaySinh, COUNT(*) AS SoNhanVien
FROM NHANVIEN
GROUP BY NgaySinh
HAVING COUNT(*) > 1;

-- Những đơn hàng nào yêu cầu giao hàng ngay tại công ty đặt hàng và những đơn đó là của công ty nào?

SELECT DONDATHANG.SoHoaDon, DONDATHANG.MaNhanVien, DONDATHANG.NgayChuyenHang
FROM DONDATHANG
WHERE DONDATHANG.NoiGiaoHang = 'Hà Nội';
-- Những mặt hàng nào chưa từng được khách hàng đặt mua?

SELECT MATHANG.TenHang
FROM MATHANG
LEFT JOIN CHITIETDATHANG ON MATHANG.MaHang = CHITIETDATHANG.MaHang
WHERE CHITIETDATHANG.SoHoaDon IS NULL;
-- Những nhân viên nào của công ty chưa từng lập hóa đơn đặt hàng nào?

SELECT NHANVIEN.MaNhanVien, NHANVIEN.Ten
FROM NHANVIEN
LEFT JOIN DONDATHANG ON NHANVIEN.MaNhanVien = DONDATHANG.MaNhanVien
WHERE DONDATHANG.SoHoaDon IS NULL;
-- Những nhân viên nào của công ty có lương cơ bản cao nhất?

SELECT MaNhanVien, Ten, LuongCoBan
FROM NHANVIEN
WHERE LuongCoBan = (SELECT MAX(LuongCoBan) FROM NHANVIEN);
-- Tổng số tiền mà khách hàng phải trả cho mỗi đơn đặt hàng là bao nhiêu?

SELECT SoHoaDon, SUM(SoLuong * (GiaBan - MucGiamGia)) AS TongTienDonHang
FROM CHITIETDATHANG
GROUP BY SoHoaDon;
-- Trong năm 2007 những mặt hàng nào đặt mua đúng một lần?

SELECT MaHang, COUNT(*) AS SoLanDatMua
FROM CHITIETDATHANG
WHERE YEAR(NgayDatHang) = 2007
GROUP BY MaHang
HAVING COUNT(*) = 1;
-- Mỗi khách hàng đã bỏ ra bao nhiêu tiền để đặt mua hàng của công ty?

SELECT KHACHHANG.TenGiaoDich, SUM(SoLuong * (GiaBan - MucGiamGia)) AS TongTien
FROM CHITIETDATHANG
INNER JOIN DONDATHANG ON CHITIETDATHANG.SoHoaDon = DONDATHANG.SoHoaDon
INNER JOIN KHACHHANG ON DONDATHANG.MaKhachHang = KHACHHANG.MaKhachHang
GROUP BY KHACHHANG.TenGiaoDich;
-- Mỗi nhân viên của công ty đã lập bao nhiêu đơn đặt hàng (nếu chưa hề lập hóa đơn nào thì cho kết quả là 0)?

SELECT NHANVIEN.Ten, COUNT(DONDATHANG.SoHoaDon) AS SoDonDatHang
FROM NHANVIEN
LEFT JOIN DONDATHANG ON NHANVIEN.MaNhanVien = DONDATHANG.MaNhanVien
GROUP BY NHANVIEN.Ten;
-- Tổng số tiền hàng mà công ty thu được trong mỗi tháng của năm 2007 (thời gian được tính theo ngày đặt hàng)?

SELECT MONTH(NgayDatHang) AS Thang, SUM(SoLuong * GiaBan) AS TongDoanhThu
FROM CHITIETDATHANG
WHERE YEAR(NgayDatHang) = 2007
GROUP BY MONTH(NgayDatHang)
ORDER BY Thang;
-- Tổng số tiền lời mà công ty thu được từ mỗi mặt hàng trong năm 2007?

SELECT MATHANG.TenHang, SUM(SoLuong * (GiaBan - MucGiamGia)) AS LoiNhuan
FROM CHITIETDATHANG
INNER JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
WHERE YEAR(ChITIETDATHANG.NgayDatHang) = 2007
GROUP BY MATHANG.TenHang;
-- Số lượng hàng còn lại của mỗi mặt hàng mà công ty đã có (tổng số lượng hàng hiện có và đã bán)?

SELECT MATHANG.TenHang, MATHANG.SoLuong - COALESCE(SUM(CHITIETDATHANG.SoLuong), 0) AS SoLuongConLai
FROM MATHANG
LEFT JOIN CHITIETDATHANG ON MATHANG.MaHang = CHITIETDATHANG.MaHang
GROUP BY MATHANG.TenHang, MATHANG.SoLuong;
-- Nhân viên nào của công ty bán được số lượng hàng nhiều nhất và số lượng hàng bán được của những nhân viên này là bao nhiêu?

SELECT NHANVIEN.MaNhanVien, NHANVIEN.Ten, SUM(CHITIETDATHANG.SoLuong) AS SoLuongBanDuoc
FROM NHANVIEN
INNER JOIN DONDATHANG ON NHANVIEN.MaNhanVien = DONDATHANG.MaNhanVien
INNER JOIN CHITIETDATHANG ON DONDATHANG.SoHoaDon = CHITIETDATHANG.SoHoaDon
GROUP BY NHANVIEN.MaNhanVien, NHANVIEN.Ten
ORDER BY SoLuongBanDuoc DESC
LIMIT 1;
-- Đơn đặt hàng nào có số lượng hàng được đặt mua ít nhất?

SELECT DONDATHANG.SoHoaDon, MIN(CHITIETDATHANG.SoLuong) AS SoLuongMin
FROM DONDATHANG
INNER JOIN CHITIETDATHANG ON DONDATHANG.SoHoaDon = CHITIETDATHANG.SoHoaDon
GROUP BY DONDATHANG.SoHoaDon
ORDER BY SoLuongMin;
-- Số tiền nhiều nhất mà khách hàng đã từng bỏ ra để đặt hàng trong các đơn đặt hàng là bao nhiêu?

SELECT KHACHHANG.TenGiaoDich, MAX(SoLuong * (GiaBan - MucGiamGia)) AS SoTienMax
FROM CHITIETDATHANG
INNER JOIN DONDATHANG ON CHITIETDATHANG.SoHoaDon = DONDATHANG.SoHoaDon
INNER JOIN KHACHHANG ON DONDATHANG.MaKhachHang = KHACHHANG.MaKhachHang
GROUP BY KHACHHANG.TenGiaoDich;
-- Mỗi một đơn đặt hàng đặt mua những mặt hàng nào và tổng số tiền của đơn đặt hàng?

SELECT DONDATHANG.SoHoaDon, GROUP_CONCAT(MATHANG.TenHang) AS MatHangDaDat, SUM(CHITIETDATHANG.SoLuong * (MATHANG.GiaHang - CHITIETDATHANG.MucGiamGia)) AS TongTien
FROM CHITIETDATHANG
INNER JOIN DONDATHANG ON CHITIETDATHANG.SoHoaDon = DONDATHANG.SoHoaDon
INNER JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
GROUP BY DONDATHANG.SoHoaDon;
-- Mỗi một loại hàng bao gồm những mặt hàng nào, tổng số lượng của mỗi loại và tổng số lượng của tất cả các mặt hàng hiện có trong công ty?

SELECT LOAIHANG.TenLoaiHang, GROUP_CONCAT(MATHANG.TenHang) AS MatHangTrongLoai,
       SUM(MATHANG.SoLuong) AS TongSoLuongTrongLoai,
       (SELECT SUM(SoLuong) FROM MATHANG) AS TongSoLuongTatCaMatHang
FROM MATHANG
INNER JOIN LOAIHANG ON MATHANG.MaLoaiHang = LOAIHANG.MaLoaiHang
GROUP BY LOAIHANG.TenLoaiHang;
-- Thống kê trong năm 2007 mỗi một mặt hàng trong mỗi tháng và trong cả năm bán được với số lượng bao nhiêu?

SELECT MATHANG.MaHang, MATHANG.TenHang,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 1 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang1,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 2 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang2,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 3 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang3,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 4 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang4,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 5 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang5,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 6 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang6,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 7 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang7,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 8 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang8,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 9 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang9,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 10 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang10,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 11 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang11,
       SUM(CASE WHEN MONTH(DONDATHANG.NgayDatHang) = 12 THEN CHITIETDATHANG.SoLuong ELSE 0 END) AS Thang12,
       SUM(CHITIETDATHANG.SoLuong) AS TongNam
FROM CHITIETDATHANG
INNER JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
INNER JOIN DONDATHANG ON CHITIETDATHANG.SoHoaDon = DONDATHANG.SoHoaDon
WHERE YEAR(DONDATHANG.NgayDatHang) = 2007
GROUP BY MATHANG.MaHang, MATHANG.TenHang
ORDER BY MATHANG.MaHang;

-- Cập nhật lại giá thị trường NGAYCHUYENHANG của những bản ghi có NGAYCHUYENHANG chưa xác định (NULL) trong bảng DONDATHANG bằng với giá trị của trường NGAYDATHANG:

UPDATE DONDATHANG
SET NGAYCHUYENHANG = NGAYDATHANG
WHERE NGAYCHUYENHANG IS NULL;
-- Tăng số lượng hàng của những mặt hàng do công ty VINAMILK cung cấp lên gấp đôi:

UPDATE MATHANG
SET SoLuong = SoLuong * 2
WHERE MaCongTy = 'VNM';
-- Cập nhật giá trị của trường NOIGIAOHANG trong bảng DONDATHANG bằng địa chỉ của khách hàng đối với những đơn đặt hàng chưa xác định được nơi giao hàng (giá trị trường NOIGIAOHANG bằng NULL):

UPDATE DONDATHANG
SET NOIGIAOHANG = KHACHHANG.DiaChi
FROM DONDATHANG
INNER JOIN KHACHHANG ON DONDATHANG.MaKhachHang = KHACHHANG.MaKhachHang
WHERE NOIGIAOHANG IS NULL;
-- Cập nhật lại dữ liệu trong bảng KHACHHANG sao cho nếu tên công ty và tên giao dịch của khách hàng trùng với tên công ty và tên giao dịch của một nhà cung cấp nào đó thì địa chỉ, điện thoại, fax và e-mail phải giống nhau:

UPDATE KHACHHANG
SET KHACHHANG.DiaChi = NHACUNGCAP.DiaChi,
    KHACHHANG.DienThoai = NHACUNGCAP.DienThoai,
    KHACHHANG.Fax = NHACUNGCAP.Fax,
    KHACHHANG.Email = NHACUNGCAP.Email
FROM KHACHHANG
INNER JOIN NHACUNGCAP ON KHACHHANG.TenCongTy = NHACUNGCAP.TenCongTy AND KHACHHANG.TenGiaoDich = NHACUNGCAP.TenGiaoDich;
-- Tăng lương lên gấp đôi cho những nhân viên bán được số lượng hàng nhiều hơn 100 trong năm 2003:

UPDATE NHANVIEN
SET LuongCoBan = LuongCoBan * 2
WHERE MaNhanVien IN (
    SELECT DISTINCT NHANVIEN.MaNhanVien
    FROM NHANVIEN
    INNER JOIN DONDATHANG ON NHANVIEN.MaNhanVien = DONDATHANG.MaNhanVien
    INNER JOIN CHITIETDATHANG ON DONDATHANG.SoHoaDon = CHITIETDATHANG.SoHoaDon
    WHERE YEAR(DONDATHANG.NgayDatHang) = 2003
    GROUP BY NHANVIEN.MaNhanVien
    HAVING SUM(CHITIETDATHANG.SoLuong) > 100
);
-- Tăng phụ cấp lên bằng 50% lương cho những nhân viên bán được hàng nhiều nhất:

UPDATE NHANVIEN
SET PhuCap = PhuCap + (LuongCoBan * 0.5)
WHERE MaNhanVien IN (
    SELECT TOP 1 MaNhanVien
    FROM (
        SELECT NHANVIEN.MaNhanVien, SUM(CHITIETDATHANG.SoLuong) AS TongSoLuongBanDuoc
        FROM NHANVIEN
        INNER JOIN DONDATHANG ON NHANVIEN.MaNhanVien = DONDATHANG.MaNhanVien
        INNER JOIN CHITIETDATHANG ON DONDATHANG.SoHoaDon = CHITIETDATHANG.SoHoaDon
        GROUP BY NHANVIEN.MaNhanVien
        ORDER BY TongSoLuongBanDuoc DESC
    ) AS NhanVienBanNhieuNhat
);
-- Giảm 25% lương của những nhân viên trong năm 2003 không lập được bất kỳ đơn đặt hàng nào:

UPDATE NHANVIEN
SET LuongCoBan = LuongCoBan - (LuongCoBan * 0.25)
WHERE MaNhanVien NOT IN (
    SELECT DISTINCT DONDATHANG.MaNhanVien
    FROM DONDATHANG
    WHERE YEAR(DONDATHANG.NgayDatHang) = 2003
);
-- Giả sử trong bảng DONDATHANG có thêm trường SOTIEN cho biết số tiền mà khách hàng phải trả trong mỗi đơn đặt hàng. Hãy tính giá trị cho trường này. (Chú ý: SOTIEN = SUM(SoLuong * (GiaBan - MucGiamGia)) cho từng đơn đặt hàng)

UPDATE DONDATHANG
SET SOTIEN = (
    SELECT SUM(CHITIETDATHANG.SoLuong * (MATHANG.GiaHang - CHITIETDATHANG.MucGiamGia))
    FROM CHITIETDATHANG
    INNER JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
    WHERE CHITIETDATHANG.SoHoaDon = DONDATHANG.SoHoaDon
)
WHERE SOTIEN IS NULL;

-- Xoá khỏi bảng NHANVIEN những nhân viên đã làm việc trong công ty quá 40 năm:

DELETE FROM NHANVIEN
WHERE DATEDIFF(YEAR, NgayLamViec, GETDATE()) >= 40;
-- Xoá những đơn đặt hàng trước năm 2000 ra khỏi cơ sở dữ liệu:

DELETE FROM DONDATHANG
WHERE YEAR(NgayDatHang) < 2000;
-- Xoá khỏi bảng LOAIHANG những loại hàng hiện không có mặt hàng:

DELETE FROM LOAIHANG
WHERE MaLoaiHang NOT IN (SELECT DISTINCT MaLoaiHang FROM MATHANG);
-- Xoá khỏi bảng KHACHHANG những khách hàng hiện không có bất kỳ đơn đặt hàng nào cho công ty:

DELETE FROM KHACHHANG
WHERE MaKhachHang NOT IN (SELECT DISTINCT MaKhachHang FROM DONDATHANG);
-- Xoá khỏi bảng MATHANG những mặt hàng có số lượng bằng 0 và không được đặt mua trong bất kỳ đơn đặt hàng nào:

DELETE FROM MATHANG
WHERE SoLuong = 0 AND MaHang NOT IN (SELECT DISTINCT MaHang FROM CHITIETDATHANG);
-- Sau khi thực hiện các câu lệnh DELETE này, hãy nhớ là dữ liệu sẽ bị xoá và không thể khôi phục, hãy đảm bảo bạn đã sao lưu dữ liệu quan trọng trước khi thực hiện.



-- Select khách hàng chỉ mua mặt hàng có ID = TP07 mà không mua mặt hàng nào khác:

SELECT KHACHHANG.MaKhachHang, KHACHHANG.TenGiaoDich
FROM KHACHHANG
LEFT JOIN DONDATHANG ON KHACHHANG.MaKhachHang = DONDATHANG.MaKhachHang
LEFT JOIN CHITIETDATHANG ON DONDATHANG.SoHoaDon = CHITIETDATHANG.SoHoaDon
LEFT JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
WHERE MATHANG.MaLoaiHang = 'TP' AND MATHANG.MaHang = 'TP07'
GROUP BY KHACHHANG.MaKhachHang, KHACHHANG.TenGiaoDich
HAVING COUNT(DISTINCT MATHANG.MaHang) = 1;
-- Select khách hàng có mua 2 mặt hàng trở lên. Trong đó phải có mặt hàng TP07 và không có mặt hàng MM01:

SELECT KHACHHANG.MaKhachHang, KHACHHANG.TenGiaoDich
FROM KHACHHANG
LEFT JOIN DONDATHANG ON KHACHHANG.MaKhachHang = DONDATHANG.MaKhachHang
LEFT JOIN CHITIETDATHANG ON DONDATHANG.SoHoaDon = CHITIETDATHANG.SoHoaDon
LEFT JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
WHERE MATHANG.MaLoaiHang = 'TP' AND MATHANG.MaHang = 'TP07'
    AND KHACHHANG.MaKhachHang NOT IN (
        SELECT DISTINCT KHACHHANG.MaKhachHang
        FROM KHACHHANG
        LEFT JOIN DONDATHANG ON KHACHHANG.MaKhachHang = DONDATHANG.MaKhachHang
        LEFT JOIN CHITIETDATHANG ON DONDATHANG.SoHoaDon = CHITIETDATHANG.SoHoaDon
        LEFT JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
        WHERE MATHANG.MaLoaiHang = 'MM' AND MATHANG.MaHang = 'MM01'
    )
GROUP BY KHACHHANG.MaKhachHang, KHACHHANG.TenGiaoDich
HAVING COUNT(DISTINCT MATHANG.MaHang) >= 2;

-- Select mã đơn hàng có mua cả DT01, DT02, DT03 và DT04 nhưng không mua DC01 hoặc TP03:
SELECT DONDATHANG.SoHoaDon
FROM DONDATHANG
LEFT JOIN CHITIETDATHANG ON DONDATHANG.SoHoaDon = CHITIETDATHANG.SoHoaDon
LEFT JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
WHERE MATHANG.MaHang IN ('DT01', 'DT02', 'DT03', 'DT04')
    AND DONDATHANG.SoHoaDon NOT IN (
        SELECT DISTINCT DONDATHANG.SoHoaDon
        FROM DONDATHANG
        LEFT JOIN CHITIETDATHANG ON DONDATHANG.SoHoaDon = CHITIETDATHANG.SoHoaDon
        LEFT JOIN MATHANG ON CHITIETDATHANG.MaHang = MATHANG.MaHang
        WHERE MATHANG.MaHang IN ('DC01', 'TP03')
    )
GROUP BY DONDATHANG.SoHoaDon
HAVING COUNT(DISTINCT MATHANG.MaHang) = 4;


