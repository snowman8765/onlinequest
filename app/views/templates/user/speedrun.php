<?php include_once("navigation.php");?>

<div class="panel panel-default">
  <ul class="nav nav-tabs">
    <li><a href="index.php">ホーム</a></li>
    <li><a href="profile">ステータス</a></li>
    <li><a href="action">行動</a></li>
    <li><a href="training">復習</a></li>
    <li><a href="gallery">画廊</a></li>
    <li class="active"><a href="speedrun">やりこみ情報</a></li>
  </ul>
  <br />
  <div class="panel panel-info">
    <div class="panel-heading">
      やりこみ情報
    </div>
    <div class="panel-body">
      <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p>この情報は、保存した時に更新されます。</p>
      </div>
      <table class="table table-bordered">
<?php
foreach($speedrun as $key=>$value) {
  switch($key) {
    case 'id': $k = 'ID'; $v=$value;break;
    case 'max_level': $k = '最大レベル';$v=$value; break;
    case 'total_damage': $k = '累計ダメージ'; $v=$value;break;
    case 'total_gold': $k = '累計お金'; $v=$value;break;
    case 'max_play_time': $k = '最大プレイ時間'; $v = gmdate('H時間i分s秒', $value);break;
    case 'total_time': $k = '総合プレイ時間'; $v=gmdate('H時間i分s秒', $value);break;
    case 'login_count': $k = 'ログイン回数'; $v=$value;break;
    case 'message_count': $k = 'メッセージ回数'; $v=$value;break;
    case 'action_count': $k = '行動回数'; $v=$value;break;
    case 'item_count': $k = 'アイテム取得数'; $v=$value;break;
    case 'create_time': $k = '登録日'; $v = date('Y年m月d日 H時i分s秒',strtotime($value));break;
    case 'update_time': $k = '更新日'; $v = date('Y年m月d日 H時i分s秒',strtotime($value));break;
    default: $k=$key; $v=$value;break;
  }
  echo "<tr><th class='info'>$k</th><td>$v</td></tr>";
}
?>
      </table>
    </div>
  </div>
</div>
