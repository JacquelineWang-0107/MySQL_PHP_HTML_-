<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <title>芊芊月子中心</title>
</head>
<body>
    <marquee scrollamount="20" align="midden" behavior="scroll" font-family="微軟正黑體"><font size="150">🐣芊芊月子中心資料網路系統🐣</font></marquee>
    <p style="box-sizing: border-box; font-family: 微軟正黑體; 
    font-weight: 600; 
    margin: 0px 0px 25px; 
    line-height: 1;
     padding: 0px;border-bottom-style: solid; 
     border-bottom-color:#348fbb9c; vertical-align: baseline;
     border-width:5px;"><span style="background-color:#348fbb9c; 
     border:0px; box-sizing:border-box; color:#ffffff;
     display:inline-block; font-family:微軟正黑體; font-size:30px; margin:0px; padding:8px 12px 5px; 
     vertical-align:baseline">修改結果</span></p>                  
</body> 
</html>


<?php
$servername = "localhost";
$username = "root";
$password = "ite05240";
$dbname = "月子中心";

// 建立連線
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("❌ 連線失敗：" . mysqli_connect_error());
}

// 取得參數
$table = mysqli_real_escape_string($conn, $_GET['Confinementcenter']);
$need_revise = mysqli_real_escape_string($conn, $_GET['need_revise']);
$condition_field = mysqli_real_escape_string($conn, $_GET['condition_field']);
$identifier = mysqli_real_escape_string($conn, $_GET['identifier']);
$new_value = mysqli_real_escape_string($conn, $_GET['new_value']);

// 執行更新
$updateSql = "UPDATE `$table` SET `$need_revise` = '$new_value' WHERE `$condition_field` = '$identifier'";
if ($conn->query($updateSql) === TRUE) {

    // 顯示該資料表全部內容
    $selectSql = "SELECT * FROM `$table`";
    $result = $conn->query($selectSql);

    if ($result->num_rows > 0) {
        echo"<h2><center>📃資料庫修改結果📃</center></h2>";
        echo "<table border = '2' align='center'><tr>";
    
        // 修正這段：只呼叫一次 fetch_fields 並正確處理欄位列
        $fields = $result->fetch_fields();
        foreach ($fields as $field) {
            echo "<th>{$field->name}</th>";
        }
        echo "</tr>";
    
        // 顯示資料列
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "⚠️ 資料表中無資料";
    }
} else {
    echo "❌ 更新記錄時發生錯誤：" . $conn->error;
}

$conn->close();
?>

