<?php
// 1. 啟動 Session (必須在任何 HTML 輸出前)
session_start();

$error_message = '';

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    // 執行 Session 銷毀
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    
    // 導回 index.php
    header('Location: index.php');
    exit();
}
// ===================================


// 2. 檢查使用者是否已登入 (避免重複登入)
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // 假設已登入，直接導向 home.php
    header('Location: home.php'); 
    exit();
}

// 3. 處理表單提交 (POST 請求)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 接收並清理輸入資料
    $account = $_POST['account'] ?? '';
    $password = $_POST['password'] ?? '';


    if ($account === 'admin' && $password === '123') {
        
        // 驗證成功，設定 Session 狀態
        $_SESSION['logged_in'] = true;
        // 建議同時設置其他識別資訊，如 user_id 或 role
        // $_SESSION['user_id'] = 1; 
        // $_SESSION['user_role'] = 'player';
        
        header('Location:home.php');
        exit(); // 終止腳本
        
    } else {
        // 登入失敗
        $error_message = '帳號或密碼錯誤。';
    }
}
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>登入</title></head>
<body>
<center>
<table width="360" height="720" border="1">
<tr><td align="center" valign="middle">
<h1>登入</h1>



<form method="POST" action="login.php"> 
<input type="text" name="account" placeholder="帳號" required><br><br>
<input type="password" name="password" placeholder="密碼" required><br><br>
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
<input type="button" 
       value="返回 (登出)" 
       onclick="window.location.href='login.php?action=logout'">


<p id="loginMsg" style="color:red"></p>


<!-- <script>
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
</script> -->


</td></tr>
</table>
</center>
</body>
</html>