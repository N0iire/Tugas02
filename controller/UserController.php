<?php
include("db_config.php");

class User
{
    public $db;

    public function __construct()
    {
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        if (mysqli_connect_errno()) {
            echo "Error: Could not connect to database.";
            exit;
        }
    }

    /**
     * Registration
     */
    public function store($email, $name, $password)
    {
        $password = md5($password);
        $sql = "SELECT * FROM admin WHERE email = '$email' ";

        // Checking if the id is available
        $check = $this->db->query($sql);
        $count_row = $check->num_rows;

        // If the id is not in db then insert to the table
        if ($count_row == 0) {
            $sql1 = "INSERT INTO admin SET email='$email', username='$name', password='$password'";
            $result = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno() . "Data cannot inserted");
            return $result;
        } else {
            return false;
        }
    }

    /**
     * Login
     */
    public function login($email, $password)
    {
        $password = md5($password);
        $sql2 = "SELECT email FROM admin WHERE email='$email' AND password='$password'";
        // Checking if the id and the password is macthes
        $result = $this->db->query($sql2);
        $user_data = $result->fetch_assoc();
        $count_row = $result->num_rows;

        if ($count_row == 1) {
            // this login var will use for the session thing
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['email'] = $user_data['email'];
            return true;
        } else {
            return false;
        }
    }

    /**
     * Getting the User
     */
    public function get_user($username)
    {
        $sql3 = "SELECT username FROM admin WHERE username='$username'";
        $result = $this->db->query($sql3);
        $user_data = $result->fetch_assoc();

        return $user_data;
    }

    /**
     * Start the session
     */
    public function get_session()
    {
        return $_SESSION['login'];
    }

    /**
     * Destroying the session
     */
    public function logout()
    {
        $_SESSION['login'] = false;
        session_destroy();
    }
}
