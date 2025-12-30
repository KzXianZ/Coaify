<?php
// 假設你原本的註冊流程在這裡做驗證與寫入資料庫
$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 檢查帳密與 email 是否有填
    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
        // TODO: 寫入資料庫
        $success = true;
    } else {
        $error = "請填寫所有欄位";
    }
}
?>

<!doctype html>
<html lang="zh-Hant">
<head>
<meta charset="utf-8">
<title>COAIFY - Register</title>

<style>
  /* 1. 背景與置中設定 */
  body { 
    margin: 0; 
    background: #f8f9fa; /* 淺灰色外圍，讓黑色手機框更顯眼 */
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    font-family: Arial, sans-serif;
  }

  /* 讓像素圖縮放不糊 */
  * { image-rendering: pixelated; image-rendering: crisp-edges; }

  /* ✅ 模擬圖片中的黑色手機邊框 */
  .phone-frame {
    width: 360px;  /* 360螢幕 + 邊框厚度 */
    height: 720px; /* 720螢幕 + 邊框厚度 */
    background: #000; /* 黑色邊框 */
    border-radius: 40px; /* 大圓角邊框 */
    padding: 8px; /* 邊框厚度 */
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3); /* 立體陰影 */
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
  }

  /* ✅ 手機內部的螢幕畫面 */
  .screen {
    width: 360px;
    height: 720px;
    position: relative;
    background: url("register_background.png") no-repeat;
    background-size: 100% 100%;
    overflow: hidden;
    border-radius: 30px; /* 畫面內縮圓角，貼合外框 */
  }

  /* ✅ 表單區域 */
  .formArea {
    position: absolute;
    left: 50%;
    top: 225px; 
    transform: translateX(-50%);
    width: 200px; 
    text-align: left;
  }

  .field { margin-bottom: 16px; }

  .label {
    display: block;
    font-family: monospace;
    font-weight: 700;
    letter-spacing: 1px;
    color: #1f3f8d;
    margin-bottom: 6px;
    font-size: 13px;
  }

  .input {
    width: 100%;
    height: 28px;
    border: 2px solid #2a4ea0;
    background: #dff6ff;
    padding: 4px 6px;
    box-sizing: border-box;
    outline: none;
    font-size: 13px;
  }

  /* ✅ 按鈕樣式 */
  .btnRow {
    margin-top: 10px;
    display: flex;
    justify-content: space-between;
    gap: 12px;
  }

  .imgBtn {
    width: 125px; 
    height: 33px;
    border: 0;
    padding: 0;
    cursor: pointer;
    background: transparent;
    position: relative;
  }

  .btnRegister {
    background: url("register_button.png") center/contain no-repeat;
  }

  .btnCancel {
    background: url("cancel_button.png") center/contain no-repeat;
  }

  .imgBtn span {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: monospace;
    font-weight: 800;
    letter-spacing: 1px;
    font-size: 12px;
    pointer-events: none;
    color: #ffffff;
    text-shadow: 0 1px 0 rgba(0,0,0,0.25);
  }

  .btnCancel span {
    color: #2a4ea0;
    text-shadow: none;
  }

  .imgBtn:active { transform: translateY(1px); }

  .msg {
    margin-top: 8px;
    font-size: 12px;
    color: #b00020;
    text-align: center;
    min-height: 14px;
  }

  /* 成功畫面 */
  .successBox {
    position: absolute;
    left: 50%;
    top: 310px;
    transform: translateX(-50%);
    width: 260px;
    text-align: center;
    font-family: system-ui, sans-serif;
    color: #1f3f8d;
  }
</style>
</head>

<body>

<div class="phone-frame">
    
    <div class="screen">

      <?php if ($success): ?>
        <div class="successBox">
          <h3 style="margin:0 0 10px 0;">已儲存紀錄！</h3>
          <form action="login.php" style="margin:0;">
            <button class="imgBtn btnCancel" type="submit">
              <span>LOGIN</span>
            </button>
          </form>
        </div>

      <?php else: ?>
        <form method="post" action="register_save_records.php" class="formArea">

          <div class="field">
            <label class="label">ACCOUNT:</label>
            <input class="input" type="text" name="username">
          </div>

          <div class="field">
            <label class="label">PASSWORD:</label>
            <input class="input" type="password" name="password">
          </div>

          <div class="field">
            <label class="label">E-MAIL:</label>
            <input class="input" type="text" name="email">
          </div>

          <div class="btnRow">
            <button type="submit" class="imgBtn btnRegister">
              <span>REGISTER</span>
            </button>

            <button type="button" class="imgBtn btnCancel" onclick="location.href='login.php'">
              <span>CANCEL</span>
            </button>
          </div>

          <div class="msg">
            <?php if (!empty($error)) echo htmlspecialchars($error); ?>
          </div>

        </form>
      <?php endif; ?>

    </div>
</div>

</body>
</html>