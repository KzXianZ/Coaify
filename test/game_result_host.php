<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>遊戲結束 - Host</title>
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
<style>
    /* 1. 基本設定 */
    body { 
        font-family: 'Press Start 2P', cursive, Arial, sans-serif; 
        margin: 0; 
        background-color: #f8f9fa; 
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    /* 2. PHONE 容器 */
    .phone {
        width: 375px; /* 稍微調整寬度以更貼近標準比例 */
        height: 667px;
        background-image: url('game_result_host.png'); 
        background-size: cover; 
        background-repeat: no-repeat;
        background-position: center; 
        
        border: 10px solid #000; 
        border-radius: 40px; 
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.5); 
        
        position: relative; 
        padding: 40px 20px;
        box-sizing: border-box;
        text-align: center;
        color: #ffffff;
        overflow: hidden; 
    }

    /* 狀態標題 */
    h2 {
        background-color: #7fa4d9; /* 配合藍色面板色調 */
        padding: 15px;
        border-radius: 10px;
        margin-top: 20px;
        font-size: 14px; /* 像素字體較大，需縮小 */
        border: 4px solid #5a82bc;
    }

    .info-box {
        background-color: rgba(255, 255, 255, 0.9);
        color: #5a82bc;
        padding: 12px;
        margin: 20px auto;
        border: 3px solid #5a82bc;
        border-radius: 8px;
        width: 80%;
        font-size: 10px;
        line-height: 1.6;
    }

    /* 3. 按鈕容器 */
    .bottom-container {
        position: absolute;
        bottom: 150px; 
        left: 0;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* 藍色像素風格按鈕 */
    .result-btn, .home-btn {
        width: 85%;
        padding: 15px 10px;
        font-family: 'Press Start 2P', cursive; /* 使用像素字體 */
        font-size: 12px; /* 配合字體調整大小 */
        cursor: pointer;
        
        /* 圖片中的藍色外框與背景 */
        background-color: #d4f4fe; /* 淺藍色背景 */
        color: #5a82bc; /* 藍色文字 */
        
        /* 雙層邊框效果：外框深藍，內框淺藍立體感 */
        border: 4px solid #5a82bc;
        box-shadow: inset -4px -4px 0px 0px #adcdec, 
                    inset 4px 4px 0px 0px #ffffff;
        
        text-transform: uppercase;
        transition: transform 0.1s;
        margin-bottom: 10px;
    }

    .result-btn:active, .home-btn:active {
        transform: scale(0.95);
        box-shadow: inset 4px 4px 0px 0px #adcdec; /* 點擊時的凹陷感 */
    }

</style>
</head>
<body>

<div class="phone">
    <h2 id="status-title">GAME ONGOING</h2>

    <div id="game-area">
        <div class="info-box">ROUND 6/10</div>
    </div>

    <div id="end-area" style="display:none;">
        <div class="info-box">GAME OVER<br>SAVED IN RECORDS</div>
    </div>

    <div class="bottom-container">
        <button id="next-btn" class="result-btn" onclick="endGame()">NEXT STEP</button>
        <button id="home-btn" class="home-btn" style="display:none;" onclick="goHome()">GO HOME</button>
    </div>
</div>

<script>
    function endGame(){
        document.getElementById('status-title').innerText = "GAME OVER";
        document.getElementById('game-area').style.display = 'none';
        document.getElementById('end-area').style.display = 'block';
        document.getElementById('next-btn').style.display = 'none';
        document.getElementById('home-btn').style.display = 'block';
    }

    function goHome(){ 
        window.location.href = 'home.php'; 
    }
</script>

</body>
</html>