<div class="panel panel-default">
  <div class="panel-heading"><?php echo $map['title'];?></div>
  <div class="panel-body">
<?php include_once("_map_info.php");?>
    <div>
      <div class="well">
        <?php echo $map['message'];?>
      </div>
      <br />
      <div class="panel panel-info">
        <div class="panel-heading">
          コマンド
        </div>
        <div class="panel-body">
          <ul class="list-group">
<?php if($map['is_battle']){ ?>
            <a href="attack" class="list-group-item">たたかう</a>
            <a href="escape" class="list-group-item">にげる</a>
<?php } else { ?>
            <a href="next" class="list-group-item">すすむ</a>
  <?php if($map['count'] > 0) { ?>
            <a href="prev" class="list-group-item">もどる</a>
  <?php } else { ?>
            <a href="../../../user/" class="list-group-item">ホームに戻る</a>
  <?php } ?>
<?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
