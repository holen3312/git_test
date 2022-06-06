<?php

class Shopping_list_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function show_list()
    {
        $this->db->select('*');
        $this->db->join('categories', 'categories.id = shopping_list.category_id', 'left');
        $query = $this->db->get('shopping_list');
        return $query->result_array();
    }

    public function set_note()
    {
        $this->load->helper('url');

        $data = array(
            'title' => $this->input->post('title'),
            'category_id' => $this->input->post('category_id')
        );
        return $this->db->insert('shopping_list', $data);
    }

    public function delete_note($id)
    {
        $this->db->delete('shopping_list', array('id' => $id));

    }

    public function update_note($id)
    {
        $data = array(
            'title' => $this->input->post('title'),
            'category_id' =>$this->input->post('category_id')
        );

        $this->db->where('id', $id);
        $this->db->update('shopping_list', $data);
    }

    public function get_categories()
    {
        $query = $this->db->get('categories');
        return $query->result_array();
    }
}
