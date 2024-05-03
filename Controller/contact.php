<?php 
require_once 'C:\laragon\www\PWEBPR-A-1095\app\Models\database.php';
include_once 'config/connection.php';
class Contact
{
    static function index()
    {
        global $conn;
        $result = $conn->query('SELECT * FROM contact');

        $arr = array();
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                foreach ($row as $key => $value) {
                    $arr[$key][] = $value;
                }
            }
        }
        return $arr;
    }

    static function delete($id)
    {
        global $conn;

        $sql = "DELETE FROM contact WHERE id = ?";

        $result = $conn->prepare($sql);

        $result->bind_param('i', $id);

        if ($result->execute()) {
            $result->close(); // Close the prepared statement
            header("Location: index.php");
            exit();
            // return "Record deleted successfully";
        } else {
            $error = "Error deleting record: " . $conn->error;
            $result->close(); // Close the prepared statement
            return $error;
        }

        // return $result;
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
    

    
    

    
};
