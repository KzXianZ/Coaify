<!-- game_result.php -->

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
}
.result-item {
    font-size: 18px;
    margin: 20px 0;
}
.action-btn {
    display: block;
    width: 80%;
    margin: 10px auto;
    padding: 15px;
    font-size: 16px;
    border-radius: 12px;
    cursor: pointer;
    border: 2px solid #333;
    background-color: #f8f8f8;
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