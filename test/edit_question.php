<!-- edit_question.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>編輯題目</title>
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
.input-field, select {
    width: 80%;
    padding: 12px;
    margin: 10px auto;
    font-size: 16px;
    border-radius: 12px;
    border: 2px solid #333;
    display: block;
}
.save-btn {
    display: block;
    width: 80%;
    margin: 10px auto;
    padding: 15px;
    font-size: 16px;
    border-radius: 12px;
    cursor: pointer;
    border: 2px solid #333;
    background-color: #5cb85c;
    color: white;
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
.back-btn { left: 20px; background-color: #5bc0de; }
.logout-btn { right: 20px; background-color: #d9534f; }
</style>
<script>
function goBack(){ window.history.back(); }
function logout(){ window.location.href='login.php'; }
function saveQuestion(){
    alert('題目已儲存 (模擬)');
    goBack()
}
</script>
</head>
<body>
<div class="phone">
    <h2>編輯題目</h2>

    <input type="text" id="question-name" class="input-field" placeholder="題目名稱">

    <select id="question-type" class="input-field">
        <option value="open">開放式問題</option>
        <option value="choice">選擇題</option>
    </select>

    <input type="text" id="question-text" class="input-field" placeholder="輸入題目">

    <input type="text" id="question-keyword" class="input-field" placeholder="輸入關鍵字 (Key word)">

    <button class="save-btn" onclick="saveQuestion()">儲存</button>

    <button class="back-btn" onclick="goBack()">返回</button>
    <button class="logout-btn" onclick="logout()">登出</button>
</div>
</body>
</html>
