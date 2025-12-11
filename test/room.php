<!-- room.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>遊戲角色選擇</title>
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
input[type=text] {
    width: 80%;
    padding: 15px;
    font-size: 16px;
    margin: 10px auto;
    border-radius: 12px;
    border: 2px solid #333;
    display: block;
}
.avatar-preview {
    font-size: 18px;
    margin: 20px 0;
    height: 40px;
}
.arrow-btn {
    font-size: 20px;
    padding: 10px 20px;
    margin: 0 10px;
    border-radius: 12px;
    border: 2px solid #333;
    cursor: pointer;
}
.start-btn {
    display: block;
    width: 80%;
    padding: 15px;
    font-size: 16px;
    border-radius: 12px;
    background-color: #5bc0de;
    color: white;
    border: none;
    cursor: pointer;
    margin: 20px auto 0 auto;
}
</style>
<script>
let avatars = ["耀西", "瑪利歐", "奇諾比奧", "碧姬公主", "庫巴", "路易吉"];
let currentIndex = 0;

function showAvatar(){
    document.getElementById('avatar-preview').innerText = avatars[currentIndex];
}

function prevAvatar(){
    currentIndex = (currentIndex - 1 + avatars.length) % avatars.length;
    showAvatar();
}

function nextAvatar(){
    currentIndex = (currentIndex + 1) % avatars.length;
    showAvatar();
}

function startGame(){
    const nickname = document.getElementById('nickname').value.trim();
    if(nickname === ''){
        alert('請輸入暱稱');
        return;
    }
    const btn = document.getElementById('start-btn');
    btn.innerText = '等待遊戲開始...';
    btn.disabled = true;
    setTimeout(() => {
        window.location.href = 'game.php';
    }, 3000);
}

window.onload = function(){
    showAvatar();
}
</script>
</head>
<body>
<div class="phone">
    <h2>角色選擇</h2>
    <input type="text" id="nickname" placeholder="輸入暱稱">
    
    <div>
        <button class="arrow-btn" onclick="prevAvatar()">⬅️</button>
        <span class="avatar-preview" id="avatar-preview"></span>
        <button class="arrow-btn" onclick="nextAvatar()">➡️</button>
    </div>
    
    <button class="start-btn" id="start-btn" onclick="startGame()">開始</button>
</div>
</body>
</html>
