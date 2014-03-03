<!DOCTYPE html>
<html lang="ja">
  <head>
  </head>
  <body>
    <div data-role="page" id="index">
      <div data-role="header">
      </div>
      
      <div data-role="content" class="content">
        <div data-role="collapsible-set">
          <div data-role="collapsible" data-collapsed="true">
            <h3>ログイン</h3>
            <form action="login.php" method="post">
              <div data-role="fieldcontain">
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" style="ime-mode:disabled;" />
              </div>
              <div data-role="fieldcontain">
                <label for="password">パスワード:</label>
                <input type="password" id="password" name="password" value="" />
              </div>
              <input type="submit" name="submit" value="上記でログイン" />
            </form>
          </div>
          <div data-role="collapsible" data-collapsed="true">
            <h3>ゲストで試す</h3>
            <form action="login.php" method="post">
              <input type="hidden" id="id" name="id" value="guest" />
              <input type="hidden" id="password" name="password" value="guest" />
              <input type="submit" name="submit" value="ゲストでログイン" />
            </form>
          </div>
          <div data-role="collapsible">
            <h3>新規登録</h3>
            <form action="add_user.php" method="post">
              <div data-role="fieldcontain">
                <label for="new_id">ID:</label>
                <input type="text" id="new_id" name="id" style="ime-mode:disabled;" required />
              </div>
              <div data-role="fieldcontain">
                <label for="new_name">ユーザ名:</label>
                <input type="text" id="new_name" name="name" required />
              </div>
              <div data-role="fieldcontain">
                <label for="new_password">パスワード:</label>
                <input type="password" id="new_password" name="password" required />
              </div>
              <input type="submit" name="submit" value="新規登録" />
            </form>
          </div>
          <div data-role="collapsible">
            <h3>お知らせ</h3>
            <p>2013年12月11日：ver.0.9.8.5：ランキングに、気になる人の過去10回分の点数がグラフ表示されるように機能を追加</p>
            <p>2013年12月03日：ver.0.9.8.4：今日の順位を追加</p>
            <p>2013年11月25日：ver.0.9.8.3：問題作成時の不具合を修正</p>
            <p>2013年11月11日：ver.0.9.8.2：問題開始のページを修正修正</p>
            <p>2013年08月13日：ver.0.9.8.1：ヘッダー修正</p>
            <p>2013年05月07日：ver.0.9.8：大問を検索する機能を追加</p>
            <p>2013年05月07日：ver.0.9.7：ライブラリを最新のものに更新</p>
            <p>2013年05月07日：ver.0.9.6：タグクラウド機能(仮)を追加</p>
            <p>2013年01月31日：ver.0.9.5：N択問題と一問多答問題の解答をランダム表示ができるように修正</p>
            <p>2013年01月23日：ver.0.9.4：解答後に、答えと解説を表示するように修正</p>
            <p>2012年10月21日：ver.0.9.3：問題に解説文を追加できるように修正</p>
            <p>2012年10月21日：ver.0.9.2：ランキング機能の実装</p>
            <p>2012年10月20日：ver.0.9.1：好きな問題へのブックマーク(リンク作成)が可能</p>
            <p>2012年10月20日：ver.0.9：問題の解答形式を追加(OX,2～6択,順番当て,タイピング,一問多答)</p>
            <p>2012年10月03日：ver.0.8.3：問題の削除を追加、その他いろいろ修正</p>
            <p>2012年10月01日：ver.0.8.2：マニュアル追加、ベータ版として一般公開</p>
            <p>2012年09月29日：ver.0.8.1：結果画面の修正、問題作成の修正</p>
            <p>2012年09月27日：ver.0.8：問題作成機能追加、結果画面の作成、など</p>
            <p>2012年09月12日：ver.0.1：オンライン勉強会の開発開始</p>
          </div>
          <div data-role="collapsible">
            <h3>問題の募集</h3>
            <p>このシステムを利用して、問題を作成してくれる方を募集してます。</p>
            <p>問題を作るためには、先生の権限が必要であるので、新規登録後にご連絡ください。<a href="mailto:snowman8765@gmail.com">snowman8765@gmail.com</a></p>
            <p>また、問題を作成するための手順の詳細はマニュアルにありますので、御覧ください。</p>
            <p>作成できる問題の解答形式は以下のとおりです。
            <ul>
              <li>OX</li>
              <li>2～6択</li>
              <li>順番当て</li>
              <li>タイピング</li>
              <li>一問多答</li>
            </ul></p>
          </div>
          <div data-role="collapsible">
            <h3>作ったのは</h3>
            <p>プログラム：snowman8765(<a href="http://snowman8765.sakura.ne.jp/" target="_blank">だって好きだし</a>,<a href="mailto:snowman8765@gmail.com">snowman8765@gmail.com</a>)</p>
            <p>イラスト：<a href="http://www.pixiv.net/member.php?id=598307" target="_blank">灰時</a>様</p>
          </div>
          <div data-role="collapsible">
            <h3>連絡する</h3>
            <p><a href="mailto:snowman8765@gmail.com">snowman8765@gmail.com</a></p>
            <p><a href="http://snowman8765.sakura.ne.jp/pforum/pforum.php" target="_blank">だって好きだしの掲示板</a></p>
          </div>
          <div data-role="collapsible">
            <h3>マニュアル</h3>
            <p><a href="http://www57.atwiki.jp/onkai/" target="_blank">wikiをみる</a></p>
            <p><a href="onkai_manual.pdf" target="_blank">PDFのダウンロード</a></p>
          </div>
        </div>
      </div>
      
      <div data-role="footer">
      </div>
    </div>
  </body>
</html>
