<?php
// ===========================================
// 1. Session 檢查與啟動
// ===========================================
session_start();

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
    
    // 清除 Session 後，重新導向到不帶參數的 index.php，避免重複銷毀
    header('Location: index.php');
    exit();
}

// 檢查使用者是否已登入
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: home.php");
    exit();
}
?>



<!-- index.php -->
<?php /* 首頁 - 只有三個按鈕 */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Coaify - 首頁</title>
</head>
<body>
<center>
    <!-- 模擬手機外框：使用 table 和寬高屬性（無 CSS） -->
    <table width="360" height="720" border="1" cellpadding="0" cellspacing="0">
        <tr>
            <td valign="top">
                <!-- 螢幕內容置中 -->
                <table width="100%" height="100%">
                    <tr>
                        <td align="center" valign="middle">
                            <h1>首頁</h1>

                            <form action="login.php" method="get" style="display:inline">
                                <input type="submit" value="註冊與登入">
                            </form>
                            <br><br>

                            <form action="qrcode.php" method="get" style="display:inline">
                                <input type="submit" value="掃 QR Code">
                            </form>
                            <br><br>

                            <form action="pin.php" method="get" style="display:inline">
                                <input type="submit" value="輸入 PIN 碼">
                            </form>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</center>
</body>
</html>
