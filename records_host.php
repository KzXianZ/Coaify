<?php
session_start();

// 檢查登入狀態
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
<title>對戰紀錄</title>
<link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
<style>
/* ================= 1. 基礎設定 ================= */
body {
    font-family: 'VT323', monospace;
    margin: 0;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* ================= 2. 手機容器 ================= */
.phone {
    width: 380px;
    height: 700px;
    
    background-image: url('home.png'); 
    background-size: cover; 
    background-repeat: no-repeat;
    background-position: center;
    
    border: 10px solid #000;
    border-radius: 40px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
    
    position: relative;
    box-sizing: border-box;
    overflow: hidden; 
    
    display: flex;
    flex-direction: column;
    align-items: center; 
}

/* ================= 3. 標籤文字 ================= */
.tab-text-left {
    position: absolute;
    top: 60px;       
    left: 50px;
    color: #ffffff;
    font-size: 26px;
    font-weight: bold;
    letter-spacing: 2px;
    text-shadow: 2px 2px 0 rgba(0,0,0,0.1);
    z-index: 5;
}

.tab-text-right {
    position: absolute;
    top: 62px;       
    right: 42px;
    color: #5d8bb5; /* 淺藍色字體 */
    font-size: 24px;
    font-weight: bold;
    letter-spacing: 1px;
    z-index: 5;
}

/* ================= 4. LOGOUT (右上角文字連結) ================= */
.logout-link {
    position: absolute;
    top: 25px;
    right: 25px;
    color: #2a5ca8; /* 深藍色連結 */
    font-size: 20px;
    font-weight: bold;
    text-decoration: underline;
    cursor: pointer;
    z-index: 10;
    text-transform: uppercase;
}
.logout-link:hover {
    color: #d9534f;
}

/* ================= 5. 內容區塊 ================= */
.content-container {
    position: absolute;
    top: 110px; 
    width: 85%; 
    height: 480px; 
    
    padding: 10px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* --- 上方工具列 (返回按鈕 + 搜尋框) --- */
.header-row {
    display: flex;
    width: 100%;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

/* 圓形返回按鈕 */
.back-circle-btn {
    width: 36px;
    height: 36px;
    border: 3px solid #fff;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    color: #fff;
    font-size: 24px;
    font-weight: bold;
    flex-shrink: 0;
    margin-right: 10px;
}
.back-circle-btn:active {
    transform: scale(0.9);
}

/* 搜尋框 */
.search-input {
    flex-grow: 1; 
    padding: 8px 10px;
    font-size: 18px;
    border: none;
    border-radius: 0; /* 方形 */
    background-color: #ffffff;
    box-shadow: 0 2px 0 rgba(0,0,0,0.1);
    text-align: center;
    font-family: 'VT323', monospace;
    color: #5d8bb5;
    font-weight: bold;
    text-transform: uppercase;
}
.search-input::placeholder { color: #9dc3e6; }

/* --- 紀錄列表 --- */
.record-list {
    width: 100%;
    overflow-y: auto;
    flex-grow: 1; 
    padding-right: 5px; 
}

/* 白色紀錄卡片 */
.record-card {
    display: flex;
    justify-content: space-between;
    align-items: center;
    
    width: 100%;
    background-color: #ffffff;
    padding: 12px 15px;
    margin-bottom: 12px;
    box-sizing: border-box;
    box-shadow: 0 4px 0 rgba(0,0,0,0.1);
    border-radius: 2px;
    cursor: pointer;
}

/* 卡片文字資訊 */
.r-info {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.r-title {
    font-size: 20px;
    color: #5d8bb5; /* 像素藍 */
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
    line-height: 1.2;
}

.r-sub {
    font-size: 14px;
    color: #9dc3e6; /* 淺藍色小字 */
    margin-top: 4px;
}

/* 右側箭頭 */
.arrow-icon {
    font-size: 24px;
    color: #9dc3e6;
    border: 2px solid #9dc3e6;
    border-radius: 50%;
    width: 32px;
    height: 32px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    padding-bottom: 2px;
}

</style>
<script>
// 1. 返回上一頁
function goBack(){ window.history.back(); }

// 2. 登出
function logout(){ window.location.href='login.php?action=logout'; }

// 3. 跳轉詳細紀錄
function goToRecord(record){
    window.location.href = 'records_host_' + record + '.php';
}

// 4. ★★★ 強化版搜尋功能 ★★★
function filterRecords(){
    // 取得輸入值：轉小寫、並使用 replace(/\s+/g, '') 移除所有空白
    const search = document.getElementById('search').value.toLowerCase().replace(/\s+/g, '');
    
    document.querySelectorAll('.record-card').forEach(card => {
        // 取得標題：轉小寫、同樣移除所有空白
        const title = card.querySelector('.r-title').innerText.toLowerCase().replace(/\s+/g, '');
        
        // 這樣輸入 "test1" 就會等於 "test1" (原本是 "TEST 1")
        if(title.includes(search)){
            card.style.display = 'flex'; 
        } else {
            card.style.display = 'none'; 
        }
    });
}
</script>
</head>
<body>
<div class="phone">

    <div class="tab-text-left">出題者</div>
    <div class="tab-text-right">RECORDS</div>

    <div class="logout-link" onclick="logout()">LOGOUT</div>

    <div class="content-container">
        
        <div class="header-row">
            <div class="back-circle-btn" onclick="goBack()">&#8592;</div>
            <input type="text" id="search" class="search-input" placeholder="SEARCH" onkeyup="filterRecords()">
        </div>

        <div class="record-list">
            
            <div class="record-card" onclick="goToRecord('test1')">
                <div class="r-info">
                    <span class="r-title">TEST 1 (SUCCESS)</span>
                    <span class="r-sub">2025.11.15 (1.5HR)</span>
                </div>
                <div class="arrow-icon">&#8594;</div>
            </div>

            <div class="record-card" onclick="goToRecord('test2')">
                <div class="r-info">
                    <span class="r-title">TEST 2 (FAILED)</span>
                    <span class="r-sub">2025.11.16 (1.8HR)</span>
                </div>
                <div class="arrow-icon">&#8594;</div>
            </div>

        </div>

    </div>

</div>
</body>
</html>