<!-- pin.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>輸入PIN碼</title>
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
input[type=text], .start-btn, .back-btn {
    display: block;
    width: 80%;
    margin: 10px auto;
    padding: 15px;
    font-size: 16px;
    border-radius: 12px;
    border: 2px solid #333;
}
.start-btn, .back-btn {
    cursor: pointer;
    background-color: #5bc0de;
    color: white;
    border: none;
}
</style>
<script>
function startGame(){
    window.location.href = 'room.php';
}
function goBack(){
    window.location.href = 'player.php';
}
</script>
</head>
<body>
<div class="phone">
    <h2>請輸入PIN碼</h2>
    <input type="text" placeholder="輸入PIN碼 (模擬)">
    <button class="start-btn" onclick="startGame()">開始</button>
    <button class="back-btn" onclick="goBack()">返回</button>
</div>
</body>
</html>
