<?php
class Chara extends Model
{
  public function getCharaList()
  {
    $sel = $this->select();
    $sel->order('create_time DESC');
    $rows = $sel->fetchAll();
    return $rows;
  }

  public function getChara($id)
  {
    $sel = $this->select();
    $sel->where('id', $id);
    $row = $sel->fetchAll();
    if(count($row)>0) {
      return $row[0];
    } else {
      return array();
    }
  }

  public function getCharaById($id)
  {
    $sel = $this->select();
    $sel->where('id', $id);
    $row = $sel->fetchAll();
    if(count($row)>0) {
      return $row[0];
    } else {
      return array();
    }
  }
  
  public function updateChara($id)
  {
    // UPDATE
    $upd = $this->update();
    $upd->values('update_time', date('YmdHis'));
    $upd->where('id', $id);
    $res = $upd->execute();
    return $res;
  }

  public function createChara($id)
  {
    // INSERT
    $ins = $this->insert();
    $ins->values('id', $id);
    $ins->values('name', $id);
    $ins->values('create_time', date('YmdHis'));
    $ins->values('update_time', date('YmdHis'));
    $res = $ins->execute();
    return $res;
  }

  public function deleteChara($id)
  {
    // DELETE
    $del = $this->delete();
    $del->where('id', $id);
    $res = $del->execute();
    return $res;
  }
}
