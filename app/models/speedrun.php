<?php
class Speedrun extends Model
{
  public function getSpeedrunList()
  {
    $sel = $this->select();
    $sel->order('create_time DESC');
    $rows = $sel->fetchAll();
    return $rows;
  }

  public function getSpeedrun($id)
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
  
  public function updateSpeedrun($data)
  {
    // UPDATE
    $upd = $this->update();
    $upd->values('max_level', $data['max_level']);
    $upd->values('total_damage', $data['total_damage']);
    $upd->values('total_gold', $data['total_gold']);
    $upd->values('max_play_time', $data['max_play_time']);
    $upd->values('total_time', $data['total_time']);
    $upd->values('login_count', $data['login_count']);
    $upd->values('message_count', $data['message_count']);
    $upd->values('action_count', $data['action_count']);
    $upd->values('item_count', $data['item_count']);
    $upd->values('update_time', date('YmdHis'));
    $upd->where('id', $data['id']);
    $res = $upd->execute();
    return $res;
  }

  public function createSpeedrun($id)
  {
    // INSERT
    $ins = $this->insert();
    $ins->values('id', $id);
    $ins->values('create_time', date('YmdHis'));
    $ins->values('update_time', date('YmdHis'));
    $res = $ins->execute();
    return $res;
  }

  public function deleteSpeedrun($id)
  {
    // DELETE
    $del = $this->delete();
    $del->where('id', $id);
    $res = $del->execute();
    return $res;
  }
}
