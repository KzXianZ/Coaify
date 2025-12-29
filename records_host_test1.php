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
<title>紀錄 - SAD QUIZ-1</title>
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
    
    background-image: url('record.png'); 
    background-size: 100% 100%;
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

/* ================= 3. 標籤與頂部 ================= */
.tab-text-left {
    position: absolute;
    top: 60px; left: 55px;
    color: #ffffff; font-size: 28px; font-weight: bold;
    letter-spacing: 2px; text-shadow: 2px 2px 0 rgba(0,0,0,0.1); z-index: 5;
}

.tab-text-right {
    position: absolute;
    top: 62px; right: 55px;
    color: #5d8bb5; font-size: 24px; font-weight: bold;
    letter-spacing: 1px; z-index: 5;
}

/* 返回按鈕 */
.back-circle-btn {
    position: absolute;
    top: 115px; 
    left: 30px;
    width: 34px; height: 34px;
    border: 3px solid #fff; border-radius: 50%;
    display: flex; justify-content: center; align-items: center;
    cursor: pointer; color: #fff; font-size: 24px; font-weight: bold;
    z-index: 10;
}
.back-circle-btn:active { transform: scale(0.9); }

/* ================= 4. 白色內容卡片 (高度縮減) ================= */
.content-container {
    position: absolute;
    top: 155px; 
    width: 85%;
    
    /* ★★★ 修改重點 1：高度從 420px 縮減至 380px ★★★ */
    height: 380px; 
    
    box-sizing: border-box;
    display: flex;
    justify-content: center;
}

.white-card {
    width: 100%;
    height: 100%;
    background-color: #fff;
    border-radius: 4px;
    padding: 15px 20px; /* 上下 padding 稍微減少 */
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    overflow: hidden; 
    box-shadow: 0 4px 0 rgba(0,0,0,0.05);
}

/* 標題區 */
.card-header {
    margin-bottom: 5px; /* 縮小間距 */
}
.quiz-title {
    font-size: 28px; 
    color: #5d8bb5; font-weight: bold; margin: 0;
    text-transform: uppercase; letter-spacing: 1px; line-height: 1;
}
.quiz-date {
    font-size: 14px; color: #5d8bb5; margin-top: 2px; display: block;
    text-transform: uppercase;
}

/* 分隔線 */
.divider {
    width: 100%;
    height: 1px;
    border-bottom: 2px dashed #e0e0e0;
    margin: 8px 0; /* 縮小間距 */
}

/* ================= 5. 上半部：長條圖 + 數據 ================= */
.chart-section-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding-bottom: 5px;
    margin-top: 5px;
}

/* ★★★ 修改重點 2：長條圖高度縮減 (90px -> 75px) ★★★ */
.bar-chart-wrap {
    width: 48%;
    height: 75px; 
    position: relative;
    border-left: 2px solid #eee;
    border-bottom: 2px solid #eee;
    display: flex;
    align-items: flex-end;
    justify-content: space-around;
    padding-bottom: 2px;
    padding-right: 5px;
}

.bar {
    width: 12px;
    background-color: #6ce5e8;
    border-top-left-radius: 2px;
    border-top-right-radius: 2px;
    position: relative;
}
.bar-label {
    position: absolute;
    bottom: -15px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 8px; /* 字體再小一點點 */
    color: #333;
    font-weight: bold;
    white-space: nowrap;
}

/* 右側數據文字 */
.stats-text {
    width: 50%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding-left: 10px;
}
.stat-row { margin-bottom: 10px; }
.stat-label { 
    font-size: 12px; 
    color: #5d8bb5; 
    display: block; 
    font-weight: bold; 
    text-transform: uppercase;
}
.stat-value { 
    font-size: 18px; 
    color: #41b8d5; 
    display: block; 
    font-weight: bold;
    margin-top: 0px; 
}

/* ================= 6. 下半部：圓餅圖 ================= */
.chart-section-bottom {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    /* ★★★ 修改重點 3：底部區域高度縮減 (100px -> 90px) ★★★ */
    height: 90px; 
    width: 100%;
    margin-top: auto; 
    padding-bottom: 5px;
}

/* ★★★ 修改重點 4：圓餅圖尺寸縮小 (80px -> 70px) ★★★ */
.pie-chart {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background: conic-gradient(
        #2d8bba 0% 40%,    
        #5d6d7e 40% 65%,   
        #41b8d5 65% 100%   
    );
    position: relative;
    flex-shrink: 0;
}

/* 圓餅圖標籤 */
.pie-tag {
    position: absolute;
    font-size: 10px;
    color: #5d6d7e;
    font-weight: bold;
    white-space: nowrap;
}
/* 調整標籤距離以適應縮小的圖 */
.tag-fail { top: 10px; left: 15px; }
.tag-pass { bottom: 10px; left: 15px; color: #41b8d5; }
.tag-high { top: 10px; right: 15px; color: #2d8bba; }

</style>
<script>
function goBack(){ window.history.back(); }
</script>
</head>
<body>
<div class="phone">

    <div class="tab-text-left">出題者</div>
    <div class="tab-text-right">RECORDS</div>

    <div class="back-circle-btn" onclick="goBack()">&#8592;</div>

    <div class="content-container">
        <div class="white-card">
            
            <div class="card-header">
                <h1 class="quiz-title">TEST 1 (SUCCESS)</h1>
                <span class="quiz-date">LAST EDIT: 2025.12.15</span>
            </div>

            <div class="divider"></div>

            <div class="chart-section-top">
                
                <div class="bar-chart-wrap">
                    <div class="bar" style="height: 20%;"><div class="bar-label">&lt;60</div></div>
                    <div class="bar" style="height: 35%;"><div class="bar-label">60-70</div></div>
                    <div class="bar" style="height: 90%;"><div class="bar-label">70-80</div></div>
                    <div class="bar" style="height: 40%;"><div class="bar-label">80-90</div></div>
                    <div class="bar" style="height: 25%;"><div class="bar-label">90+</div></div>
                </div>

                <div class="stats-text">
                    <div class="stat-row">
                        <span class="stat-label">AVG SCORE:</span>
                        <span class="stat-value">72 / 100</span>
                    </div>
                    <div class="stat-row">
                        <span class="stat-label">AVG TIME:</span>
                        <span class="stat-value">1HR 47MIN</span>
                    </div>
                    <div class="stat-row">
                        <span class="stat-label">FAILED:</span>
                        <span class="stat-value" style="color:#5d6d7e;">8 PPL</span>
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <div class="chart-section-bottom">
                <div class="pie-chart"></div>
                
                <div class="pie-tag tag-fail">25% FAIL</div>
                <div class="pie-tag tag-pass">35% PASS</div>
                <div class="pie-tag tag-high">40% HIGH</div>
            </div>

        </div>
    </div>

</div>
</body>
</html>