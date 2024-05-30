<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
class user
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    // hien thi comment
    public function display_comment($producId)
    {
        $sql = "SELECT * FROM comment WHERE productId= '$producId' ORDER BY id DESC ";
        $result = $this->db->select($sql);
        return $result;
    }
    // them comment vao db
    public function insert_comments()
    {
        $product_id = $_GET['productId'];
        $tenbinhluan = $_POST['tenbinhluan'];
        $date_comment = $_POST['date_comment'];
        $comment = $_POST['content'];
        if ($tenbinhluan == "" || $comment == "" || $comment == ' ') {
            $alert = "<span class='fix_bug'>Please enter complete information</span>";
        } else {
            $query = "INSERT INTO comment(namebl,comment,productId,dateComment) VALUES('$tenbinhluan','$comment',' $product_id','$date_comment')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='fix'>Thank you for your feedback!</span>";
                return $alert;
            } else {
                $alert = "<span class='fix_bug'>Comment failed!</span>";
                return $alert;
            }
        }
    }
    // hien thi phan hoi
    public function display_rep_comment()
    {
        $sql = "SELECT tb.*, cm.namebl FROM  repcomment AS tb INNER JOIN comment AS cm ON tb.nameId=cm.id";
        $result = $this->db->select($sql);
        return $result;
    }
    // them rep conments vao db
    public function insert_rep_comments()
    {
        $nameId = $_POST['nameId'];
        $name_rep = $_POST['name_rep'];
        $rep_comment = $_POST['rep_content'];
        if ($rep_comment == "") {
            $alert = "<span class='fix_bug'>Please enter complete information</span>";
        } else {
            $query = "INSERT INTO repcomment(nameId,rep,namerep) VALUES('$nameId','$rep_comment',' $name_rep')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='fix'>Response successful!</span>";
                return $alert;
            } else {
                $alert = "<span class='fix_bug'> Error!</span>";
                return $alert;
            }
        }
    }
    // Add user vào DB
    public function insert_user($data)
    {
        // kết nối với cơ sở dữ liệu
        $username = mysqli_real_escape_string($this->db->link, $data["username"]);
        $password = mysqli_real_escape_string($this->db->link, md5($data["password"]));
        $relyPassword = mysqli_real_escape_string($this->db->link, md5($data["relyPassword"]));
        $name = mysqli_real_escape_string($this->db->link, $data["name"]);
        $email = mysqli_real_escape_string($this->db->link, $data["email"]);
        $phone = mysqli_real_escape_string($this->db->link, $data["phone"]);
        $sex = mysqli_real_escape_string($this->db->link, $data["sex"]);
        $date = mysqli_real_escape_string($this->db->link, $data["date"]);
        $address = mysqli_real_escape_string($this->db->link, $data["address"]);
        $cauHoiBiMat = mysqli_real_escape_string($this->db->link, $data["cauHoiBiMat"]);
        if (
            $username == "" ||  $password == "" ||  $relyPassword == "" ||  $name == "" ||  $email == ""
            ||  $phone == "" ||  $sex == "" ||  $date == "" ||  $address == "" ||  $cauHoiBiMat == ""
        ) {
            $alert = "<span class='error'>Please enter complete information</span>";
            return $alert;
        } else {
            if ($password != $relyPassword) {
                $alert = "<span class='error'> Passwords do not match </span>";
                return $alert;
            } else {
                $check_username = "SELECT * FROM user WHERE username='$username' AND email='$email'  LIMIT 1";
                $result_check = $this->db->select($check_username);
                if ($result_check) {
                    $alert = "<span class='error'> Your username already exists </span>";
                    return $alert;
                } else {
                    $check_email = "SELECT * FROM user WHERE email='$email'  LIMIT 1";
                    $result_mail = $this->db->select($check_email);
                    if ($result_mail) {
                        $alert = "<span class='error'> Your email is already registered </span>";
                        return $alert;
                    } else {
                        $query = "INSERT INTO user(name,username,userPassword,email,gender,phoneNum,dateOfBirth,address,secQuestion) VALUES('$name','$username','$password'
                        ,'$email','$sex','$phone','$date','$address','$cauHoiBiMat')";
                        $result = $this->db->insert($query);
                        if ($result) {
                            $alert = "<span class='success'> Registration successful  </span>";
                            return $alert;
                        } else {
                            $alert = "<span class='error'> Registration failed  </span>";
                            return $alert;
                        }
                    }
                }
            }
        }
    }
    // đăng nhập
    public function login_user($data)
    {
        $username = mysqli_real_escape_string($this->db->link, $data["username"]);
        $password = mysqli_real_escape_string($this->db->link, md5($data["password"]));
        if ($username == "" ||  $password == "") {
            $alert = "<span class='error'>Please enter complete information</span>";
            return $alert;
        } else {
            $check_username = "SELECT * FROM user WHERE username='$username' AND userPassword='$password'";
            $result = $this->db->select($check_username);
            if ($result) {
                $value = $result->fetch_assoc();
                // người dùng đã đăng nhập thành công rồi
                Session::set('user_login', true);
                Session::set('user_id', $value['userId']);
                Session::set('user_name', $value['name']);
                header('Location:index.php');
            } else {
                $alert = "<span class='error'> Invalid username or password </span>";
                return $alert;
            }
        }
    }
    public function show_User($userId)
    {
        $query = "SELECT *  FROM user WHERE userId = '$userId'";
        $result = $this->db->select($query);
        return $result;
    }
    // hiển hị Customer trong admin
    public function showKHAdmin()
    {
        $query = "SELECT us.* , SUM(od.total) AS sumTT
        FROM user AS us INNER JOIN tbl_order AS od ON us.userId =od.userId
        GROUP BY  od.userId
        ORDER BY od.userId";
        $result = $this->db->select($query);
        return $result;
    }
    // Delete Customer
    public function del_user($id)
    {
        $query = "DELETE FROM user where userId = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'> Deletion successful  </span>";
            return $alert;
        } else {
            $alert = "<span class='error'> Deletion failed  </span>";
            return $alert;
        }
    }
    public function showCauHoiBiMat($username, $cauHoiBiMat)
    {
        $cauHoiBiMat = mysqli_real_escape_string($this->db->link, $cauHoiBiMat);
        $username = mysqli_real_escape_string($this->db->link, $username);
        if ($cauHoiBiMat == "" || $username == "") {
            $alert = "<span class='error'>You have not entered a question.</span>";
            return $alert;
        } else {
            $update_user = "SELECT * FROM user WHERE username='$username' AND secQuestion='$cauHoiBiMat'";
            $result_check = $this->db->select($update_user);
            if ($result_check) {
                header('Location:resetPassword.php');
            }
        }
    }
    public function updatePass($data)
    {
        // kết nối với cơ sở dữ liệu
        $password = mysqli_real_escape_string($this->db->link, md5($data["passWord"]));
        $relyPassword = mysqli_real_escape_string($this->db->link, md5($data["RelypassWord"]));
        if ($password == "" ||  $relyPassword == "") {
            $alert = "<span class='error'>Please enter complete information</span>";
            return $alert;
        } else {
            if ($password != $relyPassword) {
                $alert = "<span class='success'> The re-entered password does not match. </span>";
                return $alert;
            } else {
                $update_user = "UPDATE user SET userPassword='$password'";
                $result_check = $this->db->update($update_user);
                if ($result_check) {
                    $alert = "<span class='success'> Update Successfully </span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'> Update Fail  </span>";
                    return $alert;
                }
            }
        }
    }
    public function update_user($user_Id, $data)
    {
        // kết nối với cơ sở dữ liệu
        $name = mysqli_real_escape_string($this->db->link, $data["name"]);
        $email = mysqli_real_escape_string($this->db->link, $data["email"]);
        $phone = mysqli_real_escape_string($this->db->link, $data["phone"]);
        $sex = mysqli_real_escape_string($this->db->link, $data["sex"]);
        $date = mysqli_real_escape_string($this->db->link, $data["date"]);
        $address = mysqli_real_escape_string($this->db->link, $data["address"]);
        if ($name == "" ||  $email == "" ||  $phone == "" ||  $sex == "" ||  $date == "" ||  $address == "") {
            $alert = "<span class='error'>Please enter complete information</span>";
            return $alert;
        } else {
            $update_user = "UPDATE user SET name='$name', email='$email', phoneNum='$phone', gender='$sex', dateOfBirth='$date', address='$address' WHERE userId='$user_Id'";
            $result_check = $this->db->update($update_user);
            if ($result_check) {
                $alert = "<span class='success'> Update Successfully </span>";
                return $alert;
            } else {
                $alert = "<span class='error'> Update Fail  </span>";
                return $alert;
            }
        }
    }
    //doi mat khau
    public function doimatkhau($taikhoan, $matkhaucu)
    {
        $taikhoan = $_POST['username'];
        $matkhaucu = md5($_POST['password_cu']);
        $sql = "SELECT * FROM user WHERE username= '$taikhoan' AND userPassword = '$matkhaucu'";
        $result = $this->db->select($sql);
        return $result;
    }
    //update mat khau
    public function updatedoimatkhau($matkhaumoi)
    {
        $matkhaumoi = md5($_POST['password_moi']);

        $sql_update = $this->db->update("UPDATE user SET userPassword= '$matkhaumoi' ");

        if ($sql_update == true) {
            $alert = '<span class="Update_pass">Password changed successfully!</span>';
            return $alert;
        }
    }
}
?>