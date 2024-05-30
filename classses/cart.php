<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>
<?php
    class cart 
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        // Add Products vào Shopping cart
        public function addProduct_cart($id,$quantity,$size, $userId)
        {
            // kiểm tra xem có chứa từ nào có hợp lệ hay không
            $quantity = $this->fm->validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $id = mysqli_real_escape_string($this->db->link,$id);
            $sesId = session_id();
            $query = "SELECT * FROM  product WHERE productId = '$id'";
            $result =  $this->db->select($query)->fetch_assoc();
            // kiểm tra Products đã tồn tại trong Shopping cart hay chưa
            $check_cart = "SELECT * FROM cart WHERE productId = $id AND sessionId ='$sesId' AND userId='$userId'";
			$result_check_cart = $this->db->select($check_cart);
            if($result_check_cart){
				$msg = "<span class='error'>Products đã được Add vào</span>";
				return $msg;
			} else {
                $SPName = $result['productName'];
                $SPPrice = $result['price'];
                $image = $result['image'];
                $size=$size;
                $query_insert = "INSERT INTO cart(productId,sessionId,productName,size,price,quantity,image,userId) VALUES('$id',
                '$sesId','$SPName','$size','$SPPrice','$quantity','$image','$userId')";
                $result_insert = $this->db->insert($query_insert);
                if ($result_insert) {
                    header('Location:cart.php');
                } else {
                    $alert = "<span class='error'> Add không thành công  </span>"; 
                    return $alert;
                }
            }
        }
        // hiển thị  Products trong Shopping cart
        public function getProductCart($userId){
            $sesId = session_id();
            $query = "SELECT * FROM cart
            WHERE sessionId = '$sesId' AND userId='$userId'";
            $result = $this->db->select($query);
            return $result;
        }  
        /* Update quantity in cart*/
		public function updateQuantity($cartId, $quantity,$userId){
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$id = mysqli_real_escape_string($this->db->link, $cartId);

			$query = "UPDATE cart SET quantity = '$quantity' WHERE cartID = '$id' AND userId='$userId'";
			$result = $this->db->update($query);
			if($result) {
				$msg = "";
                return $msg;
			} else {
				$msg = "<span class='error'>Cập nhật không thành công</span>";
				return $msg;
			}
		}
        /*update quantity va size neu san pham da co trong gio hang */
		public function updateQuantityandSize($size, $quantity, $idProduct, $userId){
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$size = mysqli_real_escape_string($this->db->link, $size);
			$id = mysqli_real_escape_string($this->db->link, $idProduct);

			$query = "UPDATE cart SET quantity = '$quantity' , size = '$size' WHERE productId = '$id' AND userId='$userId'";
			$result = $this->db->update($query);
		}

         // Delete Products ra khỏi Shopping cart
         public function del_ProductCart($cartId,$userId){
             $Id = mysqli_real_escape_string($this->db->link,$cartId);
             $query_del = "DELETE FROM cart WHERE cartId = '$Id' AND userId='$userId'";
             $result_del = $this->db->delete($query_del);    
             if ($result_del) {
                //  echo "<script type='text/javascript'>window.location.href = 'cart.php'</script>";
             } else {
                 $msg = "Delete Products không thành công";
                 return $msg;
             }
        }
        /* Check cart */
		public function checkCart($userId){
			$sId = session_id();
			$query = "SELECT * FROM cart WHERE sessionId = '$sId' AND userId='$userId'";
			$result = $this->db->select($query);
			return $result;
		}
        /*Delete data của bảng cart*/
        public function del_Cart($userId){
            $sesId = session_id();
            $query_del = "DELETE FROM cart WHERE userId='$userId'";
            $result_del = $this->db->delete($query_del);    
            if ($result_del) {
               //  echo "<script type='text/javascript'>window.location.href = 'cart.php'</script>";
            } else {
                $msg = "Delete Products không thành công";
                return $msg;
            }
       }
        public function showCart($userId)
        {
            $query = "SELECT ct.* , pd.productName , pd.price , pd.image
            FROM cart AS ct 
            INNER JOIN product AS pd ON ct.productId=pd.productId  
            WHERE userId='$userId'  
            order by pd.productId desc"; 
            $result = $this->db->select($query);
            return $result;
        }
    }
?>