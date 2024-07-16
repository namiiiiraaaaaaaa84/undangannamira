CREATE TABLE guests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    checkin DATETIME NULL,
    status ENUM('Hadir', 'Tidak Hadir') DEFAULT 'Tidak Hadir'
);