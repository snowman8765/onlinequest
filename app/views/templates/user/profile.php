<?php include_once("navigation.php");?>

<div class="panel panel-default">
  <ul class="nav nav-tabs">
    <li><a href="index.php">ホーム</a></li>
    <li class="active"><a href="profile">ステータス</a></li>
    <li><a href="action">行動</a></li>
    <li><a href="training">復習</a></li>
    <li><a href="gallery">画廊</a></li>
    <li><a href="speedrun">やりこみ情報</a></li>
  </ul>
  <br />
  <div class="row">
    <div class="col-xs-8">
      <table class="table table-bordered">
        <thead>
          <tr><th>ステータス名</th><th>値</th></tr>
        </thead>
        <tbody>
          <tr><th>レベル</th><td><?php echo $chara['level'];?></td></tr>
          <tr><th>名前</th><td><?php echo $chara['name'];?></td></tr>
          <tr><th>HP/最大HP</th><td><?php echo $chara['hp'];?>/<?php echo $chara['max_hp'];?></td></tr>
          <tr><th>スタミナ/最大スタミナ</th><td><?php echo $chara['stamina'];?>/<?php echo $chara['max_stamina'];?></td></tr>
          <tr><th>攻撃力</th><td><?php echo $chara['atk'];?></td></tr>
          <tr><th>防御力</th><td><?php echo $chara['def'];?></td></tr>
          <tr><th>得意</th><td><?php echo $chara['good'];?></td></tr>
          <tr><th>苦手</th><td><?php echo $chara['bad'];?></td></tr>
          <tr><th>お金</th><td><?php echo $chara['gold'];?></td></tr>
        </tbody>
      </table>
    </div>
    <div class="col-xs-4">
      <div class="thumbnail">
        <img src="../data/player/<?php echo $chara['img'];?>" />
      </div>
    </div>
  </div>
</div>
