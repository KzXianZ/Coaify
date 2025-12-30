<!-- records_player_test1_answer.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SAD QUIZ-1 Details</title>

<style>
  *{ image-rendering: pixelated; image-rendering: crisp-edges; }
  body{ margin:0; background:#fff; font-family: Arial; }

  .phone{
    width:360px;
    height:720px;
    margin:20px auto;
    border:1px solid #333;
    overflow:hidden;
    box-sizing:border-box;
    background:url("SAD_QUIZ_ANSWER.png") no-repeat;
    background-size:100% 100%;
    position:relative;
  }

  /* ✅ 外框：參照 index.php 的手機邊框（不改動內部尺寸/定位） */
.phone, .screen{
  outline: 8px solid #222;      /* 不影響原本寬高 */
  border-radius: 20px;
  box-shadow: 0 0 20px rgba(0,0,0,0.5);
}

  .logout{
    position:absolute;
    top:12px;
    right:18px;
    color:#2a4ea0;
    text-decoration:underline;
    font-family:monospace;
    letter-spacing:1px;
    cursor:pointer;
    font-weight:900;
    background:transparent;
    border:0;
  }

  /* 回上一頁 */
  .back-arrow{
    position:absolute;
    left:32px;
    bottom:165px;
    width:42px;
    height:42px;
    background:url("back_arrow.png") center/contain no-repeat;
    border:0;
    cursor:pointer;
  }

  /* 題目列表大區 */
  .panel{
    position:absolute;
    top:155px;
    left:37px;
    width:285px;
    height:400px;
    box-sizing:border-box;
    padding-top:2px;
  }

  .quiz-title{
    font-family:monospace;
    font-weight:900;
    color:#2a4ea0;
    font-size:18px;
    letter-spacing:2px;
    margin-bottom:5px;
  }

  .record-card{
    width:100%;
    height:61.55px;
    background:#fff;
    margin-bottom:28px;
    padding:6px 12px;
    box-sizing:border-box;
  }

  .q-title{
    font-family:monospace;
    font-weight:900;
    letter-spacing:2px;
    font-size:17px;
    display:flex;
    justify-content:space-between;
    color:#2a4ea0;
  }

  .score-red{ color:#ff4a4a; }

  .subtitle{
    font-family:monospace;
    font-weight:900;
    letter-spacing:1px;
    font-size:12px;
    margin-top:6px;
    color:#2a4ea0;
  }

  /* 下方左右箭頭 */
  .nav-arrow{
    position:absolute;
    width:42px;
    height:42px;
    border:0;
    background:url("back_arrow.png") center/contain no-repeat;
    cursor:pointer;
  }

  .left-nav{ left:200px; bottom:160px; }
  .right-nav{ right:50px; bottom:160px; transform:rotate(180deg); }

</style>

<script>
  function logout(){ window.location.href='login.php?action=logout'; }

  function goBack(){
    window.location.href="records_player_test1.php";
  }
</script>

</head>
<body>

<div class="phone">

  <!-- LOGOUT -->
  <button class="logout" onclick="logout()">LOGOUT</button>

  <!-- 面板 -->
  <div class="panel">

    <div class="quiz-title"> </div>

    <div class="record-card">
      <div class="q-title">
        <span>QUESTION 1</span>
        <span>70%</span>
      </div>
      <div class="subtitle">選擇題(答題時間38S 平均49S)</div>
    </div>

    <div class="record-card">
      <div class="q-title">
        <span>QUESTION 2</span>
        <span>76%</span>
      </div>
      <div class="subtitle">選擇題(答題時間22S 平均34S)</div>
    </div>

    <div class="record-card">
      <div class="q-title">
        <span class="score-red">QUESTION 3</span>
        <span class="score-red">42%</span>
      </div>
      <div class="subtitle">選擇題(答題時間48S 平均59S)</div>
    </div>

    <div class="record-card">
      <div class="q-title">
        <span>QUESTION 4</span>
        <span>67%</span>
      </div>
      <div class="subtitle">選擇題(答題時間35S 平均51S)</div>
    </div>

  </div>

  <!-- 返回 -->
  <button class="back-arrow" onclick="goBack()"></button>

  <!-- 左右箭頭 -->
  <button class="nav-arrow left-nav"></button>
  <button class="nav-arrow right-nav"></button>

</div>

</body>
</html>
