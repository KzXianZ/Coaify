<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Test2 遊戲設定</title>
<style>
/* 1. BODY 保持簡潔 */
body { 
    font-family: Arial, sans-serif; 
    margin: 0; 
    background-color: #f0f0f0; /* 整個網頁的淺色背景 */
    color: #333;
}

/* 2. PHONE 容器應用背景圖片 */
.phone {
    width: 380px;
    height: 700px;
    margin: 20px auto;
    
    /* ==== 主要修改點：背景圖片應用於此 ==== */
    background-image: url('S__1130501.jpg'); /* 圖片路徑 */
    background-size: cover; /* 讓背景圖片覆蓋整個手機螢幕區域 */
    background-repeat: no-repeat;
    background-position: center; 
    
    /* 模擬手機邊框 */
    border: 10px solid #000; 
    border-radius: 25px; 
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); 
    
    /* 內容設定 */
    position: relative;
    padding: 20px;
    box-sizing: border-box;
    text-align: center;
    color: #ffffff; /* 確保文字在圖片背景上清晰可見 */
}

/* 調整標題和文字可讀性 */
h2 {
    background-color: rgba(0, 0, 0, 0.6); 
    padding: 10px;
    border-radius: 8px;
}
.pin-code, .players-count {
    background-color: rgba(0, 0, 0, 0.6);
    padding: 5px;
    border-radius: 5px;
    width: fit-content;
    margin-left: auto;
    margin-right: auto;
}

/* 設置輸入框/選擇器/按鈕的樣式以配合深色背景 */
input[type=number], .select-difficulty {
    width: 80%;
    padding: 15px;
    font-size: 16px;
    border-radius: 12px;
    border: 2px solid #fff; /* 白色邊框 */
    margin: 10px auto;
    display: block;
    background-color: rgba(255, 255, 255, 0.9); /* 淺色半透明背景 */
    color: #333;
}

.setting-btn {
    display: block;
    width: 80%;
    margin: 10px auto;
    padding: 20px;
    font-size: 16px;
    border-radius: 12px;
    cursor: pointer;
    border: 2px solid #fff;
    background-color: rgba(255, 255, 255, 0.9);
    color: #333;
}
.setting-btn.selected {
    background-color: #5bc0de;
    color: white;
    border: 2px solid #fff;
}

/* Host/Start 按鈕 */
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
    background: #5cb85c; /* 綠色 */
    color: white;
    border: 2px solid #fff;
}

/* 登出/返回 按鈕 */
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

/* QR Code 區域 */
.qr-container {
    width: 200px;
    height: 200px;
    margin: 20px auto;
    border: 2px solid #fff; /* 白色邊框 */
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    background-color: rgba(255, 255, 255, 0.9); /* 淺色背景模擬 QR 碼區域 */
    color: #333; /* 確保 QR 碼文字清晰 */
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
function logout(){ window.location.href='login.php?action=logout'; }
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