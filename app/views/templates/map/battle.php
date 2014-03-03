<div class="panel panel-default">
  <div class="panel-heading"><?php echo $map['title'];?></div>
  <div class="panel-body">
<?php include_once("_map_info.php");?>
    <div>
      <div class="well">
        <?php echo $map['message'];?>
      </div>
<?php if($map['escape']) { // 戦う?>
      <div class="panel panel-info">
        <div class="panel-heading">
          コマンド
        </div>
        <div class="panel-body">
          <ul class="list-group">
            <a href="../../../map/stage/<?php echo $map['id'];?>/prev" class="list-group-item">もどる</a>
          </ul>
        </div>
      </div>
<?php } else if($map['is_win']) { // 戦う?>
      <div class="panel panel-info">
        <div class="panel-heading">
          コマンド
        </div>
        <div class="panel-body">
          <ul class="list-group">
            <a href="../../../map/stage/<?php echo $map['id'];?>/next" class="list-group-item">すすむ</a>
          </ul>
        </div>
      </div>
<?php } else { // 戦う?>
      <div class="panel panel-warning">
        <div class="panel-heading">
          問題
        </div>
        <div class="panel-body">
          <?php echo $question['text'];?>
        </div>
        <div class="panel-footer">
<?php
  if($question['ans_type']=='ox') {
    echo <<<HTML
          <ul class="list-group">
            <a href="o" class="list-group-item">O</a>
            <a href="x" class="list-group-item">X</a>
          </ul>
HTML;
  } else if(2<=$question['ans_type'] && $question['ans_type']<=6) {
    echo '<ul class="list-group">';
    for($i=1; $i<=$question['ans_type']+1; $i++) {
      echo '<a href="'.$i.'" class="list-group-item">'.$question['ans'.$i].'</a>';
    }
    echo '</ul>';
  }
?>
        </div>
      </div>
      <br />
      <div class="panel panel-info">
        <div class="panel-heading">
          コマンド
        </div>
        <div class="panel-body">
          <ul class="list-group">
            <a href="special" class="list-group-item">必殺技</a>
            <a href="escape" class="list-group-item">逃げる</a>
          </ul>
        </div>
      </div>
<?php } ?>
    </div>
  </div>
</div>
