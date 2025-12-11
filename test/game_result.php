<!-- game_result.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>遊戲結算</title>
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
.result-item {
    font-size: 18px;
    margin: 20px 0;
}
.action-btn {
    display: block;
    width: 80%;
    margin: 10px auto;
    padding: 15px;
    font-size: 16px;
    border-radius: 12px;
    cursor: pointer;
    border: 2px solid #333;
    background-color: #f8f8f8;
}
</style>
<script>
function goRegister(){ window.location.href='register.php'; }
function goLogin(){ window.location.href='login.php'; }
function goIndex(){ window.location.href='index.php'; }
</script>
</head>
<body>
<div class="phone">
    <h2>遊戲結算</h2>
    <div class="result-item">分數: 90/100</div>
    <div class="result-item">對BOSS造成傷害量: 5500</div>
    <div class="result-item">完成時間: 1.8HR</div>

    <button class="action-btn" onclick="goRegister()">註冊</button>
    <button class="action-btn" onclick="goLogin()">登入</button>
    <button class="action-btn" onclick="goIndex()">離開</button>
</div>
</body>
</html>