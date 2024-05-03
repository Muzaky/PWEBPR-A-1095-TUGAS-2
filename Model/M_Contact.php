<?php

include_once 'config/connection.php';

class Contact
{
    static function select()
    {
        global $conn;
        $sql = "SELECT * FROM contact";
        $result = $conn->query($sql);
        $rows = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        $result->free();
        $conn->close();
        return $rows;
    }

    static function delete($id){
        global $conn;

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            $sql = "DELETE FROM contact WHERE id = $id";
            $hasil = mysqli_query($conn, $sql);

            if ($hasil) {
                header("Location:".BASEURL."dashboard");
                exit(); // Terminate the script after redirecting
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
    }

    static function insert($user_id, $owner, $no_hp, $email) {
        global $conn; // Access the $conn variable from the global scope
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sql = "INSERT INTO contact (user_id, owner, no_hp, email) VALUES ('$user_id', '$owner', '$no_hp', '$email')";
    
            $hasil = mysqli_query($conn, $sql);
    
            if ($hasil) {
                header("Location:".BASEURL."dashboard");
                exit(); // Terminate the script after redirecting
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
    }

}