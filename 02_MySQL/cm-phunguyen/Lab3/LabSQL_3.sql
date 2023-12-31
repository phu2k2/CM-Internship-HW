 -- Câu 1 ----

DELIMITER //
CREATE PROCEDURE SalaryIncrease(IN n INT)
BEGIN
	UPDATE NHANVIEN N
	JOIN (
		SELECT D.MaNhanVien,SUM(C.SoLuong) AS TongSoLuong
        FROM NHANVIEN N
		JOIN DONDATHANG D ON N.MaNhanVien = D.MaNhanVien
		JOIN CHITIETDATHANG C ON D.SoHoaDon = C.SoHoaDon
		GROUP BY D.MaNhanVien
		ORDER BY TongSoLuong DESC
        LIMIT n
	) Subquery ON N.MaNhanVien = Subquery.MaNhanVien 
	SET N.LuongCoBan = N.LuongCoBan + 500000;
END //
DELIMITER ; 
call SalaryIncrease(3);

 -- Câu 2 ----
DELIMITER $$
CREATE FUNCTION LuongNhanVien(nhanvien_id CHAR(4))
RETURNS DECIMAL(10,2)
DETERMINISTIC 
READS SQL DATA
BEGIN
	DECLARE luong DECIMAL(10,2) ;
    SELECT (N.LuongCoBan + N.PhuCap + (SUM(C.SoLuong * C.GiaBan)* 0.1)) INTO luong
	FROM NHANVIEN N
	JOIN DONDATHANG D ON N.MaNhanVien = D.MaNhanVien
	JOIN CHITIETDATHANG C ON D.SoHoaDon = C.SoHoaDon
    WHERE N.MaNhanVien = nhanvien_id
    GROUP BY D.SoHoaDon;
	
    RETURN luong;

END;
$$
DELIMITER ; 


 -- Câu 3 ----
ALTER TABLE DONDATHANG
ADD COLUMN TongTien DECIMAL(10,2) DEFAULT 0 ;


DELIMITER //
CREATE TRIGGER UpdateTongLuong AFTER INSERT ON CHITIETDATHANG
FOR EACH ROW
BEGIN
	UPDATE DONDATHANG 
    SET TongTien = TongTien + (NEW.GiaBan * NEW.SoLuong) - (NEW.MucGiamGia * NEW.SoLuong)
    WHERE SoHoaDon = NEW.SoHoaDon;
END //
DELIMITER ; 


 -- Câu 4 ----

CREATE TABLE PHONGBAN(
	MaPhongBan CHAR(4) PRIMARY KEY,
	TenPhongBan VARCHAR(15),
	SoLuongNhanVien INT
);
CREATE TABLE CHITIETPHONGBAN(
	MaPhongBan CHAR(4),
	MaNhanVien CHAR(4),
    CONSTRAINT PK_CHITIETPHONGBAN PRIMARY KEY (MaPhongBan, MaNhanVien),
    CONSTRAINT FK_CHITIETPHONGBAN_MaPhongBan FOREIGN KEY (MaPhongBan) REFERENCES PHONGBAN(MaPhongBan),
    CONSTRAINT FK_CHITIETPHONGBAN_MaNhanVien FOREIGN KEY (MaNhanVien) REFERENCES NHANVIEN(MaNhanVien)
); 

DELIMITER //
CREATE TRIGGER updateSoLuongNhanVien AFTER INSERT ON CHITIETPHONGBAN
FOR EACH ROW
BEGIN
	UPDATE PHONGBAN 
    SET SoLuongNhanVien = SoLuongNhanVien + 1
    WHERE MaPhongBan = NEW.MaPhongBan;
END //
DELIMITER ; 


DELIMITER //
CREATE TRIGGER deleteSoLuongNhanVien AFTER INSERT ON CHITIETPHONGBAN
FOR EACH ROW
BEGIN
	UPDATE PHONGBAN 
    SET SoLuongNhanVien = SoLuongNhanVien - 1
    WHERE MaPhongBan = NEW.MaPhongBan;
END //
DELIMITER ; 

 -- Câu 5 ----


# Insert NhanVien
DELIMITER //
CREATE TRIGGER checkAgeForInsertEmployee
BEFORE INSERT ON NHANVIEN
FOR EACH ROW
BEGIN
	IF (
		TIMESTAMPDIFF(YEAR, New.NgaySinh, NOW()) < 18 OR 
		TIMESTAMPDIFF(YEAR, New.NgaySinh, NOW()) > 60
    	)
	THEN
		SIGNAL SQLSTATE '45000'
		SET MESSAGE_TEXT = 'NhanVien phai tu 18 tuoi den 60';
	END IF;
END;
//
DELIMITER ; 

#UpdateNhanVien
DELIMITER //
CREATE TRIGGER checkAgeForUpdateEmployee
BEFORE UPDATE ON NHANVIEN
FOR EACH ROW
BEGIN
	IF (
		TIMESTAMPDIFF(YEAR, New.NgaySinh, NOW()) < 18 OR 
		TIMESTAMPDIFF(YEAR, New.NgaySinh, NOW()) > 60
        )
	THEN
		SIGNAL SQLSTATE '45000' 
		SET MESSAGE_TEXT = 'NhanVien phai tu 18 tuoi den 60';
	END IF;
END;
//
DELIMITER ;















