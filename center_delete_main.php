<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>芊芊月子中心</title>
    <style>
        select[name="Confinementcenter[]"] option {
            font-size: 15px; 
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>
<body>
    <marquee scrollamount="20" align="middle" behavior="scroll" style="font-family:微軟正黑體;">
        <font size="10">🐣芊芊月子中心資料網路系統🐣</font>
    </marquee>

    <form method="get" action="center_delete_query.php">
    <p style="box-sizing: border-box; font-family: 微軟正黑體; 
    font-weight: 600; 
    margin: 0px 0px 25px; 
    line-height: 1;
     padding: 0px;border-bottom-style: solid; 
     border-bottom-color:#348fbb9c; vertical-align: baseline;
     border-width:5px;"><span style="background-color:#348fbb9c; 
     border:0px; box-sizing:border-box; color:#ffffff;
     display:inline-block; font-family:微軟正黑體; font-size:30px; margin:0px; padding:8px 12px 5px; 
     vertical-align:baseline">刪除❌</span></p> 

        <h2>🍼請選擇欲編輯的資料表</h2>
        <select name="table" id="tableSelect" onchange="loadTableData()">
            <option value="請選擇">請選擇</option>
            <option value="母親">母親🤰</option>
            <option value="嬰兒">嬰兒👶</option>
            <option value="房間">房間🏠</option>
            <option value="親屬">親屬👨‍👩‍👧‍👦</option>
            <option value="護理師">護理師👩‍⚕️</option>
        </select>

        <h2>🍼請輸入欲刪除的項目</h2>
        <label for="row1">欄位1</label><br>
        <input type="text" id="row1" name="row1" value=""><br>
        
        <br><input type="submit" value="送出">

        <div id="tableData" style="margin-top: 20px;"></div>

    </form>

    <script>
        function loadTableData() {
            const selectedTable = document.getElementById('tableSelect').value;
            const output = document.getElementById('tableData');


            fetch(`center_delete_fetch_table.php?table=${encodeURIComponent(selectedTable)}`)
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
