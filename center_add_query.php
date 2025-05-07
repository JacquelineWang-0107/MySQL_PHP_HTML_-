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
     vertical-align:baseline">新增結果</span></p>                  
</body> 
</html>

<?php   
        $servername = "localhost:3306";
        $username = "root";
        $password = "ite05240";
        $conn = mysqli_connect($servername, $username, $password, "月子中心");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        $Confinementcenter= $_GET["Confinementcenter"];
        $num1 = $_GET["num1"];
        $num2 = $_GET["num2"];
        $num3 = $_GET["num3"];
        $num4 = $_GET["num4"];
        $num5 = $_GET["num5"];
        $num6 = $_GET["num6"]; 
        
        if($Confinementcenter=="嬰兒"){$sql = "INSERT INTO  嬰兒 (`嬰兒姓名`,`性別`,`體重`,`健康程度`,`生產日`) VALUE ('$num1','$num2','$num3','$num4','$num5') "; $qq="嬰兒";};
        if($Confinementcenter=="房間"){$sql = "INSERT INTO  房間 (`房型`,`房號`,`房價`) VALUE ('$num1','$num2','$num3') ";$qq="房間";};
        if($Confinementcenter=="母親"){$sql = "INSERT INTO  母親 (`母親姓名`,`母親年齡`,`母親電話`,`母親住址`,`身體狀況`,`經濟狀況`) VALUE ('$num1','$num2','$num3','$num4','$num5','$num6') ";$qq="母親";}; 
        if($Confinementcenter=="親屬"){$sql = "INSERT INTO  親屬 (`親屬姓名`,`關係`,`親屬年齡`) VALUE ('$num1','$num2','$num3') ";$qq="親屬";};
        if($Confinementcenter=="護理師"){$sql = "INSERT INTO  護理師 (`護理師代號`,`薪水`,`工作內容`,`護理師經驗`,`在職時間`) VALUE ('$num1','$num2','$num3','$num4','$num5')";$qq="護理師";};

        
        $result = mysqli_query($conn,$sql);

        $sqlall =  "SELECT * FROM $qq";
        $result = mysqli_query($conn,$sqlall);

        
        echo"<h2><center>📃資料庫新增結果📃</center></h2>";
        echo "<table border = '2'  align='center' >";

        while ($meta = mysqli_fetch_field($result)) {
            echo "<td align=center> $meta->name </td>";
        }

        echo "</tr>";
        while($row=mysqli_fetch_row($result)) {
            echo "<tr>";
            for($j=0; $j<mysqli_num_fields($result); $j++) {
                    echo "<td>$row[$j]</td>";
            }
            echo "</tr>";
        }
    
        echo "</table>";
         mysqli_close($conn); 

?>