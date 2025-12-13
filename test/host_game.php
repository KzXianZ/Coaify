<!-- host_game.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>主持遊戲</title>
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
.game-btn {
    display: block;
    width: 80%;
    margin: 10px auto;
    padding: 20px;
    font-size: 16px;
    border-radius: 12px;
    cursor: pointer;
    border: 2px solid #333;
    background-color: #f8f8f8;
}
.game-btn.selected {
    background-color: #5bc0de;
    color: white;
}
.next-btn {
    position: absolute;
    bottom: 80px;
    left: 50%;
    transform: translateX(-50%);
    width: 80%;
    padding: 15px;
    font-size: 16px;
    border-radius: 10px;
    cursor: pointer;
}
.next-btn.disabled {
    background-color: #ccc;
    color: #666;
    cursor: not-allowed;
}
.logout-btn {
    position: absolute;
    bottom: 20px;
    right: 20px;
    padding: 10px 20px;
    background: #d9534f;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}
.back-btn {
    position: absolute;
    bottom: 20px;
    left: 20px;
    padding: 10px 20px;
    background: #5bc0de;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}
#search { width: 80%; padding: 10px; margin: 10px 0; }
</style>
<script>
let selectedGame = null;
function logout(){ 
    window.location.href='login.php?action=logout'; }
function goBack(){ window.location.href='home.php'; }
function selectGame(btn, gameName){
    if(selectedGame===gameName){
        btn.classList.remove('selected');
        selectedGame = null;
    } else {
        document.querySelectorAll('.game-btn').forEach(b=>b.classList.remove('selected'));
        btn.classList.add('selected');
        selectedGame = gameName;
    }
    updateNextBtn();
}
function updateNextBtn(){
    const nextBtn = document.getElementById('next-btn');
    if(selectedGame){
        nextBtn.classList.remove('disabled');
    } else {
        nextBtn.classList.add('disabled');
    }
}
function nextStep(){
    if(!selectedGame){ return; }
    if(selectedGame==='test1'){ 
        window.location.href='game_setup_test1.php'; 
    } else if(selectedGame==='test2'){ 
        window.location.href='game_setup_test2.php'; 
    }
}
function filterGames(){
    const input = document.getElementById('search').value.toLowerCase();
    document.querySelectorAll('.game-btn').forEach(b=>{
        if(b.dataset.name.toLowerCase().includes(input)) b.style.display='block';
        else b.style.display='none';
    });
}
</script>
</head>
<body>
<div class="phone">
    <h2>主持遊戲</h2>
    <input type="text" id="search" placeholder="搜尋題庫" oninput="filterGames()">

    <button class="game-btn" data-name="test1" onclick="selectGame(this,'test1')">test1</button>
    <button class="game-btn" data-name="test2" onclick="selectGame(this,'test2')">test2</button>

    <button id="next-btn" class="next-btn disabled" onclick="nextStep()">NEXT STEP</button>

    <button class="back-btn" onclick="goBack()">返回</button>
    <button class="logout-btn" onclick="logout()">登出</button>
</div>
</body>
</html>
