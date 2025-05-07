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
     vertical-align:baseline">刪除結果</span></p>                  
</body> 
</html>

<?php

        $servername = "localhost";
        $username = "root";
        $password = "ite05240";
        $dbname = "月子中心";

        $row1 = $_GET["row1"];
        $table = $_GET["table"];

        $conn = mysqli_connect($servername, $username, $password,$dbname)
            or die("MySQL 伺服器連結失敗 <br>");

        if($table=="母親")
        {
            $row[0]="母親姓名";
            $row[1]="母親年齡";
            $row[2]="母親電話";
            $row[3]="母親住址";
            $row[4]="身體狀況";
            $row[5]="經濟狀況";
            $sql = "SELECT $row[0],$row[1],$row[2],$row[3],$row[4],$row[5] FROM $table";
        }
        else if($table=="嬰兒")
        {
            $row[0]="嬰兒姓名";
            $row[1]="性別";
            $row[2]="體重";
            $row[3]="健康程度";
            $row[4]="生產日";
            $sql = "SELECT $row[0],$row[1],$row[2],$row[3],$row[4] FROM $table";
        }
        else if($table=="房間")
        {
            $row[0]="房型";
            $row[1]="房號";
            $row[2]="房價";
            $sql = "SELECT $row[0],$row[1],$row[2] FROM $table";
        }        
        else if($table=="親屬")
        {
            $row[0]="親屬姓名";
            $row[1]="關係";
            $row[2]="親屬年齡";
            $sql = "SELECT $row[0],$row[1],$row[2] FROM $table";
        }
        else if($table=="護理師")
        {
            $row[0]="護理師代號";
            $row[1]="薪水";
            $row[2]="工作內容";
            $row[3]="護理師經驗";
            $row[4]="在職時間";
            $sql = "SELECT $row[0],$row[1],$row[2],$row[3],$row[4] FROM $table";
        }

        $delete = "DELETE FROM $table WHERE $row[0] = '$row1'";
        mysqli_query($conn, $delete);
        $result = mysqli_query($conn, $sql);

        echo"<h2><center>📃資料庫刪除結果📃</center></h2>";
        echo "<table border = '2' align='center'>";

        $j=0;
        while($nextrow=mysqli_fetch_field($result))
        {
            echo "<td> $row[$j] </td>";
            $j++;
        }

        //echo "</tr>";
        while($row=mysqli_fetch_row($result)) 
        {
            if($row1!=$row[0])
            {
                echo "<tr>";
                for($j=0; $j<mysqli_num_fields($result); $j++) 
                {
                    echo "<td>$row[$j]</td>";
                }
                echo "</tr>";
            }
            
            
        }
        echo "</table>";

        mysqli_close($conn);
?>