<?php

/**
 * 
 */
class Manage {

    private $con;

    function __construct() {
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    public function manageRecordWithPagination($table, $pno, $numbrePages) {
        $a = $this->pagination($this->con, $table, $pno, $numbrePages);
        if ($table == "categories") {
            $sql = "SELECT p.cid,p.category_name as category, c.category_name as parent, p.status FROM categories p LEFT JOIN categories c ON p.parent_cat=c.cid " . $a["limit"];
        } else if ($table == "products") {
            $sql = "SELECT p.pid,p.product_name,c.category_name,p.description,p.purchase_price,p.product_price,p.product_stock,p.added_date,p.p_status,f.fourname FROM products p,fournisseur f,categories c WHERE p.idfour = f.id AND p.cid = c.cid " . $a["limit"];
        } else if ($table == "invoice") {
            $sql = "SELECT  invoice_no,customer_name, order_date, net_total, paid, due, payment_type from invoice ";
        } else if ($table == "user") {
            $sql = "SELECT id,username,email,usertype,register_date,last_login from user where email not like 'hamza@gmail.com' " . $a["limit"];
        } else {
            $sql = "SELECT * FROM " . $table . " " . $a["limit"];
        }
        $result = $this->con->query($sql) or die($this->con->error);
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return ["rows" => $rows, "pagination" => $a["pagination"]];
    }

    public function manageUsers($table, $pno, $email) {
        $a = $this->pagination($this->con, $table, $pno, 6);
        if ($table == "user") {
            $sql = "SELECT id,username,email,usertype,register_date,last_login from user where email not like '" . $email . "' " . $a["limit"];
        } else {
            $sql = "SELECT * FROM " . $table . " " . $a["limit"];
        }
        $result = $this->con->query($sql) or die($this->con->error);
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return ["rows" => $rows, "pagination" => $a["pagination"]];
    }

    private function pagination($con, $table, $pno, $n) {
        $query = $con->query("SELECT COUNT(*) as rows FROM " . $table);
        $row = mysqli_fetch_assoc($query);
        //$totalRecords = 100000;
        $pageno = $pno;
        $numberOfRecordsPerPage = $n;

        $last = ceil($row["rows"] / $numberOfRecordsPerPage);

        $pagination = "<ul class='pagination'>";

        if ($last != 1) {
            if ($pageno > 1) {
                $previous = "";
                $previous = $pageno - 1;
                $pagination .= "<li class='page-item'><a class='page-link' pn='" . $previous . "' href='#' style='color:#333;'> Previous </a></li></li>";
            }
            for ($i = $pageno - $numberOfRecordsPerPage; $i < $pageno; $i++) {
                if ($i > 0) {
                    $pagination .= "<li class='page-item'><a class='page-link' pn='" . $i . "' href='#'> " . $i . " </a></li>";
                }
            }
            $pagination .= "<li class='page-item'><a class='page-link' pn='" . $pageno . "' href='#' style='color:#333;'> $pageno </a></li>";
            for ($i = $pageno + 1; $i <= $last; $i++) {
                $pagination .= "<li class='page-item'><a class='page-link' pn='" . $i . "' href='#'> " . $i . " </a></li>";
                if ($i > $pageno + $numberOfRecordsPerPage - 1) {
                    break;
                }
            }
            if ($last > $pageno) {
                $next = $pageno + 1;
                $pagination .= "<li class='page-item'><a class='page-link' pn='" . $next . "' href='#' style='color:#333;'> Next </a></li></ul>";
            }
        }
        //LIMIT 0,10
        //LIMIT 20,10
        $limit = "LIMIT " . ($pageno - 1) * $numberOfRecordsPerPage . "," . $numberOfRecordsPerPage;

        return ["pagination" => $pagination, "limit" => $limit];
    }

    public function deleteRecord($table, $pk, $id) {
        if ($table == "categories") {
            $pre_stmt = $this->con->prepare("SELECT " . $id . " FROM categories WHERE parent_cat = ?");
            $pre_stmt->bind_param("i", $id);
            $pre_stmt->execute();
            $result = $pre_stmt->get_result() or die($this->con->error);
            if ($result->num_rows > 0) {
                return "DEPENDENT_CATEGORY";
            } else {
                $pre_stmt = $this->con->prepare("DELETE FROM " . $table . " WHERE " . $pk . " = ?");
                $pre_stmt->bind_param("i", $id);
                $result = $pre_stmt->execute() or die($this->con->error);
                if ($result) {
                    return "CATEGORY_DELETED";
                }
            }
        } else {
            $pre_stmt = $this->con->prepare("DELETE FROM " . $table . " WHERE " . $pk . " = ?");
            $pre_stmt->bind_param("i", $id);
            $result = $pre_stmt->execute() or die($this->con->error);
            if ($result) {
                return "DELETED";
            }
        }
    }

    public function getSingleRecord($table, $pk, $id) {
        $pre_stmt = $this->con->prepare("SELECT * FROM " . $table . " WHERE " . $pk . "= ? LIMIT 1");
        $pre_stmt->bind_param("i", $id);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        }
        return $row;
    }

    public function update_record($table, $where, $fields) {
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
            // id = '5' AND m_name = 'something'
            $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        foreach ($fields as $key => $value) {
            //UPDATE table SET m_name = '' , qty = '' WHERE id = '';
            $sql .= $key . "='" . $value . "', ";
        }
        $sql = substr($sql, 0, -2);
        $sql = "UPDATE " . $table . " SET " . $sql . " WHERE " . $condition;
        if (mysqli_query($this->con, $sql)) {
            return "UPDATED";
        }
    }

    public function storeCustomerOrderInvoice($orderdate, $cust_name, $ar_tqty, $ar_qty, $ar_price, $ar_pro_name, $sub_total, $gst, $discount, $net_total, $paid, $due, $payment_type, $client_type) {
        $pre_stmt = $this->con->prepare("INSERT INTO 
			`invoice`(`customer_name`, `order_date`, `sub_total`,
			 `gst`, `discount`, `net_total`, `paid`, `due`, `payment_type`, `client_type`) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $pre_stmt->bind_param("ssddddddss", $cust_name, $orderdate, $sub_total, $gst, $discount, $net_total, $paid, $due, $payment_type, $client_type);
        $pre_stmt->execute() or die($this->con->error);
        $invoice_no = $pre_stmt->insert_id;
        if ($invoice_no != null) {
            for ($i = 0; $i < count($ar_price); $i++) {

                //Here we are finding the remaing quantity after giving customer
                $rem_qty = $ar_tqty[$i] - $ar_qty[$i];
                if ($rem_qty < 0) {
                    return "ORDER_FAIL_TO_COMPLETE";
                } else {
                    //Update Product stock
                    $sql = "UPDATE products SET product_stock = '$rem_qty' WHERE product_name = '" . $ar_pro_name[$i] . "'";
                    $this->con->query($sql);
                }


                $insert_product = $this->con->prepare("INSERT INTO `invoice_details`(`invoice_no`, `product_name`, `price`, `qty`)
				 VALUES (?,?,?,?)");
                $insert_product->bind_param("isdd", $invoice_no, $ar_pro_name[$i], $ar_price[$i], $ar_qty[$i]);
                $insert_product->execute() or die($this->con->error);
            }

            return $invoice_no;
        }
    }

    public function manageInvoice($id) {
        $sql = "SELECT ID.*,P.description FROM `invoice_details` ID INNER JOIN products P ON ID.product_name=P.product_name WHERE invoice_no = " . $id . "";
        $result = $this->con->query($sql) or die($this->con->error);
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return ["rows" => $rows];
    }
    
        public function consulterProduit() {
        $sql = "SELECT p.pid,p.product_name,c.category_name,p.description,p.product_price,p.product_stock,p.added_date,p.p_status FROM products p,categories c WHERE p.cid = c.cid ";
        $result = $this->con->query($sql) or die($this->con->error);
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return ["rows" => $rows];
    }
    
    public function getCatProStat($id) {
        $pre_stmt = $this->con->prepare("SELECT  C.cid FROM categories C inner JOIN products P on C.cid = P.cid WHERE C.cid = ".$id."");
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        if ($result->num_rows > 0) {
            return 1;
        }else{
            return 0;
        }
    }
    

}

//$obj = new Manage();
//echo "<pre>";
//print_r($obj->manageRecordWithPagination("categories",1));
//echo $obj->deleteRecord("categories","cid",14);
//print_r($obj->getSingleRecord("categories","cid",1));
//echo $obj->update_record("categories",["cid"=>1],["parent_cat"=>0,"category_name"=>"Electro","status"=>1]);
//print_r($obj->manageInvoice(6)) ;
//echo $obj ->getCatProStat(1);
?>