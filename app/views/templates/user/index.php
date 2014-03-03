<?php include_once("navigation.php");?>

<div class="panel panel-default">
  <ul class="nav nav-tabs">
    <li class="active"><a href="index.php">ホーム</a></li>
    <li><a href="profile">ステータス</a></li>
    <li><a href="action">行動</a></li>
    <li><a href="training">復習</a></li>
    <li><a href="gallery">画廊</a></li>
    <li><a href="speedrun">やりこみ情報</a></li>
  </ul>
  <br />
  <div class="panel panel-info">
    <div class="panel-heading">
      ホーム
    </div>
    <div class="panel-body">
      <table class="table table-bordered">
        <tr>
          <th class='info'>ログイン時刻</th><td><?php echo date('Y年m月d日 H時i分s秒',$user['login_time']);?></td>
        </tr>
        <tr>
          <th class='info'>プレイ時間</th><td><?php echo gmdate('H時間i分s秒',$user['play_time']);?></td>
        </tr>
      </table>
    </div>
  </div>
</div>
