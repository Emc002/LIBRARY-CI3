<?php 

class Membertrx_model extends CI_Model {
  protected $table = 'member_trxs';
  protected $table0 = 'members';
  protected $table1 = 'subscriptions';


  public function all()
  {
    return $this->db->query("select member_trxs.id, members.full_name, subscriptions.title,
                             member_trxs.trx_date, member_trxs.active_at,
                             member_trxs.expire_at, member_trxs.status,
                             member_trxs.total_order, member_trxs.note, member_trxs.created_at, member_trxs.updated_at
                            from
                            $this->table
                            join 
                            $this->table0 on member_trxs.member_id = members.id
                            join 
                            $this->table1 on member_trxs.subs_id = subscriptions.id")->result();

                            
  }

  public function findId($id)
  {
    return $this->db->query("select member_trxs.id, members.full_name, subscriptions.title, member_trxs.trx_date, member_trxs.active_at, member_trxs.expire_at, member_trxs.status,
                             member_trxs.total_order, member_trxs.note, member_trxs.created_at, member_trxs.updated_at
                             from
                             $this->table
                             join
                             $this->table0 on member_trxs.member_id = members.id
                             join
                             $this->table1 on member_trxs.subs_id = subscriptions.id
                             where $this->table.id=?", [$id])->row();
  }

  public function insert($data)
  {
    return $this->db->insert($this->table,$data);
  }

  public function update($id, $data)
  {
    return $this->db->update($this->table, $data, array('id' => $id));
  }
  public function delete($id)
  {
      return $this->db->delete($this->table, array("id" => $id));
  }
}