-- Câu 1
DELIMITER //
CREATE PROCEDURE procedureCau1(n INT(11))
BEGIN
 UPDATE NHANVIEN n JOIN
   (SELECT d.MaNhanVien, SUM(c.SoLuong) AS SoLuong
   FROM DONDATHANG d JOIN CHITIETDATHANG c ON d.SoHoaDon = c.SoHoaDon
   GROUP BY d.MaNhanVien
   ORDER BY SoLuong DESC
   LIMIT 0,n) AS T ON n.MaNhanVien = T.MaNhanVien
 SET n.LuongCoBan = n.LuongCoBan + 500000;
END //

-- Câu 2
DELIMITER //
CREATE FUNCTION TinhLuongNhanVien(ma_nhan_vien char(4))
RETURNS DECIMAL(10, 2)
BEGIN
    DECLARE luong DECIMAL(10, 2);
    SELECT (LuongCoBan + PhuCap + T.TongTien * 0.1) INTO luong
    FROM NHANVIEN d JOIN (
     SELECT d.MaNhanVien, SUM(c.SoLuong * (c.GiaBan - c.MucGiamGia)) AS TongTien
	 FROM DONDATHANG d JOIN CHITIETDATHANG c ON d.SoHoaDon = c.SoHoaDon
	 GROUP BY d.MaNhanVien
    ) AS T ON d.MaNhanVien = T.MaNhanVien
    WHERE d.MaNhanVien = ma_nhan_vien;
    RETURN luong;
END; 
SELECT TinhLuongNhanVien('A001')

-- Câu 3
DROP TRIGGER IF EXISTS After_ChiTietDatHang_Insert;
DELIMITER //
 CREATE TRIGGER After_ChiTietDatHang_Insert
 AFTER INSERT ON CHITIETDATHANG  
 FOR EACH ROW
BEGIN
 UPDATE DONDATHANG 
 SET SoTien = SoTien + NEW.SoLuong * (NEW.GiaBan - New.MucGiamGia)
 WHERE SoHoaDon = NEW.SoHoaDon;
END //

-- Câu 4
CREATE TABLE PHONGBAN(
 MaPhongBan CHAR(4) primary key,
 TenPhongBan VARCHAR(50),
 SoThanhVien INT
);

CREATE TABLE PHONGBAN_NHANVIEN(
 MaPhongBan CHAR(4),
 MaNhanVien CHAR(4),
 foreign key (MaPhongBan) references PHONGBAN(MaPhongBan),
 foreign key (MaNhanVien) references NHANVIEN(MaNhanVien)
);

INSERT INTO `QLBH`.`PHONGBAN`(`MaPhongBan`,`TenPhongBan`)
VALUES
('PB01','Kế toán'),
('PB02','Hành chính'),
('PB03','Kiểm toán'),
('PB04','Chăm sóc khách hàng'),
('PB05','Nhân sự'),
('PB06','Công nghệ thông tin'),
('PB07','Quan hệ quốc tế'),
('PB08','Marketing');

DROP TRIGGER IF EXISTS After_PhongBan_NhanVien_Insert;
DELIMITER //
 CREATE TRIGGER After_PhongBan_NhanVien_Insert
 AFTER INSERT ON PHONGBAN_NHANVIEN  
 FOR EACH ROW
BEGIN
 UPDATE PHONGBAN 
 SET SoThanhVien = IFNULL(SoThanhVien,0) + 1
 WHERE MaPhongBan = NEW.MaPhongBan;
END //

DROP TRIGGER IF EXISTS Before_PhongBan_NhanVien_Delete;
DELIMITER //
 CREATE TRIGGER Before_PhongBan_NhanVien_Delete
 BEFORE DELETE ON PHONGBAN_NHANVIEN  
 FOR EACH ROW
BEGIN
 UPDATE PHONGBAN 
 SET SoThanhVien = IFNULL(SoThanhVien,0) - 1
 WHERE MaPhongBan = OLD.MaPhongBan;
END //

INSERT INTO `QLBH`.`PHONGBAN_NHANVIEN`(`MaPhongBan`,`MaNhanVien`)
VALUES
('PB05', 'A001' ),
('PB05', 'D001' ),
('PB05', 'H001' ),
('PB01', 'H002' ),
('PB01', 'H003' ),
('PB02', 'A001' ),
('PB03', 'Q001' );

-- Câu 5
DROP TRIGGER IF EXISTS Before_NhanVien_Insert;
DELIMITER //
 CREATE TRIGGER Before_NhanVien_Insert
 BEFORE INSERT ON NHANVIEN  
 FOR EACH ROW
BEGIN
 IF TIMESTAMPDIFF(YEAR, NEW.NgaySinh, NOW()) < 18 OR TIMESTAMPDIFF(YEAR, NEW.NgaySinh, NOW()) > 60 THEN 
  SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Nhan vien phai tu 18 tuoi den 60";
 END IF;
END //

DROP TRIGGER IF EXISTS Before_NhanVien_Update;
DELIMITER //
 CREATE TRIGGER Before_NhanVien_Update
 BEFORE UPDATE ON NHANVIEN  
 FOR EACH ROW
BEGIN
 IF TIMESTAMPDIFF(YEAR, NEW.NgaySinh, NOW()) < 18 OR TIMESTAMPDIFF(YEAR, NEW.NgaySinh, NOW()) > 60 THEN 
  SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Nhan vien phai tu 18 tuoi den 60";
 END IF;
END //
