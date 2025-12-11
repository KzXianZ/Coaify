<!-- game.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>遊戲進行中</title>
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
.question {
    margin: 20px 0;
    font-size: 16px;
}
input[type=text] {
    width: 80%;
    padding: 15px;
    font-size: 16px;
    border-radius: 12px;
    border: 2px solid #333;
    margin-bottom: 20px;
}
.submit-btn {
    padding: 15px 30px;
    font-size: 16px;
    border-radius: 10px;
    cursor: pointer;
    margin-bottom: 20px;
}
</style>
<script>
let currentQuestion = 0;
const questions = [
    '英文翻譯:今天天氣真好',
    '請解釋為什麼「he are running」是錯誤的句子',
];
function logout(){ window.location.href='login.php'; }
function goBack(){ window.history.back(); }
function submitAnswer(){
    const input = document.getElementById('answer');
    if(input.value.trim()===''){ alert('請輸入答案'); return; }
    input.value='';
    currentQuestion++;
    if(currentQuestion>=questions.length){
        // 遊戲完成後跳轉到結算頁面
        window.location.href='game_result.php';
        return;
    }
    document.getElementById('question-text').innerText = questions[currentQuestion];
}
</script>
</head>
<body>
<div class="phone">
    <div class="question" id="question-text">英文翻譯:今天天氣真好</div>
    <input type="text" id="answer" placeholder="輸入答案">
    <br>
    <button class="submit-btn" onclick="submitAnswer()">提交</button>
</div>
</body>
</html>