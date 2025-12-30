<!-- forgot.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>忘記密碼</title>

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

  /* 手機容器：細黑框＋圓角 */
  .phone{
    width:360px;
    height:720px;
    border:8px solid #222;
    border-radius:22px;
    overflow:hidden;
    position:relative;
    box-sizing:border-box;

    /* 背景圖包含：COAIFY、白卡、文字（全部用它） */
    background:url("forgot_bg.png") center/100% 100% no-repeat;
  }

  /* ✅ 只放輸入框（room_enter.png） */
  .imgInput{
    position:absolute;
    height:52px;
    background:url("room_enter.png") center/100% 100% no-repeat;
  }

  .imgInput input{
    position:absolute;
    left:16px;
    right:16px;
    top:10px;
    bottom:10px;
    width:auto;
    border:0;
    outline:none;
    background:transparent;

    font-size:16px;
    color:#1d4aa6;
    font-family:"Courier New", monospace;
  }

  /* ====== 4個輸入框位置（你的現況） ====== */
  #wrap_account{
    left:75px;
    top:230px;
    width:200px;
  }
  #wrap_email{
    left:75px;
    top:310px;
    width:200px;
  }
  #wrap_otp{
    left:75px;
    top:395px;
    width:100px;
  }
  #wrap_newpass{
    left:75px;
    top:480px;
    width:200px;
  }

  /* ✅ 純圖片按鈕（不放文字） */
  .imgBtn{
    position:absolute;
    border:0;
    padding:0;
    background-color:transparent;
    cursor:pointer;
    display:block;
  }
  .imgBtn:active{ transform: translateY(1px); }

  /* SEND：放 OTP 右邊 */
  #btn_send{
    left:180px;         
    top:395px;
    width:92px;
    height:52px;
    background:url("send_button.png") center/100% 100% no-repeat;
  }

  /* 底部 CANCEL / SAVE（純圖片，為了能同排，這裡做縮小顯示） */
  #btn_cancel{
    left:40px;
    top:550px;
    width:140px;         /* 你可改大/改小 */
    height:45px;
    background:url("cancel_button_2.png") center/100% 100% no-repeat;
  }

  #btn_save{
    left:190px;
    top:550px;
    width:140px;         /* 你可改大/改小 */
    height:45px;
    background:url("register_button_2.png") center/100% 100% no-repeat;
  }
</style>
</head>

<body>
<div class="phone pixel">

  <!-- 輸入框 -->
  <div id="wrap_account" class="imgInput pixel">
    <input type="text" id="f_account" autocomplete="username">
  </div>

  <div id="wrap_email" class="imgInput pixel">
    <input type="text" id="f_email" autocomplete="email">
  </div>

  <div id="wrap_otp" class="imgInput pixel">
    <input type="text" id="f_otp" inputmode="numeric" autocomplete="one-time-code">
  </div>

  <div id="wrap_newpass" class="imgInput pixel">
    <input type="password" id="f_newpass" autocomplete="new-password">
  </div>

  <!-- ✅ 按鈕（純圖片） -->
  <button id="btn_send" class="imgBtn pixel" onclick="sendOtp()" aria-label="Send OTP"></button>
  <button id="btn_cancel" class="imgBtn pixel" onclick="goLogin()" aria-label="Cancel"></button>
  <button id="btn_save" class="imgBtn pixel" onclick="savePassword()" aria-label="Save"></button>

</div>

<script>
function sendOtp(){
  // 前端模擬
  alert('OTP 已送出！（模擬）');
}

function savePassword(){
  // 前端模擬檢查
  var otp = document.getElementById('f_otp').value.trim();
  var newp = document.getElementById('f_newpass').value.trim();

  if(otp === '' || newp === ''){
    alert('請先輸入 OTP 與新密碼');
    return;
  }
  alert('密碼更改完成！（模擬）');
  // 需要的話可跳回登入
  // window.location.href = 'login.php';
}

function goLogin(){
  window.location.href = 'login.php';
}
</script>

</body>
</html>
