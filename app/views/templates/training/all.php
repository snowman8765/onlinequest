<style>
.serif1, .serif2 {
  background-color:#eee;
  border-radius:5px;
  position:relative;
  height: 120px;
  padding: 5px;
  margin: 5px;
}
 
.serif1:after {
  border:10px solid transparent;
  border-right-color:#eee;
  border-left-width:0;
  left:-10px;
  content:"";
  display:block;
  top:30px;
  position:absolute;
  width:0;
}

.serif2:after {
border:10px solid transparent;
border-left-color:#eee;
border-right-width:0;
right:-10px;
content:"";
display:block;
top:30px;
position:absolute;
width:0;
}
</style>

<div class="panel panel-default">
  <div class="panel-heading">復習</div>
  <div class="panel-body">
    <div class="row" style="background-image:url('/onlinequest/htdocs/data/training.png');background-repeat:no-repeat;background-position:center center;width:100%;height:100%;">
      <div class="col-xs-4">
        <img src="/onlinequest/htdocs/data/support/1.png" style="max-width:400px;max-height:300px;width:100%;height:100%;" />
      </div>
      <div class="col-xs-8">
        <div class="serif1"><p>問題文をここに表示する</p></div>
      </div>
    </div>
    <div class="row" style="background-image:url('/onlinequest/htdocs/data/training.png');background-repeat:no-repeat;background-position:center center;width:100%;height:100%;">
      <div class="col-xs-8">
        <div class="serif2"><p>解答をここに表示する</p></div>
      </div>
      <div class="col-xs-4">
        <img src="/onlinequest/htdocs/data/player/<?php echo $chara['img'];?>" style="max-width:400px;max-height:300px;width:100%;height:100%;" />
      </div>
    </div>
  </div>
</div>
