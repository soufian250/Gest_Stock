<?php

/**
 * User Class for account creation and login pupose
 */
class User {

    private $con;

    function __construct() {
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    //User is already registered or not
    private function emailExists($email) {
        $pre_stmt = $this->con->prepare("SELECT id FROM user WHERE email = ? ");
        $pre_stmt->bind_param("s", $email);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        if ($result->num_rows > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    /*private function passwordExists($oldpassword) {

        $pass_hash = password_hash($oldpassword, PASSWORD_BCRYPT, ["cost" => 8]);
        $pre_stmt = $this->con->prepare("SELECT id FROM user WHERE password = ? ");
        $pre_stmt->bind_param("s", $pass_hash);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        if ($result->num_rows > 0) {
            return 'Hamza';
        } else {
            return 0;
        }
    }*/

    public function createUserAccount($username, $email, $password, $usertype) {
        //To protect your application from sql attack you can user 
        //prepares statment
        if ($this->emailExists($email)) {
            return "EMAIL_ALREADY_EXISTS";
        } else {
            $pass_hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 8]);
            $date = date("d/m/Y");
            $notes = "";
            $pre_stmt = $this->con->prepare("INSERT INTO `user`(`username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`)
			 VALUES (?,?,?,?,?,?,?)");
            $pre_stmt->bind_param("sssssss", $username, $email, $pass_hash, $usertype, $date, $date, $notes);
            $result = $pre_stmt->execute() or die($this->con->error);
            if ($result) {
                return $this->con->insert_id;
            } else {
                return "SOME_ERROR";
            }
        }
    }

    public function addemployes($username, $email, $password, $usertype, $notes) {
        //To protect your application from sql attack you can user 
        //prepares statment
        if ($this->emailExists($email)) {
            return "EMAIL_ALREADY_EXISTS";
        } else {
            $pass_hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 8]);
            $date = date("d/m/Y");
            $pre_stmt = $this->con->prepare("INSERT INTO `user`(`username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`)
			 VALUES (?,?,?,?,?,?,?)");
            $pre_stmt->bind_param("sssssss", $username, $email, $pass_hash, $usertype, $date, $date, $notes);
            $result = $pre_stmt->execute() or die($this->con->error);
            if ($result) {
                return $this->con->insert_id;
            } else {
                return "SOME_ERROR";
            }
        }
    }

    public function userLogin($email, $password) {
        $pre_stmt = $this->con->prepare("SELECT id,email,username,usertype,password,last_login,notes FROM user WHERE email = ?");
        $pre_stmt->bind_param("s", $email);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();

        if ($result->num_rows < 1) {
            return "NOT_REGISTERD";
        } else {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row["password"])) {
                $_SESSION["userid"] = $row["id"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["role"] = $row["usertype"];
                $_SESSION["last_login"] = $row["last_login"];
                $_SESSION["notes"] = $row["notes"];

                //Here we are updating user last login time when he is performing login
                $last_login = date("d/m/Y H:i:s");
                $pre_stmt = $this->con->prepare("UPDATE user SET last_login = ? WHERE email = ?");
                $pre_stmt->bind_param("ss", $last_login, $email);
                $result = $pre_stmt->execute() or die($this->con->error);
                if ($result) {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return "PASSWORD_NOT_MATCHED";
            }
        }
    }

    public function profilEdit($username, $oldpassword,$password ,$email) {

        $pre_stmt = $this->con->prepare("SELECT id,username,password,last_login FROM user WHERE email = ?");
        $pre_stmt->bind_param("s", $email);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        
        if ($result->num_rows < 1) {
            return "EMAIL_NOT_MATCHED";
        
        } else {
            $row = $result->fetch_assoc();
            if (password_verify($oldpassword, $row["password"])) {
            $date = date("Y-m-d");
            $pass_hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 8]);
            $pre_stmt = $this->con->prepare("UPDATE user SET username = ? , password = ? , register_date = ? WHERE email = ?");
            $pre_stmt->bind_param("ssss", $username,$pass_hash,$date,$email);
            $result = $pre_stmt->execute() or die($this->con->error);
            if ($result) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return "PASSWORD_NOT_EXISTS";
        }
    }

}
}
//$user = new User();
//echo $user->createUserAccount("Test","rizwan1@gmail.com","1234567890","Admin");
//echo $user->userLogin("rizwan1@gmail.com","1234567890");
//echo $_SESSION["username"];
?>