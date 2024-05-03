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

}