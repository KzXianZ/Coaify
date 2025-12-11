<!-- home.php (出題者預設) -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>首頁 - 出題者</title>
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
.button {
    display: block;
    width: 80%;
    margin: 10px auto;
    padding: 15px;
    font-size: 16px;
    border-radius: 10px;
    cursor: pointer;
}
.logout-btn {
    position: absolute;
    bottom: 20px;
    right: 20px;
    padding: 10px 20px;
    background: #d9534f;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}
.switch-btn {
    display: inline-block;
    width: 45%;
    margin: 5px 2.5%;
    padding: 10px;
    font-size: 14px;
    border-radius: 8px;
    cursor: pointer;
}
.disabled {
    background-color: #ccc;
    cursor: default;
}
</style>
<script>
function logout(){ window.location.href='login.php'; }
function switchToPlayer(){ window.location.href='player.php'; }
function hostGame(){ window.location.href='host_game.php'; }
function quizManage(){ window.location.href='quiz_manage.php'; }
function records(){ window.location.href='records_host.php'; }
</script>
</head>
<body>
<div class="phone">
    <!-- 上方出題者/答題者切換 -->
    <button class="switch-btn disabled">出題者</button>
    <button class="switch-btn" onclick="switchToPlayer()">答題者</button>

    <h2>出題者功能</h2>
    <button class="button" onclick="hostGame()">Host Game</button>
    <button class="button" onclick="quizManage()">Quiz Manage</button>
    <button class="button" onclick="records()">Records</button>

    <button class="logout-btn" onclick="logout()">登出</button>
</div>
</body>
</html>