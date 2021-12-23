JADI PERTAMA : kalian buat database dulu dengan nama db_dewankomputer 


KEDUA : kalian copy ini ke SQL nya, CREATE TABLE `tbl_komentar`  (
                                      `komentar_id` int(11) NOT NULL AUTO_INCREMENT,
                                      `parent_komentar_id` int(11) NOT NULL,
                                      `komentar` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
                                      `nama_pengirim` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
                                      `date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
                                      PRIMARY KEY (`komentar_id`) USING BTREE
                                    );
                                    
                                    
KETIGA : isiin script ini ke dalam table yang tadi udh di buat :
        INSERT INTO `tbl_komentar` VALUES (1, 0, 'tes komentar 1', 'Dewan', '2019-03-22 18:57:03');
        INSERT INTO `tbl_komentar` VALUES (2, 1, 'balasan komentar 1', 'Komputer', '2019-03-22 18:57:13');
        INSERT INTO `tbl_komentar` VALUES (3, 2, 'balasan anak komentar 1', 'Dini', '2019-03-22 18:57:34');
        INSERT INTO `tbl_komentar` VALUES (4, 1, 'Balasan Komentar 2', 'Dono', '2019-03-22 18:57:49');
        
        
MUDAH DI MENGERTI SEMOGA HARI MU MENYENANGKAN:))
