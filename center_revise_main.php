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
    <marquee scrollamount="20" align="midden" behavior="scroll" font-family="微軟正黑體"><font size="10">🐣芊芊月子中心資料網路系統🐣</font></marquee>
    <p style="box-sizing: border-box; font-family: 微軟正黑體; 
    font-weight: 600; 
    margin: 0px 0px 25px; 
    line-height: 1;
     padding: 0px;border-bottom-style: solid; 
     border-bottom-color:#348fbb9c; vertical-align: baseline;
     border-width:5px;"><span style="background-color:#348fbb9c; 
     border:0px; box-sizing:border-box; color:#ffffff;
     display:inline-block; font-family:微軟正黑體; font-size:30px; margin:0px; padding:8px 12px 5px; 
     vertical-align:baseline">修改🔨</span></p>
     

        <form method= "get" action="center_revise_query.php">
        <h2>🍼請選擇需要修改的資料表:</h2>
        <select name="Confinementcenter" id="tableSelect" onchange="loadTableColumns(); loadTableData();">
            <option value="" align="center">請選擇</option>
            <option value="嬰兒" align="center">嬰兒👶</option>
            <option value="房間" align="center">房間🏠</option>
            <option value="母親" align="center">母親🤰</option>
            <option value="親屬" align="center">親屬👨‍👩‍👧‍👦</option>
            <option value="護理師" align="center">護理師👩‍⚕️</option>
        </select>

        <h2>🍼請輸入條件欄位（如 嬰兒姓名）：</h2>
        <input type="text" id="condition_field" name="condition_field" required><br>
        
        <h2>🍼請輸入條件值:(如 王小明)</h2>
        <input type="text" id="identifier" name="identifier" required><br>
        
        <h2>🍼請選擇欲修改欄位:</h2>
        <select id="need_revise" name="need_revise">
            <option value="">請先選擇資料表</option>
        </select><br>
        
        <h2>🍼輸入新的內容:</h2>
        <input type="text" id="new_value" name="new_value" value=""><br>
        
        <br><input type="submit" value="送出"> 
    </form> 

    <div id="tableData" style="margin-top: 20px;"></div>
    
    <script>
    function loadTableColumns() {
        const tableName = document.getElementById('tableSelect').value;
        const columnSelect = document.getElementById('need_revise');

        if (!tableName) {
            columnSelect.innerHTML = '<option value="">請先選擇資料表</option>';
            return;
        }

        fetch(`center_revise_get_columns.php?table=${encodeURIComponent(tableName)}`)
            .then(response => response.json())
            .then(data => {
                columnSelect.innerHTML = '';
                data.forEach(column => {
                    const option = document.createElement('option');
                    option.value = column;
                    option.textContent = column;
                    columnSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('錯誤:', error);
                columnSelect.innerHTML = '<option value="">載入失敗</option>';
            });
    }

    function loadTableData() {
        const selectedTable = document.getElementById('tableSelect').value;
        const output = document.getElementById('tableData');


        fetch(`center_revise_fetch_table.php?Confinementcenter=${encodeURIComponent(selectedTable)}`)
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