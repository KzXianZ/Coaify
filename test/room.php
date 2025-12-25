<!-- room.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>遊戲角色選擇</title>

<style>
  *{ image-rendering: pixelated; image-rendering: crisp-edges; }
  body { font-family: Arial; margin: 0; background:#fff; }

  /* ✅ 你原本的 .phone 容器保留概念，但改成固定 360x720（跟你其他頁一致） */
  .phone{
    width:360px;
    height:720px;
    margin: 20px auto;
    border: 1px solid #333;
    position: relative;
    overflow: hidden;

    /* ✅ 套你給的背景圖 */
    background: url("room_background.png") no-repeat;
    background-size: 100% 100%; /* 把原圖縮到 360x720，不放大頁面 */
  }

  /* ✅ 右上角登出 */
  .logout{
    position:absolute;
    top: 12px;
    right: 14px;
    font-family: monospace;
    font-weight: 800;
    letter-spacing: 1px;
    font-size: 14px;
    color:#2a4ea0;
    text-decoration: underline;
    cursor:pointer;
  }

  /* ✅ 表單區：釘在背景的白框內（如果位置差一點，只調 top/left/width） */
  .formArea{
    position:absolute;
    left: 50%;
    top: 220px;                /* ⭐上下微調這個 */
    transform: translateX(-50%);
    width: 260px;              /* ⭐寬度微調這個 */
  }

  .label{
    display:block;
    font-family: monospace;
    font-weight: 900;
    letter-spacing: 2px;
    color:#2a4ea0;
    font-size: 14px;
    margin: 0 0 6px 0;
  }

  input[type=text]{
    width:100%;
    height: 34px;
    padding: 6px 8px;
    font-size: 14px;
    border: 2px solid #2a4ea0;
    background:#dff6ff;
    box-sizing: border-box;
    display:block;
    outline:none;
    margin-bottom: 26px;
  }

  /* ✅ 下拉選單做成像你圖上的樣子（右側箭頭框） */
  .selectWrap{
    position: relative;
    width:100%;
    margin-bottom: 28px;
  }

  select{
    width:100%;
    height: 34px;
    padding: 6px 40px 6px 8px;
    font-size: 14px;
    border: 2px solid #2a4ea0;
    background:#dff6ff;
    box-sizing: border-box;
    outline:none;

    /* 隱藏原生箭頭（不同瀏覽器略有差異，但大多可用） */
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
  }

  /* 右側箭頭框 */
  .selectWrap::before{
    content:"";
    position:absolute;
    top: 0;
    right: 0;
    width: 34px;
    height: 34px;
    border-left: 2px solid #2a4ea0;
    background:#dff6ff;
    box-sizing: border-box;
    pointer-events:none;
  }

  /* 右側三角形 */
  .selectWrap::after{
    content:"";
    position:absolute;
    right: 12px;
    top: 14px;
    width: 0;
    height: 0;
    border-left: 7px solid transparent;
    border-right: 7px solid transparent;
    border-top: 9px solid #2a4ea0;
    pointer-events:none;
  }

  /* ✅ ENTER 按鈕：用你給的底圖 + 疊字 */
  .enterBtn{
    width: 200px;          /* 依你的 room_enter.png 寬 */
    height: 40px;          /* 依你的 room_enter.png 高 */
    border:0;
    padding:0;
    cursor:pointer;
    background: url("room_enter.png") center/contain no-repeat;
    display:block;
    margin: 0 auto;
    position: relative;
  }

  .enterBtn span{
    position:absolute;
    inset:0;
    display:flex;
    align-items:center;
    justify-content:center;
    font-family: monospace;
    font-weight: 900;
    letter-spacing: 6px;
    font-size: 18px;
    color:#2a4ea0;
    pointer-events:none;
  }

  .enterBtn:active{ transform: translateY(1px); }

  /* 讓你原本「等待開始」文字顯示在按鈕下方 */
  .hint{
    margin-top: 5px;
    text-align:center;
    font-family: monospace;
    font-size: 12px;
    color:#2a4ea0;
    min-height: 14px;
  }
</style>

<script>
/* ✅ 你原本用 avatars+左右切換，現在改成下拉選單，所以不需要 prev/next 了 */
function startGame(){
    const nickname = document.getElementById('nickname').value.trim();
    const skin = document.getElementById('skin').value;

    if(nickname === ''){
        alert('請輸入暱稱');
        return;
    }

    // 你如果之後要在 game.php 用到，可先存到 localStorage
    localStorage.setItem('nickname', nickname);
    localStorage.setItem('skin', skin);

    const btn = document.getElementById('start-btn');
    btn.disabled = true;
    document.getElementById('hint').innerText = '等待遊戲開始...';

    setTimeout(() => {
        window.location.href = 'game.php';
    }, 3000);
}
</script>
</head>

<body>
<div class="phone">

  <!-- ✅ 右上角登出（你如果檔名不是 logout.php，自行改連結） -->
  <a class="logout" href="index.php">LOGOUT</a>


  <div class="formArea">
    <label class="label">NICKNAME:</label>
    <input type="text" id="nickname" placeholder="輸入暱稱">

    <label class="label">SKIN:</label>
    <div class="selectWrap">
      <select id="skin">
        <option value="耀西">耀西</option>
        <option value="瑪利歐">瑪利歐</option>
        <option value="奇諾比奧">奇諾比奧</option>
        <option value="碧姬公主">碧姬公主</option>
        <option value="庫巴">庫巴</option>
        <option value="路易吉">路易吉</option>
      </select>
    </div>

    <button class="enterBtn" id="start-btn" onclick="startGame()">
      <span>ENTER</span>
    </button>

    <div class="hint" id="hint"></div>
  </div>

</div>
</body>
</html>
