<?php
/**
 * 檔案名稱: player_edit.php
 * 修正重點：將返回按鈕高度調整與 player_management.php 一致 (bottom: 505px)。
 */

// 模擬從 URL 獲取的玩家 ID
$player_id = $_GET['id'] ?? 1;

// 模擬玩家資料
$mock_players = [
    1 => ['user' => 'user_alice', 'pass' => 'abc123'],
    2 => ['user' => 'boss_bob', 'pass' => 'abc123'],
    3 => ['user' => 'charlie88', 'pass' => 'abc123'],
    4 => ['user' => 'david007', 'pass' => 'abc123'],
    5 => ['user' => 'eva_best', 'pass' => 'abc123'],
    6 => ['user' => 'frank_gh', 'pass' => 'abc123'],
];

$player = $mock_players[$player_id] ?? ['user' => '未知', 'pass' => ''];
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Coaify - Edit Player</title>
<style>
    body { 
        margin: 0; padding: 0; display: flex; 
        justify-content: center; align-items: center; 
        height: 100vh; background-color: #f0f0f0; 
        font-family: 'Courier New', Courier, monospace; 
    }

    .phone-container {
        width: 360px;
        height: 640px;
        background-image: url('player_data.png'); 
        background-size: 100% 100%;
        position: relative;
        border: 8px solid #222;
        border-radius: 20px;
        overflow: hidden;
    }

    /* 修改邏輯框框 */
    .edit-box {
        position: absolute;
        top: 180px;
        left: 40px;
        right: 40px;
        background: rgba(255, 255, 255, 0.95);
        padding: 20px;
        border-radius: 10px;
        border: 3px solid #6d90ca;
        box-shadow: 0px 4px 15px rgba(0,0,0,0.2);
        z-index: 10;
    }

    .edit-title {
        color: #4a6fa5;
        font-weight: bold;
        margin-bottom: 15px;
        text-align: center;
        font-size: 18px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-size: 12px;
        color: #666;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-family: 'Courier New', monospace;
    }

    .submit-btn {
        width: 100%;
        background: #6d90ca;
        border: none;
        color: white;
        padding: 10px;
        font-weight: bold;
        cursor: pointer;
        border-radius: 5px;
        font-size: 14px;
        margin-top: 10px;
    }

    /* 底部返回群組：同步移動至 bottom: 505px */
    .footer-group {
        position: absolute;
        bottom: 505px; 
        left: 40px;
        display: flex;
        align-items: center;
        z-index: 10;
        cursor: pointer;
    }

    .back-circle {
        width: 34px;
        height: 34px;
        background: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #4a6fa5;
        font-size: 20px;
        font-weight: bold;
        box-shadow: 2px 2px 0px rgba(0,0,0,0.2);
    }
</style>
<script>
function goBack(){ window.location.href = 'player_management.php';}

function handleUpdate(event) {
    event.preventDefault(); 
    const account = document.getElementById('account').value;
    // 使用 alert 提示修改成功
    alert('玩家 ' + account + ' 的資料已成功更新！');
    window.location.href = 'player_management.php'; 
}
</script>
</head>
<body>

<div class="phone-container">
    
    <div class="footer-group" onclick="goBack()">
        <div class="back-circle">←</div>
    </div>

    <div class="edit-box">
        <div class="edit-title">EDIT PLAYER #<?php echo $player_id; ?></div>
        
        <form onsubmit="handleUpdate(event)">
            <div class="form-group">
                <label>帳號名稱 (Account)</label>
                <input type="text" id="account" value="<?php echo $player['user']; ?>" required>
            </div>
            
            <div class="form-group">
                <label>修改密碼 (Password)</label>
                <input type="text" id="password" value="<?php echo $player['pass']; ?>" required>
            </div>
            
            <button type="submit" class="submit-btn">儲存修改</button>
        </form>
    </div>

</div>

</body>
</html>