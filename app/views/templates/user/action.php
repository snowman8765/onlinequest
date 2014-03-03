<?php include_once("navigation.php");?>

<div class="panel panel-default">
  <ul class="nav nav-tabs">
    <li><a href="index.php">ホーム</a></li>
    <li><a href="profile">ステータス</a></li>
    <li class="active"><a href="action">行動</a></li>
    <li><a href="training">復習</a></li>
    <li><a href="gallery">画廊</a></li>
    <li><a href="speedrun">やりこみ情報</a></li>
  </ul>
  <br />
  <div class="panel panel-info">
    <div class="panel-heading">
      行動一覧
    </div>
    <div class="panel-body">
      <ul class="list-group">
        <a href="#" class="list-group-item" id="go">冒険に出る</a>
        <ul class="list-group" id="slideBox">
          <a href="../map/stage/1/first" class="list-group-item">1</a>
          <a href="../map/stage/2/first" class="list-group-item">2</a>
        </ul>
        <a href="" class="list-group-item">アイテムを使う</a>
        <a href="" class="list-group-item">パーティを探す</a>
        <a href="" class="list-group-item">ペットの育成をする</a>
      </ul>
    </div>
  </div>
</div>
