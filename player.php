<?php
session_start();

// 檢查使用者是否已登入
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Coaify - 答題者首頁</title>
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
<style>
/* 定義像素風顏色變數 */
:root {
    --pixel-blue: #7fa4d9;
    --pixel-dark-blue: #5a82bc;
    --pixel-light-blue: #d4f4fe;
}

body {
    margin: 0;
    background-color: #ffffffff; /* 背景深色更突顯手機框 */
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    font-family: 'Press Start 2P', "微軟正黑體", "Microsoft JhengHei", sans-serif;
}

/* 模擬手機容器結構 */
.phone {
    width: 375px;
    height: 667px;
    background-image: url('S__1130501.jpg');
    background-size: cover; 
    background-repeat: no-repeat;
    background-position: center;
    border: 10px solid #000;
    border-radius: 25px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

/* 右上角 LOGOUT 連結 */
.logout-top {
    text-align: right;
    padding: 15px 20px;
}
.logout-top a {
    color: var(--pixel-dark-blue);
    font-size: 10px;
    text-decoration: underline;
    cursor: pointer;
    font-family: 'Press Start 2P', cursive;
    letter-spacing: 1px;
}

/* 頁籤容器 */
.tab-container {
    display: flex;
    margin-left: 20px;
    align-items: flex-end;
}

/* 頁籤樣式，對應 COAIFY (2).png 的配色 */
.tab {
    padding: 12px 25px;
    font-size: 18px;
    border-radius: 12px 12px 0 0;
    cursor: pointer;
    border: none;
    font-family: "微軟正黑體", sans-serif;
    font-weight: bold;
    letter-spacing: 1px;
}

/* 答題者標籤目前為活躍狀態 */
.tab-active {
    background-color: var(--pixel-blue);
    color: white;
    z-index: 2;
}

/* 出題者標籤目前為非活躍 */
.tab-inactive {
    background-color: #b8cde8;
    color: var(--pixel-dark-blue);
    margin-right: -5px;
    z-index: 1;
}

/* 藍色主面板內容 */
.main-panel {
    background-color: var(--pixel-blue);
    margin: 0 20px;
    padding: 60px 15px; 
    border-radius: 15px 0 15px 15px; /* 頁籤在右邊，調整左側圓角 */
    display: flex;
    flex-direction: column;
    gap: 35px; 
    align-items: center;
}

/* 像素風格按鈕 */
.pixel-button {
    width: 90%;
    background-color: var(--pixel-light-blue);
    border: 4px solid var(--pixel-dark-blue);
    box-shadow: inset -4px -4px 0px 0px #adcdec, 
                inset 4px 4px 0px 0px #ffffff;
    padding: 20px 0;
    font-family: 'Press Start 2P', cursive; /* 英文標題使用像素字體 */
    font-size: 14px;
    color: var(--pixel-dark-blue);
    cursor: pointer;
    text-transform: uppercase;
    transition: transform 0.1s;
    font-weight: bold;
    letter-spacing: 1px;
}

.pixel-button:active {
    transform: scale(0.98);
}

.pixel-button:focus {
    outline: none;
}
</style>
<script>
// 相關導向功能
function logout(){ window.location.href='login.php?action=logout'; }
function switchToHome(){ window.location.href='home.php'; }
function goToPin(){ window.location.href='pin.php'; }
function goToQRCode(){ window.location.href='qrcode.php'; }
function goToRecords(){ window.location.href='records_player.php'; }
</script>
</head>
<body>

<div class="phone">
    <div class="logout-top">
        <a onclick="logout()">LOGOUT</a>
    </div>

    <div class="tab-container">
        <div class="tab tab-inactive" onclick="switchToHome()">出題者</div>
        <div class="tab tab-active">答題者</div>
    </div>

    <div class="main-panel">
        <button class="pixel-button" onclick="goToPin()">ENTER PIN</button>
        <button class="pixel-button" onclick="goToQRCode()">SCAN QRCODE</button>
        <button class="pixel-button" onclick="goToRecords()">RECORDS</button>
    </div>
</div>

</body>
</html>