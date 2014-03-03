<div class="row" style="">
  <div class="col-xs-4">
    <div class="panel panel-info">
      <div class="panel-heading">
        ステータス
      </div>
      <div class="panel-body">
        <table class="table table-bordered">
          <tr>
            <th class="info">名前</th><td><?php echo $chara['name'];?></td>
          </tr>
          <tr>
            <th class="info">Lv</th><td><?php echo $chara['level'];?></td>
          </tr>
          <tr>
            <th class="info">HP</th><td><?php echo $chara['hp'];?></td>
          </tr>
          <tr>
            <th class="info">スタミナ</th><td><?php echo $chara['stamina'];?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="col-xs-4">
    <img src="/onlinequest/htdocs/data/map/stage/<?php echo $map['back_img'];?>" style="max-width:400px;max-height:300px;width:100%;height:100%;" />
<?php if($map['is_battle'] && isset($map['enemy_img'])){ ?>
    <img src="/onlinequest/htdocs/data/enemy/<?php echo $map['enemy_img'];?>" style="max-width:400px;max-height:300px;width:100%;height:100%;position:absolute;z-index:2;top:0px;left:0px;" />
<?php } else if(!$map['is_battle'] && isset($map['item_img'])){ ?>
    <img src="/onlinequest/htdocs/data/item/<?php echo $map['item_img'];?>" style="max-width:400px;max-height:300px;width:100%;height:100%;position:absolute;z-index:2;top:0px;left:0px;" />
<?php } else { ?>
    <img src="/onlinequest/htdocs/data/none.png" style="max-width:400px;max-height:300px;width:100%;height:100%;position:absolute;z-index:2;top:0px;left:0px;" />
<?php } ?>
  </div>
  <div class="col-xs-4">
    <img src="/onlinequest/htdocs/data/player/<?php echo $chara['img'];?>" style="max-width:400px;max-height:300px;width:100%;height:100%;" />
  </div>
</div>