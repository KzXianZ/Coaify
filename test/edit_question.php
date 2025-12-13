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
.input-field {
    width: 80%;
    padding: 12px;
    margin: 5px auto;
    font-size: 16px;
    border-radius: 12px;
    border: 2px solid #333;
    display: block;
}

.save-btn {
    display: block;
    width: 80%;
    margin: 5px auto;
    padding: 10px;
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
.choice-field {
    display: none; 
}
.open-field-container {
    display: block; 
}

.option-row {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 80%;
    margin: 5px auto;
}
.option-row input[type="checkbox"] {
    order: -1; 
    width: 20px;
    margin-right: 5px;
    margin-left: 0;
}
.option-row input[type="text"] {
    order: 0;
    flex-grow: 1;
    margin: 0;
    width: auto; 
    border-radius: 12px; 
}

</style>
<script>
function goBack(){ window.history.back(); }
function logout(){ window.location.href='login.php'; }

// 根據題目類型顯示/隱藏對應的輸入欄位，並更新按鈕文字
function toggleQuestionFields() {
    const type = document.getElementById('question-type').value;
    const choiceFields = document.getElementById('choice-fields');
    const openFields = document.getElementById('open-fields');
    const saveBtn = document.getElementById('save-button');
    
    if (type === 'choice') {
        // 選擇題模式
        openFields.style.display = 'none';      // 隱藏開放式問題的欄位
        choiceFields.style.display = 'block';   // 顯示選擇題的選項欄位
        saveBtn.textContent = '儲存選擇題'; 
    } else { // open 
        // 開放式問題模式 (預設)
        openFields.style.display = 'block';     // 顯示開放式問題的欄位
        choiceFields.style.display = 'none';    // 隱藏選擇題的選項欄位
        saveBtn.textContent = '儲存開放式題目';
    }
}

// 模擬儲存，返回上一頁
function saveQuestion(){
    const type = document.getElementById('question-type').value;
    
    // 模擬欄位驗證和儲存成功的提示
    if (type === 'choice') {
        alert('選擇題資料已儲存 (模擬)。');
    } else {
        alert('開放式題目資料已儲存 (模擬)。');
    }
    
    // 模擬成功後返回上一頁
    goBack();
}

// 頁面載入完成時執行初始化
window.onload = function() {
    // 1. 初始化欄位狀態 
    toggleQuestionFields();
    
    // 2. 監聽下拉式選單的變化
    document.getElementById('question-type').addEventListener('change', toggleQuestionFields);
}
</script>
</head>
<body>
<div class="phone">
    <h2>編輯題目</h2>

    <form id="question-form">
        
        <input type="text" id="question-name" class="input-field" placeholder="題目名稱">

        <select id="question-type" class="input-field">
            <option value="open">開放式問題</option>
            <option value="choice">多選題 (勾選題)</option> 
        </select>

        <div id="open-fields" class="open-field-container">
            <input type="text" id="question-text" class="input-field" placeholder="輸入題目">
            <input type="text" id="question-keyword" class="input-field" placeholder="輸入關鍵字 (Key word)">
        </div>
        
        <div id="choice-fields" class="choice-field">
            
            <div class="option-row">
                <input type="checkbox" name="is_correct[]" value="A">
                <input type="text" name="option_text_a" placeholder="選項 A 內容" class="input-field">
            </div>

            <div class="option-row">
                <input type="checkbox" name="is_correct[]" value="B">
                <input type="text" name="option_text_b" placeholder="選項 B 內容" class="input-field">
            </div>
            
            <div class="option-row">
                <input type="checkbox" name="is_correct[]" value="C">
                <input type="text" name="option_text_c" placeholder="選項 C 內容" class="input-field">
            </div>

            <div class="option-row">
                <input type="checkbox" name="is_correct[]" value="D">
                <input type="text" name="option_text_d" placeholder="選項 D 內容" class="input-field">
            </div>

        </div>

        <button id="save-button" class="save-btn" onclick="saveQuestion()">儲存</button>
    </form>

    <button class="back-btn" onclick="goBack()">返回</button>
    <button class="logout-btn" onclick="logout()">登出</button>
</div>
</body>
</html>
