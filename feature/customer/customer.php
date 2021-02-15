<?php

class Customer {
    public $db;
    public $id;
    function __construct() {
        $this->db = new Connection();
    }

    function getUsers() {
        $sql = "SELECT * FROM users WHERE level='customer'";
        $result = mysqli_query($this->db->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $data = array();
            while($row = mysqli_fetch_assoc($result)) {
                array_push($data, $row);
            }
            return $data;
        } else {
            return [];
        }
    }

    function getUsersCount() {
        $sql = "SELECT * FROM users WHERE level='customer'";
        $result = mysqli_query($this->db->conn, $sql);
        return mysqli_num_rows($result);
    }

    function getUsersById($id) {
        $sql = "SELECT * FROM users WHERE id=$id";
        $result = mysqli_query($this->db->conn, $sql);
        $row = mysqli_fetch_array($result);
        return $row;
    }

    function deleteUsersById($id) {
        $sql = "DELETE FROM users WHERE id=$id";
        $result = mysqli_query($this->db->conn, $sql);
        if (mysqli_query($this->db->conn, $sql)) {
            header('Location: user.php');
        } else {
            echo "Error deleting record: " . mysqli_error($this->db->conn);
        }
    }

    function addNewCustomer($request) {
        $fullname       = $request['fullname'];
        $email          = $request['email'];
        $password       = $request['password'];
        $phone          = $request['phone'];
        $address          = $request['address'];

        $sql = "INSERT INTO `users`(`fullname`, `email`, `phone`, `password`, `level`, `address`) VALUES ('$fullname', '$email', '$phone', '$password', 'customer','$address')";
        $result = mysqli_query($this->db->conn, $sql);

        header('Location: ../index.php');
    }

    function loginCustomer($request) {
        $email 		= 	$request['email'];
        $pass 		= 	$request['password'];

        $sql 		= 	"SELECT * FROM `users`";
        $result     =   mysqli_query($this->db->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {                
                $id 		= 	$row['id'];
                $_email   	= 	$row['email'];
                $_password 	= 	$row['password'];
                $name 		= 	$row['fullname'];
                $phone 		= 	$row['phone'];
                $level 		= 	$row['level'];

                if($email == $_email && $pass == $_password) {
                    session_start();
                    $_SESSION['id']         =	$id;
                    $_SESSION['email']	    =	$_email;
                    $_SESSION['fullname']	=	$name;
                    $_SESSION['phone']  	=	$phone;
                    $_SESSION['level']  	=	$level;

                    if ($level == "customer") {
                        header('Location: ../index.php');
                    } else {
                        header('Location: ../dashboard/index.php');
                    }                    
                }
            }
        }
    }

    function userUpdate($id, $request) {
        if (isset($_POST['user-update'])) {
            $fullname       = $request['fullname'];
            $email          = $request['email'];
            $phone          = $request['phone'];
            $address          = $request['address'];

            $sql = "UPDATE users SET fullname='$fullname',email='$email',phone='$phone', address='$address' WHERE id=$id";
            if (mysqli_query($this->db->conn, $sql)) {
                header('Location: user.php');
            } else {
                echo "Error updating record: " . mysqli_error($this->db->conn);
            }
        }
    }
}

?>