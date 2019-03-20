<?php
include_once("../database/constants.php");
include_once("user.php");
include_once("DBOperation.php");
include_once("manage.php");

//For Registration Processsing
if (isset($_POST["username"]) AND isset($_POST["email"])) {
    $user = new User();
    $result = $user->createUserAccount($_POST["username"], $_POST["email"], $_POST["password1"], $_POST["usertype"]);
    echo $result;
    exit();
}
if (isset($_POST["notes"]) AND isset($_POST["email"])) {
    $user = new User();
    $result = $user->addemployes($_POST["username"], $_POST["email"], $_POST["password1"], $_POST["usertype"], $_POST["notes"]);
    echo $result;
    exit();
}

//For Login Processing
if (isset($_POST["log_email"]) AND isset($_POST["log_password"])) {
    $user = new User();
    $result = $user->userLogin($_POST["log_email"], $_POST["log_password"]);
    echo $result;
    exit();
}
//For Edit Profile
if (isset($_POST["passwordnew"]) AND isset($_POST["passwordf"])) {
    $user = new User();
    $result = $user->profilEdit($_POST["usernamen"], $_POST["passwordf"],$_POST["passwordnew"],$_POST["pemail"]);
    echo $result;
    exit();
}

//To get Category
if (isset($_POST["getCategory"])) {
    $obj = new DBOperation();
    $rows = $obj->getAllRecord("categories");
    foreach ($rows as $row) {
        echo "<option value='" . $row["cid"] . "'>" . $row["category_name"] . "</option>";
    }
    exit();
}

//Fetch Brand
if (isset($_POST["getBrand"])) {
    $obj = new DBOperation();
    $rows = $obj->getAllRecord("brands");
    foreach ($rows as $row) {
        echo "<option value='" . $row["bid"] . "'>" . $row["brand_name"] . "</option>";
    }
    exit();
}

//Add Category
if (isset($_POST["category_name"]) AND isset($_POST["parent_cat"])) {
    $obj = new DBOperation();
    $result = $obj->addCategory($_POST["parent_cat"], $_POST["category_name"]);
    echo $result;
    exit();
}

//Add Brand
if (isset($_POST["brand_name"])) {
    $obj = new DBOperation();
    $result = $obj->addBrand($_POST["brand_name"]);
    echo $result;
    exit();
}

//Add Product
if (isset($_POST["added_date"]) AND isset($_POST["product_name"])) {
    //$image = $_FILES['image']['name'];
    //$target = "images/data/".basename($image);
    $obj = new DBOperation();
    $result = $obj->addProduct($_POST["select_cat"], $_POST["select_brand"], "Image", $_POST["product_name"], $_POST["product_price"], $_POST["product_qty"], $_POST["added_date"]);
    echo $result;
    //move_uploaded_file($_FILES['image']['tmp_name'], $target);
    exit();
}

//Manage Category
if (isset($_POST["manageCategory"])) {
    $m = new Manage();
    $result = $m->manageRecordWithPagination("categories", $_POST["pageno"]);
    $rows = $result["rows"];
    $pagination = $result["pagination"];
    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 5) + 1;
        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $row["category"]; ?></td>
                <td><?php echo $row["parent"]; ?></td>
                <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                <td>
                    <a href="#" did="<?php echo $row['cid']; ?>" class="btn btn-danger btn-sm del_cat"><i class="fa fa-trash-alt">&nbsp;</i>Delete</a>
                    <a href="#" eid="<?php echo $row['cid']; ?>" data-toggle="modal" data-target="#form_category" class="btn btn-info btn-sm edit_cat"><i class="fa fa-pencil-alt">&nbsp;</i>Edit</a>
                </td>
            </tr>
            <?php
            $n++;
        }
        ?>
        <tr><td colspan="5"><?php echo $pagination; ?></td></tr>
        <?php
        exit();
    }
}


//Delete Category
if (isset($_POST["deleteCategory"])) {
    $m = new Manage();
    $result = $m->deleteRecord("categories", "cid", $_POST["id"]);
    echo $result;
}

//Update Category
if (isset($_POST["updateCategory"])) {
    $m = new Manage();
    $result = $m->getSingleRecord("categories", "cid", $_POST["id"]);
    echo json_encode($result);
    exit();
}

//Update Record after getting data
if (isset($_POST["update_category"])) {
    $m = new Manage();
    $id = $_POST["cid"];
    $name = $_POST["update_category"];
    $parent = $_POST["parent_cat"];
    $result = $m->update_record("categories", ["cid" => $id], ["parent_cat" => $parent, "category_name" => $name, "status" => 1]);
    echo $result;
}

//------------------Brand---------------------
//Manage Brand
if (isset($_POST["manageBrand"])) {
    $m = new Manage();
    $result = $m->manageRecordWithPagination("brands", $_POST["pageno"]);
    $rows = $result["rows"];
    $pagination = $result["pagination"];
    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 5) + 1;
        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $row["brand_name"]; ?></td>
                <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                <td>
                    <a href="#" did="<?php echo $row['bid']; ?>" class="btn btn-danger btn-sm del_brand"><i class="fa fa-trash-alt">&nbsp;</i>Delete</a>
                    <a href="#" eid="<?php echo $row['bid']; ?>" data-toggle="modal" data-target="#form_brand" class="btn btn-info btn-sm edit_brand"><i class="fa fa-pencil-alt">&nbsp;</i>Edit</a>
                </td>
            </tr>
            <?php
            $n++;
        }
        ?>
        <tr><td colspan="5"><?php echo $pagination; ?></td></tr>
        <?php
        exit();
    }
}

//Delete 
if (isset($_POST["deleteBrand"])) {
    $m = new Manage();
    $result = $m->deleteRecord("brands", "bid", $_POST["id"]);
    echo $result;
}


//Update Brand
if (isset($_POST["updateBrand"])) {
    $m = new Manage();
    $result = $m->getSingleRecord("brands", "bid", $_POST["id"]);
    echo json_encode($result);
    exit();
}

//Update Record after getting data
if (isset($_POST["update_brand"])) {
    $m = new Manage();
    $id = $_POST["bid"];
    $name = $_POST["update_brand"];
    $result = $m->update_record("brands", ["bid" => $id], ["brand_name" => $name, "status" => 1]);
    echo $result;
}

//----------------Products---------------------

if (isset($_POST["manageProduct"])) {
    $m = new Manage();
    $result = $m->manageRecordWithPagination("products", $_POST["pageno"]);
    $rows = $result["rows"];
    $pagination = $result["pagination"];
    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 5) + 1;
        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <!--<td><img class="rounded-circle" src="images/<?php// echo $row["picture"]; ?>" width="50" height="50"></td>-->
                <td><?php echo $row["product_name"]; ?></td>
                <td><?php echo $row["category_name"]; ?></td>
                <td><?php echo $row["brand_name"]; ?></td>
                <td><?php echo $row["product_price"]; ?></td>
                <td><?php echo $row["product_stock"]; ?></td>
                <td><?php echo $row["added_date"]; ?></td>
                <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                <td>
                    <a href="#" did="<?php echo $row['pid']; ?>" class="btn btn-danger btn-sm del_product"><i class="fa fa-trash-alt">&nbsp;</i>Delete</a>
                    <a href="#" eid="<?php echo $row['pid']; ?>" data-toggle="modal" data-target="#form_products" class="btn btn-info btn-sm edit_product"><i class="fa fa-pencil-alt">&nbsp;</i>Edit</a>
                </td>
            </tr>
            <?php
            $n++;
        }
        ?>
        <tr><td colspan="10"><?php echo $pagination; ?></td></tr>
        <?php
        exit();
    }
}

//Delete 
if (isset($_POST["deleteProduct"])) {
    $m = new Manage();
    $result = $m->deleteRecord("products", "pid", $_POST["id"]);
    echo $result;
}

//Update Product
if (isset($_POST["updateProduct"])) {
    $m = new Manage();
    $result = $m->getSingleRecord("products", "pid", $_POST["id"]);
    echo json_encode($result);
    exit();
}

//Update Record after getting data
if (isset($_POST["update_product"])) {
    $m = new Manage();
    $id = $_POST["pid"];
    $name = $_POST["update_product"];
    $cat = $_POST["select_cat"];
    $brand = $_POST["select_brand"];
    $price = $_POST["product_price"];
    $qty = $_POST["product_qty"];
    $date = $_POST["added_date"];
    $result = $m->update_record("products", ["pid" => $id], ["cid" => $cat, "bid" => $brand, "product_name" => $name, "product_price" => $price, "product_stock" => $qty, "added_date" => $date]);
    echo $result;
}

//-------------------------Order Processing--------------

if (isset($_POST["getNewOrderItem"])) {
    $obj = new DBOperation();
    $rows = $obj->getAllRecord("products");
    ?>
    <tr>
        <td><b class="number">1</b></td>
        <td>
            <select name="pid[]" class="form-control form-control-sm pid" required>
                <option value="">Choisir un produit</option>
    <?php
    foreach ($rows as $row) {
        ?><option value="<?php echo $row['pid']; ?>"><?php echo $row["product_name"]; ?></option><?php
    }
    ?>
            </select>
        </td>
        <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm tqty"></td>   
        <td><input name="qty[]" type="text" class="form-control form-control-sm qty" required></td>
        <td><input name="price[]" type="text" class="form-control form-control-sm price" readonly></span>
        <span><input name="pro_name[]" type="hidden" class="form-control form-control-sm pro_name"></td>
            <td title="Montant totale">Mt.<span class="amt">0</span></td>
    </tr>
    <?php
    exit();
}


//Get price and qty of one item
if (isset($_POST["getPriceAndQty"])) {
    $m = new Manage();
    $result = $m->getSingleRecord("products", "pid", $_POST["id"]);
    echo json_encode($result);
    exit();
}


if (isset($_POST["order_date"]) AND isset($_POST["cust_name"])) {

    $orderdate = $_POST["order_date"];
    $cust_name = $_POST["cust_name"];


    //Now getting array from order_form
    $ar_tqty = $_POST["tqty"];
    $ar_qty = $_POST["qty"];
    $ar_price = $_POST["price"];
    $ar_pro_name = $_POST["pro_name"];


    $sub_total = $_POST["sub_total"];
    $gst = $_POST["gst"];
    $discount = $_POST["discount"];
    $net_total = $_POST["net_total"];
    $paid = $_POST["paid"];
    $due = $_POST["due"];
    $payment_type = $_POST["payment_type"];


    $m = new Manage();
    echo $result = $m->storeCustomerOrderInvoice($orderdate, $cust_name, $ar_tqty, $ar_qty, $ar_price, $ar_pro_name, $sub_total, $gst, $discount, $net_total, $paid, $due, $payment_type);
}
//----------------invoice---------------------

if (isset($_POST["manageInvoice"])) {
    $m = new Manage();
    $result = $m->showInvoices("invoice", $_POST["pageno"]);
    $rows = $result["rows"];
    $pagination = $result["pagination"];
    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 10) + 1;
        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $row["customer_name"]; ?></td>
                <td><?php echo $row["order_date"]; ?></td>
                <td><?php echo $row["net_total"]; ?></td>
                <td><?php echo $row["paid"]; ?></td>
                <td><?php echo $row["due"]; ?></td>
                <td><?php echo $row["payment_type"]; ?></td>
                <!--<td>
                    <a href="#" did="<?php //echo $row['pid']; ?>" class="btn btn-danger btn-sm del_product">Delete</a>
                    <a href="#" eid="<?php //echo $row['pid']; ?>" data-toggle="modal" data-target="#form_products" class="btn btn-info btn-sm edit_product">Edit</a>
                </td>-->
            </tr>
            <?php
            $n++;
        }
        ?>
        <tr><td colspan="8"><?php echo $pagination; ?></td></tr>
        <?php
        exit();
    }
}

//Delete 
if (isset($_POST["deleteInvoice"])) {
    $m = new Manage();
    $result = $m->deleteRecord("products", "pid", $_POST["id"]);
    echo $result;
}

//Update Product
if (isset($_POST["updateInvoice"])) {
    $m = new Manage();
    $result = $m->getSingleRecord("products", "pid", $_POST["id"]);
    echo json_encode($result);
    exit();
}

//Update Record after getting data
if (isset($_POST["update_Invoice"])) {
    $m = new Manage();
    $id = $_POST["pid"];
    $name = $_POST["update_product"];
    $cat = $_POST["select_cat"];
    $brand = $_POST["select_brand"];
    $price = $_POST["product_price"];
    $qty = $_POST["product_qty"];
    $date = $_POST["added_date"];
    $result = $m->update_record("products", ["pid" => $id], ["cid" => $cat, "bid" => $brand, "product_name" => $name, "product_price" => $price, "product_stock" => $qty, "added_date" => $date]);
    echo $result;
}

//----------------User---------------------

if (isset($_POST["manageUser"])) {
    $m = new Manage();
    $result = $m->manageRecordWithPagination("user", $_POST["pageno"]);
    $rows = $result["rows"];
    $pagination = $result["pagination"];
    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 5) + 1;
        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $row["username"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["usertype"]; ?></td>
                <td><?php echo $row["register_date"]; ?></td>
                <td><?php echo $row["last_login"]; ?></td>
                <td>
                    <a href="#" did="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm del_user"><i class="fa fa-user-slash">&nbsp;</i>Delete</a>
                    <a href="#" eid="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#update_user" class="btn btn-info btn-sm edit_user"><i class="fa fa-pencil-alt">&nbsp;</i>Edit</a>
                </td>
            </tr>
            <?php
            $n++;
        }
        ?>
        <tr><td colspan="7"><?php echo $pagination; ?></td></tr>
        <?php
        exit();
    }
}

//Delete 
if (isset($_POST["deleteUser"])) {
    $m = new Manage();
    $result = $m->deleteRecord("user", "id", $_POST["id"]);
    echo $result;
}

//Update User
if (isset($_POST["updateUser"])) {
    $m = new Manage();
    $result = $m->getSingleRecord("user", "id", $_POST["id"]);
    echo json_encode($result);
    exit();
}

//Update Record after getting data
if (isset($_POST["user"])) {
    $m = new Manage();
    $id = $_POST["id"];
    $name = $_POST["user"];
    $email = $_POST["email"];
    $usertype = $_POST["usertype"];
    $date = $_POST["date"];
    
    $result = $m->update_record("user", ["id" => $id], ["username"=>$name, "email" => $email, "usertype" => $usertype,"register_date"=>$date]);
    echo $result;
}


//Product Stat
if (isset($_POST["statProduit"])) {
    $obj = new DBOperation();
    $row = $obj->getAllStat("products");
    
    echo $row["Stat"];

    exit();
}
//Brand Stat
if (isset($_POST["statBrand"])) {
    $obj = new DBOperation();
    $row = $obj->getAllStat("brands");
    
    echo $row["Stat"];

    exit();
}
//category Stat
if (isset($_POST["statCategory"])) {
    $obj = new DBOperation();
    $row = $obj->getAllStat("categories");
    
    echo $row["Stat"];

    exit();
}
//Command Stat
if (isset($_POST["statCommand"])) {
    $obj = new DBOperation();
    $row = $obj->getAllStat("invoice");
    
    echo $row["Stat"];

    exit();
}


?>