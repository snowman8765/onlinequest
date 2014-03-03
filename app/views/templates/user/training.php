<?php include_once("navigation.php");?>

<div class="panel panel-default">
  <ul class="nav nav-tabs">
    <li><a href="index.php">ホーム</a></li>
    <li><a href="profile">ステータス</a></li>
    <li><a href="action">行動</a></li>
    <li class="active"><a href="training">復習</a></li>
    <li><a href="gallery">画廊</a></li>
    <li><a href="speedrun">やりこみ情報</a></li>
  </ul>
  <br />
  <div class="panel panel-info">
    <div class="panel-heading">
      モード選択
    </div>
    <div class="panel-body">
      <ul class="list-group">
        <a href="/onlinequest/htdocs/training/all" class="list-group-item">とことん</a>
        <a href="/onlinequest/htdocs/training/genre" class="list-group-item">ジャンル別</a>
        <a href="/onlinequest/htdocs/training/history" class="list-group-item">最近の5問</a>
      </ul>
    </div>
  </div>
</div>
