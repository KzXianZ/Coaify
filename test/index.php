<?php
// =============================
// Pure-PHP / HTML (no CSS) multi-page mockup
// Each page uses only HTML attributes (no <style> or external CSS)
// Save each section as separate .php files when deploying.
// =============================
?>


<!-- index.php -->
<?php /* 首页 */ ?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Coaify - 首頁</title></head>
<body>
<center>
<!-- 模擬手機外框：使用 table 和寬高屬性（無 CSS） -->
<table width="360" height="720" border="1" cellpadding="0" cellspacing="0">
<tr>
<td valign="top">
<!-- 螢幕內容置中 -->
<table width="100%" height="100%">
<tr><td align="center" valign="middle">
<h1>首頁</h1>
<form action="login.php" method="get" style="display:inline">
<input type="submit" value="註冊與登入">
</form>
<br><br>
<form action="qrcode.php" method="get" style="display:inline">
<input type="submit" value="掃QR Code">
</form>
<br><br>
<form action="pin.php" method="get">
<input type="text" name="pin" placeholder="輸入 PIN">
<input type="submit" value="送出">
</form>
</td></tr>
</table>
</td>
</tr>
</table>
</center>
</body>
</html>