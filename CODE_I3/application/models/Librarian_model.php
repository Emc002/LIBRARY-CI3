<?php 

class Librarian_model extends CI_Model {
  protected $table = 'librarians';

  public function all()
  {
    return $this->db->query("select * from $this->table")->result();
  }

  public function findId($id)
  {
    return $this->db->query("select * from $this->table where id=?", [$id])->row();
  }

  public function findIdAV($id)
  {
    return $this->db->query("select librarians.avatar from $this->table where id=?", [$id])->row();
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