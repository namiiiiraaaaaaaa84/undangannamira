<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $status = 'Tidak Hadir';
    $status = 'Hadir';

    $sql = "INSERT INTO guestbook (name, address, status) VALUES ('$name', '$address', '$status')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New guest added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Guest</title>
    <style>
        body {
            background-color: white;
            font-family: Arial, sans-serif;
            text-align: center;
            width: 100%;
            padding: 10px;
            background-color: pink;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-container {
            width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: gray;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-container input {
            width: calc(93% - 10px);
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form method="POST" action="">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address"><br>
            <input type="submit" value="Submit">
        </form>
        <a href="addguest.php">Lihat Data Tamu</a>
    </div>
</body>
</html>