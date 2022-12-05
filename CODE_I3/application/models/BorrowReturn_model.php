<?php

class BorrowReturn_model extends CI_Model
{
  protected $table = 'borrow_return';
  protected $table0 = 'books';
  protected $table1 = 'borrow_details';


  public function all()
  {
    return $this->db->query("select books.id, borrow_details.id, books.title,
                             borrow_details.deadline_at, borrow_return.return_at,
                             borrow_return.note, borrow_return.created_at, borrow_return.updated_at
                             from
                             $this->table
                             join
                             $this->table0 on borrow_return.id=books.id
                             join
                             $this->table1 on borrow_return.id=borrow_details.id")->result();
  }

  public function findId($id)
  {
    return $this->db->query("select books.id, borrow_details.id, books.title,
    borrow_details.deadline_at, borrow_return.return_at,
    borrow_return.note, borrow_return.created_at, borrow_return.updated_at
    from
    $this->table
    join
    $this->table0 on borrow_return.id=books.id
    join
    $this->table1 on borrow_return.id=borrow_details.id where $this->table.id=?", [$id])->row();
  }

  public function insert($data)
  {
    return $this->db->insert($this->table, $data);
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