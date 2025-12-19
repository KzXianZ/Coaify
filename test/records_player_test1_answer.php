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
    top:90px;
    left:25px;
    width:310px;
    height:510px;
    box-sizing:border-box;
    padding-top:20px;
  }

  .quiz-title{
    font-family:monospace;
    font-weight:900;
    color:#2a4ea0;
    font-size:18px;
    letter-spacing:2px;
    margin-bottom:20px;
  }

  .record-card{
    width:100%;
    height:78px;
    background:#fff;
    margin-bottom:20px;
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
    width:53px;
    height:53px;
    border:0;
    background:url("records_player_arrow.png") center/contain no-repeat;
    cursor:pointer;
  }

  .left-nav{ left:90px; bottom:105px; transform:rotate(180deg); }
  .right-nav{ right:90px; bottom:105px; }

</style>

<script>
  function logout(){
    window.location.href="home.php";
  }

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

    <div class="quiz-title">SAD QUIZ-1 (72/100)</div>

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
