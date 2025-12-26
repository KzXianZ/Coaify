<!-- records_player.php --> 
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
.tabs, .tab-left, .tab-right{
  visibility: hidden; 
}

  *{ image-rendering: pixelated; image-rendering: crisp-edges; }
  body { font-family: Arial; margin: 0; background:#fff; }

  .phone{
    width:360px;
    height:720px;
    margin:20px auto;
    border:1px solid #333;
    position:relative;
    overflow:hidden;
    box-sizing:border-box;

    background: url("records_player_background.png") no-repeat;
    background-size: 100% 100%;
  }

  .logout-link{
    position:absolute;
    top:12px;
    right:14px;
    font-family: monospace;
    font-weight:900;
    letter-spacing:1px;
    font-size:14px;
    color:#2a4ea0;
    text-decoration: underline;
    cursor:pointer;
  }

  .panel{
    position:absolute;
    left:50%;
    top:70px;
    transform:translateX(-50%);
    width:300px;
    height:520px;
    box-sizing:border-box;
    padding:16px;
  }

  .searchWrap{
    width: 150px;
    height: 30px;
    margin: 0px 0 10px auto; 
    background:#fff;
    border:0;                
    box-sizing:border-box;
    display:flex;
    align-items:center;
    padding: 0 10px;
  }
  .search-input{
    width:100%;
    border:0;
    outline:0;
    font-family: monospace;
    font-weight:900;
    letter-spacing:3px;
    font-size:12px;
    color:#2a4ea0;
  }

  .list{
    display:flex;
    flex-direction:column;
    gap: 45px;
  }

  .record-btn{
    width:100%;
    height:45px;
    background:#fff;
    border:0;
    cursor:pointer;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding: 10px 12px;
    box-sizing:border-box;
    text-align:left;
  }

  .recordText{
    display:flex;
    flex-direction:column;
    gap: 6px;
    max-width: 220px;
  }

  .titleLine{
    font-family: monospace;
    font-weight:900;
    letter-spacing:2px;
    font-size:16px;
    color:#2a4ea0;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
  }

  .scoreRed{ color:#ff4a4a; }

  .subLine{
    font-family: monospace;
    font-weight:900;
    letter-spacing:1px;
    font-size:11px;
    color:#2a4ea0;
    opacity:0.95;
  }

  .arrowBtn{
    width: 34px;
    height: 34px;
    border:0;
    padding:0;
    background: url("records_player_arrow.png") center/contain no-repeat;
    cursor:pointer;
    flex: 0 0 auto;
  }
  .arrowBtn:active{ transform: translateY(1px); }

  .back-btn{
    position:absolute;
    left:48px;
    bottom:163px;
    width:40px;
    height:40px;
    border-radius:50%;
    border:4px solid #2a4ea0;
    background:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
  }
  .back-btn span{
    font-family: monospace;
    font-weight:900;
    font-size:24px;
    color:#2a4ea0;
  }
</style>

<script>
function goBack(){ window.location.href='player.php'; }

function logout(){ window.location.href='home.php'; }

function filterRecords(){
  const search = document.getElementById('search').value.toLowerCase();
  document.querySelectorAll('.record-btn').forEach(btn => {
    if(btn.innerText.toLowerCase().includes(search)){
      btn.style.display='flex';
    } else {
      btn.style.display='none';
    }
  });
}

function goToRecordByIndex(index){
  window.location.href = 'records_player_test' + index + '.php';
}
</script>

</head>
<body>
<div class="phone">

  <div class="logout-link" onclick="logout()">LOGOUT</div>

  <div class="panel">
    <div class="tabs">
      <div class="tab-left">答題者</div>
      <div class="tab-right">RECORDS</div>
    </div>

    <div class="searchWrap">
      <input type="text" id="search" class="search-input" placeholder="SEARCH" onkeyup="filterRecords()">
    </div>

    <div class="list">
      <div class="record-btn">
        <div class="recordText">
          <div class="titleLine">SAD QUIZ-1 (72/100)</div>
          <div class="subLine">2025.11.15 (1.25HR)</div>
        </div>
        <button class="arrowBtn" onclick="goToRecordByIndex(1)" aria-label="open record 1"></button>
      </div>

      <div class="record-btn">
        <div class="recordText">
          <div class="titleLine">JAVA QUIZ-1 (91/100)</div>
          <div class="subLine">2025.11.16 (2HR)</div>
        </div>
        <button class="arrowBtn" onclick="goToRecordByIndex(2)" aria-label="open record 2"></button>
      </div>

      <div class="record-btn">
        <div class="recordText">
          <div class="titleLine">SAD QUIZ-2 (89/100)</div>
          <div class="subLine">2025.11.20 (1.5HR)</div>
        </div>
        <button class="arrowBtn" onclick="goToRecordByIndex(3)" aria-label="open record 3"></button>
      </div>

      <div class="record-btn">
        <div class="recordText">
          <div class="titleLine">MIS QUIZ-1 <span class="scoreRed">(58/100)</span></div>
          <div class="subLine">2025.11.28 (1.2HR)</div>
        </div>
        <button class="arrowBtn" onclick="goToRecordByIndex(4)" aria-label="open record 4"></button>
      </div>
    </div>
  </div>

  <button class="back-btn" onclick="goBack()"><span>←</span></button>
</div>
</body>
</html>
