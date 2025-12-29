<?php
/**
 * 檔案名稱: player_management.php
 * 修正重點：將返回按鈕位置下移至 bottom: 110px。
 */
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Coaify - player list</title>
<style>
    /* 基礎手機容器與背景設定 */
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

    /* 右上角 LOGOUT 文字 */
    .logout-link {
        position: absolute;
        top: 15px;
        right: 20px;
        color: #4a8eb3;
        text-decoration: underline;
        font-weight: bold;
        font-size: 12px;
        cursor: pointer;
        z-index: 10;
    }

    /* 玩家列表區域 */
    .player-list-container {
        position: absolute;
        top: 145px;    
        left: 35px;
        right: 35px;
        height: 365px; /* 稍微拉長一點點 */
        overflow-y: auto;
        padding-right: 5px;
        z-index: 5;
    }

    .player-card {
        background: rgba(255, 255, 255, 0.9);
        margin-bottom: 8px;
        padding: 10px 12px;
        border-radius: 4px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 2px solid #6d90ca;
    }

    .player-account {
        color: #4a6fa5;
        font-weight: bold;
        font-size: 14px;
    }

    .player-pass {
        color: #666;
        font-size: 10px;
        display: block;
    }

    .edit-btn {
        background: #6d90ca;
        border: none;
        color: white;
        padding: 4px 10px;
        font-size: 12px;
        font-weight: bold;
        cursor: pointer;
        border-radius: 3px;
    }

    /* 底部返回群組：下移至 110px */
    .footer-group {
        position: absolute;
        bottom: 505px; /* 從 125px 下移至 110px */
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

    .back-text {
        color: white;
        margin-left: 5px;
        font-weight: bold;
        font-size: 15px;
        text-shadow: 2px 2px #000;
    }

    /* 滾動條樣式 */
    .player-list-container::-webkit-scrollbar {
        width: 6px;
    }
    .player-list-container::-webkit-scrollbar-thumb {
        background: #6d90ca;
        border-radius: 10px;
    }
</style>
<script>
function goBack(){ window.history.back(); }
function logout(){ window.location.href='login.php?action=logout'; }
function editPlayer(id){
    window.location.href = `player_edit.php?id=${id}`; 
}
</script>
</head>
<body>

<div class="phone-container">
    <div class="logout-link" onclick="logout()">LOGOUT</div>

    <div class="player-list-container">
        <?php
        $players = [
            ['id' => 1, 'user' => 'user_alice', 'pass' => 'abc123'],
            ['id' => 2, 'user' => 'boss_bob', 'pass' => 'abc123'],
            ['id' => 3, 'user' => 'charlie88', 'pass' => 'abc123'],
            ['id' => 4, 'user' => 'david007', 'pass' => 'abc123'],
            ['id' => 5, 'user' => 'eva_best', 'pass' => 'abc123'],
            ['id' => 6, 'user' => 'frank_gh', 'pass' => 'abc123'],
        ];

        foreach ($players as $p) {
            echo "
            <div class='player-card'>
                <div class='player-info'>
                    <span class='player-account'>{$p['user']}</span>
                    <span class='player-pass'>ID: {$p['id']} | PASS: {$p['pass']}</span>
                </div>
                <button class='edit-btn' onclick='editPlayer({$p['id']})'>修改</button>
            </div>";
        }
        ?>
    </div>

    <div class="footer-group" onclick="goBack()">
        <div class="back-circle">←</div>
        <span class="back-text"></span>
    </div>
</div>

</body>
</html>