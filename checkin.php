<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $checkin_time = date('Y-m-d H:i:s');
    $status = 'Hadir';
    $status = 'Tidak Hadir';

    $sql = "UPDATE guests SET checkin='$checkin_time', status='$status' WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>