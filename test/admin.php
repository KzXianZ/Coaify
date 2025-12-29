<?php
session_start();

// 檢查登入狀態
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
<title>管理員 - 儀表板</title>

<style>
/* ================= 基本設定 ================= */
body{
  margin:0;
  background:#eee;
  font-family: Arial, sans-serif;
}

/* ================= 手機外框（黑色邊線） ================= */
.phone{
  width:380px;
  height:700px;
  margin:20px auto;
  border:8px solid #333;
  border-radius:20px;
  position:relative;
  overflow:hidden;               /* 不超出黑框 */
  box-sizing:border-box;

  /* 直接使用你給的背景圖 */
  background:url("admin_back.png") no-repeat center bottom;
  background-size:cover;
  image-rendering: pixelated;

  /* ⭐ 核心：用 flex 讓內容置中 */
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
}

/* ================= LOGOUT（右上角像素風） ================= */
.logout-link{
  position:absolute;
  top:16px;
  right:18px;
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
  image-rendering: pixelated;
}

.logout-link:hover{
  opacity:.85;
}

/* ================= 按鈕群組（正中央） ================= */
.btns{
  display:flex;
  flex-direction:column;
  gap:28px;
  transform: translateY(-70px);
}

/* ================= 圖片按鈕 ================= */
.img-btn{
  width:240px;
  height:48px;
  background-repeat:no-repeat;
  background-size:contain;
  background-position:center;
  cursor:pointer;
  image-rendering: pixelated;
  transition:transform .12s ease;
}

.img-btn:hover{
  transform:translateY(-3px);
}

/* ★ 使用你給的實際檔名 ★ */
.img-btn.player{
  background-image:url("admin_button_1.png");
}
.img-btn.records{
  background-image:url("admin_button_2.png");
}
</style>

<script>
function logout(){
  window.location.href='login.php?action=logout';
}
function goToRecords(){
  window.location.href='admin_records.php';
}
function goToPlayerManagement(){
  window.location.href='player_management.php';
}
</script>
</head>

<body>

<div class="phone">

  <!-- LOGOUT -->
  <button class="logout-link" onclick="logout()">LOGOUT</button>

  <!-- 按鈕（直接在背景上） -->
  <div class="btns">
    <div class="img-btn player" onclick="goToPlayerManagement()"></div>
    <div class="img-btn records" onclick="goToRecords()"></div>
  </div>

</div>

</body>
</html>
