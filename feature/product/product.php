<?php

class Product {
    public $db;

    function __construct() {
        $this->db = new Connection();
    }

    function getProductsCount() {
        $sql = "SELECT * FROM products";
        $result = mysqli_query($this->db->conn, $sql);
        return mysqli_num_rows($result);
    }

    function getProducts() {
        $sql = "SELECT * FROM products";
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

    function getTotalHargaProducts($pid) {
        $sql = "SELECT * FROM products WHERE id=$pid";
        $result = mysqli_query($this->db->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $data;
            while($row = mysqli_fetch_assoc($result)) {
                $data = $row['price'];
            }
            return $data;
        } else {
            return 0;
        }
    }

    function getProductsById($id) {
        $sql = "SELECT * FROM products WHERE id=$id";
        $result = mysqli_query($this->db->conn, $sql);
        $row = mysqli_fetch_array($result);
        return $row;
    }

    function deleteProductsById($id) {
        $sql = "DELETE FROM products WHERE id=$id";
        $result = mysqli_query($this->db->conn, $sql);
        if (mysqli_query($this->db->conn, $sql)) {
            header('Location: product.php');
        } else {
            echo "Error deleting record: " . mysqli_error($this->db->conn);
        }
    }

    function productUpdate($id, $request, $file, $filetmp) {
        if (isset($_POST['product-update'])) {
            $name           =   $request['productname'];
            $price          =   $request['productprice'];
            $size           =   $request['productsize'];
            $color          =   $request['productcolor'];
            $description    =   $request['productdescription'];
            $folder 		= 	'files';
            $tmp_name 		= 	$filetmp;
            $link 			= 	$folder."/".$file;
    
            //Upload ke folder foto
            move_uploaded_file($tmp_name, "../" . $link);
    
            $sql = "UPDATE products SET name='$name',price='$price',image='$link',size='$size',description='$description',color='$color' WHERE id=$id";
            if (mysqli_query($this->db->conn, $sql)) {
                header('Location: product.php');
            } else {
                echo "Error updating record: " . mysqli_error($this->db->conn);
            }
        }
    }

    function addNewProduct($request, $file, $filetmp) {
        $name           =   $request['productname'];
        $price          =   $request['productprice'];
        $size           =   $request['productsize'];
        $color          =   $request['productcolor'];
        $description    =   $request['productdescription'];
        $folder 		= 	'files';
        $tmp_name 		= 	$filetmp;
        $link 			= 	$folder."/".$file;

        //Upload ke folder foto
        move_uploaded_file($tmp_name, "../" . $link);

        $sql = "INSERT INTO `products`(`name`, `price`, `image`, `size`, `color`, `description`) VALUES ('$name','$price','$link','$size','$color','$description')";

        if (mysqli_query($this->db->conn, $sql)) {
            header('Location: ../index.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->db->conn);
        }
    }
}

?>