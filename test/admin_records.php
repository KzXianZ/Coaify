<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header('Location: login.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>RECORDS</title>

<style>
body{
  margin:0;
  background:#eee;
  font-family: Arial, sans-serif;
}

/* 手機外框 */
.phone{
  width:380px;
  height:700px;
  margin:20px auto;
  border:8px solid #333;
  border-radius:20px;
  position:relative;
  overflow:hidden;
}

/* 整頁背景 */
.screen{
  position:absolute;
  inset:0;
  background:url("admin_records.png") no-repeat center top;
  background-size:cover;
  image-rendering: pixelated;
}

/* LOGOUT（右上角，沿用 admin.php） */
.logout-link{
  position:absolute;
  top:18px;
  right:22px;
  font-size:13px;
  font-weight:700;
  letter-spacing:3px;
  color:#2c4a7a;
  background:none;
  border:none;
  padding:0;
  cursor:pointer;
  text-decoration:underline;
  text-underline-offset:4px;
}

/* 返回鍵（圖片） */
.back-btn{
  position:absolute;
  top: 115px;      /* 依你的設計圖 */
  left:44px;
  width:36px;
  height:36px;
  background:url("back_arrow.png") no-repeat center;
  background-size:contain;
  border:none;
  cursor:pointer;
  padding:0;
}

/* SEARCH 圖（純背景貼圖） */
.search-img{
  position:absolute;
  top:115px;      /* 跟返回鍵同一列 */
  left:150px;      /* 依實際圖微調 */
  width:220px;
  height:36px;
  background:url("search.png") no-repeat center;
  background-size:contain;
}

/* 遊戲紀錄列表（整張圖） */
.records-img{
  position:absolute;
  top:165px;      /* 列表開始位置 */
  left:32px;
  width:316px;
  height:auto;
}

/* SAVE 按鈕（圖片，可按但不做事） */
.save-btn{
  position:absolute;
  bottom:150px;
  left:50%;
  transform:translateX(-50%);
  width:220px;
  height:44px;
  background:url("save.png") no-repeat center;
  background-size:contain;
  border:none;
  cursor:pointer;
  padding:0;
}
.save-btn:active{
  transform:translateX(-50%) translateY(2px);
}
</style>

<script>
function logout(){
  window.location.href='login.php?action=logout';
}
function goAdmin(){
  window.location.href='admin.php';
}
</script>
</head>

<body>

<div class="phone">
  <div class="screen">

    <!-- LOGOUT -->
    <button class="logout-link" onclick="logout()">LOGOUT</button>

    <!-- 返回 -->
    <button class="back-btn" onclick="goAdmin()" aria-label="Back"></button>

    <!-- SEARCH（背景圖） -->
    <div class="search-img"></div>

    <!-- 紀錄列表（整張圖） -->
    <img src="game_records.png" class="records-img" alt="Game Records">

    <!-- SAVE -->
    <button class="save-btn" onclick="void(0)" aria-label="Save"></button>

  </div>
</div>

</body>
</html>
