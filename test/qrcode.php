<?php /* QR Code 示意頁 */ ?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
<meta charset="UTF-8">
<title>HOST GAME</title>

<style>
body {
    margin: 0;
    background-color: #c8f4f6;
    font-family: Arial, sans-serif;
}

.phone {
    width: 360px;
    height: 720px;
    margin: 0 auto;
    background-color: #c8f4f6;
    position: relative;
}

/* 上方標題列 */
.header {
    background-color: #7ea3d8;
    height: 80px;
    color: white;
    display: flex;
    align-items: center;
    padding: 0 16px;
}

.header .back {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background-color: white;
    color: #7ea3d8;
    text-align: center;
    line-height: 32px;
    font-weight: bold;
    cursor: pointer;
}

.header .title {
    margin-left: 16px;
    font-size: 18px;
    letter-spacing: 2px;
}

/* 中央卡片 */
.card {
    width: 300px;
    margin: 40px auto;
    background-color: white;
    padding: 24px;
    text-align: center;
}

/* QR Code 假圖 */
.qr {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    justify-items: center;
}

.qr div {
    width: 80px;
    height: 80px;
    background-color: #2f5fb3;
    position: relative;
}

.qr div::after {
    content: '';
    width: 20px;
    height: 20px;
    background-color: white;
    position: absolute;
    top: 30px;
    left: 30px;
}

/* 序號 */
.code {
    margin-top: 20px;
    font-size: 18px;
    letter-spacing: 3px;
    color: #2f5fb3;
}

/* 底部像素地面 */
.ground {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 80px;
    background: repeating-linear-gradient(
        90deg,
        #3cb54a 0,
        #3cb54a 20px,
        #2d8c3a 20px,
        #2d8c3a 40px
    );
}
</style>
</head>

<body>

<div class="phone">

    <!-- Header -->
    <div class="header">
        <div class="back" onclick="history.back()">&larr;</div>
        <div class="title">HOST GAME</div>
    </div>

    <!-- QR Card -->
    <div class="card">
        <div class="qr">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="code">G6D5K29C</div>
    </div>

    <!-- Ground -->
    <div class="ground"></div>

</div>

</body>
</html>
