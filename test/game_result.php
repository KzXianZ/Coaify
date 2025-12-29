<?php
// game_result.php
session_start();

// 檢查登入狀態
$is_logged_in = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

// 假設這裡從 URL 參數或 Session 取得遊戲結果
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
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
<style>
/* 1. 全域變數與字體設定 */
:root {
    --pixel-blue: #7fa4d9;
    --pixel-dark-blue: #5a82bc;
    --pixel-light-blue: #d4f4fe;
}

body { 
    font-family: 'Press Start 2P', cursive, Arial, sans-serif; 
    margin: 0; 
    background-color: #f8f9fa; 
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

/* 2. PHONE 容器：模擬手機邊框 */
.phone {
    width: 375px;
    height: 667px;
    background-image: url('game_result.png'); 
    background-size: cover; 
    background-repeat: no-repeat;
    background-position: center; 
    
    border: 10px solid #000; 
    border-radius: 40px; 
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.5); 
    
    position: relative;
    padding: 40px 20px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    align-items: center;
    overflow: hidden;
}

/* 3. 遊戲結算資訊文字區（移除框框，字體改為藍色並下移） */
.result-container {
    width: 90%;
    margin-top: 120px; /* 文字位置往下一點 */
    text-align: center;
    background: none; 
    border: none;
}

h2 {
    color: var(--pixel-dark-blue); /* 字體改為藍色 */
    font-size: 18px;
    margin-bottom: 35px;
    letter-spacing: 2px;
}

.result-item {
    font-size: 10px;
    color: var(--pixel-dark-blue); /* 字體改為藍色 */
    margin: 22px 0;
    line-height: 1.5;
}

/* 4. 藍色像素按鈕 (保持原樣式) */
.action-buttons {
    margin-top: auto; 
    margin-bottom: 50px;
    width: 100%;
}

.action-btn {
    display: block;
    width: 90%;
    margin: 15px auto;
    padding: 15px 10px;
    font-family: 'Press Start 2P', cursive;
    font-size: 10px;
    cursor: pointer;
    
    background-color: var(--pixel-light-blue); 
    color: var(--pixel-dark-blue); 
    
    border: 4px solid var(--pixel-dark-blue);
    box-shadow: inset -4px -4px 0px 0px #adcdec, 
                inset 4px 4px 0px 0px #ffffff;
    
    text-transform: uppercase;
    transition: transform 0.1s;
}

.action-btn:active {
    transform: scale(0.95);
    box-shadow: inset 4px 4px 0px 0px #adcdec;
}

.action-btn:focus {
    outline: none;
}

</style>
<script>
function goRegister(){ window.location.href='register_save_records.php'; }
function goLogin(){ window.location.href='login_save_records.php'; }
function goIndex(){ window.location.href='index.php'; }
function saveRecordAndGoHome(){
    alert('成績已儲存！'); 
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
        <h2>CLEAR!</h2>
        <div class="result-item">SCORE: <?php echo htmlspecialchars($score); ?>/100</div>
        <div class="result-item">DMG TO BOSS: <?php echo htmlspecialchars($damage); ?></div>
        <div class="result-item">TIME: <?php echo htmlspecialchars($time); ?></div>
    </div>

    <div class="action-buttons">
    <?php
    if ($is_logged_in) {
    ?>
        <button class="action-btn" onclick="saveRecordAndGoHome()">SAVE & RETURN</button>
        <button class="action-btn" onclick="goPlayerHome()">HOME (NO SAVE)</button>
    <?php
    } else {
    ?>
        <button class="action-btn" onclick="goRegister()">REG & SAVE</button>
        <button class="action-btn" onclick="goLogin()">LOGIN & SAVE</button>
        <button class="action-btn" onclick="goIndex()">EXIT</button>
    <?php
    }
    ?>
    </div>
</div>
</body>
</html>