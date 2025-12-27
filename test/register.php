<?php
// 假設你原本的註冊流程在這裡做驗證與寫入資料庫
$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 檢查帳密與 email 是否有填（或你原本的資料庫邏輯）
    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {

        // TODO: 寫入資料庫
        // ...

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
  /* 外面保持你原本的白底 */
  body{ margin:0; background:#fff; }

  /* 讓像素圖縮放不糊 */
  *{ image-rendering: pixelated; image-rendering: crisp-edges; }

  /* ✅ 外框：參照 index.php 的手機邊框（不改動內部尺寸/定位） */
.phone, .screen{
  outline: 8px solid #222;      /* 不影響原本寬高 */
  border-radius: 20px;
  box-shadow: 0 0 20px rgba(0,0,0,0.5);
}

  /* ✅ 這個就是你原本 table 裡的「手機畫面」：固定 360x720 不放大 */
  .screen{
    width: 360px;
    height: 720px;
    position: relative;
    background: url("register_background.png") no-repeat;
    background-size: 100% 100%; /* 把 576x967 縮到 360x720 裡，不會放大頁面 */
    overflow: hidden;
  }

  /* ✅ 把表單釘在白框內（你只需要調 top 就能上下微調） */
  .formArea{
    position:absolute;
    left: 50%;
    top: 225px;                 /* ⭐ 若還不準：上下就改這個 */
    transform: translateX(-50%);
    width: 200px;               /* ⭐ 欄位寬度：不準就調這個 */
    text-align:left;
  }

  .field{ margin-bottom: 16px; }

  .label{
    display:block;
    font-family: monospace;
    font-weight: 700;
    letter-spacing: 1px;
    color:#1f3f8d;
    margin-bottom: 6px;
    font-size: 13px;
  }

  .input{
    width:100%;
    height: 28px;
    border: 2px solid #2a4ea0;
    background:#dff6ff;
    padding: 4px 6px;
    box-sizing:border-box;
    outline:none;
    font-size: 13px;
  }

  /* ✅ 按鈕：用你給的底圖，文字疊上去 */
  .btnRow{
    margin-top: 10px;
    display:flex;
    justify-content:space-between;
    gap: 12px;
  }

  .imgBtn{
    width: 125px;     /* 你的按鈕圖尺寸：125x33 */
    height: 33px;
    border:0;
    padding:0;
    cursor:pointer;
    background: transparent;
    position: relative;
  }

  .btnRegister{
    background: url("register_button.png") center/contain no-repeat;
  }

  .btnCancel{
    background: url("cancel_button.png") center/contain no-repeat;
  }

  .imgBtn span{
    position:absolute;
    inset:0;
    display:flex;
    align-items:center;
    justify-content:center;
    font-family: monospace;
    font-weight: 800;
    letter-spacing: 1px;
    font-size: 12px;
    pointer-events:none;
    color:#ffffff;
    text-shadow: 0 1px 0 rgba(0,0,0,0.25);
  }

  .btnCancel span{
    color:#2a4ea0;
    text-shadow:none;
  }

  .imgBtn:active{ transform: translateY(1px); }

  .msg{
    margin-top: 8px;
    font-size: 12px;
    color:#b00020;
    text-align:center;
    min-height: 14px;
  }

  /* 成功畫面：也放在同一個 screen 裡 */
  .successBox{
    position:absolute;
    left:50%;
    top: 310px;                /* ⭐ 成功文字位置 */
    transform: translateX(-50%);
    width: 260px;
    text-align:center;
    font-family: system-ui, sans-serif;
    color:#1f3f8d;
  }
</style>
</head>

<body>
<center>
<table border="1" width="360" height="720">
<tr><td align="center">

  <!-- ✅ 保留你的 table 結構，只是把內容換成一個 screen -->
  <div class="screen">

    <?php if ($success): ?>
      <div class="successBox">
        <h3 style="margin:0 0 10px 0;">註冊成功！</h3>
        <form action="login.php" style="margin:0;">
          <button class="imgBtn btnCancel" type="submit">
            <span>LOGIN</span>
          </button>
        </form>
      </div>

    <?php else: ?>
      <form method="post" action="register.php" class="formArea">

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

</td></tr>
</table>
</center>
</body>
</html>
