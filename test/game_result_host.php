<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>遊戲結束 - Host</title>
<style>
    /* 1. 基本設定 */
    body { 
        font-family: Arial, sans-serif; 
        margin: 0; 
        background-color: #f0f0f0; 
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    /* 2. PHONE 容器 */
    .phone {
        width: 380px;
        height: 700px;
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

    /* 標題與文字裝飾 */
    h2 {
        background-color: rgba(0, 0, 0, 0.6); 
        padding: 10px;
        border-radius: 10px;
        margin-top: 20px;
    }

    .info-box {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 12px;
        margin: 20px auto;
        border-radius: 8px;
        width: fit-content;
        max-width: 80%;
    }

    /* 3. 按鈕容器：調整 bottom 數值即可改變高度 */
    .bottom-container {
        position: absolute;
        bottom: 150px; /* 從 80px 改為 150px，按鈕會往上移動 */
        left: 0;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .result-btn, .home-btn {
        width: 80%;
        padding: 18px;
        font-size: 18px;
        border-radius: 15px;
        cursor: pointer;
        border: 2px solid #fff; 
        background-color: rgba(255, 255, 255, 0.95); 
        color: #333; 
        font-weight: bold;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        transition: transform 0.1s, background-color 0.2s;
    }

    .result-btn:active, .home-btn:active {
        transform: scale(0.95);
        background-color: #ddd;
    }

</style>
</head>
<body>

<div class="phone">
    <h2 id="status-title">遊戲進行中</h2>

    <div id="game-area">
        <div class="info-box">已經過回合數 6/10</div>
    </div>

    <div id="end-area" style="display:none;">
        <div class="info-box">遊戲已結束<br>資料會保存在歷史紀錄中</div>
    </div>

    <div class="bottom-container">
        <button id="next-btn" class="result-btn" onclick="endGame()">推進到下個步驟(模擬)</button>
        <button id="home-btn" class="home-btn" style="display:none;" onclick="goHome()">回首頁</button>
    </div>
</div>

<script>
    function endGame(){
        document.getElementById('status-title').innerText = "遊戲結束";
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