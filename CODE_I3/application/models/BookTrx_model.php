<?php

class BookTrx_model extends CI_Model
{
  protected $table = 'book_trxs';
  protected $table0 = 'books';
  protected $table1 = 'members';
  protected $table2 = 'borrow_details';


  public function all()
  {
    return $this->db->query("select book_trxs.id,
                             books.title, members.full_name,
                             borrow_details.deadline_at, book_trxs.type, book_trxs.price,
                             book_trxs.created_at, book_trxs.updated_at
                             from
                             $this->table
                             join
                             $this->table0 on book_trxs.book_id=books.id
                             join
                             $this->table1 on book_trxs.member_id=members.id
                             join
                             $this->table2 on book_trxs.detail_id=borrow_details.id")->result();
  }

  public function findId($id)
  {

    return $this->db->query("select book_trxs.id,
    books.title, members.full_name,
    borrow_details.deadline_at, book_trxs.type, book_trxs.price,
    book_trxs.created_at, book_trxs.updated_at
    from
    $this->table
    join
    $this->table0 on book_trxs.book_id=books.id
    join
    $this->table1 on book_trxs.member_id=members.id
    join
    $this->table2 on book_trxs.detail_id=borrow_details.id 
    where book_trxs.id=?", [$id])->row();
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
