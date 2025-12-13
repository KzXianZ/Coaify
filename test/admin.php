<?php
/**
 * 檔案名稱: admin.php
 * 描述: 管理員控制面板總覽頁/儀表板。
 * 規範: 檢查 Session 狀態，並採用 home.php 的手機框架樣式與按鈕格式。
 */
session_start();

// 檢查登入狀態
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // 雖然登出導向 index.php，但未登入狀態仍應導向 login.php
    header('Location: login.php');
    exit();
}
// 假設您在 login.php 設置了 $_SESSION['username']
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>管理員 - 儀表板</title>
<style>
/* ============================================================== */
/* 複製 home.php 的核心樣式 */
/* ============================================================== */
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
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
}
.button {
    display: block;
    width: 80%;
    margin: 10px auto;
    padding: 15px;
    font-size: 16px;
    border-radius: 10px;
    cursor: pointer;
    /* 為了讓按鈕有顏色，我們在這裡補充背景和文字顏色 */
    background-color: #3498db; 
    color: white;
    border: none;
}
.button:hover {
    background-color: #2980b9;
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
/* ============================================================== */
</style>
<script>
// 【修正】登出導向 index.php
function logout(){ 
    window.location.href='login.php?action=logout'; }
// 定義管理頁面所需的導航函式
function goToRecords(){ 
    window.location.href='admin_records.php'; 
}
function goToPlayerManagement(){ 
    window.location.href='player_management.php'; 
}
</script>
</head>
<body>
<div class="phone">
    <h2>管理員功能</h2>
    <p>歡迎您，<?= htmlspecialchars($_SESSION['username'] ?? '管理者') ?>！</p>
    
    <hr>
    
    <button class="button" onclick="goToRecords()">
        🎮 遊戲紀錄查詢
    </button>
    
    <button class="button" onclick="goToPlayerManagement()">
        👤 玩家資料修改
    </button>

    <hr>

    <button class="logout-btn" onclick="logout()">登出</button>
</div>
</body>
</html>