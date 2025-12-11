<!-- forgot.php -->
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>忘記密碼</title></head>
<body>
<center>
<table width="360" height="720" border="1">
<tr><td align="center" valign="middle">


<h1>忘記密碼</h1>


<!-- 全部為前端模擬：OTP 送出與儲存由 JavaScript 處理 -->


<div id="formArea">
<p>帳號：<input type="text" id="f_account"></p>
<p>Email：<input type="text" id="f_email"></p>


<p>
OTP：<input type="text" id="f_otp">
<input type="button" value="送出OTP" onclick="sendOtp()">
</p>


<p>新密碼：<input type="password" id="f_newpass"></p>


<input type="button" value="儲存" onclick="savePassword()">
<br><br>
<input type="button" value="返回登入" onclick="window.location.href='login.php'">


<p id="otpMsg" style="color:green"></p>
</div>


<div id="doneArea" style="display:none">
<h3>密碼更改完成！</h3>
<input type="button" value="返回登入頁面" onclick="window.location.href='login.php'">
</div>


<script>
function sendOtp(){
document.getElementById('otpMsg').innerText = 'OTP 已送出！(模擬)';
}


function savePassword(){
// 模擬前端檢查（不做任何後端邏輯）
var otp = document.getElementById('f_otp').value;
var newp = document.getElementById('f_newpass').value;
if(otp === '' || newp === ''){
alert('請先輸入 OTP 與新密碼（模擬檢查）');
return;
}
// 隱藏表單區塊，顯示完成畫面（移除所有輸入與按鈕）
document.getElementById('formArea').style.display = 'none';
document.getElementById('doneArea').style.display = '';
}
</script>


</td></tr>
</table>
</center>
</body>
</html>