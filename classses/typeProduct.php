<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>
<?php
    class typeProduct 
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_type_product($data)
        {
            // kết nối với cơ sở dữ liệu
            $typeProductID  = mysqli_real_escape_string($this->db->link, $data["typeProductID"]);
            $typeProductName = mysqli_real_escape_string($this->db->link, $data["typeProductName"]);
            $catID  = mysqli_real_escape_string($this->db->link, $data["category"]);
            if ($typeProductName==""||  $catID=="") {
                $alert = "Không được bỏ trống";
                return $alert;
            } else {
                $query = "INSERT INTO type_product(typeProductID,typeProductName,catID) VALUES('$typeProductID',
                '$typeProductName','$catID')";
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
        public function show_type_product_ao()
        {
            $query = "SELECT t_pd.*
                FROM type_product AS t_pd INNER JOIN category AS cat ON t_pd.catID =cat.catId   
                WHERE cat.catId  = '40'
                order by t_pd.typeProductID  desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_type_product_aokhoac()
        {
            $query = "SELECT t_pd.*
            FROM type_product AS t_pd INNER JOIN category AS cat ON t_pd.catID =cat.catId   
            WHERE cat.catId  = '41'
            order by t_pd.typeProductID  desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_type_product_quan()
        {
            $query = "SELECT t_pd.*
            FROM type_product AS t_pd INNER JOIN category AS cat ON t_pd.catID =cat.catId   
            WHERE cat.catId  = '42'
            order by t_pd.typeProductID  desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_type_product_chanvay()
        {
            $query = "SELECT t_pd.*
            FROM type_product AS t_pd INNER JOIN category AS cat ON t_pd.catID =cat.catId   
            WHERE cat.catId  = '43'
            order by t_pd.typeProductID  desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_type_product_dam()
        {
            $query = "SELECT t_pd.*
            FROM type_product AS t_pd INNER JOIN category AS cat ON t_pd.catID =cat.catId   
            WHERE cat.catId  = '44'
            order by t_pd.typeProductID  desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_type_product_DOLOT()
        {
            $query = "SELECT t_pd.*
            FROM type_product AS t_pd INNER JOIN category AS cat ON t_pd.catID =cat.catId   
            WHERE cat.catId  = '45'
            order by t_pd.typeProductID  desc";
            $result = $this->db->select($query);
            return $result;
        }
        //
        public function show_type_product()
        {
            $query = "SELECT t_pd.* , cat.catName
                FROM type_product AS t_pd INNER JOIN category AS cat ON t_pd.catID =cat.catId   
                order by t_pd.typeProductID  desc";
            $result = $this->db->select($query);
            return $result;
        }
        
        public function getTypeProductById($id)
        {
            $query = "SELECT * FROM type_product where typeProductID = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_type_product($data,$id){
            $typeProductName = mysqli_real_escape_string($this->db->link, $data['typeProductName']);
            $catID  = mysqli_real_escape_string($this->db->link, $data["category"]);
            if(empty($typeProductName) || empty($catID) ) {
                $alert = "<span class='success'>Không được để trống</span>  ";
                return $alert;
            } else {
                $query = "UPDATE type_product SET typeProductName='$typeProductName' , catID='$catID' 
                WHERE typeProductID  = '$id'";
                $result = $this->db->insert($query);
                if($result) {
                    $alert = "
                      <span class='success'>Chỉnh Edit thành công</span>  
                    ";
                    return $alert;
                } else {
                    $alert = "
                      <span class='error'>Không thành công</span>  
                    ";
                    return $alert;
                }
            }
        }
        public function del_type_product($id) {
            $query = "DELETE FROM type_product where typeProductID = '$id'";
            $result = $this->db->delete($query);
            if ($result) {
                $alert = "<span class='success'> Delete thành công  </span>";
                return $alert;
            } else {
                $alert = "<span class='error'> Delete không thành công  </span>";
                return $alert;
            }
        }
        
    }
?>