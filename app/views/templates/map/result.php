<div class="panel panel-default">
  <div class="panel-heading"><?php echo $map['title'];?></div>
  <div class="panel-body">
    <div class="thumbnail">
      <img src="/onlinequest/htdocs/data/map/stage/<?php echo $map['back_img'];?>" style="width:400px;">
      <br />
<?php if($map['is_battle']){ ?>
      <div class="well thumbnail">
        <img src="/onlinequest/htdocs/data/map/enemy/<?php echo $map['enemy'];?>" style="width:200px;">
      </div>
<?php } ?>
      <br />
      <div class="well">
        <?php echo $map['message'];?>
      </div>
      <br />
      <ul class="list-group">
        <a href="../user/" class="list-group-item">ホームに戻る</a>
      </ul>
    </div>
  </div>
</div>
