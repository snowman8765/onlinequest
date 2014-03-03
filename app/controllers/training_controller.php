<?php

class TrainingController extends Controller
{
  public function index()
  {
    $session = new Session('auth');
    if(!$session->exists('user')) {
      $this->redirect("../../");
    }
    $user = $session->get("user");
    $user['chara'] = $this->_get_chara($user['id']);
    $this->view->chara = $user['chara'];
    $this->view->user = $user;
  }
  
  public function all()
  {
    $this->index();
  }
  
  private function _get_chara($id)
  {
    $model = $this->model('Chara');
    return $model->getCharaById($id);
  }
}
