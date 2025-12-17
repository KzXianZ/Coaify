<?php
// game_result.php
session_start();

// 檢查登入狀態
$is_logged_in = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

// 假設這裡從 URL 參數或其他 Session 取得這次的遊戲結果
$score = 90; 
$damage = 5500;
$time = "1.8HR";
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>遊戲結算</title>
<style>
/* 1. BODY 保持簡潔，只用於基本字體設定 */
body { 
    font-family: Arial, sans-serif; 
    margin: 0; 
    background-color: #f0f0f0; /* 給整個網頁一個淺色背景 */
    color: #333;
}

/* 2. PHONE 容器應用背景圖片，並使用 Flexbox 進行內容居中 */
.phone {
    width: 380px;
    height: 700px;
    margin: 20px auto;
    
    /* ==== 背景圖片設定 ==== */
    background-image: url('game_result.png'); /* 圖片路徑 */
    background-size: cover; /* 讓背景圖片覆蓋整個手機螢幕區域 */
    background-repeat: no-repeat;
    background-position: center; 
    
    /* 模擬手機邊框 */
    border: 10px solid #000; 
    border-radius: 25px; 
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); 
    
    /* 內容設定：使用 Flexbox 垂直居中主要內容 */
    position: relative;
    padding: 20px;
    box-sizing: border-box;
    text-align: center;
    color: #000; /* 確保文字在圖片背景上清晰可見 */
    
    /* Flexbox 佈局設定 */
    display: flex;
    flex-direction: column;
    justify-content: center; /* 垂直居中 */
    align-items: center; /* 水平居中 */
}

/* 遊戲結果標題和內容，移除半透明背景 */
h2 {
    font-size: 24px; /* 標題縮小 */
    margin-bottom: 30px;
    /* 移除 background-color 等半透明樣式 */
}

/* 用來包住所有結算資訊，以便於排版 */
.result-container {
    margin: 20px 0;
    width: 100%; /* 確保容器寬度撐開 */
}

.result-item {
    font-size: 16px; /* 字體縮小 */
    margin: 10px auto; /* 保持垂直間距 */
    /* 移除 background-color 等半透明樣式 */
}

.action-btn {
    display: block;
    width: 80%;
    margin: 15px auto;
    padding: 12px; /* 按鈕 padding 略微縮小 */
    font-size: 15px; /* 按鈕字體略微縮小 */
    border-radius: 12px;
    cursor: pointer;
    /* 調整按鈕樣式以確保在圖片背景上突出 */
    border: 2px solid #fff; 
    background-color: rgba(255, 255, 255, 0.9); /* 半透明白色按鈕 */
    color: #333; /* 深色文字 */
    font-weight: bold;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    transition: transform 0.1s;
}

.action-btn:active {
    transform: scale(0.98); /* 點擊時縮小 */
}

/* 按鈕群組的容器，確保按鈕在畫面下方不被結果項目影響 */
.action-buttons {
    margin-top: 30px;
    width: 100%;
}
</style>
<script>
// 未登入時的動作
function goRegister(){ window.location.href='register.php'; }
function goLogin(){ window.location.href='login.php'; }
function goIndex(){ window.location.href='index.php'; }
// 已登入時的動作
function saveRecordAndGoHome(){
    alert('成績已儲存！(模擬)'); 
    window.location.href='player.php';
}
function goPlayerHome(){
    window.location.href='player.php';
}
</script>
</head>
<body>
<div class="phone">
    
    <div class="result-container">
        <h2>遊戲結算</h2>
        <div class="result-item">分數: <?php echo htmlspecialchars($score); ?>/100</div>
        <div class="result-item">對BOSS造成傷害量: <?php echo htmlspecialchars($damage); ?></div>
        <div class="result-item">完成時間: <?php echo htmlspecialchars($time); ?></div>
    </div>

    <div class="action-buttons">
    <?php
    if ($is_logged_in) {
    ?>
        <button class="action-btn" onclick="saveRecordAndGoHome()">儲存紀錄並返回</button>
        <button class="action-btn" onclick="goPlayerHome()">返回主頁 (不儲存)</button>
    <?php
    } else {
    ?>
        <button class="action-btn" onclick="goRegister()">註冊並儲存</button>
        <button class="action-btn" onclick="goLogin()">登入並儲存</button>
        <button class="action-btn" onclick="goIndex()">離開</button>
    <?php
    }
    ?>
    </div>
</div>
</body>
</html>