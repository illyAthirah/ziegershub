<?php
     $filepath = realpath(dirname(__FILE__));
     include_once($filepath.'/../lib/database.php');
     include_once($filepath.'/../helpers/format.php');
?>
<?php
    class brand 
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_brand($brandName)
        {
            // kiểm tra xem có chứa từ nào có hợp lệ hay không
            $brandName = $this->fm->validation($brandName);
            // kết nối với cơ sở dữ liệu
            $brandName = mysqli_real_escape_string($this->db->link, $brandName);

            if (empty($brandName)) {
                $alert = "Category không được bỏ trống";
                return $alert;
            } else {
                $query = "INSERT INTO brand(brandName) VALUES('$brandName')";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = "<span class='success'> Add thành công  </span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'> Add không thành công  </span>";
                    return $alert;
                }
            }
        }

        public function show_brand()
        {
            $query = "SELECT * FROM brand order by brandId desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function getbrandbyId($id)
        {
            $query = "SELECT * FROM brand where brandId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_brand($brandName,$id)
        {
            // kiểm tra xem có chứa từ nào có hợp lệ hay không
            $brandName = $this->fm->validation($brandName);
            // kết nối với cơ sở dữ liệu
            $brandName = mysqli_real_escape_string($this->db->link, $brandName);
            $id = mysqli_real_escape_string($this->db->link, $id);
            if (empty($brandName)) {
                $alert = "Category không được bỏ trống";
                return $alert;
            } else {
                $query = "UPDATE brand SET brandName = '$brandName' WHERE brandId = '$id'";
                $result = $this->db->update($query);
                if ($result) {
                    $alert = "<span class='success'> Cập nhập thành công  </span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'> Cập nhập không thành công  </span>";
                    return $alert;
                }
            }
        }
        public function del_brand($id) {
            $query = "DELETE FROM brand where brandId = '$id'";
            $result = $this->db->delete($query);
            if ($result) {
                $alert = "<span class='success'> Delete thành công  </span>";
                return $alert;
            } else {
                $alert = "<span class='error'> Delete không thành công  </span>";
                return $alert;
            }
        }
        public function showBrand()
        {
            $query = "SELECT * FROM brand";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>