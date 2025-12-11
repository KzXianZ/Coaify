<!-- quiz_manage_test-->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>管理題庫細節</title>
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
.question-btn {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 80%;
    margin: 10px auto;
    padding: 15px;
    font-size: 16px;
    border-radius: 12px;
    cursor: pointer;
    border: 2px solid #333;
    background-color: #f8f8f8;
}
.trash-btn {
    padding: 5px 10px;
    background-color: #d9534f;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}
.add-question, .delete-quiz {
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
function editQuestion(q){
    // 跳轉到 edit_question.php，並帶題目編號參數
    window.location.href = 'edit_question.php?q=' + q;
}
function deleteQuestion(q){ alert('刪除題目: ' + q + ' (模擬)'); }
function addQuestion(q){ 
    // 跳轉到 edit_question.php，並帶題目編號參數
    window.location.href = 'edit_question.php?q=' + q;    
}
function deleteQuiz(){ alert('刪除整個題庫 (模擬)'); window.history.back(); }
</script>
</head>
<body>
<div class="phone">
    <h2>管理題庫細節</h2>

    <div class="question-btn">
        <span onclick="editQuestion(1)">題目1</span>
        <button class="trash-btn" onclick="deleteQuestion('題目1')">刪除</button>
    </div>
    <div class="question-btn">
        <span onclick="editQuestion(2)">題目2</span>
        <button class="trash-btn" onclick="deleteQuestion('題目2')">刪除</button>
    </div>
    <div class="question-btn">
        <span onclick="editQuestion(3)">題目3</span>
        <button class="trash-btn" onclick="deleteQuestion('題目3')">刪除</button>
    </div>
    <!-- 這邊addQuestion 用(4) 是因為模擬題目有3個 這邊直接暴力解 -->
    <button class="add-question" onclick="addQuestion(4)">新增題目</button>
    <button class="delete-quiz" onclick="deleteQuiz()">刪除整個題庫</button>

    <button class="back-btn" onclick="goBack()">返回</button>
    <button class="logout-btn" onclick="logout()">登出</button>
</div>
</body>
</html>
