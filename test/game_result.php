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
/* 1. BODY 保持簡潔，只用於居中和基本字體設定 */
body { 
    font-family: Arial, sans-serif; 
    margin: 0; 
    background-color: #f0f0f0; /* 給整個網頁一個淺色背景 */
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
    border: 10px solid #000; /* 模擬手機外殼邊框 */
    border-radius: 25px; /* 圓角邊框 */
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); /* 增加立體感 */
    
    /* 內容設定 */
    position: relative;
    padding: 20px;
    box-sizing: border-box;
    text-align: center;
    color: #ffffff; /* 確保文字在圖片背景上清晰可見 */
}

/* 為了提高結算文字的可讀性，給內部 H2 和 RESULT-ITEM 加上半透明背景 */
h2, .result-item {
    background-color: rgba(0, 0, 0, 0.5); /* 黑色半透明背景 */
    padding: 5px;
    border-radius: 5px;
    margin: 10px 0;
    width: fit-content;
    margin-left: auto;
    margin-right: auto;
}

.result-item {
    font-size: 18px;
    margin: 20px auto;
}

.action-btn {
    display: block;
    width: 80%;
    margin: 15px auto;
    padding: 15px;
    font-size: 16px;
    border-radius: 12px;
    cursor: pointer;
    /* 調整按鈕樣式以確保在圖片背景上突出 */
    border: 2px solid #fff; 
    background-color: rgba(255, 255, 255, 0.9); /* 半透明白色按鈕 */
    color: #333; /* 深色文字 */
    font-weight: bold;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
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
    <h2>遊戲結算</h2>
    <div class="result-item">分數: <?php echo htmlspecialchars($score); ?>/100</div>
    <div class="result-item">對BOSS造成傷害量: <?php echo htmlspecialchars($damage); ?></div>
    <div class="result-item">完成時間: <?php echo htmlspecialchars($time); ?></div>

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
</body>
</html>