<?php
require_once '../config/db.php';

$result = $conn->query("SELECT * FROM mahasiswa");
$mahasiswaList = array();

while ($row = $result->fetch_assoc()) {
    $mahasiswaList[] = $row;
}

echo json_encode($mahasiswaList);
