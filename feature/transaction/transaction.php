<?php

class Transaction {
    public $db;

    function __construct() {
        $this->db = new Connection();
    }

    function getTransactionsCount() {
        $sql = "SELECT * FROM transactions";
        $result = mysqli_query($this->db->conn, $sql);
        return mysqli_num_rows($result);
    }

    function getTransactions() {
        if ($_SESSION['level'] == 'customer') {
            return $this->getTransactionsByUserId();
        } else {
            return $this->getAllTransactions();
        }
        
    }

    function getTransactionsForReport() {
        return $this->getAllTransactions();
    }

    function getTransactionsByUserId() {
        $uid = $_SESSION['id'];
        $sql = "SELECT * FROM transactions WHERE user_id='$uid'";
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

    function getAllTransactions() {
        $sql = "SELECT * FROM transactions";
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

    function getTotalTransaction($form, $to) {
        $datef = date_create("$form");
        $datet = date_create("$to");
        $nfrom = date_format($datef,"d-m-Y");
        $nto = date_format($datet,"d-m-Y");
        $sql = "SELECT * FROM `transactions` WHERE status='Transaksi Selesai' AND (transaction_date BETWEEN '$nfrom' AND '$nto')";
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

    function getTotalAllTransaction() {
        $sql = "SELECT * FROM `transactions` WHERE status='Transaksi Selesai'";
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

    function getTotalPendapatan($form, $to) {
        $datef = date_create("$form");
        $datet = date_create("$to");
        $nfrom = date_format($datef,"d-m-Y");
        $nto = date_format($datet,"d-m-Y");
        $sql = "SELECT * FROM `transactions` WHERE status='Transaksi Selesai' AND (transaction_date BETWEEN '$nfrom' AND '$nto')";
        $result = mysqli_query($this->db->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $data = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $idp = $row['product_id'];
                $sqlpro = "SELECT * FROM products WHERE id='$idp'";
                $resultpro = mysqli_query($this->db->conn, $sqlpro);
                if (mysqli_num_rows($resultpro) > 0) {
                    while($rowpro = mysqli_fetch_assoc($resultpro)) {
                        $data = $data + $rowpro['price'];
                    }
                }
            }
            return $data;
        } else {
            return 0;
        }
    }

    function getTransactionsById($id) {
        $sql = "SELECT * FROM transactions WHERE id=$id";
        $result = mysqli_query($this->db->conn, $sql);
        $row = mysqli_fetch_array($result);
        return $row;
    }

    function getTransactionsPriceById($id) {
        $sql = "SELECT * FROM products WHERE product_id=$id";
        $result = mysqli_query($this->db->conn, $sql);
        $row = mysqli_fetch_array($result);
        return $row;
    }

    function deleteTransactionsById($id) {
        $sql = "DELETE FROM transactions WHERE id=$id";
        $result = mysqli_query($this->db->conn, $sql);
        if (mysqli_query($this->db->conn, $sql)) {
            header('Location: transaction.php');
        } else {
            echo "Error deleting record: " . mysqli_error($this->db->conn);
        }
    }

    function addNewTransaction($productid, $userid, $request, $file, $filetmp) {
        $description    =   $request['description'];
        $folder 		= 	'files';
        $tmp_name 		= 	$filetmp;
        $link 			= 	$folder."/".$file;
        $newdate        =   date("d-m-Y");

        //Upload ke folder foto
        move_uploaded_file($tmp_name, $link);

        $sql = "INSERT INTO `transactions`(`product_id`, `user_id`, `status`, `image`, `description`, `transaction_date`) VALUES ('$productid','$userid','Konfirmasi','$link','$description','$newdate')";

        if (mysqli_query($this->db->conn, $sql)) {
            header('Location: index.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->db->conn);
        }
    }

    function transactionUpdate($id, $request) {
        if (isset($_POST['transaction-update'])) {
            $status           =   $request['status'];
    
            $sql = "UPDATE transactions SET status='$status' WHERE id=$id";
            if (mysqli_query($this->db->conn, $sql)) {
                header('Location: transaction.php');
            } else {
                echo "Error updating record: " . mysqli_error($this->db->conn);
            }
        }
    }
}

?>