<?php
class QuizController extends Controller
{
  public function index()
  {
    $session = new Session('auth');
    if(!$session->exists('user')) {
      $this->redirect("../../");
    }
    $this->view->user = $session->get("user");
  }
  
  public function start()
  {
  }
  
  public function result()
  {
  }
}
