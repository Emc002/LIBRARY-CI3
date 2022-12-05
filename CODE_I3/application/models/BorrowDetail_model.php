<?php 

class BorrowDetail_model extends CI_Model {
  protected $table = 'borrow_details';
  protected $table0 = 'books';
  protected $table1 = 'borrow_books';
  protected $table2 = 'members';


  public function all()
  {
    return $this->db->query("select books.title, members.full_name, borrow_details.id,
                             borrow_details.deadline_at, borrow_details.note, borrow_details.created_at,
                             borrow_details.updated_at
                             from
                             $this->table
                             join
                             $this->table0 on borrow_details.book_id = books.id
                             join
                             $this->table1 on books.id = borrow_books.id
                             join
                             $this->table2 on borrow_details.borrow_id = members.id ")->result();
  }

  public function findId($id)
  {

    return $this->db->query("select borrow_details.id, books.title, members.full_name, borrow_details.deadline_at,borrow_details.note, borrow_details.created_at, borrow_details.updated_at
                             from
                             $this->table
                             join
                             $this->table0 on borrow_details.Book_id = books.id
                             join
                             $this->table1
                             join
                             $this->table2
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