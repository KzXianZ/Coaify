<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Coaify - Choose Quiz</title>
<style>
    body { 
        margin: 0; padding: 0; display: flex; 
        justify-content: center; align-items: center; 
        height: 100vh; background-color: #ffffffff; 
        font-family: 'Courier New', Courier, monospace; 
    }

    .phone-container {
        width: 360px;
        height: 640px;
        background-image: url('background.png'); 
        background-size: 100% 100%;
        position: relative;
        border: 8px solid #222;
        border-radius: 20px;
        overflow: hidden;
    }

    /* 右上角 LOGOUT */
    .logout-btn {
        position: absolute;
        top: 15px;
        right: 15px;
        color: #4a8eb3;
        text-decoration: underline;
        cursor: pointer;
        font-size: 12px;
        font-weight: bold;
        z-index: 20;
    }

    /* 1. 頁籤校正：將位置往上移，並對齊背景標籤 */
    .tab-group {
        position: absolute;
        top: 70px;
        left: 32px;
        display: flex;
        z-index: 10;
    }
    .tab-text {
        font-size: 16px;
        font-weight: bold;
        letter-spacing: 1px;
        cursor: pointer;
        width: 110px; /* 設定寬度讓它們分別對準左右標籤 */
        text-align: center;
    }
    .tab-host { color: white; } /* 對應深藍色標籤 */
    .tab-game { color: #4a6fa5; margin-left: 15px; } /* 對應淺灰色標籤 */

    /* 2. CHOOSE QUIZ 標題與搜尋框 */
    .header-group {
        position: absolute;
        top: 152px; 
        left: 40px;
        right: 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 5;
    }
    .panel-title { color: white; font-weight: bold; font-size: 18px; text-shadow: 1px 1px #000; }
    .search-box {
        background: white; border: none; padding: 5px;
        width: 100px; border-radius: 4px; font-size: 12px;
        outline: none;
    }

    /* 3. 題庫列表區域 */
    .quiz-list-container {
        position: absolute;
        top: 210px;
        left: 40px;
        right: 40px;
        height: 200px; 
        z-index: 5;
        overflow-y: auto;
    }
    .quiz-item {
        background: white;
        margin-bottom: 12px;
        padding: 12px;
        border-radius: 5px;
        cursor: pointer;
        border: 3px solid transparent;
        display: block;
        text-align: left;
    }
    .quiz-item.selected { border: 3px solid #4a8eb3; background-color: #f0f8ff; }
    .quiz-name { color: #4a6fa5; font-weight: bold; font-size: 16px; display: block; pointer-events: none; }
    .quiz-date { color: #999; font-size: 10px; display: block; margin-top: 4px; pointer-events: none; }

    /* 4. 底部操作區域：調整到藍色面板底部邊緣 */
    .footer-group {
        position: absolute;
        bottom: 160px; /* 向上調整，確保在草地之上 */
        left: 40px;
        right: 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 10;
    }

    .back-btn {
        width: 42px;
        height: 42px;
        background: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #4a6fa5;
        font-size: 26px;
        cursor: pointer;
        font-weight: bold;
        border: 2px solid #4a6fa5;
    }

    .next-btn {
        background: url('indexbottom.png') no-repeat center;
        background-size: 100% 100%;
        width: 190px;
        height: 48px;
        border: none;
        color: #4a6fa5;
        font-weight: bold;
        font-size: 18px;
        cursor: pointer;
    }
    .next-btn.disabled { opacity: 0.6; cursor: not-allowed; filter: grayscale(0.5); }
</style>
</head>
<body>

<div class="phone-container">
    <div class="logout-btn" onclick="location.href='login.php?action=logout'">LOGOUT</div>

    <div class="tab-group">
<<<<<<< HEAD
        <div class="tab-text tab-host" onclick="location.href='host.php'"></div>
=======
        <div class="tab-text tab-host" onclick="location.href='host.php'">出 題 者</div>
>>>>>>> 91820b63b362778a52c6105d2e0d75724a989f95
    </div>

    <div class="header-group">
        <span class="panel-title">CHOOSE QUIZ</span>
        <input type="text" id="search" class="search-box" placeholder="SEARCH" oninput="filterGames()">
    </div>

    <div class="quiz-list-container">
        <div class="quiz-item" onclick="selectGame(this, 'test1')">
            <span class="quiz-name">SAD QUIZ-1</span>
            <span class="quiz-date">LAST EDIT: 2025.11.15</span>
        </div>
        <div class="quiz-item" onclick="selectGame(this, 'test2')">
            <span class="quiz-name">MIS QUIZ-1</span>
            <span class="quiz-date">LAST EDIT: 2025.11.28</span>
        </div>
    </div>

    <div class="footer-group">
        <div class="back-btn" onclick="location.href='host.php'">←</div>
        <button id="next-btn" class="next-btn disabled" onclick="nextStep()">NEXT STEP</button>
    </div>
</div>

<script>
    let selectedGame = null;

    function selectGame(element, gameId) {
        // 移除所有項目的選取狀態
        document.querySelectorAll('.quiz-item').forEach(item => item.classList.remove('selected'));
        // 設定當前選取
        element.classList.add('selected');
        selectedGame = gameId;
        // 啟用下一步按鈕
        const nextBtn = document.getElementById('next-btn');
        nextBtn.classList.remove('disabled');
    }

    function nextStep() {
        if (!selectedGame) return;
        window.location.href = 'game_setup_' + selectedGame + '.php';
    }

    function filterGames() {
        const input = document.getElementById('search').value.toLowerCase();
        document.querySelectorAll('.quiz-item').forEach(item => {
            const name = item.querySelector('.quiz-name').innerText.toLowerCase();
            item.style.display = name.includes(input) ? 'block' : 'none';
        });
    }
</script>

</body>
</html>