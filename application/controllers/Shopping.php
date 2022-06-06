<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shopping extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('shopping_list_model');
        
    }

    public function index()
    {
        $data['list'] = $this->shopping_list_model->show_list();
        $data['categories'] = $this->shopping_list_model->get_categories();
        var_dump($data['categories']);
        $this->load->view('view', $data);
    }


    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() === TRUE) {

            $this->shopping_list_model->set_note();
            $this->index();
        }
    }

    public function delete($id)
    {

        $this->shopping_list_model->delete_note($id);
        $data['users'] = $this->shopping_list_model->show_list();
        $this->load->view('view', $data);

    }

    public function update($id)
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('category_id', 'Category_id', 'required');
        $this->shopping_list_model->update_note($id);
        // $data['user'] = $this->shopping_list_model->show_list();
    }
}
