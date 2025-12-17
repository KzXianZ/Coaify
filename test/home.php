<?php

// ===========================================
// 1. Session 檢查與存取控制 (Access Control)
// ===========================================
session_start();

// 檢查登入狀態
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // 狀況 A: 未登入 -> 導向登入頁
    header('Location: login.php');
    exit();
}

// 通過所有檢查，頁面將繼續載入
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>首頁 - 出題者</title>
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
    
    /* 背景圖片設定 */
    background-image: url('home.png'); 
    background-size: cover; 
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
    color: #ffffff; 
    
    /* 使用 Flexbox 垂直排列內容 */
    display: flex;
    flex-direction: column;
    align-items: center; 
}

/* 3. 調整標題可讀性 */
h2 {
    background-color: rgba(0, 0, 0, 0.6);
    padding: 10px;
    border-radius: 8px;
    margin-top: 50px; 
}

/* 4. 內容按鈕 (Host Game, Quiz Manage, Records) */
.button {
    display: block;
    width: 80%;
    
    /* 按鈕間距 */
    margin: 10px auto; 
    
    padding: 15px;
    font-size: 16px;
    border-radius: 10px;
    cursor: pointer;
    background-color: rgba(255, 255, 255, 0.9); 
    color: #333;
    border: 2px solid #fff;
    font-weight: bold;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

/* 5. 切換按鈕 (出題者/答題者) - 橫向並排 */
.switch-container {
    display: flex; 
    width: 90%; 
    justify-content: center;
    
    /* 往下移動間距 */
    margin-top: 40px; 
    
    margin-bottom: 20px;
}

.switch-btn {
    display: block;
    flex-grow: 1; 
    
    /* **** 基礎設定：先設定文字置中 **** */
    text-align: center; 
    padding: 10px; 
    
    font-size: 14px;
    border-radius: 8px;
    cursor: pointer;
    
    background-color: transparent; 
    border: none; 
    
    color: #000; 
}

/* ** 新增：針對第一個按鈕 (出題者) 進行靠左對齊 ** */
.switch-btn:first-child {
    text-align: left; /* 文字靠左對齊 */
    /* 調整內邊距：左側增加到 20px，將文字往右推，達到往左邊偏移的效果 */
    padding: 10px 10px 10px 20px; 
}


.switch-btn.disabled {
    background-color: transparent; 
    cursor: default;
    border: none; 
    color: #000; 
}

/* 6. 登出按鈕 - 接在 Records 底下 */
.logout-btn {
    /* 移除絕對定位 */
    margin-top: 15px; 
    width: 80%; 
    padding: 10px 20px;
    background: #d9534f; /* 紅色 */
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}

</style>
<script>
function logout(){ 
    window.location.href='login.php?action=logout'; 
}
function switchToPlayer(){ window.location.href='player.php'; }
function hostGame(){ window.location.href='host_game.php'; }
function quizManage(){ window.location.href='quiz_manage.php'; }
function records(){ window.location.href='records_host.php'; }
</script>
</head>
<body>
<div class="phone">

    <div class="switch-container">
        <button class="switch-btn disabled">出題者</button> 
        <button class="switch-btn" onclick="switchToPlayer()">答題者</button> 
    </div>

    
    <button class="button" onclick="hostGame()">Host Game</button>
    <button class="button" onclick="quizManage()">Quiz Manage</button>
    <button class="button" onclick="records()">Records</button>

    <button class="logout-btn" onclick="logout()">登出</button>

</div>
</body>
</html>