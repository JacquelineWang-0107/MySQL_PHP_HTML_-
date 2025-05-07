<?php
$servername = "localhost";
$username = "root";
$password = "ite05240";
$dbname = "月子中心";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");


$table = $_GET['table'] ?? '';

if (!$table) {
    echo json_encode([]);
    exit;
}

$sql = "SHOW COLUMNS FROM `$table`";
$result = $conn->query($sql);

$columns = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $columns[] = $row['Field'];
    }
}

echo json_encode($columns);
$conn->close();
?>
