<!-- records_player_test1.php --> 
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>紀錄 - SAD QUIZ-1</title>

<style>
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

    background: url("SAD_QUIZ.png") no-repeat;
    background-size: 100% 100%;
  }

  .logout-link{
    position:absolute;
    top:12px;
    right:18px;
    font-family: monospace;
    font-weight:900;
    letter-spacing:1px;
    font-size:14px;
    color:#2a4ea0;
    text-decoration: underline;
    cursor:pointer;
    background: transparent;
    border:0;
    padding:0;
  }

  .back-hotspot{
    position:absolute;
    left:28px;
    top:120px;
    width:52px;
    height:52px;
    border-radius:50%;
    border:0;
    background:transparent;
    cursor:pointer;
  }

  .btn-img{
    border:0;
    background: transparent center/100% 100% no-repeat;
    cursor:pointer;
    padding:0;
    display:block;
  }
  .btn-img:active{ transform: translateY(1px); }

  .btn-home{
    position:absolute;
    width:100px;
    height:30px;
    right:45px;
    top:420px;
    background-image:url("home_button.png");
  }

  .btn-download{
    position:absolute;
    width:100px;
    height:30px;
    right:45px;
    top:475px;
    background-image:url("download.png");
  }

  .btn-check{
    position:absolute;
    width:280px;
    height:44px;
    left:50%;
    transform:translateX(-50%);
    top:535px;
    background-image:url("check_answer.png");
  }

    .modal-overlay{
    position:absolute;
    inset:0;
    background: rgba(0,0,0,0); 
    display:none;
    z-index: 50;
  }

  .modal-box{
    position:absolute;
    left:50%;
    top:50%;
    transform: translate(-50%, -50%);
    width: 320px;    
    height: 150px;
    background: url("download_complete.png") center/contain no-repeat;
  }

  .modal-close{
    position:absolute;
    right: 8px;
    top: 8px;
    width: 28px;
    height: 28px;
    border:0;
    background:transparent;
    cursor:pointer;
  }

  .modal-back{
    position:absolute;
    left:50%;
    bottom: 18px;
    transform: translateX(-50%);
    width: 140px;
    height: 40px;
    border:0;
    background:transparent;
    cursor:pointer;
  }
</style>

<script>
  function goBack(){
    window.location.href = "records_player.php";
  }

  function logout(){ window.location.href='login.php?action=logout'; }

  function goHome(){
    window.location.href = "home.php";
  }

  function downloadMistakes(){
    openDownloadModal();
    // 如果你之後要真的下載檔案，可以在這裡加：
    // window.location.href = "download_mistakes.php?id=1";
  }

  function checkYourAnswer(){
    window.location.href = "records_player_test1_answer.php";
  }

    function openDownloadModal(){
    document.getElementById("downloadModal").style.display = "block";
  }
  function closeDownloadModal(){
    document.getElementById("downloadModal").style.display = "none";
  }
</script>

</head>
<body>
  <div class="phone">

    <button class="logout-link" onclick="logout()">LOGOUT</button>

    <button class="back-hotspot" onclick="goBack()" aria-label="back"></button>

    <button class="btn-img btn-home" onclick="goHome()" aria-label="home"></button>

    <button class="btn-img btn-download" onclick="downloadMistakes()" aria-label="download"></button>

    <button class="btn-img btn-check" onclick="checkYourAnswer()" aria-label="check answer"></button>

    <div class="modal-overlay" id="downloadModal">
        <div class="modal-box">
         <button class="modal-close" onclick="closeDownloadModal()" aria-label="close"></button>
         <button class="modal-back" onclick="closeDownloadModal()" aria-label="back"></button>

  </div>
</body>
</html>
