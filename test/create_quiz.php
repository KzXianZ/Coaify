<!-- create_quiz.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>創建題庫</title>
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
    margin: 20px auto;
    font-size: 16px;
    border-radius: 12px;
    border: 2px solid #333;
    display: block;
}
button.save-btn {
    width: 80%;
    padding: 15px;
    margin: 10px auto;
    font-size: 16px;
    border-radius: 12px;
    cursor: pointer;
    border: 2px solid #333;
    background-color: #5cb85c;
    color: white;
    display: block;
}
.back-btn, .logout-btn {
    position: absolute;
    bottom: 20px;
    padding: 10px 20px;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}
.back-btn {
    left: 20px;
    background-color: #5bc0de;
}
.logout-btn {
    right: 20px;
    background-color: #d9534f;
}
</style>
<script>
function goBack(){ window.history.back(); }
function logout(){ 
    window.location.href='login.php?action=logout'; 
}
function saveQuiz(){
    const name = document.getElementById('quizName').value;
    if(!name){ alert('請輸入題庫名稱'); return; }
    alert('題庫「' + name + '」已儲存 (模擬)');
    window.location.href='quiz_manage.php';
}
</script>
</head>
<body>
<div class="phone">
    <h2>創建題庫</h2>
    <input type="text" id="quizName" placeholder="輸入題庫名稱">
    <button class="save-btn" onclick="saveQuiz()">儲存</button>

    <button class="back-btn" onclick="goBack()">返回</button>
    <button class="logout-btn" onclick="logout()">登出</button>
</div>
</body>
</html>