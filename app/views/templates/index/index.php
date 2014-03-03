<div class="jumbotron">
  <h1>おかちゃんを倒せ！（仮）</h1>
  <p>当会の代表、おかちゃんを倒し、知恵と勇気を身につけ、勇者として社会にデビューしよう。</p>
</div>

<div class="row">
  <div class="col-xs-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        ログイン
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-xs-8">
            <form role="form" action="user/login/" method="post">
              <div class="form-group">
                <label for="inputID">ID</label>
                <input type="text" class="form-control" id="inputID" name="id" placeholder="ログインID">
              </div>
              <div class="form-group">
                <label for="inputPassword">パスワード</label>
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="パスワード">
              </div>
              <button type="submit" class="btn btn-default">ログイン</button>
            </form>
          </div>
          <div class="col-xs-4">
            <div class="btn-group-vertical">
              <a href="user/login/?provider=Twitter" class="btn btn-info" role="button"><i class="fa fa-twitter"></i> Twitter</a>
              <a href="user/login/?provider=Twitter" class="btn btn-info" role="button"><i class="fa fa-twitter"></i> Twitter</a>
              <a href="user/login/?provider=Twitter" class="btn btn-info" role="button"><i class="fa fa-twitter"></i> Twitter</a>
              <a href="user/login/?provider=Twitter" class="btn btn-info" role="button"><i class="fa fa-twitter"></i> Twitter</a>
              <a href="user/login/?provider=Twitter" class="btn btn-info" role="button"><i class="fa fa-twitter"></i> Twitter</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xs-6">
    <div class="panel panel-info">
      <div class="panel-heading">
        ユーザ登録
      </div>
      <div class="panel-body">
        <form role="form" action="user/add/" method="post">
          <div class="form-group">
            <label for="inputNewID">ID</label>
            <input type="text" class="form-control" id="inputNewID" name="id" placeholder="ログインID">
          </div>
          <div class="form-group">
            <label for="inputNewPassword">パスワード</label>
            <input type="password" class="form-control" id="inputNewPassword" name="password" placeholder="パスワード">
          </div>
          <button type="submit" class="btn btn-default">登録</button>
        </form>
      </div>
    </div>
  </div>
</div>