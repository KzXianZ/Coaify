<!-- quiz_manage.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>管理題庫</title>
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
.quiz-btn {
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
.search-input {
    width: 80%;
    padding: 12px;
    margin: 10px auto;
    font-size: 16px;
    border-radius: 12px;
    border: 2px solid #333;
    display: block;
}
.back-btn, .logout-btn, .create-btn {
    position: absolute;
    padding: 10px 20px;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}
.back-btn {
    bottom: 20px;
    left: 20px;
    background-color: #5bc0de;
}
.logout-btn {
    bottom: 20px;
    right: 20px;
    background-color: #d9534f;
}
.create-btn {
    bottom: 70px;
    left: 50%;
    transform: translateX(-50%);
    width: 60%;
    background-color: #5cb85c;
}
</style>
<script>
function goBack(){ window.history.back(); }
function logout(){ 
    window.location.href='login.php?action=logout'; 
}
function filterQuiz(){
    const search = document.getElementById('search').value.toLowerCase();
    document.querySelectorAll('.quiz-btn').forEach(btn => {
        if(btn.innerText.toLowerCase().includes(search)){
            btn.style.display='block';
        } else {
            btn.style.display='none';
        }
    });
}
function goToQuiz(){
    window.location.href='quiz_manage_test.php';
}
function createQuiz(){
    window.location.href='create_quiz.php';
}
</script>

</head>
<body>
<div class="phone">
    <h2>管理題庫</h2>
    <input type="text" id="search" class="search-input" placeholder="搜尋題庫" onkeyup="filterQuiz()">

    <button class="quiz-btn" onclick="goToQuiz()">test1</button>
    <button class="quiz-btn" onclick="goToQuiz()">test2</button>

    <button class="create-btn" onclick="createQuiz()">創建題庫</button>
    <button class="back-btn" onclick="goBack()">返回</button>
    <button class="logout-btn" onclick="logout()">登出</button>
</div>
</body>
</html>