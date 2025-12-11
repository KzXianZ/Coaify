<!-- game_result_host.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>遊戲結束 - Host</title>
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
.boss-container {
    width: 200px;
    height: 200px;
    margin: 20px auto;
    border: 2px solid #333;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    background-color: #eee;
}
.result-btn, .home-btn {
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