<?php /* 出題者選單 */ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Host Menu</title>
<style>
/* 1. BODY 保持簡潔 */
body { 
    font-family: Arial, sans-serif; 
    margin: 0; 
    background-color: #f0f0f0; 
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

/* 2. PHONE 容器 (模擬手機視窗) */
.phone {
    width: 380px;
    height: 700px;
    margin: 20px auto;
    
    /* 背景設定為 home.png */
    background-image: url('home.png'); 
    background-size: cover; 
    background-repeat: no-repeat;
    background-position: center; 
    
    /* 模擬手機邊框 */
    border: 10px solid #000; 
    border-radius: 25px; 
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); 
    
    /* 內容設定 */
    color: #ffffff; 
    padding: 20px;
    box-sizing: border-box;
    
    /* 使用 Flexbox 垂直排列內容，並靠左對齊 */
    display: flex;
    flex-direction: column;
}

/* 3. 調整標題樣式 */
h2 {
    text-align: left;
    background-color: transparent; 
    font-size: 16px; 
    color: #000; 
    
    /* **** 核心微調：增加左側內邊距 5px **** */
    padding: 10px 10px 10px 10px; /* 上右下 10px，左側 5px */
    
    margin-top: 30px; 
    margin-bottom: 30px; 
}

/* 4. 按鈕樣式 (Host Game, Quiz Manage, Records) */
.menu-btn {
    display: block;
    width: 100%; 
    
    /* 縮小間距 */
    margin: 10px 0; 
    
    padding: 15px;
    font-size: 16px;
    border-radius: 10px;
    cursor: pointer;
    border: 2px solid #fff;
    font-weight: bold;
    color: #333;
    background-color: rgba(255, 255, 255, 0.9); 
}

/* 5. 特殊按鈕樣式：返回 */
.back-btn {
    display: block;
    width: 100%; 
    
    padding: 15px;
    font-size: 16px;
    border-radius: 10px;
    cursor: pointer;
    font-weight: bold;

    background-color: #d9534f; 
    color: white;
    border: none;
    
    /* 間距調整 */
    margin-top: 30px; 
    margin-bottom: 20px; 
}
</style>
</head>
<body>
<div class="phone">
    
    <h2>出題者選單</h2>
    
    <form action="host_game.php" method="get" style="width: 100%;">
        <input type="submit" value="Host Game" class="menu-btn">
    </form>
    
    <form action="quiz_manage.php" method="get" style="width: 100%;">
        <input type="submit" value="Quiz Manage" class="menu-btn">
    </form>
    
    <form action="records_host.php" method="get" style="width: 100%;">
        <input type="submit" value="Records" class="menu-btn">
    </form>
    
    <br>
    
    <input type="button" value="返回" onclick="history.back()" class="back-btn" style="width: 100%;">

</div>
</body>
</html>