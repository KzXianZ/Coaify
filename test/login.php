<!-- login.php -->
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>登入</title></head>
<body>
<center>
<table width="360" height="720" border="1">
<tr><td align="center" valign="middle">
<h1>登入</h1>


<!-- 模擬前端驗證：按下登入會用JS模擬成功/失敗 -->
<form onsubmit="return simulateLogin();">
<input type="text" id="account" placeholder="帳號"><br><br>
<input type="password" id="password" placeholder="密碼"><br><br>
<input type="submit" value="登入">
</form>


<br>
<form action="register.php" method="get" style="display:inline">
<input type="submit" value="註冊">
</form>
<br><br>
<form action="forgot.php" method="get" style="display:inline">
<input type="submit" value="忘記密碼">
</form>
<br><br>
<input type="button" value="返回" onclick="window.location.href='index.php'">


<p id="loginMsg" style="color:red"></p>


<script>
function simulateLogin(){
var a = document.getElementById('account').value;
var p = document.getElementById('password').value;
if(a==='admin' && p==='123'){
// 模擬跳轉到 home.php
window.location.href = 'home.php';
} else {
document.getElementById('loginMsg').innerText = '帳號或密碼錯誤（模擬）';
}
return false; // 阻止實際提交
}
</script>


</td></tr>
</table>
</center>
</body>
</html>