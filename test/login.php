<?php
session_start();
$error_message = '';

// 處理登出
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header('Location: index.php');
    exit();
}

// 處理登入提交
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $account = $_POST['account'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($account === 'admin' && $password === 'pass') {
        $_SESSION['logged_in'] = true;
        header('Location: admin.php');
        exit();
    } elseif ($account === 'user' && $password === '123') {
        $_SESSION['logged_in'] = true;
        header('Location: home.php');
        exit();
    } else {
        $error_message = '帳號或密碼錯誤';
    }
}
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COAIFY LOGIN</title>
    <style>
        /* 1. 基礎設定與背景 */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #ffffffff; 
            font-family: 'Courier New', Courier, monospace;
        }

        /* 2. 手機外框容器 */
        .phone-container {
            width: 360px;
            height: 640px;
            background-image: url('index.png'); 
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

        /* 3. 標題樣式 */
        .title {
            margin-top: 60px;
            font-size: 50px;
            color: white;
            text-align: center;
            letter-spacing: 10px;
            text-shadow: 4px 4px #000;
            font-weight: bold;
        }

        /* 4. 登入對話框 */
        .login-container {
            width: 310px;
            background: url('login.png') no-repeat center;
            background-size: 100% 100%;
            padding: 30px 20px;
            text-align: left;
            margin-top: 20px;
            box-sizing: border-box;
            z-index: 5;
        }

        .label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            letter-spacing: 1px;
            color: #4a8eb3;
            font-size: 14px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            height: 35px;
            background: url('indexbottom.png') no-repeat center;
            background-size: 100% 100%;
            border: none;
            outline: none;
            padding: 0 10px;
            box-sizing: border-box;
            margin-bottom: 15px;
            font-size: 16px;
            color: #333;
        }

        .forget {
            text-align: right;
            font-size: 11px;
            text-decoration: underline;
            color: #4a8eb3;
            cursor: pointer;
            display: block;
            margin-top: -10px;
            margin-bottom: 15px;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .pixel-btn {
            width: 48%;
            height: 45px;
            background: url('loginbottom.png') no-repeat center;
            background-size: 100% 100%;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
        }

        .pixel-btn:active {
            transform: scale(0.95);
        }

        .error-msg {
            color: red;
            text-align: center;
            font-size: 12px;
            margin-top: 5px;
        }

        /* 5. 返回按鈕樣式 */
        .footer-back {
            position: absolute;
            bottom: 40px; /* 放在草地位置上方 */
            left: 25px;
            display: flex;
            align-items: center;
            cursor: pointer;
            z-index: 10;
        }

        .back-circle {
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #4a8eb3;
            font-size: 24px;
            font-weight: bold;
            border: 2px solid #4a8eb3;
            box-shadow: 2px 2px 0px rgba(0,0,0,0.2);
        }

        .back-text {
            color: white;
            margin-left: 10px;
            font-weight: bold;
            font-size: 14px;
            text-shadow: 2px 2px #000;
        }
    </style>
</head>
<body>

    <div class="phone-container">
        
        <div class="title">COAIFY</div>

        <div class="login-container">
            <form method="POST">
                <span class="label">ACCOUNT:</span>
                <input type="text" name="account" required>

                <span class="label">PASSWORD:</span>
                <input type="password" name="password" required>
                
                <a href="forgot.php" class="forget">FORGET PASSWORD</a>

                <?php if($error_message): ?>
                    <p class="error-msg"><?php echo $error_message; ?></p>
                <?php endif; ?>

                <div class="btn-group">
                    <button type="submit" class="pixel-btn">LOGIN</button>
                    <a href="register.php" class="pixel-btn">REGISTER</a>
                </div>
            </form>
        </div>

        <div class="footer-back" onclick="location.href='index.php'">
            <div class="back-circle">←</div>
            <span class="back-text"></span>
        </div>

    </div>

</body>
</html>