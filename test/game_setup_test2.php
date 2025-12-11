<!-- game_setup_test2.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Test2 遊戲設定</title>
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
.setting-btn {
    display: block;
    width: 80%;
    margin: 10px auto;
    padding: 20px;
    font-size: 16px;
    border-radius: 12px;
    cursor: pointer;
    border: 2px solid #333;
    background-color: #f8f8f8;
}
.setting-btn.selected {
    background-color: #5bc0de;
    color: white;
}
.select-difficulty {
    width: 80%;
    padding: 15px;
    margin: 10px auto;
    font-size: 16px;
    border-radius: 12px;
    border: 2px solid #333;
}
.host-btn, .start-btn {
    position: absolute;
    bottom: 120px;
    left: 50%;
    transform: translateX(-50%);
    width: 80%;
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
.back-btn {
    position: absolute;
    bottom: 20px;
    left: 20px;
    padding: 10px 20px;
    background: #5bc0de;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}
input[type=number] {
    width: 80%;
    padding: 15px;
    font-size: 16px;
    border-radius: 12px;
    border: 2px solid #333;
    margin: 10px auto;
    display: block;
}
.qr-container {
    width: 200px;
    height: 200px;
    margin: 20px auto;
    border: 2px solid #333;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    background-color: #eee;
}
.pin-code {
    font-size: 24px;
    margin: 10px 0;
    font-weight: bold;
}
.players-count {
    font-size: 18px;
    margin: 10px 0;
}
</style>
<script>
let selectedMode = null;
let currentPlayers = 0;
function logout(){ window.location.href='login.php'; }
function goBack(){ window.history.back(); }
function selectMode(btn, mode){
    if(selectedMode===mode){
        btn.classList.remove('selected');
        selectedMode = null;
    } else {
        document.querySelectorAll('.setting-btn').forEach(b=>b.classList.remove('selected'));
        btn.classList.add('selected');
        selectedMode = mode;
    }
}
function generateGame(){
    const players = document.getElementById('players').value;
    const difficulty = document.getElementById('difficulty').value;
    if(!players || !selectedMode){
        alert('請填寫參與人數並選擇個人或團隊');
        return;
    }
    document.getElementById('setup-area').style.display='none';
    const pin = Math.floor(100000 + Math.random() * 900000);
    document.getElementById('pin-code').innerText = pin;
    document.getElementById('qr-display').style.display='block';
    currentPlayers = 0;
    updatePlayersCount();
}
function updatePlayersCount(){
    document.getElementById('players-count').innerText = '目前進入玩家人數: ' + currentPlayers;
}
function startGame(){
    // 跳轉到 game_result_host.php
    window.location.href='game_result_host.php';
}
</script>
</head>
<body>
<div class="phone">
    <h2>Test2 遊戲設定</h2>
    <div id="setup-area">
        <input type="number" id="players" placeholder="設定參與人數" min="1">
        <button class="setting-btn" onclick="selectMode(this,'個人')">個人</button>
        <button class="setting-btn" onclick="selectMode(this,'團隊')">團隊</button>
        <select id="difficulty" class="select-difficulty">
            <option value="簡單">簡單</option>
            <option value="普通">普通</option>
            <option value="困難">困難</option>
        </select>
        <button class="host-btn" onclick="generateGame()">Host Game</button>
    </div>

    <div id="qr-display" style="display:none;">
        <div class="qr-container">QR Code 模擬</div>
        <div class="pin-code" id="pin-code"></div>
        <div class="players-count" id="players-count"></div>
        <button class="start-btn" onclick="startGame()">開始</button>
    </div>

    <button class="back-btn" onclick="goBack()">返回</button>
    <button class="logout-btn" onclick="logout()">登出</button>
</div>
</body>
</html>
