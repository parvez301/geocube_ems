<?php
$conn = mysqli_connect('localhost', 'root','','employee_manage_portal');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>