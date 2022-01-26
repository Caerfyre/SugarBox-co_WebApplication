<?php

if (!function_exists("db_connect")) {
    /**
     * Initiates a connection to the database.
     * Sample use:
     * ```
     * include "DB-connect.php";
     * $conn = db_connect();
     * ```
     * @return object The connection to the database. FALSE if no connection is made.
     */
    function db_connect() {
        $server_name = "localhost";
        $username = "root";
        $password = "";
        $db_name = "sugarbox_db";

        $conn = mysqli_connect($server_name, $username, $password, $db_name);

        // if (!$conn) {
        //     die("Connection Failed: " . mysqli_connect_error());
        // }

        return $conn;
    }
}

