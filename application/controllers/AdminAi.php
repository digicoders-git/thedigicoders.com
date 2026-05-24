<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminAi extends MY_Controller {

    public function __construct() {
        parent::__construct();
        // Auth check
        if (!$this->session->userdata('AdminEmail')) {
            redirect(base_url('Home/Login'));
        }

        // Auto-migration: Ensure gemini_api_key column exists in admin_login table
        $fields = $this->db->list_fields('admin_login');
        if (!in_array('gemini_api_key', $fields)) {
            $this->load->dbforge();
            $new_fields = array(
                'gemini_api_key' => array(
                    'type' => 'TEXT',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('admin_login', $new_fields);
        }
    }

    public function leads() {
        $data['leads'] = $this->db->order_by('id', 'DESC')->get('leads')->result();
        $this->load->view('Admin/AiLeads', $data);
    }

    public function delete_lead($id) {
        $this->db->where('id', $id)->delete('leads');
        $this->session->set_flashdata('status', 'success');
        $this->session->set_flashdata('msg', 'Lead Deleted Successfully');
        redirect(base_url('AdminAi/leads'));
    }

    public function chat_logs() {
        $this->db->select('l.*, le.name, le.phone');
        $this->db->from('chat_logs l');
        $this->db->join('leads le', 'l.lead_id = le.id', 'left');
        $this->db->order_by('l.id', 'DESC');
        $data['logs'] = $this->db->get()->result();
        $this->load->view('Admin/AiChatLogs', $data);
    }

    public function delete_chat_log($id) {
        $this->db->where('id', $id)->delete('chat_logs');
        $this->session->set_flashdata('status', 'success');
        $this->session->set_flashdata('msg', 'Chat Log Deleted Successfully');
        redirect(base_url('AdminAi/chat_logs'));
    }

    public function delete_all_logs() {
        $this->db->empty_table('chat_logs');
        $this->session->set_flashdata('status', 'success');
        $this->session->set_flashdata('msg', 'All Chat Logs Cleared');
        redirect(base_url('AdminAi/chat_logs'));
    }

    public function settings() {
        $data['admin'] = $this->db->get('admin_login')->row();
        $this->load->view('Admin/AiSettings', $data);
    }

    public function save_settings() {
        $gemini_api_key = $this->input->post('gemini_api_key');
        
        $admin = $this->db->get('admin_login')->row();
        if ($admin) {
            $this->db->where('id', $admin->id)->update('admin_login', ['gemini_api_key' => trim($gemini_api_key)]);
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('msg', 'Gemini API Key Updated Successfully');
        } else {
            $this->session->set_flashdata('status', 'error');
            $this->session->set_flashdata('msg', 'Failed to update settings: Admin row not found.');
        }
        redirect(base_url('AdminAi/settings'));
    }
}
