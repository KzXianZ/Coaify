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
<title>管理題庫細節</title>
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

/* ================= 4. 內容區塊 ================= */
.content-container {
    position: absolute;
    
    /* 維持上一版的 110px */
    top: 110px; 
    
    width: 85%; 
    height: 380px; 
    
    padding: 10px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* 題目列表容器 */
.question-list {
    width: 100%;
    overflow-y: auto;
    flex-grow: 1; 
    padding-right: 5px; 
    margin-bottom: 8px; 
}

/* 新增題目按鈕 (維持不動) */
.add-question-btn {
    width: 100%;
    padding: 6px; 
    margin-bottom: 12px; 
    
    /* 維持原本的上移設定 */
    transform: translateY(-5px);

    background-color: #3a6ea5; 
    color: #fff;
    
    font-size: 20px;
    font-weight: bold;
    
    border: 3px solid #2a4e75;
    box-shadow: 0 3px 0 #2a4e75;
    
    border-radius: 8px;
    cursor: pointer;
    font-family: 'VT323', monospace;
    text-transform: uppercase;
    
    flex-shrink: 0; 
}
.add-question-btn:active {
    box-shadow: 0 1px 0 #2a4e75;
    transform: translateY(-2px); 
    background-color: #2a4e75;
}

/* 白色卡片：題目項目 */
.question-card {
    display: flex;
    justify-content: space-between;
    align-items: center;
    
    width: 100%;
    background-color: #ffffff;
    padding: 12px 15px;
    margin-bottom: 10px; 
    box-sizing: border-box;
    box-shadow: 0 4px 0 rgba(0,0,0,0.1);
    border-radius: 2px; 
}

/* 題目文字區 */
.q-info {
    flex-grow: 1;
    cursor: pointer;
}

.q-title {
    font-size: 22px;
    color: #5d8bb5;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* 右側圖示區 */
.q-actions {
    display: flex;
    align-items: center;
    gap: 10px; 
}

/* 圓圈箭頭圖示 */
.icon-btn {
    width: 30px;
    height: 30px;
    border: 2px solid #9dc3e6;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    color: #9dc3e6;
    font-size: 20px;
    font-weight: bold;
    transition: all 0.1s;
}
.icon-btn:hover {
    color: #5d8bb5;
    border-color: #5d8bb5;
}

/* 垃圾桶圖示 */
.trash-icon-btn {
    font-size: 24px;
    color: #9dc3e6;
    cursor: pointer;
    border: none;
    background: none;
    padding: 0;
    line-height: 1;
    transition: color 0.1s;
}
.trash-icon-btn:hover {
    color: #d9534f; 
}

/* ★★★ 修改重點：只移動 DELETE QUIZ 按鈕 ★★★ */
.delete-quiz-btn {
    width: 100%;
    padding: 10px;
    background-color: #dbeeff; 
    color: #5d8bb5; 
    font-size: 20px;
    font-weight: bold;
    border: 3px solid #5d8bb5;
    border-radius: 2px; 
    cursor: pointer;
    box-shadow: 0 2px 0 rgba(0,0,0,0.1);
    font-family: 'VT323', monospace;
    text-transform: uppercase;
    
    flex-shrink: 0;

    /* ★★★ 加入這行：單獨往下移動 15px ★★★ */
    transform: translateY(15px);
}
.delete-quiz-btn:active {
    background-color: #cceeff;
    /* 按下時也要保持相對位移 (15 + 2 = 17) */
    transform: translateY(17px); 
}

/* ================= 5. 底部功能按鈕 ================= */
.back-btn {
    position: absolute;
    bottom: 30px;
    left: 40px;
    padding: 0;
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
    font-size: 18px;
    font-family: 'VT323', monospace;
    box-shadow: 0 3px 0 #ac2925;
}
.back-btn:active { transform: scale(0.95); }
.logout-btn:active { transform: translateY(3px); box-shadow: 0 0 0 #ac2925; }

</style>
<script>
function goBack(){ window.history.back(); }
function logout(){ window.location.href='index.php'; 
     window.location.href='login.php?action=logout';
}

function editQuestion(q){
    window.location.href = 'edit_question.php?q=' + q;
}

function deleteQuestion(q){ 
    event.stopPropagation();
    if(confirm('Delete ' + q + '?')) {
        alert('Deleted ' + q); 
    }
}

function addQuestion(q){ 
    window.location.href = 'edit_question.php?q=' + q;    
}

function deleteQuiz(){ 
    if(confirm('Delete entire quiz?')) {
        alert('Quiz deleted!'); 
        window.history.back(); 
    }
}
</script>
</head>
<body>
<div class="phone">

    <div class="tab-text-left">出題者</div>
    <div class="tab-text-right">QUIZ DETAIL</div>

    <div class="content-container">
        
        <div class="question-list">
            
            <div class="question-card">
                <div class="q-info" onclick="editQuestion(1)">
                    <span class="q-title">QUESTION 1</span>
                </div>
                <div class="q-actions">
                    <div class="icon-btn" onclick="editQuestion(1)">&#8594;</div>
                    <button class="trash-icon-btn" onclick="deleteQuestion('Question 1')">&#128465;</button>
                </div>
            </div>

            <div class="question-card">
                <div class="q-info" onclick="editQuestion(2)">
                    <span class="q-title">QUESTION 2</span>
                </div>
                <div class="q-actions">
                    <div class="icon-btn" onclick="editQuestion(2)">&#8594;</div>
                    <button class="trash-icon-btn" onclick="deleteQuestion('Question 2')">&#128465;</button>
                </div>
            </div>

            <div class="question-card">
                <div class="q-info" onclick="editQuestion(3)">
                    <span class="q-title">QUESTION 3</span>
                </div>
                <div class="q-actions">
                    <div class="icon-btn" onclick="editQuestion(3)">&#8594;</div>
                    <button class="trash-icon-btn" onclick="deleteQuestion('Question 3')">&#128465;</button>
                </div>
            </div>

             <div class="question-card">
                <div class="q-info" onclick="editQuestion(4)">
                    <span class="q-title">QUESTION 4</span>
                </div>
                <div class="q-actions">
                    <div class="icon-btn" onclick="editQuestion(4)">&#8594;</div>
                    <button class="trash-icon-btn" onclick="deleteQuestion('Question 4')">&#128465;</button>
                </div>
            </div>

        </div>

        <button class="add-question-btn" onclick="addQuestion(5)">+ ADD QUESTION</button>

        <button class="delete-quiz-btn" onclick="deleteQuiz()">DELETE QUIZ</button>

    </div>

    <button class="back-btn" onclick="goBack()">&#8592;</button>
    <button class="logout-btn" onclick="logout()">LOGOUT</button>

</div>
</body>
</html>