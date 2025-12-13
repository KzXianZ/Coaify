<?php
/**
 * 檔案名稱: admin_records.php
 * 描述: 模擬管理員查看遊戲紀錄列表，已將玩家 ID 替換為帳號。
 * 規範: 使用手機外框佈局，底部包含返回和登出按鈕。
 */
// 由於是前端模擬，這裡不執行 Session 檢查，但預留 PHP 區塊。
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>遊戲紀錄查詢</title>
<style>
body { font-family: Arial; margin: 0; }
.phone {
    width: 380px;
    height: 750px; 
    margin: 20px auto;
    border: 2px solid #333;
    border-radius: 20px;
    position: relative;
    padding: 20px;
    box-sizing: border-box;
    text-align: center;
    overflow-y: auto; /* 啟用垂直滾動 */
}
/* 列表樣式 */
.data-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    font-size: 14px;
}
.data-table th, .data-table td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}
.data-table th {
    background-color: #f0f0f0;
}

/* 底部按鈕樣式 */
.back-btn, .logout-btn {
    position: absolute;
    bottom: 20px;
    padding: 10px 20px;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}
.back-btn { left: 20px; background-color: #5bc0de; }
.logout-btn { right: 20px; background-color: #d9534f; }
</style>
<script>
function goBack(){ window.history.back(); }
function logout(){ 
    window.location.href='login.php?action=logout'; }
</script>
</head>
<body>
<div class="phone">
    <h2>🎮 遊戲紀錄查詢</h2>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>帳號</th> 
                <th>分數</th>
                <th>時間</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>101</td>
                <td>user_alice</td> <td>9500</td>
                <td>14:30:05</td>
            </tr>
            <tr>
                <td>102</td>
                <td>charlie88</td> <td>4120</td>
                <td>15:10:22</td>
            </tr>
            <tr>
                <td>103</td>
                <td>boss_bob</td> <td>1200</td>
                <td>16:00:00</td>
            </tr>
            <tr>
                <td>104</td>
                <td>user_alice</td> <td>8800</td>
                <td>17:05:40</td>
            </tr>
            <tr>
                <td>105</td>
                <td>david007</td> <td>7500</td>
                <td>17:30:15</td>
            </tr>
            <tr>
                <td>106</td>
                <td>eva_best</td> <td>500</td>
                <td>18:00:00</td>
            </tr>
            <tr>
                <td>107</td>
                <td>charlie88</td> <td>9999</td>
                <td>19:00:00</td>
            </tr>
            <tr>
                <td>108</td>
                <td>tarik_cool</td> <td>3200</td>
                <td>20:00:00</td>
            </tr>
            <tr>
                <td>109</td>
                <td>henry</td> <td>7000</td>
                <td>21:00:00</td>
            </tr>
            <tr>
                <td>110</td>
                <td>frank77</td> <td>6500</td>
                <td>22:00:00</td>
            </tr>
        </tbody>
    </table>
    
    <div style="height: 60px;"></div> <button class="back-btn" onclick="goBack()">返回</button>
    <button class="logout-btn" onclick="logout()">登出</button>
</div>
</body>
</html>