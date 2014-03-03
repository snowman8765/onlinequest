<?php
class UserController extends Controller
{
  public function index()
  {
    $session = new Session('auth');
    if(!$session->exists('user')) {
      $this->redirect("../../");
    }
    $user = $session->get("user");
    $user['chara'] = $this->_get_chara($user['id']);
    $user['speedrun'] = $this->_get_speedrun($user['id']);
    $user['play_time'] = time() - $user['login_time'];
    
    $this->view->chara = $user['chara'];
    $this->view->speedrun = $user['speedrun'];
    $this->view->user = $user;
    
    $session->user = $user;
  }
  
  public function login()
  {
    $params = $this->request->getPost();
    $id = @$params['id'];
    $password = md5(@$params['password']);
    $get_param = $this->request->getQuery();
    $provider = @$get_param['provider'];
    if($id!='' && $password!='' && $this->_login($id, $password)) {
      $this->view->message = "ログイン成功";
      $this->view->url = "../";
      $session = new Session('auth');
      $user = $this->_get($id, $password);
      $user['chara'] = $this->_get_chara($id);
      $user['speedrun'] = $this->_get_speedrun($id);
      
      $user['speedrun']['login_count']++;
      $user['login_time'] = time();
      $session->user = $user;
    } else if($provider!='') {
      $adapter = $this->_login_with($provider);
      $user_data = $adapter->getUserProfile();
      $id = $user_data->displayName;
      $password = md5($user_data->identifier);
      if(!$this->_login($id, $password)) {
        $this->_add($id, $password);
      } else {
        $this->view->message = "ログイン成功";
        $this->view->url = "../";
        $session = new Session('auth');
        $user = $this->_get($id, $password);
        $user['chara'] = $this->_get_chara($id);
        $user['speedrun'] = $this->_get_speedrun($id);
        
        $user['speedrun']['login_count']++;
        $user['login_time'] = time();
        $session->user = $user;
      }
      
    } else {
      $this->view->message = "ログイン失敗";
      $this->view->url = "../../";
    }
    $url = $this->view->url;
    $this->view->refresh = "<meta http-equiv='refresh' content='3;URL=$url'>";
  }
  
  public function logout()
  {
    $this->_save();
    
    $session = new Session('auth');
    $session->clear();
    $this->view->message = "ログアウト成功";
    $this->view->url = "../";
    
    $url = $this->view->url;
    $this->view->refresh = "<meta http-equiv='refresh' content='3;URL=$url'>";
  }
  
  public function add()
  {
    $params = $this->request->getPost();
    $id = @$params['id'];
    $password = md5(@$params['password']);
    $this->_add($id, $password);
  }
  
  private function _add($id, $password)
  {
    if($this->_add_user($id, $password)) {
      $this->_add_chara($id);
      $this->_add_speedrun($id);
      $this->view->message = "登録成功";
      $this->view->url = "../";
      $session = new Session('auth');
      $session->user = $this->_get($id, $password);
      $session->user['chara'] = $this->_get_chara($id);
    } else {
      $this->view->message = "登録失敗";
      $this->view->url = "../../";
    }
    $url = $this->view->url;
    $this->view->refresh = "<meta http-equiv='refresh' content='3;URL=$url'>";
  }
  
  public function config()
  {
    $this->index();
  }
  
  public function profile()
  {
    $this->index();
  }
  
  public function action()
  {
    $this->index();
  }
  
  public function training()
  {
    $this->index();
  }
  
  public function gallery()
  {
    $this->index();
    
    $result = $this->_get_file_list(dirname(__FILE__).'/../../htdocs/data/');
    $files = array();
    foreach($result as $r) {
      $files[] = str_replace(dirname(__FILE__)."/../../", "/onlinequest/", $r);
    }
    $this->view->files = $files;
  }
  
  public function speedrun()
  {
    $this->index();
  }
  
  public function save()
  {
    $this->index();
    
    $this->_save();
    $this->redirect("/user/index.php");
  }
  
  public function _save()
  {
    $session = new Session('auth');
    $user = $session->get("user");
    $chara = $user['chara'];
    $speedrun = $user['speedrun'];
    
    $speedrun['max_level'] = $speedrun['max_level'] < $chara['level'] ? $chara['level'] : $speedrun['max_level'];
    $speedrun['max_play_time'] = $speedrun['max_play_time'] < $user['play_time'] ? $user['play_time'] : $speedrun['max_play_time'];
    $speedrun['total_time'] += $user['play_time'];
    
    $this->_save_speedrun($speedrun);
  }
  
  private function _login($id, $password)
  {
    $data = $this->_get($id, $password);
    $void = array();
    return $data !== $void;
  }
  
  private function _login_with($provider)
  {
    $path = "../library/hybridauth";
    $config = $path.'/config.php';
    require_once($path."/Hybrid/Auth.php");
    
    $hybridauth = new Hybrid_Auth($config);
    $p = @trim(strip_tags($provider));
    $adapter = $hybridauth->authenticate($p);
    return $adapter;
  }
  
  private function _add_user($id, $password)
  {
    $model = $this->model('User');
    return $model->createUser($id, $password);
  }
  
  private function _get($id, $password)
  {
    $model = $this->model('User');
    return $model->getUser($id, $password);
  }
  
  private function _add_chara($id)
  {
    $model = $this->model('Chara');
    return $model->createChara($id);
  }
  
  private function _add_speedrun($id)
  {
    $model = $this->model('Speedrun');
    return $model->createSpeedrun($id);
  }
  
  private function _get_chara($id)
  {
    $model = $this->model('Chara');
    return $model->getCharaById($id);
  }
  
  private function _get_speedrun($id)
  {
    $model = $this->model('Speedrun');
    return $model->getSpeedrun($id);
  }
  
  private function _get_file_list($dir)
  {
    $files = array();
    $list = scandir($dir);
    foreach($list as $file){
      if($file == '.' || $file == '..'){
        continue;
      } else if (is_file($dir . $file)){
        $files[] = $dir . $file;
      } else if( is_dir($dir . $file) ) {
        $files = array_merge($files, $this->_get_file_list($dir . $file . '/'));
      }
    }
    return $files;
  }
  
  private function _save_speedrun($data)
  {
    $model = $this->model('Speedrun');
    return $model->updateSpeedrun($data);
  }
}
