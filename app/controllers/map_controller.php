<?php
class MapController extends Controller
{
  public function index()
  {
  }
  
  public function stage()
  {
    $session = new Session('auth');
    if(!$session->exists('user')) {
      $this->redirect("../../");
    }
    
    $id = $this->params['id'];
    $move = $this->params['move'];
    
    $user = $session->get("user");
    //print_r($user);
    if($move == "first" || $move == null) {
      $jsonstring = file_get_contents("../htdocs/data/map/stage/$id.json");
      $map = json_decode($jsonstring, TRUE);
      $map['count'] = 0;
      $map['is_battle'] = FALSE;
      $map['message'] = $map['title']."の入り口に辿り着いた。";
    } else if($move == "next") {
      $map = $this->_next_event($user);
    } else if($move == "prev") {
      $map = $this->_prev_event($user);
    } else if($move == "attack") {
      $this->redirect("map/battle/$id/0");
    } else if($move == "escape") {
      $map = $this->_prev_event($user);
    } else {
    }
    
    $user['map'] = $map;
    $session->user = $user;
    $this->view->map = $map;
    $this->view->chara = $user['chara'];
  }
  
  public function result()
  {
    $session = new Session('auth');
    if(!$session->exists('user')) {
      $this->redirect("../../");
    }
    $user = $session->get("user");
    $map = $user['map'];
    $map['count'] = 0;
    $map['is_battle'] = FALSE;
    $map['message'] = $map['title']."の出口に辿り着いた。";
    
    $user['map'] = $map;
    $session->user = $user;
    $this->view->map = $map;
    $this->view->chara = $user['chara'];
  }
  
  public function battle()
  {
    $session = new Session('auth');
    if(!$session->exists('user')) {
      $this->redirect("../../");
    }
    
    $id = $this->params['id'];
    
    $user = $session->get("user");
    $map = $user['map'];
    $map['id'] =  $id;
    $map['escape'] = FALSE;
    $map['is_win'] = FALSE;
    $enemy_id = $map['enemy_id'];
    $enemy = $this->_get_enemy($enemy_id);
    if(isset($map['enemy'])) {
      $enemy = $map['enemy'];
    }
    $question = $this->_get_question($map['q_id']);
    
    if($this->params['ans_id']=='0') {
      // 初回表示
      $ans_id = $this->params['ans_id'];
      $map['message'] = $enemy['name'].'が問題を出してきた。';
    } else if($this->params['ans_id']=='special') {
      // 必殺技でダメージを与える（スタミナ消費）
        $damage = $user['chara']['atk']*3 - $enemy['def'];
        if($damage < 0) {
          $damage = 0;
        }
        $enemy['hp'] -= $damage;
        $map['message'] = $user['chara']['name']."は必殺技を放った！<br />\n";
        $map['message'] .= $damage.'のダメージを与えた。';
        if($enemy['hp'] <=0 ) {
          $map['message'] .= "<br />\n".$enemy['name'].'を攻略した。';
          $map['is_win'] = TRUE;
        }
    } else if($this->params['ans_id']=='escape') {
      // 逃げる
        $map['message'] = $user['chara']['name'].'は逃げた。';
        $map['escape'] = TRUE;
    } else {
      // 解答後、ダメージの計算
      if($question['answer']==$this->params['ans_id']) {
        // 正解
        $damage = $user['chara']['atk'] - $enemy['def'];
        if($damage < 0) {
          $damage = 0;
        }
        $enemy['hp'] -= $damage;
        $map['message'] = "正解！<br />\n";
        $map['message'] .= $damage.'のダメージを与えた。';
        if($enemy['hp'] <=0 ) {
          $map['message'] .= "<br />\n".$enemy['name'].'を攻略した。';
          $map['is_win'] = TRUE;
        }
      } else {
        // 不正解
        $damage = $enemy['atk'] - $user['chara']['def'];
        if($damage < 0) {
          $damage = 0;
        }
        $user['chara']['hp'] -= $damage;
        $map['message'] = "間違い。<br />\n";
        $map['message'] .= $damage.'のダメージを受けた。';
      }
    }
    
    $map['enemy'] = $enemy;
    $user['map'] = $map;
    $session->user = $user;
    $this->view->map = $map;
    $this->view->enemy = $enemy;
    $this->view->chara = $user['chara'];
    $this->view->question = $question;
    //print_r($user);
  }
  
  private function _next_event($user)
  {
    $map = $user['map'];
    $map['count']++;
    $c = $map['count'];
    if($c >= count($map['event'])) {
      $this->redirect("map/result");
    }
    return $this->_event($map);
  }
  
  private function _prev_event($user)
  {
    $map = $user['map'];
    $map['count']--;
    
    return $this->_event($map);
  }
  
  private function _event($map)
  {
    $c = $map['count'];
    $event = $map['event'][$c];
    if(isset($event['battle']['enemy_id'])) {
      $map['is_battle'] = TRUE;
      $enemy_list = $event['battle']['enemy_id'];
      $r = mt_rand(0, count($enemy_list)-1);
      $map['enemy_id'] = $enemy_list[$r];
      $map['enemy_img'] = $enemy_list[$r].".png";
      $big_question = $this->_get_big_question($event['battle']['big_question']);
      $question_list = $this->_get_question_list($big_question['id']);
      shuffle($question_list);
      $map['q_id'] = $question_list[0]['id'];
      $map['message'] = $c."に着いた。<br />\n";
      $map['message'] .= $enemy_list[$r]."と遭遇した。";
      
    } else if(isset($event['item'])) {
      $map['is_battle'] = FALSE;
      $item_list = $event['item']['item_id'];
      $r = mt_rand(0, count($item_list)-1);
      $map['item_id'] = $item_list[$r];
      $map['item_img'] = $item_list[$r].".png";
      $map['message'] = $c."に着いた。<br />\n";
      $map['message'] .= $item_list[$r]."を発見した。";
      
    } else if(isset($event['boss'])) {
      $map['is_battle'] = TRUE;
      $enemy_list = $event['boss']['enemy_id'];
      $r = mt_rand(0, count($enemy_list)-1);
      unset($map['enemy_img']);
      $map['enemy_id'] = $enemy_list[$r];
      $map['enemy_img'] = $enemy_list[$r].".png";
      $big_question = $this->_get_big_question($event['boss']['big_question']);
      $question_list = $this->_get_question_list($big_question['id']);
      shuffle($question_list);
      $map['q_id'] = $question_list[0]['id'];
      $map['message'] = $c."に着いた。<br />\n";
      $map['message'] .= $enemy_list[$r]."が現れた！！";
      
    } else if(isset($event['none'])) {
      $map['is_battle'] = FALSE;
      unset($map['item_img']);
      $map['message'] = $c."に着いた。";
      
    } else {
      //print_r($c);
      $map['is_battle'] = FALSE;
      unset($map['enemy_img']);
      unset($map['item_img']);
      $map['message'] = "エラー：行方不明？？？";
    }
    
    return $map;
  }
  
  private function _get_enemy($id)
  {
    $model = $this->model('Enemy');
    return $model->getEnemy($id);
  }
  
  private function _get_question($id)
  {
    $model = $this->model('Question');
    return $model->getQuestion($id);
  }
  
  private function _get_question_list($id)
  {
    $model = $this->model('Question');
    return $model->getQuestionByBigId($id);
  }
  
  private function _get_big_question($id)
  {
    $model = $this->model('BigQuestion');
    //print_r($model);
    //print_r($id);
    return $model->getBigQuestion($id);
  }
}
