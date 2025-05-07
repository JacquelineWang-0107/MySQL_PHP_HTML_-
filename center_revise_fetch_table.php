<?php
$servername = "localhost";
$username = "root";
$password = "ite05240";
$dbname = "月子中心";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("連線失敗：" . $conn->connect_error);
}

$table = $_GET['Confinementcenter'] ?? '';
$allowedTables = ["嬰兒", "房間", "母親", "親屬", "護理師"];

echo '<style>
table {
    border-collapse: collapse;
    width: 90%;
    margin: 20px auto;
    font-family: 微軟正黑體;
    font-size: 18px;
}
th, td {
    border: 2px solid #348fbb;
    padding: 10px;
    text-align: center;
}
th {
    background-color: #cbe9f6;
}
</style>';




if (in_array($table, $allowedTables)) {
    $sql = "SELECT * FROM `$table`";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        echo "<table><tr>";
        while ($field = $result->fetch_field()) {
            echo "<th>" . htmlspecialchars($field->name) . "</th>";
        }
        echo "</tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "查無資料";
    }
} else {
    echo "資料表名稱不合法";
}

$conn->close();
?>
