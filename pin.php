<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coaify - 輸入 PIN 碼</title>
    <style>
        /* 1. 基礎設定與背景 (與 index.php 相同) */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #ffffffff; /* 外圍背景色 */
            font-family: 'Courier New', Courier, monospace;
        }

        /* 2. 手機容器 (與 index.php 相同) */
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

        /* 3. 標題 (與 index.php 相同) */
        .title {
            margin-top: 80px;
            color: white;
            font-size: 60px;
            letter-spacing: 10px;
            text-shadow: 4px 4px #000;
            font-weight: bold;
            text-align: center;
        }

        /* 4. PIN 碼輸入對話框 (參考 COAIFY.png) */
        .pin-container {
            width: 310px;
            background: url('login.png') no-repeat center;
            background-size: 100% 100%;
            padding: 40px 20px;
            text-align: left;
            margin-top: 40px;
            box-sizing: border-box;
        }

        .label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
            letter-spacing: 2px;
            color: #4a8eb3;
            font-size: 20px;
        }

        /* 輸入框底圖 (與 login.php 相同) */
        input[type="text"] {
            width: 100%;
            height: 40px;
            background: url('indexbottom.png') no-repeat center;
            background-size: 100% 100%;
            border: none;
            outline: none;
            padding: 0 10px;
            box-sizing: border-box;
            margin-bottom: 30px;
            font-size: 18px;
            color: #333;
        }

        /* 5. 按鈕群組 */
        .btn-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        /* 像素化按鈕樣式 */
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
            text-transform: uppercase;
        }

        .pixel-btn:active {
            transform: scale(0.95);
        }

        /* 針對 Cancel 按鈕的特定顏色 (如果需要微調) */
        .btn-cancel {
            filter: saturate(0.8); /* 稍微降低飽和度以區別 Login */
        }
    </style>
</head>
<body>

    <div class="phone-container">
        <div class="title">COAIFY</div>

        <div class="pin-container">
            <span class="label">PIN:</span>
            <input type="text" placeholder="ENTER PIN">

            <div class="btn-group">
                <button type="button" class="pixel-btn" onclick="startGame()">ENTER</button>
                <button type="button" class="pixel-btn btn-cancel" onclick="goBack()">CANCEL</button>
            </div>
        </div>
    </div>

    <script>
        function startGame(){
            // 檢查是否有輸入內容 (選填)
            window.location.href = 'room.php';
        }
        function goBack(){
            // 返回首頁 index.php
            window.location.href = 'index.php';
        }
    </script>

</body>
</html>