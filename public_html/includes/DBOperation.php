<?php

/**
 * 
 */
class DBOperation {

    private $con;

    function __construct() {
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    public function addFournisseur($fourname, $email, $telephone, $specialite) {
        $pre_stmt = $this->con->prepare("INSERT INTO `fournisseur`(`fourname`, `email`, `telephone`, `specialite`)
		 VALUES (?,?,?,?)");
        $pre_stmt->bind_param("ssss", $fourname, $email, $telephone, $specialite);
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            return "FOURNISSEUR_ADDED";
        } else {
            return 0;
        }
    }

    public function addCategory($parent, $cat) {
        $pre_stmt = $this->con->prepare("INSERT INTO `categories`(`parent_cat`, `category_name`, `status`)
		 VALUES (?,?,?)");
        $status = 1;
        $pre_stmt->bind_param("isi", $parent, $cat, $status);
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            return "CATEGORY_ADDED";
        } else {
            return 0;
        }
    }

    public function addBrand($brand_name) {
        $pre_stmt = $this->con->prepare("INSERT INTO `brands`(`brand_name`, `status`)
		 VALUES (?,?)");
        $status = 1;
        $pre_stmt->bind_param("si", $brand_name, $status);
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            return "BRAND_ADDED";
        } else {
            return 0;
        }
    }

    public function addProduct($cid, $fid, $pro_name, $des, $pprice, $price, $stock, $date) {
        $pre_stmt = $this->con->prepare("INSERT INTO `products`
			(`cid`, `idfour` , `product_name`,`description` , `purchase_price` ,`product_price`,
			 `product_stock`, `added_date`, `p_status`)
			 VALUES (?,?,?,?,?,?,?,?,?)");
        $status = 1;
        $pre_stmt->bind_param("iissddisi", $cid, $fid, $pro_name, $des, $pprice, $price, $stock, $date, $status);
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            return "NEW_PRODUCT_ADDED";
        } else {
            return 0;
        }
    }

    public function getAllRecord($table) {
        if ($table == "categories") {
            $query = "SELECT * FROM " . $table . " WHERE parent_cat != '' ";
        } else if ($table == "categories_parent") {
            $query = "SELECT * FROM categories WHERE parent_cat = '' ";
        } else if ($table == "products") {
            $query = "SELECT * FROM products WHERE product_stock != 0 ";
        } else {
            $query = "SELECT * FROM " . $table;
        }
        $pre_stmt = $this->con->prepare($query);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }
        return "NO_DATA";
    }

    public function getAllUsers() {
        $pre_stmt = $this->con->prepare("SELECT * FROM user where email not like 'hamza@gmail.com'");
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }
        return "NO_DATA";
    }

    public function getAllStat($table) {
        if ($table == "top") {
            $sql = "SELECT P.product_name,TRUNCATE(((count(I.product_name)*100) / (SELECT COUNT(*) from invoice_details)),2) AS 'top'  from products P INNER JOIN invoice_details I on P.product_name=I.product_name GROUP by P.product_name ORDER by top DESC LIMIT 3";
        }else if ($table == "paid") {
            $sql = "SELECT ((SELECT count(*) FROM invoice WHERE due = 0)*100)/count(*) As 'paid' FROM `invoice`";
        } else {
            $sql = "SELECT Count(*) as 'Stat' FROM " . $table;
        }
        $pre_stmt = $this->con->prepare($sql);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        $rows = array();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row;
        } else if ($result->num_rows >1) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else{
            return $rows;
        }
    }

}

//$opr = new DBOperation();
//echo $opr->addCategory(1,"Mobiles");
//echo "<pre>";
//print_r($opr->getAllStat("top"));
?>