<!-- edit_question.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>編輯題目</title>

<style>
  * { box-sizing: border-box; }

  /* ✅ 容器外白色 */
  body{
    margin: 0;
    background: #ffffff;
    font-family: monospace;
  }

  /* ✅ 你指定的手機容器（完全照寫） */
  .phone{
    width:380px;
    height:700px;
    margin:20px auto;
    border:2px solid #333;
    border-radius:20px;
    position:relative;
    overflow:hidden;
    box-sizing:border-box;
  }

  /* ✅ 背景圖完全貼合容器 */
  .bg{
    position:absolute;
    inset:0; /* top/right/bottom/left = 0 */
    background: url("edit_question_bg.png") no-repeat center;
    background-size: 100% 100%; /* 完全貼滿 */
    z-index: 0;
    pointer-events: none;
  }

  /* 左上返回 */
  .back-top{
    position:absolute;
    top:110px;
    left:50px;
    width:44px;
    height:44px;
    background: url("back_arrow.png") no-repeat center;
    background-size: contain;
    border:none;
    outline:none;
    cursor:pointer;
    z-index: 5;
    padding:0;
    background-color: transparent; /* ✅ 避免白底 */
  }
  .back-top:focus{ outline:none; }

  /* ✅ 表單：用「固定座標」對齊範例圖的框 */
  .form-area{
    position:absolute;
    left:50%;
    transform: translateX(-50%);
    top: 228px;          /* 控制整個表單往上/下 */
    width: 280px;        /* 讓框跟背景一致 */
    z-index: 3;
  }

  /* 單一輸入框底圖 */
  .input-wrap{
    width: 280px;
    height: 40px;
    background: url("room_enter.png") no-repeat center;
    background-size: 100% 100%;
    margin: 0 auto 34px;   /* 各欄位間距（對齊背景的空隙） */
    position: relative;
  }

  /* 疊上去的 input/select */
  .input-wrap input,
  .input-wrap select{
    width: 100%;
    height: 100%;
    border: none;
    outline: none;
    background: transparent;
    text-align: center;
    font-family: monospace;
    font-size: 15px;
    color: #173a73;
    padding: 0 34px 0 14px; /* 右邊留空給下拉箭頭 */
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
  }

  /* ✅ 右側下拉箭頭（用 CSS 畫，位置固定貼右邊） */
  .select-wrap::after{
    content:"";
    position:absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-30%);
    border-left: 7px solid transparent;
    border-right: 7px solid transparent;
    border-top: 10px solid #173a73;
    opacity: .85;
    pointer-events:none;
  }

  /* ✅ 左右圓形箭頭（位置固定對齊草地上方） */
  .nav-btn{
    position:absolute;
    bottom: 200px;   /* 草地上方那排 */
    width: 60px;
    height: 72px;
    border:none;
    outline:none;
    background-color: transparent; /* ✅ 不要白底 */
    padding:0;
    cursor:pointer;
    z-index: 4;
    background-repeat:no-repeat;
    background-position:center;
    background-size:contain;
  }
  .nav-btn.prev{ left: 48px;  background-image:url("last_arrow.png"); }
  .nav-btn.next{ right: 48px; background-image:url("next_arrow.png"); }
  .nav-btn:focus{ outline:none; }

  /* ✅ 底部 DELETE / SAVE（位置固定對齊最底下） */
  .btn-img{
    position:absolute;
    bottom: 140px;  /* 最底下那排 */
    width: 160px;
    height: 40px;
    border:none;
    outline:none;
    background-color: transparent; /* ✅ 不要白底 */
    padding:0;
    cursor:pointer;
    z-index: 4;
    background-repeat:no-repeat;
    background-position:center;
    background-size:contain;
  }
  .btn-delete{ left: 30px;  background-image:url("delete_button.png"); }
  .btn-save{   right: 30px; background-image:url("save.png"); }
  .btn-img:focus{ outline:none; }

  /* 多選題（先保留，切換 type 才顯示） */
  #choice-fields{ display:none; }

</style>

<script>
  function toggleType(){
    const type = document.getElementById("question-type").value;
    document.getElementById("open-fields").style.display = (type === "open") ? "block" : "none";
    document.getElementById("choice-fields").style.display = (type === "choice") ? "block" : "none";
  }

  function goBack(){ history.back(); }

  function prevStep(){ alert("上一題（模擬）"); }
  function nextStep(){ alert("下一題（模擬）"); }

  function deleteQuestion(){
    if(confirm("確定要刪除？（模擬）")) alert("已刪除（模擬）");
  }

  function saveQuestion(){
    alert("已儲存（模擬）");
  }

  window.addEventListener("DOMContentLoaded", () => {
    toggleType();
  });
</script>
</head>

<body>
  <div class="phone">
    <div class="bg"></div>

    <button class="back-top" type="button" onclick="goBack()" aria-label="返回"></button>

    <!-- ✅ 表單輸入：位置已對齊背景框 -->
    <div class="form-area">
      <div class="input-wrap select-wrap">
        <select id="question-type" onchange="toggleType()">
          <option value="open">OPEN</option>
          <option value="choice">CHOICE</option>
        </select>
      </div>

      <div id="open-fields">
        <div class="input-wrap">
          <input type="text" id="question" placeholder="" />
        </div>

        <div class="input-wrap">
          <input type="text" id="keyword" placeholder="" />
        </div>
      </div>

      <div id="choice-fields">
        <!-- 若你要顯示多選題，再把選項欄位加回來 -->
      </div>
    </div>

    <!-- ✅ 草地上方左右箭頭 -->
    <button class="nav-btn prev" type="button" onclick="prevStep()" aria-label="上一題"></button>
    <button class="nav-btn next" type="button" onclick="nextStep()" aria-label="下一題"></button>

    <!-- ✅ 最底下 DELETE / SAVE -->
    <button class="btn-img btn-delete" type="button" onclick="deleteQuestion()" aria-label="刪除"></button>
    <button class="btn-img btn-save" type="button" onclick="saveQuestion()" aria-label="儲存"></button>
  </div>
</body>
</html>
