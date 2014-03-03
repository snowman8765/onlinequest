<?php include_once("navigation.php");?>

<div class="panel panel-default">
  <ul class="nav nav-tabs">
    <li><a href="index.php">ホーム</a></li>
    <li><a href="profile">ステータス</a></li>
    <li><a href="action">行動</a></li>
    <li><a href="training">復習</a></li>
    <li class="active"><a href="gallery">画廊</a></li>
    <li><a href="speedrun">やりこみ情報</a></li>
  </ul>
  
  <br />
  
  <div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">&lt;</a>
    <a class="next">&gt;</a>
    <a class="close">X</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" aria-hidden="true">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body next"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left prev">
              <i class="glyphicon glyphicon-chevron-left"></i>
              Previous
            </button>
            <button type="button" class="btn btn-primary next">
              Next
              <i class="glyphicon glyphicon-chevron-right"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div id="links">
<?php
foreach($files as $f) {
  if(preg_match("/(jpg|png|gif)/", $f)) {
    echo "<a href='$f' data-gallery><img src='$f' class='img-thumbnail' style='width:100px;' /></a>";
  }
}
?>
  </div>
</div>
