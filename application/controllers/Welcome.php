<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_crud'); 

    }

	public function index()
	{
	    $data['book']= $this->m_crud->getBook();
		$this->load->view('Dashboard',$data);
	}


    //add book
	public function add()
	{
		$this->load->view('V_add_book');
	}

	public function insert_book()
	{
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$create_date = $this->input->post('create_date');
		
		$date_now = date("Y-m-d");
		
		$data = array(
		    'title' => $title,
		    'description '=> $description,
		    'create_date' => $date_now
		    );
		    
		$result = $this->m_crud->insert_book($data);
		
		if($result)
		{
		    redirect('Welcome/index'); 
		}
	}
	
	//update book
	public function update($id)
	{
	    $data['book'] = $this->m_crud->getSinglebook($id)->result();
		$this->load->view('V_edit_book',$data);
	}
	
	public function update_book()
	{
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$create_date = $this->input->post('create_date');
		
		$date_now = date("Y-m-d");
		
		$data = array(
		    'title' => $title,
		    'description '=> $description,
		    'update_date' => $date_now
		    );
		    
		$result = $this->m_crud->update_book($data, $this->input->post('id'));
		
		if($result)
		{
		    redirect('Welcome/index'); 
		}
	}
	
	function delete($id) {
        $this->m_crud->delete_book($id);
    }
}
