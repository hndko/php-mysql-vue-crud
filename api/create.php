<?php
require_once '../config/db.php';

$data = json_decode(file_get_contents("php://input"), true);
$nama = $data['nama'];
$nim = $data['nim'];
$jurusan = $data['jurusan'];
$email = $data['email'];
$tanggal_lahir = $data['tanggal_lahir'];

$sql = "INSERT INTO mahasiswa (nama, nim, jurusan, email, tanggal_lahir) VALUES ('$nama', '$nim', '$jurusan', '$email', '$tanggal_lahir')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Record created successfully"]);
} else {
    echo json_encode(["message" => "Error: " . $conn->error]);
}
