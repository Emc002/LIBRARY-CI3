<?php 

class Book_model extends CI_Model {
  protected $table = 'books';

  public function all()
  {
    return $this->db->query("select * from $this->table")->result();
  }

  public function findId($id)
  {
    return $this->db->query("select * from $this->table where id=?", [$id])->row();
  }

  public function findIdCV($id)
  {
    return $this->db->query("select books.cover from $this->table where id=?", [$id])->row();
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