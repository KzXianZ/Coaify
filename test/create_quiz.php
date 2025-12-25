<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header('Location: login.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>QUIZ MANAGE</title>

<style>
  body{ margin:0; background:#eee; font-family: Arial, sans-serif; }

  /* 手機外框 */
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

  /* 背景 */
  .screen{
    position:absolute;
    inset:0;
    background:url("create_quiz_bg.png") no-repeat center top;
    background-size:cover;
    image-rendering: pixelated;
  }

  /* LOGOUT */
  .logout-link{
    position:absolute;
    top:18px;
    right:22px;
    font-size:13px;
    font-weight:700;
    letter-spacing:3px;
    color:#2c4a7a;
    background:none;
    border:none;
    padding:0;
    cursor:pointer;
    text-decoration:underline;
    text-underline-offset:4px;
    z-index:30;
  }

  /* 返回鍵 */
  .back-btn{
    position:absolute;
    top:132px;
    left:44px;
    width:44px;
    height:44px;
    background:url("back_arrow.png") no-repeat center;
    background-size:contain;
    border:none;
    cursor:pointer;
    padding:0;
    z-index:25;
  }

  /* QUIZ NAME 圖（標題） */
  .quiz-name-img{
    position:absolute;
    top:180px;       /* ✅ 可微調 */
    left:40px;       /* ✅ 可微調 */
    width:300px;     /* 依你圖比例 */
    height:200px;
    background:url("quiz_name.png") no-repeat center;
    background-size:contain;
    image-rendering: pixelated;
    z-index:20;
    pointer-events:none;
  }

  /* 輸入框外框圖 */
  .room-enter-img{
    position:absolute;
    top:290px;       /* ✅ 可微調 */
    left:55px;       /* ✅ 可微調 */
    width:280px;
    height:40px;
    background:url("room_enter.png") no-repeat center;
    background-size:contain;
    image-rendering: pixelated;
    z-index:20;
    pointer-events:none;
  }

/* 真正的 input：精準對齊 room_enter.png 框框內 */
#quizName{
  position:absolute;


  top:296px;
  left:90px;

  /* ✅ width=280 - (18+18)=244, height=40 - (6+6)=28 */
  width:244px;
  height:28px;

  border:none;
  background:transparent;
  outline:none;

  font-size:16px;
  font-weight:700;
  letter-spacing:2px;
  color:#2c4a7a;
  z-index:30;

  /* 讓文字垂直看起來更置中 */
  line-height:28px;
  padding:0;
}


  /* NEXT STEP */
  .next-btn{
    position:absolute;
    top:360px;       /* ✅ 可微調 */
    left:50%;
    transform:translateX(-50%);
    width:220px;
    height:48px;
    background:url("next_step_button.png") no-repeat center;
    background-size:contain;
    border:none;
    cursor:pointer;
    padding:0;
    image-rendering: pixelated;
    z-index:25;
  }
  .next-btn:active{
    transform:translateX(-50%) translateY(2px);
  }
</style>

<script>
  function logout(){
    window.location.href='login.php?action=logout';
  }
  function goBack(){
    window.history.back();
  }
  function saveQuiz(){
    const name = document.getElementById('quizName').value.trim();
    if(!name){
      alert('請輸入題庫名稱');
      return;
    }
    alert('題庫「' + name + '」已儲存 (模擬)');
    window.location.href='quiz_manage.php';
  }
</script>
</head>

<body>
  <div class="phone">
    <div class="screen">

      <button class="logout-link" onclick="logout()">LOGOUT</button>
      <button class="back-btn" onclick="goBack()" aria-label="Back"></button>

      <!-- 直接疊圖 -->
      <div class="quiz-name-img"></div>
      <div class="room-enter-img"></div>

      <!-- 真 input -->
      <input type="text" id="quizName" autocomplete="off">

      <button class="next-btn" onclick="saveQuiz()" aria-label="Next Step"></button>

    </div>
  </div>
</body>
</html>
