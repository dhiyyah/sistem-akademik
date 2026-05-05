<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'sistem-akademik';

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die('koneksi gagal '.$conn->connect_error);
}
