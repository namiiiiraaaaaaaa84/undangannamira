<?php
include 'db.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_hadir = "SELECT * FROM guestbook WHERE status = 'Hadir'";
$result_hadir = $conn->query($sql_hadir);

if (!$result_hadir) {
    die("Query Error: " . $conn->error);
}

$sql_tidak_hadir = "SELECT * FROM guestbook WHERE status = 'Tidak Hadir'";
$result_tidak_hadir = $conn->query($sql_tidak_hadir);

if (!$result_tidak_hadir) {
    die("Query Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Tamu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 20px;
        }
        h3 {
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .print-button {
            margin-bottom: 20px;
        }
    </style>
    <script>
        function printTable() {
            window.print();
        }
    </script>
</head>
<body>
    <h1>DATA TAMU YANG HADIR</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Check-in</th>
            <th>Status</th>
        </tr>
        <?php
        if ($result_hadir->num_rows > 0) {
            while($row = $result_hadir->fetch_assoc()) {
                echo "<tr><td>" . $row["name"]. "</td><td>" . $row["address"]. "</td><td>" . $row["datetime"]. "</td><td>" . $row["status"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No guests found</td></tr>";
        }
        ?>
    </table>

    <h1>DATA TAMU YANG TIDAK HADIR</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Status</th>
        </tr>
        <?php
        if ($result_tidak_hadir->num_rows > 0) {
            while($row = $result_tidak_hadir->fetch_assoc()) {
                echo "<tr><td>" . $row["name"]. "</td><td>" . $row["address"]. "</td><td>" . $row["status"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No guests found</td></tr>";
        }
        ?>
    </table>

    <button class="print-button" onclick="printTable()">Cetak</button>
</body>
</html>
<?php
$conn->close();
?>