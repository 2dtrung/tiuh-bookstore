<?php
    include('database.php');
    class M_tintuc extends database {
        public function getSlice() {
            $sql="SELECT * FROM slide";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
        public function getMenu() {
            $sql="SELECT tl.id as idTheLoai,tl.Ten,tl.TenKhongDau,GROUP_CONCAT(DISTINCT lt.id,':',lt.ten,':',lt.TenKhongDau) AS LoaiTin,tt.id,tt.TieuDe,tt.TieuDeKhongDau,tt.TomTat,tt.NoiDung,tt.Hinh FROM theloai as tl JOIN loaitin as lt JOIN tintuc as tt
             WHERE lt.idTheLoai=tl.id AND tt.idLoaiTin=lt.id AND tt.NoiBat=1 GROUP BY tl.id";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
        public function getNewsById($id,$vitri=-1,$limit=-1) {
            $sql="SELECT * FROM tintuc WHERE idLoaiTin=$id";
            if($vitri >=0 && $limit >1) {
                $sql="SELECT * FROM tintuc WHERE idLoaiTin=$id LIMIT $vitri,$limit";
                $this->setQuery($sql);
                return $this->loadAllRows(array($id,$vitri,$limit));
            }
            else {
                $this->setQuery($sql);
                return $this->loadAllRows(array($id));
            };
        }
        public function getTypeNewsById($id) {
            $sql="SELECT * FROM loaitin WHERE id=$id";
            $this->setQuery($sql);
            return $this->loadRow(array($id));
        }
        public function getAllNewsbyId($id) {
            $sql="SELECT * FROM tintuc as tt JOIN loaitin as lt WHERE tt.idLoaiTin=lt.id";
            $this->setQuery($sql);
            return $this->loadAllRows(array($id));
        }
        public function getChiTietTinById($id) {
            $sql="SELECT * FROM tintuc WHERE id=$id";
            $this->setQuery($sql);
            return $this->loadRow(array($id));
        }
        public function getCommentById($id) {
            $sql="SELECT * FROM comment as cm JOIN users as us WHERE cm.idTinTuc=$id AND cm.idUser=us.id";
            $this->setQuery($sql);
            return $this->loadAllRows(array($id));
        }
        public function getRelatedNews($id) {
            $sql="SELECT * FROM tintuc WHERE idLoaiTin = (SELECT idLoaiTin FROM tintuc WHERE id =$id) ORDER BY id DESC LIMIT 4";
            $this->setQuery($sql);
            return $this->loadAllRows(array($id));
        }
        public function getHlNews($id) {
            $sql= "SELECT * FROM tintuc WHERE idLoaiTin = (SELECT idLoaiTin FROM tintuc WHERE id =$id ) ORDER BY id DESC LIMIT 4";
            $this->setQuery($sql);
            return $this->loadAllRows(array($id));
        }
        public function addComment($id_user,$id_tin,$noidung) {
            $sql="INSERT INTO comment(idUser,idTinTuc,NoiDung) VALUES(?,?,?)";
            $this->setQuery($sql);
            return $this->execute(array($id_user,$id_tin,$noidung));
        }
        public function serach($key) {
            $sql="SELECT * FROM TINTUC ";
        }
    }
?>