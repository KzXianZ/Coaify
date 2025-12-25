<?php
/**
 * 檔案名稱: player_management.php
 * 修正重點：向上調升列表與返回按鈕位置，解決重疊問題。
 */
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Coaify - 玩家管理</title>
<style>
    /* 基礎手機容器與背景設定 */
    body { 
        margin: 0; padding: 0; display: flex; 
        justify-content: center; align-items: center; 
        height: 100vh; background-color: #ffffffff; 
        font-family: 'Courier New', Courier, monospace; 
    }

    .phone-container {
        width: 360px;
        height: 640px;
        background-image: url('management.png'); /* 使用背景圖 */
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
        right: 15px;
        color: #4a8eb3;
        text-decoration: underline;
        font-weight: bold;
        font-size: 12px;
        cursor: pointer;
        z-index: 10;
    }

    /* 頁籤文字定位 */
    .tab-text {
        position: absolute;
        top: 65px; /* 與 host_game.php 一致 */
        left: 48px;
        font-size: 20px;
        font-weight: bold;
        color: white;
        letter-spacing: 1px;
    }

    .panel-title {
        position: absolute;
        top: 152px;
        left: 40px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        text-shadow: 1px 1px #000;
    }

    /* 4. 玩家列表區域：位置向上移 */
    .player-list-container {
        position: absolute;
        top: 195px;    /* 從 200px 往上移至 195px */
        left: 35px;
        right: 35px;
        height: 250px; /* 縮小高度，預留空間給下方的返回按鈕 */
        overflow-y: auto;
        padding-right: 5px;
        z-index: 5;
    }

    .player-card {
        background: white;
        margin-bottom: 10px;
        padding: 10px 15px;
        border-radius: 5px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 2px 2px 0px rgba(0,0,0,0.1);
    }

    .player-account {
        color: #4a6fa5;
        font-weight: bold;
        font-size: 15px;
        display: block;
    }

    .player-pass {
        color: #999;
        font-size: 11px;
        margin-top: 2px;
        display: block;
    }

    /* 修改按鈕使用像素風底圖 */
    .edit-btn {
        background: url('loginbottom.png') no-repeat center;
        background-size: 100% 100%;
        border: none;
        color: white;
        padding: 5px 12px;
        font-size: 12px;
        font-weight: bold;
        cursor: pointer;
    }

    /* 5. 底部返回群組：位置往上調，避免重疊 */
    .footer-group {
        position: absolute;
        bottom: 140px; /* 從 130px 往上移動到 165px，避開草地區域 */
        left: 40px;
        display: flex;
        align-items: center;
        z-index: 10;
        cursor: pointer;
    }

    .back-circle {
        width: 38px;
        height: 38px;
        background: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #4a6fa5;
        font-size: 24px;
        font-weight: bold;
        border: 2px solid #4a6fa5;
    }

    .back-text {
        color: white;
        margin-left: 10px;
        font-weight: bold;
        font-size: 14px;
        text-shadow: 1px 1px #000;
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

    <div class="tab-text">玩家管理</div>
    <div class="panel-title">PLAYER LIST</div>

    <div class="player-list-container">
        <?php
        $players = [
            ['id' => 1, 'user' => 'user_alice', 'pass' => 'abc123'],
            ['id' => 2, 'user' => 'boss_bob', 'pass' => 'abc123'],
            ['id' => 3, 'user' => 'charlie88', 'pass' => 'abc123'],
            ['id' => 4, 'user' => 'david007', 'pass' => 'abc123'],
            ['id' => 5, 'user' => 'eva_best', 'pass' => 'abc123'],
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
        <span class="back-text">返回</span>
    </div>
</div>

</body>
</html>