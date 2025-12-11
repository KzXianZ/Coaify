<?php
// 假設你原本的註冊流程在這裡做驗證與寫入資料庫
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 檢查帳密與 email 是否有填（或你原本的資料庫邏輯）
    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {

        // TODO: 寫入資料庫
        // ...

        $success = true;
    }
}
?>

<html>
<body>
<center>
<table border="1" width="360" height="720">
<tr><td align="center">

<!-- 頁面標題 -->
<h2>Register</h2>

<?php if ($success): ?>

    <!-- 註冊成功畫面（你要求的版本） -->
    <h3>註冊成功！</h3>
    <form action="login.php">
        <input type="submit" value="返回登入頁面">
    </form>

<?php else: ?>

    <!-- 註冊表單（原本的一樣保留） -->
    <form method="post" action="register.php">
        <p>帳號：<input type="text" name="username"></p>
        <p>密碼：<input type="password" name="password"></p>
        <p>Email：<input type="text" name="email"></p>
        <input type="submit" value="註冊">
    </form>

    <!-- 返回上一頁 -->
    <br>
    <form action="login.php">
        <input type="submit" value="返回登入">
    </form>

<?php endif; ?>

</td></tr>
</table>
</center>
</body>
</html>
