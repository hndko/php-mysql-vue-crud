<?php
require_once '../config/db.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$nama = $data['nama'];
$nim = $data['nim'];
$jurusan = $data['jurusan'];
$email = $data['email'];
$tanggal_lahir = $data['tanggal_lahir'];

$sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jurusan', email='$email', tanggal_lahir='$tanggal_lahir' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Record updated successfully"]);
} else {
    echo json_encode(["message" => "Error: " . $conn->error]);
}
