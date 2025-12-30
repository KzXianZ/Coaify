<?php
// =============================
// File: style.css (inline styling)
// =============================
?>
<style>
body {
display: flex;
justify-content: center;
align-items: center;
height: 100vh;
background: #e6e6e6;
margin: 0;
font-family: Arial, sans-serif;
}


/* 手機外框 */
.phone-frame {
width: 360px; /* 1:2 比例 */
height: 720px;
background: #111;
border-radius: 40px;
padding: 12px;
box-shadow: 0 0 30px rgba(0,0,0,0.4);
display: flex;
justify-content: center;
align-items: center;
}


/* 手機螢幕 */
.phone-screen {
width: 100%;
height: 100%;
background: #ffffff;
border-radius: 30px;
padding: 20px;
overflow-y: auto;
box-sizing: border-box;
text-align: center;
}


h1 {
margin-top: 0;
}


button {
width: 80%;
padding: 14px;
margin: 12px 0;
border: none;
background: #3498db;
color: white;
font-size: 18px;
border-radius: 12px;
cursor: pointer;
transition: 0.2s;
}


button:hover {
background: #2980b9;
}


input {
width: 80%;
padding: 12px;
margin: 12px 0;
font-size: 16px;
border-radius: 10px;
border: 1px solid #ccc;
}


.back-btn {
background: #666;
}
.back-btn:hover {
background: #555;
}
</style>