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
     vertical-align:baseline">查詢結果</span></p>                  
</body> 
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "ite05240";
$dbname = "月子中心";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("連線失敗：" . mysqli_connect_error());
}

$row1 = $_GET["row1"];
$row2 = $_GET["row2"];
$row3 = $_GET["row3"];
$row4 = $_GET["row4"];
$row5 = $_GET["row5"];
$row6 = $_GET["row6"];
$table = $_GET["table"];

$row = [];  // 欄位名稱
switch ($table) {
    case "母親":
        $row = ["母親姓名", "母親年齡", "母親電話", "母親住址", "身體狀況", "經濟狀況"];
        break;
    case "嬰兒":
        $row = ["嬰兒姓名", "性別", "體重", "健康程度", "生產日"];
        break;
    case "房間":
        $row = ["房型", "房號", "房價"];
        break;
    case "親屬":
        $row = ["親屬姓名", "關係", "親屬年齡"];
        break;
    case "護理師":
        $row = ["護理師代號", "薪水", "工作內容", "護理師經驗", "在職時間"];
        break;
    default:
        echo "❌ 無效的資料表名稱";
        exit();
}

$inputs = [$row1, $row2, $row3, $row4, $row5, $row6];

// 組成 WHERE 條件
$whereClauses = [];
for ($i = 0; $i < count($row); $i++) {
    if (!empty($inputs[$i])) {
        $value = mysqli_real_escape_string($conn, $inputs[$i]);
        $whereClauses[] = "`" . $row[$i] . "` = '$value'";
    }
}

$whereSql = (count($whereClauses) > 0) ? "WHERE " . implode(" AND ", $whereClauses) : "";

$sql = "SELECT * FROM `$table` $whereSql";
$result = mysqli_query($conn, $sql);

// 顯示結果
echo "<h2><center>📃資料庫查詢結果📃</center></h2>";
echo "<table border='2' align='center'>";

// 顯示欄位名稱
foreach ($row as $colName) {
    echo "<td>$colName</td>";
}
echo "</tr>";

// 顯示資料列
if (mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_row($result)) {
        echo "<tr>";
        foreach ($data as $item) {
            echo "<td>$item</td>";
        }
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='10'><center>*沒有任何資料</center></td></tr>";
}

echo "</table>";
mysqli_close($conn);
?>
