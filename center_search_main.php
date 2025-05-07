<!DOCTYPE html>
<head>
    <title>芊芊月子中心</title>
</head>
<body>
    <marquee scrollamount="20" align="midden" behavior="scroll" font-family="微軟正黑體"><font size="10">🐣芊芊月子中心資料網路系統🐣</font></marquee>
    <form method= "get" action="center_search_query.php">
    <p style="box-sizing: border-box; font-family: 微軟正黑體; 
    font-weight: 600; 
    margin: 0px 0px 25px; 
    line-height: 1;
     padding: 0px;border-bottom-style: solid; 
     border-bottom-color:#348fbb9c; vertical-align: baseline;
     border-width:5px;"><span style="background-color:#348fbb9c; 
     border:0px; box-sizing:border-box; color:#ffffff;
     display:inline-block; font-family:微軟正黑體; font-size:30px; margin:0px; padding:8px 12px 5px; 
     vertical-align:baseline">查詢🔍</span></p>

    <h2>🍼請選擇欲查詢的資料表</h2>
    <select name = "table" id="tableSelect" onchange="loadTableData()">
        <option value="請選擇">請選擇</option>
        <option value="母親">母親🤰(姓名,年齡,電話,住址,身體狀況,經濟狀況)</option>
        <option value="嬰兒">嬰兒👶(嬰兒姓名,性別,體重,健康程度,生產日)</option>
        <option value="房間">房間🏠(房型,房號,房價)</option>
        <option value="親屬">親屬👨‍👩‍👧‍👦(姓名,關係,年齡)</option>
        <option value="護理師">護理師👩‍⚕️(代號,薪水,工作內容,經驗,在職時間)</option>
    </select>

    <h2>🍼請輸入欲查詢的項目(請對照上述欄位填入想要找的資料)：</h2>
    <label for="row1">欄位1</label><br>
        <input type="text" id="row1" name="row1" value=""><br>
    <label for="row2">欄位2</label><br>
        <input type="text" id="row2" name="row2" value=""><br>
    <label for="row3">欄位3</label><br>
        <input type="text" id="row3" name="row3" value=""><br>
    <label for="row4">欄位4</label><br>
        <input type="text" id="row4" name="row4" value=""><br>
    <label for="row5">欄位5</label><br>
        <input type="text" id="row5" name="row5" value=""><br>
    <label for="row6">欄位6</label><br>
        <input type="text" id="row6" name="row6" value=""><br>

      <br><input type="submit" value="送出">

      <div id="tableData" style="margin-top: 20px;"></div>
      
    </form>

    <script>
        function loadTableData() {
            const selectedTable = document.getElementById('tableSelect').value;
            const output = document.getElementById('tableData');


            fetch(`center_search_fetch_table.php?table=${encodeURIComponent(selectedTable)}`)
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