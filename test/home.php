<?php
session_start();
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
<title>首頁 - 出題者</title>
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
<style>
:root {
    --pixel-blue: #7fa4d9;
    --pixel-dark-blue: #5a82bc;
    --pixel-light-blue: #d4f4fe;
}

body {
    margin: 0;
    background-color: #f8f9fa;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    /* 設定全域中文字體為黑體系列 */
    font-family: 'Press Start 2P', "微軟正黑體", "Microsoft JhengHei", sans-serif;
}

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

.logout-top {
    text-align: right;
    padding: 10px 15px;
}
.logout-top a {
    color: var(--pixel-dark-blue);
    font-size: 10px;
    text-decoration: underline;
    cursor: pointer;
    font-family: 'Press Start 2P', cursive;
}

.tab-container {
    display: flex;
    margin-left: 20px;
    align-items: flex-end;
}

/* 調整標籤文字大小與間距 */
.tab {
    padding: 12px 20px;
    font-size: 18px; /* 加大字體 */
    border-radius: 12px 12px 0 0;
    cursor: pointer;
    border: none;
    font-family: "微軟正黑體", "Microsoft JhengHei", sans-serif; /* 確保中文套用黑體 */
    font-weight: bold;
    letter-spacing: 1px; /* 縮小字間距 */
}

.tab-active {
    background-color: var(--pixel-blue);
    color: white;
    z-index: 2;
}

.tab-inactive {
    background-color: #b8cde8;
    color: var(--pixel-dark-blue);
    font-size: 14px; /* 答題者字體也相對加大 */
    padding: 8px 15px;
    margin-left: -5px;
    z-index: 1;
}

.main-panel {
    background-color: var(--pixel-blue);
    margin: 0 20px;
    flex-grow: 0;
    padding: 60px 15px; 
    border-radius: 0 15px 15px 15px;
    display: flex;
    flex-direction: column;
    gap: 35px; 
    align-items: center;
}

.pixel-button {
    width: 90%;
    background-color: var(--pixel-light-blue);
    border: 4px solid var(--pixel-dark-blue);
    box-shadow: inset -4px -4px 0px 0px #adcdec, 
                inset 4px 4px 0px 0px #ffffff;
    padding: 15px 0;
    font-family: 'Press Start 2P', "微軟正黑體", sans-serif;
    font-size: 14px;
    color: var(--pixel-dark-blue);
    cursor: pointer;
    text-transform: uppercase;
    transition: transform 0.1s;
    font-weight: bold;
}

.pixel-button:active {
    transform: scale(0.98);
    box-shadow: inset 4px 4px 0px 0px #adcdec;
}

.pixel-button:focus {
    outline: none;
}
</style>
<script>
function logout(){ window.location.href='login.php?action=logout'; }
function switchToPlayer(){ window.location.href='player.php'; }
function hostGame(){ window.location.href='host_game.php'; }
function quizManage(){ window.location.href='quiz_manage.php'; }
function records(){ window.location.href='records_host.php'; }
</script>
</head>
<body>

<div class="phone">
    <div class="logout-top">
        <a onclick="logout()">LOGOUT</a>
    </div>

    <div class="tab-container">
        <div class="tab tab-active">出題者</div>
        <div class="tab tab-inactive" onclick="switchToPlayer()">答題者</div>
    </div>

    <div class="main-panel">
        <button class="pixel-button" onclick="hostGame()">Host Game</button>
        <button class="pixel-button" onclick="quizManage()">Quiz Manage</button>
        <button class="pixel-button" onclick="records()">Records</button>
    </div>
</div>

</body>
</html>