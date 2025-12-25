<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAD QUIZ Game Setup</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        :root {
            --pixel-blue: #7fa4d9;
            --pixel-dark-blue: #5a82bc;
            --pixel-light-blue: #d4f4fe;
            --ui-white: rgba(255, 255, 255, 0.95);
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa; 
            /* 全域字體設定：英文像素風優先，中文使用黑體避開標楷體 */
            font-family: 'Press Start 2P', "微軟正黑體", "Microsoft JhengHei", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .phone {
            width: 380px;
            height: 700px;
            margin: 20px auto;
            background-image: url('S__1130501.jpg'); 
            background-size: cover; 
            background-repeat: no-repeat;
            background-position: center; 
            border: 10px solid #000; 
            border-radius: 25px; 
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); 
            position: relative;
        }

        /* 頂部 LOGOUT */
        .top-nav {
            text-align: right;
            padding: 15px 20px 5px;
        }
        .logout-link {
            color: #5a82bc;
            font-size: 10px;
            text-decoration: underline;
            cursor: pointer;
            letter-spacing: 1px;
            font-family: 'Press Start 2P', cursive;
        }

        /* 標籤頁佈局優化 - 加大字體並修正中文字體 */
        .tab-area {
            display: flex;
            align-items: flex-end;
            margin-left: 25px;
            margin-top: 10px;
        }
        .tab-main {
            background-color: var(--pixel-blue);
            color: white;
            padding: 12px 20px;
            border-radius: 12px 12px 0 0;
            font-size: 18px; /* 加大字體 */
            font-weight: bold;
            letter-spacing: 1px;
            /* 強制標籤中文不使用標楷體 */
            font-family: "微軟正黑體", "Microsoft JhengHei", sans-serif;
        }
        .tab-sub {
            background-color: #b8cde8;
            color: #5a82bc;
            padding: 8px 15px;
            border-radius: 8px 8px 0 0;
            font-size: 14px; /* 加大字體 */
            margin-left: 5px;
            font-weight: bold;
        }

        /* 主要藍色面板 */
        .blue-panel {
            background-color: var(--pixel-blue);
            margin: 0 25px;
            padding: 15px;
            border-radius: 0 15px 15px 15px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        /* 返回按鈕 */
        .back-btn {
            width: 30px;
            height: 30px;
            background: white;
            border: 3px solid var(--pixel-dark-blue);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            color: var(--pixel-dark-blue);
            font-size: 16px;
            font-family: Arial, sans-serif;
        }

        /* 白色內容盒 */
        .white-card {
            background-color: white;
            border-radius: 8px;
            padding: 20px 15px;
            text-align: center;
        }

        .quiz-title {
            color: var(--pixel-dark-blue);
            font-size: 14px;
            margin-bottom: 20px;
            display: block;
            font-family: 'Press Start 2P', cursive;
        }

        .input-label {
            display: block;
            text-align: left;
            color: var(--pixel-dark-blue);
            font-size: 10px;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .pixel-input, .pixel-select {
            width: 100%;
            background-color: var(--pixel-light-blue);
            border: 3px solid var(--pixel-dark-blue);
            padding: 10px;
            font-family: 'Press Start 2P', "微軟正黑體", sans-serif;
            font-size: 10px;
            color: var(--pixel-dark-blue);
            box-sizing: border-box;
            margin-bottom: 15px;
            outline: none;
        }

        .mode-row {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }
        .mode-btn {
            flex: 1;
            background-color: var(--pixel-light-blue);
            border: 3px solid var(--pixel-dark-blue);
            padding: 10px 0;
            color: var(--pixel-dark-blue);
            font-family: 'Press Start 2P', cursive;
            font-size: 8px;
            cursor: pointer;
            font-weight: bold;
        }
        .mode-btn.active {
            background-color: var(--pixel-dark-blue);
            color: white;
        }

        .select-container {
            position: relative;
        }
        .select-container::after {
            content: "▼";
            position: absolute;
            right: 10px;
            top: 10px;
            color: var(--pixel-dark-blue);
            pointer-events: none;
            font-size: 10px;
        }

        /* 底部按鈕樣式 */
        .host-btn-large {
            background-color: var(--pixel-light-blue);
            border: 3px solid var(--pixel-dark-blue);
            padding: 15px;
            color: var(--pixel-dark-blue);
            font-family: 'Press Start 2P', cursive;
            font-size: 12px;
            width: 100%;
            cursor: pointer;
            box-shadow: 0 4px 0 #5a82bc;
            font-weight: bold;
        }
        .host-btn-large:active {
            transform: translateY(2px);
            box-shadow: 0 2px 0 #5a82bc;
        }

        /* QR Code 顯示階段的樣式 */
        .qr-placeholder {
            width: 140px;
            height: 140px;
            margin: 10px auto;
            border: 3px solid var(--pixel-dark-blue);
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8px;
            color: #ccc;
        }
        .pin-code-text {
            font-size: 22px;
            color: var(--pixel-dark-blue);
            margin: 10px 0;
            letter-spacing: 2px;
            font-family: 'Press Start 2P', cursive;
        }
        .status-text {
            font-size: 11px; /* 加大狀態文字 */
            color: #666;
            margin-bottom: 5px;
            font-weight: bold;
            font-family: "微軟正黑體", sans-serif;
        }
    </style>
</head>
<body>

<div class="phone">
    <div class="top-nav">
        <span class="logout-link" onclick="logout()">LOGOUT</span>
    </div>

    <div class="tab-area">
        <div class="tab-main">出題者</div>
        <div class="tab-sub">HOST GAME</div>
    </div>

    <div class="blue-panel">
        <div class="back-btn" onclick="goBack()">←</div>
        
        <div id="setup-area">
            <div class="white-card">
                <span class="quiz-title">MISII QUIZ-1</span>

                <label class="input-label">PARTICIPANTS:</label>
                <input type="number" id="players" class="pixel-input" placeholder="0">

                <div class="mode-row">
                    <button class="mode-btn active" id="btn-personal" onclick="selectMode(this, '個人')">PERSONAL</button>
                    <button class="mode-btn" id="btn-team" onclick="selectMode(this, '團隊')">TEAM</button>
                </div>

                <label class="input-label">DIFFICULTY:</label>
                <div class="select-container">
                    <select id="difficulty" class="pixel-select">
                        <option>EASY</option>
                        <option>NORMAL</option>
                        <option>HARD</option>
                    </select>
                </div>
            </div>
            <button class="host-btn-large" style="margin-top: 15px;" onclick="generateGame()">HOST GAME</button>
        </div>

        <div id="qr-display" style="display: none;">
            <div class="white-card">
                <span class="quiz-title">WAITING...</span>
                <div class="qr-placeholder">QR CODE</div>
                <div class="pin-code-text" id="pin-code">000000</div>
                <div class="status-text" id="players-count">目前進入玩家人數: 0</div>
            </div>
            <button class="host-btn-large" style="margin-top: 15px;" onclick="startGame()">開始</button>
        </div>
    </div>
</div>

<script>
    let selectedMode = '個人';
    let currentPlayers = 0;

    function logout() {
        window.location.href = 'index.php';
    }

    function goBack() {
        const setup = document.getElementById('setup-area');
        const qr = document.getElementById('qr-display');
        if (setup.style.display === 'none') {
            setup.style.display = 'block';
            qr.style.display = 'none';
        } else {
            window.history.back();
        }
    }

    function selectMode(btn, mode) {
        document.querySelectorAll('.mode-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        selectedMode = mode;
    }

    function generateGame() {
        const playersInput = document.getElementById('players').value;
        if (!playersInput || playersInput <= 0) {
            alert('請設定參與人數！');
            return;
        }

        document.getElementById('setup-area').style.display = 'none';
        document.getElementById('qr-display').style.display = 'block';

        const pin = Math.floor(100000 + Math.random() * 900000);
        document.getElementById('pin-code').innerText = pin;
    }

    function startGame() {
        window.location.href = 'game_result_host.php';
    }
</script>

</body>
</html>