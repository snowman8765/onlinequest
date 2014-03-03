<?php
class User extends Model
{
  public function getUserList()
  {
    $sel = $this->select();
    $sel->order('create_time DESC');
    $rows = $sel->fetchAll();
    return $rows;
  }

  public function getUser($id, $password)
  {
    $sel = $this->select();
    $sel->where('id', $id);
    $sel->where('password', $password);
    $row = $sel->fetchAll();
    if(count($row)>0) {
      return $row[0];
    } else {
      return array();
    }
  }
  
  public function updateUser($id)
  {
    // UPDATE
    $upd = $this->update();
    $upd->values('update_time', date('YmdHis'));
    $upd->where('id', $id);
    $res = $upd->execute();
    return $res;
  }

  public function createUser($id, $password)
  {
    // INSERT
    $ins = $this->insert();
    $ins->values('id', $id);
    $ins->values('password', $password);
    $ins->values('parmission', 'student');
    $ins->values('birthday', date('YmdHis'));
    $ins->values('create_time', date('YmdHis'));
    $ins->values('update_time', date('YmdHis'));
    $res = $ins->execute();
    return $res;
  }

  public function deleteUser($id)
  {
    // DELETE
    $del = $this->delete();
    $del->where('id', $id);
    $res = $del->execute();
    return $res;
  }
}
