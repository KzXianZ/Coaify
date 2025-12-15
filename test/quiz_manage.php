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
<title>管理題庫</title>
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
    color: #5d8bb5;
    font-size: 24px;
    font-weight: bold;
    letter-spacing: 1px;
    z-index: 5;
}

/* ================= 4. 內容區塊 (高度調整重點) ================= */
.content-container {
    position: absolute;
    top: 130px; 
    width: 85%; 
    
    /* ★★★ 修改這裡：高度從 440px 改為 390px，讓底部按鈕往上縮 ★★★ */
    height: 390px; 
    
    padding: 10px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* 搜尋框 */
.search-input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px; 
    font-size: 18px;
    border: none;
    border-radius: 0; 
    background-color: #ffffff;
    box-shadow: 0 2px 0 rgba(0,0,0,0.1);
    text-align: center;
    font-family: 'VT323', monospace;
    color: #5d8bb5;
    font-weight: bold;
    text-transform: uppercase;
}
.search-input::placeholder {
    color: #9dc3e6;
}

/* 題庫列表容器 */
.quiz-list {
    width: 100%;
    overflow-y: auto;
    flex-grow: 1; /* 佔滿剩餘空間 */
    padding-right: 5px; 
    margin-bottom: 10px;
}

/* 白色題庫卡片 */
.quiz-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    
    width: 100%;
    background-color: #ffffff;
    padding: 15px;
    margin-bottom: 12px;
    box-sizing: border-box;
    cursor: pointer;
    box-shadow: 0 4px 0 rgba(0,0,0,0.1); 
    transition: transform 0.1s;
}

.quiz-item:active {
    transform: translateY(2px);
    box-shadow: 0 2px 0 rgba(0,0,0,0.1);
}

.quiz-info {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.quiz-title {
    font-size: 22px;
    color: #5d8bb5; 
    font-weight: bold;
    text-transform: uppercase;
    line-height: 1.2;
}

.quiz-sub {
    font-size: 14px;
    color: #9dc3e6; 
    margin-top: 4px;
}

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

/* CREATE QUIZ 按鈕 */
.create-btn-inner {
    width: 100%;
    padding: 12px;
    background-color: #dbeeff; 
    color: #5d8bb5; 
    font-size: 22px;
    font-weight: bold;
    border: 3px solid #5d8bb5;
    cursor: pointer;
    box-shadow: 0 2px 0 rgba(0,0,0,0.1);
    font-family: 'VT323', monospace;
    text-transform: uppercase;
    margin-top: auto; /* 推到底部 */
}

.create-btn-inner:active {
    background-color: #cceeff;
    transform: translateY(2px);
}

/* ================= 5. 底部功能按鈕 ================= */
.back-btn {
    position: absolute;
    bottom: 30px;
    left: 40px;
    padding: 8px 15px;
    background-color: transparent; 
    color: white; 
    border: 3px solid #fff; 
    border-radius: 50%; 
    width: 45px;
    height: 45px;
    cursor: pointer;
    z-index: 5;
    font-size: 24px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.logout-btn {
    position: absolute;
    bottom: 30px;
    right: 40px;
    
    padding: 10px 20px;
    background-color: #d9534f;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    z-index: 5;
    font-family: 'VT323', monospace;
    font-size: 18px;
    box-shadow: 0 3px 0 #ac2925;
}

.back-btn:active { transform: scale(0.95); }
.logout-btn:active { transform: translateY(3px); box-shadow: 0 0 0 #ac2925; }

</style>
<script>
function createQuiz(){ window.location.href='create_quiz.php'; }
function logout(){ window.location.href = 'login.php'; 
     window.location.href='login.php?action=logout';
}
function goBack(){ window.location.href='home.php'; } // 修正返回首頁
function goToQuiz(){ window.location.href='quiz_manage_test.php'; }

function filterQuiz(){
    const search = document.getElementById('search').value.toLowerCase();
    const items = document.querySelectorAll('.quiz-item');
    items.forEach(item => {
        const title = item.querySelector('.quiz-title').innerText.toLowerCase();
        if(title.includes(search)){
            item.style.display = 'flex';
        } else {
            item.style.display = 'none';
        }
    });
}
</script>
</head>
<body>
<div class="phone">

    <div class="tab-text-left">出題者</div>
    <div class="tab-text-right">QUIZ MANAGE</div>

    <div class="content-container">
        
        <input type="text" id="search" class="search-input" placeholder="SEARCH" onkeyup="filterQuiz()">

        <div class="quiz-list">
            
            <div class="quiz-item" onclick="goToQuiz()">
                <div class="quiz-info">
                    <span class="quiz-title">TEST 1</span>
                    <span class="quiz-sub">LAST EDIT: 2025.11.15</span>
                </div>
                <div class="arrow-icon">&#8594;</div>
            </div>

            <div class="quiz-item" onclick="goToQuiz()">
                <div class="quiz-info">
                    <span class="quiz-title">TEST 2</span>
                    <span class="quiz-sub">LAST EDIT: 2025.11.16</span>
                </div>
                <div class="arrow-icon">&#8594;</div>
            </div>

            <div class="quiz-item" onclick="goToQuiz()">
                <div class="quiz-info">
                    <span class="quiz-title">JAVA QUIZ</span>
                    <span class="quiz-sub">LAST EDIT: 2025.12.01</span>
                </div>
                <div class="arrow-icon">&#8594;</div>
            </div>

        </div>

        <button class="create-btn-inner" onclick="createQuiz()">CREATE QUIZ</button>

    </div>

    <button class="back-btn" onclick="goBack()">&#8592;</button> 
    <button class="logout-btn" onclick="logout()">LOGOUT</button>

</div>
</body>
</html>