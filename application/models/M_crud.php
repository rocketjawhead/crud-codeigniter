<?php

class M_Crud extends CI_Model {

	
	var $tabel_book = 'book';
	
	function getBook()
	{
	    return $this->db->get('book');
	}

	function insert_book($data){
		$this->db->insert($this->tabel_book,$data);
		return TRUE;
	}
	
	function getSinglebook($id){
		return $query = $this->db->get_where('book',array('id' => $id));
	}
	
	
	function update_book($data, $id){
		$this->db->where('id',$id);
		$this->db->update($this->tabel_book,$data);
		return TRUE;
	}
	
    function delete_book($id) {
        $this->db->delete('book', array('id' => $id));
        redirect('Welcome/index');
    }
		
}