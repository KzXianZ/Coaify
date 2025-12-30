<!-- game.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Game</title>

<style>
body{
  margin:0;
  min-height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
  background:#efefef;
}

/* 像素圖不糊 */
.pixel{
  image-rendering: pixelated;
  image-rendering: crisp-edges;
}

/* 手機容器 */
.phone{
  width:360px;
  height:720px;
  border:8px solid #222;
  border-radius:22px;
  overflow:hidden;
  position:relative;
  box-sizing:border-box;

  /* 背景圖：包含 QUESTION / YOUR ANSWER / 怪物 / -300 */
  background:url("game_bg.png") center/100% 100% no-repeat;
}

/* 透明輸入框 */
.inputWrap{
  position:absolute;
  height:52px;
}

.inputWrap input{
  width:100%;
  height:100%;
  border:0;
  outline:none;
  background:transparent;

  font-size:16px;
  color:#1d4aa6;
  font-family:"Courier New", monospace;
}

/* QUESTION（readonly input） */
#q_input{
  left:60px;
  top:82px;
  width:280px;
}

/* YOUR ANSWER */
#a_input{
  left:60px;
  top:248px;
  width:280px;
}

/* SUBMIT：純圖片按鈕 */
#btn_submit{
  position:absolute;
  left:80px;
  top:355px;
  width:200px;
  height:45px;
  border:0;
  padding:0;
  background:url("submit_button.png") center/100% 100% no-repeat;
  cursor:pointer;
}
#btn_submit:active{
  transform: translateY(1px);
}
</style>
</head>

<body>

<div class="phone pixel">

  <!-- 題目（寫死、readonly） -->
  <div id="q_input" class="inputWrap pixel">
    <input type="text" id="question" readonly>
  </div>

  <!-- 玩家輸入 -->
  <div id="a_input" class="inputWrap pixel">
    <input type="text" id="answer" autocomplete="off">
  </div>

  <!-- SUBMIT -->
  <button id="btn_submit" class="pixel" onclick="submitAnswer()" aria-label="submit"></button>

</div>

<script>
let currentQuestion = 0;

/* ✅ 題目寫死在 JS（你要幾題就加幾個） */
const questions = [
  '英文翻譯：今天天氣真好',
  '訂正句子:he are running'
];

function showQuestion(){
  document.getElementById('question').value = questions[currentQuestion];
}

/* ✅ 保持原本流程：下一題 → 最後跳結算頁 */
function submitAnswer(){
  const ansEl = document.getElementById('answer');
  const ans = ansEl.value.trim();

  if(ans === ''){
    alert('請輸入答案');
    return;
  }

  // 這裡如果你之後要記錄答案，可先存起來（可選）
  // console.log('Q'+(currentQuestion+1), 'A:', ans);

  // 清空答案
  ansEl.value = '';

  // 下一題 / 結算
  currentQuestion++;
  if(currentQuestion >= questions.length){
    window.location.href = 'game_result.php';
    return;
  }
  showQuestion();
}

window.onload = showQuestion;
</script>

</body>
</html>
