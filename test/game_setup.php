<!-- game_setup.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>遊戲設定</title>
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
.setting-btn {
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
.setting-btn.selected {
    background-color: #5bc0de;
    color: white;
}
.select-difficulty {
    width: 80%;
    padding: 15px;
    margin: 10px auto;
    font-size: 16px;
    border-radius: 12px;
    border: 2px solid #333;
}
.host-btn {
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
input[type=number] {
    width: 80%;
    padding: 15px;
    font-size: 16px;
    border-radius: 12px;
    border: 2px solid #333;
    margin: 10px auto;
    display: block;
}
</style>
<script>
let selectedMode = null;
function logout(){ window.location.href='login.php'; }
function goBack(){ window.history.back(); }
function selectMode(btn, mode){
    if(selectedMode===mode){
        btn.classList.remove('selected');
        selectedMode = null;
    } else {
        document.querySelectorAll('.setting-btn').forEach(b=>b.classList.remove('selected'));
        btn.classList.add('selected');
        selectedMode = mode;
    }
}
function hostGame(){
    const players = document.getElementById('players').value;
    const difficulty = document.getElementById('difficulty').value;
    if(!players || !selectedMode){
        alert('請填寫參與人數並選擇個人或團隊');
        return;
    }
    alert('遊戲設定完成!\n參與人數: ' + players + '\n模式: ' + selectedMode + '\n難度: ' + difficulty);
    // 這裡可以跳轉到真正開始遊戲的頁面
}
</script>
</head>
<body>
<div class="phone">
    <h2>遊戲設定</h2>
    <input type="number" id="players" placeholder="設定參與人數" min="1">

    <button class="setting-btn" onclick="selectMode(this,'個人')">個人</button>
    <button class="setting-btn" onclick="selectMode(this,'團隊')">團隊</button>

    <select id="difficulty" class="select-difficulty">
        <option value="簡單">簡單</option>
        <option value="普通">普通</option>
        <option value="困難">困難</option>
    </select>

    <button class="host-btn" onclick="hostGame()">Host Game</button>

    <button class="back-btn" onclick="goBack()">返回</button>
    <button class="logout-btn" onclick="logout()">登出</button>
</div>
</body>
</html>