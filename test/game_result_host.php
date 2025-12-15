<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>遊戲結束 - Host</title>
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

/* 調整標題和文字可讀性 */
h2 {
    background-color: rgba(0, 0, 0, 0.5); 
    padding: 5px;
    border-radius: 5px;
}
#game-area div, #end-area div {
    background-color: rgba(0, 0, 0, 0.5);
    padding: 8px;
    margin: 10px 0;
    border-radius: 5px;
    width: fit-content;
    margin-left: auto;
    margin-right: auto;
}

.boss-container {
    width: 200px;
    height: 200px;
    margin: 20px auto;
    /* 調整 BOSS 容器樣式 */
    border: 2px solid #fff; /* 改為白色邊框 */
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    background-color: rgba(255, 255, 255, 0.1); /* 輕微透明白色 */
}

.result-btn, .home-btn {
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
function endGame(){
    document.getElementById('game-area').style.display='none';
    document.getElementById('end-area').style.display='block';
}
function goHome(){ window.location.href='home.php'; }
</script>
</head>
<body>
<div class="phone">
    <h2>遊戲進行中</h2>
    <div id="game-area">
        <div>已經過回合數 6/10</div>
        <div class="boss-container">王的示意圖</div>
        <button class="result-btn" onclick="endGame()">推進到下個步驟(模擬)</button>
    </div>

    <div id="end-area" style="display:none;">
        <div>遊戲已結束，資料會保存在歷史紀錄中</div>
        <button class="home-btn" onclick="goHome()">首頁</button>
    </div>
</div>
</body>
</html>