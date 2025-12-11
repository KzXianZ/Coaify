<!-- pin.php -->
<?php /* PIN 結果頁 */ ?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>PIN結果</title></head>
<body>
<center>
<table width="360" height="720" border="1">
<tr><td align="center" valign="middle">
<h1>PIN碼結果</h1>
<p><?php echo isset($_GET['pin'])?htmlspecialchars($_GET['pin']):'未輸入'; ?></p>
<br>
<input type="button" value="返回" onclick="history.back()">
</td></tr>
</table>
</center>
</body>
</html>