<?php
/**
 * 檔案名稱: player_management.php
 * 描述: 模擬玩家資料管理介面，前端列表顯示與虛擬修改按鈕。
 * 規範: 使用手機外框佈局，底部包含返回和登出按鈕。
 */
// 由於是前端模擬，這裡不執行 Session 檢查，但預留 PHP 區塊。
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>玩家資料管理</title>
<style>
body { font-family: Arial; margin: 0; }
.phone {
    width: 380px;
    /* 增加高度以容納列表 */
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
.data-table button {
    padding: 5px 10px;
    font-size: 12px;
    background-color: #5bc0de;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

/* 底部按鈕樣式 (與 records_player_test2.php 保持一致) */
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
function editPlayer(id, account, password){
    // 前端模擬：彈出提示，然後模擬跳轉到詳細編輯頁面
    alert(`模擬進入編輯玩家 ID: ${id}, 帳號: ${account}, 密碼 (Hash): ${password} 的頁面`);
    window.location.href = `player_edit.php?id=${id}`; 
}
</script>
</head>
<body>
<div class="phone">
    <h2>👤 玩家資料管理</h2>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>帳號</th> 
                <th>密碼</th> 
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>user_alice</td> <td>abc123</td> <td><button onclick="editPlayer(1, 'user_alice', 'abc123')">修改</button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>boss_bob</td>
                <td>abc123</td>
                <td><button onclick="editPlayer(2, 'boss_bob', 'abc123')">修改</button></td>
            </tr>
            <tr>
                <td>3</td>
                <td>charlie88</td>
                <td>abc123</td>
                <td><button onclick="editPlayer(3, 'charlie88', 'abc123')">修改</button></td>
            </tr>
            <tr>
                <td>4</td>
                <td>david007</td>
                <td>abc123</td>
                <td><button onclick="editPlayer(4, 'david007', 'abc123')">修改</button></td>
            </tr>
            <tr>
                <td>5</td>
                <td>eva_best</td>
                <td>abc123</td>
                <td><button onclick="editPlayer(5, 'eva_best', 'abc123')">修改</button></td>
            </tr>
            <tr><td>6</td><td>frank77</td><td>abc123</td><td><button onclick="editPlayer(6, 'frank77', 'abc123')">修改</button></td></tr>
            <tr><td>7</td><td>grace101</td><td>password</td><td><button onclick="editPlayer(7, 'grace101', 'password')">修改</button></td></tr>
            <tr><td>8</td><td>henry</td><td>nukim</td><td><button onclick="editPlayer(8, 'henry', 'nukim')">修改</button></td></tr>
            <tr><td>9</td><td>ivy_pro</td><td>qwertyuiop</td><td><button onclick="editPlayer(9, 'ivy_pro', 'qwertyuiop')">修改</button></td></tr>
            <tr><td>10</td><td>tarik_cool</td><td>tarik1001</td><td><button onclick="editPlayer(10, 'jack_cool', 'tarik1001')">修改</button></td></tr>
        </tbody>
    </table>

    <div style="height: 60px;"></div> <button class="back-btn" onclick="goBack()">返回</button>
    <button class="logout-btn" onclick="logout()">登出</button>
</div>
</body>
</html>