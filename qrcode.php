<?php
session_start();

// 1. 模擬 QR Code 資料 (若此頁是答題者掃描後的結果，可視需求調整)
// 這裡保留生成邏輯以便預覽畫面
if (!isset($_SESSION['game_pin'])) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $pin = '';
    for ($i = 0; $i < 8; $i++) {
        $pin .= $characters[rand(0, strlen($characters) - 1)];
    }
    $_SESSION['game_pin'] = $pin;
}
$game_pin = $_SESSION['game_pin'];
$join_url = "http://" . $_SERVER['HTTP_HOST'] . "/player_join.php?pin=" . $game_pin;
$qr_api_url = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&color=2a5ca8&data=" . urlencode($join_url);
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Play Game</title>
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
    }

    /* ================= 3. 標籤文字 (大幅上移) ================= */
    /* 左側：答題者 */
    .tab-text-left {
        position: absolute;
        /* 從 70px 改為 60px，更往上 */
        top: 60px;       
        left: 50px;
        
        color: #ffffff;
        font-size: 26px;
        font-weight: bold;
        letter-spacing: 2px;
        text-shadow: 2px 2px 0 rgba(0,0,0,0.1);
        z-index: 5;
    }

    /* 右側：PLAY GAME */
    .tab-text-right {
        position: absolute;
        /* 從 72px 改為 62px，更往上 */
        top: 62px;       
        right: 42px;
        
        color: #5d8bb5;
        font-size: 24px;
        font-weight: bold;
        letter-spacing: 1px;
        z-index: 5;
    }

    /* ================= 4. 返回按鈕 (跟著上移) ================= */
    .back-btn {
        position: absolute;
        /* 從 135px 改為 115px，保持與上方文字的距離 */
        top: 115px;      
        left: 35px;
        
        width: 38px;
        height: 38px;
        background-color: #ffffff;
        border-radius: 50%;
        border: 2px solid #fff;
        
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        
        box-shadow: 2px 2px 0 rgba(0,0,0,0.1);
        z-index: 10;
        transition: transform 0.1s;
    }
    
    .back-btn:hover { transform: scale(1.1); }
    .back-arrow {
        color: #2a5ca8;
        font-size: 24px;
        font-weight: bold;
        margin-top: -2px;
        margin-left: -2px;
    }

    /* ================= 5. 白色卡片 (位置調整) ================= */
    .white-card {
        position: absolute;
        /* 重點：從 180px 改為 165px (往上移) */
        top: 165px;  
        left: 50%;
        transform: translateX(-50%);
        
        width: 300px;
        /* 重點：高度設定為 300px，確保底部不會超過藍色框 */
        height: 270px; 
        
        background-color: #ffffff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        
        box-shadow: 0 4px 0 rgba(0,0,0,0.05); 
        z-index: 5;
    }

    /* QR Code 圖片 (隨卡片高度微調) */
    .qr-img {
        width: 190px; /* 稍微縮小一點點以適應高度 */
        height: 190px;
        image-rendering: pixelated;
        margin-bottom: 15px;
    }

    /* PIN 碼 */
    .pin-code {
        font-size: 36px;
        color: #5d8bb5;
        font-weight: bold;
        letter-spacing: 6px;
        text-transform: uppercase;
    }

</style>
<script>
    function goBack(){
        // 設定返回首頁
        window.location.href='index.php'; 
    }
</script>
</head>
<body>

<div class="phone">

    <div class="tab-text-left">答題者</div>
    <div class="tab-text-right">PLAY GAME</div>

    <div class="back-btn" onclick="goBack()">
        <span class="back-arrow">&#8592;</span> 
    </div>

    <div class="white-card">
        <img src="<?php echo $qr_api_url; ?>" alt="QR Code" class="qr-img">
        
    </div>

</div>

</body>
</html>