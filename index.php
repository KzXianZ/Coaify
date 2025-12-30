<?php
session_start();

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    header('Location: index.php');
    exit();
}

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coaify - 首頁</title>
    <style>
        /* 1. 基礎設定與背景 */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #ffffffff; /* 外圍背景色 */
            font-family: 'Courier New', Courier, monospace; /* 模擬像素字體，如有特定字體檔案可更換 */
        }

        .phone-container {
            width: 360px;
            height: 640px;
            background-image: url('index.png'); /* 使用您上傳的背景圖 */
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
            border: 8px solid #222;
            border-radius: 20px;
            overflow: hidden;
        }

        /* 2. 標題樣式 (COAIFY) */
        .title {
            margin-top: 80px;
            color: white;
            font-size: 60px;
            letter-spacing: 10px;
            text-shadow: 4px 4px #000;
            font-weight: bold;
        }

        /* 3. 按鈕容器 */
        .button-group {
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 80%;
        }

        /* 4. 自定義按鈕樣式 */
        .pixel-button {
            background-image: url('indexbottom.png'); /* 使用您上傳的按鈕底圖 */
            background-size: 100% 100%;
            background-color: transparent;
            border: none;
            height: 60px;
            width: 100%;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #4a8eb3; /* 根據圖片調整文字顏色 */
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
            outline: none;
            transition: transform 0.1s;
        }

        .pixel-button:active {
            transform: scale(0.95); /* 點擊縮放效果 */
        }

        /* 移除預設 submit 樣式 */
        form {
            width: 100%;
            margin: 0;
        }
    </style>
</head>
<body>

    <div class="phone-container">
        <div class="title">COAIFY</div>

        <div class="button-group">
            <form action="login.php" method="get">
                <button type="submit" class="pixel-button">Login/Register</button>
            </form>

            <form action="qrcode.php" method="get">
                <button type="submit" class="pixel-button">Scan QR Code</button>
            </form>

            <form action="pin.php" method="get">
                <button type="submit" class="pixel-button">Enter PIN</button>
            </form>
        </div>
    </div>

</body>
</html>