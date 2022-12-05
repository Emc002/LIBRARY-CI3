<?php

class BorrowBook_model extends CI_Model
{
  protected $table = 'borrow_books';
  protected $table1 = 'members';


  public function all()
  {
    return $this->db->query("select members.full_name, borrow_books.id,
                             borrow_books.trx_date, borrow_books.note,
                             borrow_books.created_at, borrow_books.updated_at
                             from
                             $this->table
                             join
                             $this->table1 on borrow_books.id=members.id ")->result();
  }

  public function findId($id)
  {
    return $this->db->query("select members.full_name, borrow_books.id, borrow_books.member_id,
    borrow_books.trx_date, borrow_books.note,
    borrow_books.created_at, borrow_books.updated_at
    from
    $this->table
    join
    $this->table1 on borrow_books.id=members.id  where $this->table.id=?", [$id])->row();
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
