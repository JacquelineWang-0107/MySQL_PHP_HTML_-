<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <title>芊芊月子中心</title>
    <style>
    select[name="Confinementcenter[]"] option {
      font-size: 15px; 
    }
     </style>
</head>
<body>
    <marquee scrollamount="20" align="middle" behavior="scroll" font-family="微軟正黑體"><font size="150">🐣芊芊月子中心資料網路系統🐣</font></marquee>
   
   <form method= "get" action="center_add_query.php"> 
   <p style="box-sizing: border-box; font-family: 微軟正黑體; 
    font-weight: 600; 
    margin: 0px 0px 25px; 
    line-height: 1;
     padding: 0px;border-bottom-style: solid; 
     border-bottom-color:#348fbb9c; vertical-align: baseline;
     border-width:5px;"><span style="background-color:#348fbb9c; 
     border:0px; box-sizing:border-box; color:#ffffff;
     display:inline-block; font-family:微軟正黑體; font-size:30px; margin:0px; padding:8px 12px 5px; 
     vertical-align:baseline">新增➕</span></p>                  
     
        <h2>🍼請選擇需要新增的資料表:</h2> 
        <select name="Confinementcenter" id="tableSelect" onchange="loadTableData()">
            <option value="">請選擇</option>
            <option value="嬰兒" >嬰兒👶(嬰兒姓名,性別,體重,健康程度,生產日)</option>
            <option value="房間" >房間🏠(房型,房號,房價)</option>
            <option value="母親" >母親🤰(姓名,年齡,電話,住址,身體狀況,經濟狀況)</option>
            <option value="親屬" >親屬👨‍👩‍👧‍👦(姓名,關係,年齡)</option>
            <option value="護理師" >護理師👩‍⚕️(代號,薪水,工作內容,經驗,在職時間)</option>
        </select>

                                
        <h2>🍼輸入欲新增之項目(請對照上述項目填入資料):</h2>   
        <label for="num1"><font size="3">欄位1</font></label><br>
        <input type="text" id="num1" name="num1" value=""><br>
        <label for="num2"><font size="3">欄位2</font></label><br>
        <input type="text" id="num2" name="num2" value=""><br>
        <label for="num3"><font size="3">欄位3</font></label><br>
        <input type="text" id="num3" name="num3" value=""><br>
        <label for="num4"><font size="3">欄位4</font></label><br>
        <input type="text" id="num4" name="num4" value=""><br>
        <label for="num5"><font size="3">欄位5</font></label><br>
        <input type="text" id="num5" name="num5" value=""><br>
        <label for="num6"><font size="3">欄位6</font></label><br>
        <input type="text" id="num6" name="num6" value=""><br>
        
        <br><input type="submit" value="送出"> 
    </form> 

    <div id="tableData" style="margin-top: 20px;"></div>
    

    <script>
        function loadTableData() {
            const selectedTable = document.getElementById('tableSelect').value;
            const output = document.getElementById('tableData');


            fetch(`center_add_fetch_table.php?Confinementcenter=${encodeURIComponent(selectedTable)}`)
                .then(response => response.text())
                .then(data => {
                    output.innerHTML = data;
                })
                .catch(error => {
                    output.innerHTML = "載入資料失敗。";
                    console.error(error);
                });
        }
    </script>

</body> 
</html>