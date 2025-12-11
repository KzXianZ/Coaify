<!-- records_player.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>答題者 - 對戰紀錄</title>
<style>
body { font-family: Arial; margin: 0; }
.phone {
    width: 380px;
    height: 700px;
    margin: 20px auto;
    border: 2px solid #333;
    border-radius: 20px;
    position: relative;
    padding: 20px;
    box-sizing: border-box;
    text-align: center;
}
.record-btn {
    display: block;
    width: 80%;
    margin: 10px auto;
    padding: 15px;
    font-size: 16px;
    border-radius: 12px;
    cursor: pointer;
    border: 2px solid #333;
    background-color: #f8f8f8;
    text-align: left;
}
.search-input {
    width: 80%;
    padding: 12px;
    margin: 10px auto;
    font-size: 16px;
    border-radius: 12px;
    border: 2px solid #333;
    display: block;
}
.back-btn, .logout-btn {
    position: absolute;
    padding: 10px 20px;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}
.back-btn { left: 20px; bottom: 20px; background-color: #5bc0de; }
.logout-btn { right: 20px; bottom: 20px; background-color: #d9534f; }
</style>
<script>
function goBack(){ window.history.back(); }
function logout(){ window.location.href='login.php'; }
function filterRecords(){
    const search = document.getElementById('search').value.toLowerCase();
    document.querySelectorAll('.record-btn').forEach(btn => {
        if(btn.innerText.toLowerCase().includes(search)){
            btn.style.display='block';
        } else {
            btn.style.display='none';
        }
    });
}
function goToRecord(record){
    window.location.href = 'records_player_' + record + '.php';
}
</script>
</head>
<body>
<div class="phone">
    <h2>對戰紀錄</h2>
    <input type="text" id="search" class="search-input" placeholder="搜尋對戰紀錄" onkeyup="filterRecords()">

    <button class="record-btn" onclick="goToRecord('test1')">test1 (72/100) 成功</button>
    <button class="record-btn" onclick="goToRecord('test2')">test2 (50/100) 失敗</button>

    <button class="back-btn" onclick="goBack()">返回</button>
    <button class="logout-btn" onclick="logout()">登出</button>
</div>
</body>
</html>
