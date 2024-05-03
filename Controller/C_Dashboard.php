<?php

include_once 'model/M_Credentials.php';
include_once 'model/M_Contact.php';


class C_Dashboard
{
    static function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            view('dashboard/dashboard', [ 'contacts' => Contact::select()]);
        }
    }

    static function insert($user_id, $owner, $no_hp, $email) {
        global $conn; // Access the $conn variable from the global scope
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sql = "INSERT INTO contact (user_id, owner, no_hp, email) VALUES ('$user_id', '$owner', '$no_hp', '$email')";
    
            $hasil = mysqli_query($conn, $sql);
    
            if ($hasil) {
                header("Location: index.php");
                exit(); // Terminate the script after redirecting
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
    }
}