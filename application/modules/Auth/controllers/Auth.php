<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author casug
 */
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Auth');
    }

    function index() {
        $this->Login();
    }

    function Login() {
        if ($this->session->userdata('hakakses') == '') {
            $data = ['title' => 'Login System CAB'];
            $this->load->view('V_Login', $data);
        } else {
            if ($this->session->userdata('hakakses') == 1) {
                redirect('Admin/Dashboard/index', 'refresh');
            } elseif ($this->session->userdata('hakakses') == 2) {
                redirect('Logistik/Dashboard/index', 'refresh');
            } elseif ($this->session->userdata('hakakses') == 3) {
                redirect('Finance/Dashboard/index', 'refresh');
            } elseif ($this->session->userdata('hakakses') == 3) {
                redirect('Direktur/Dashboard/index', 'refresh');
            } else {
                log_message('error', 'Some variable did not contain a value.');
            }
        }
    }

    function Proses() {
        $data = [
            'uname' => $this->input->post('uname'),
            'pwd' => $this->input->post('nik')
        ];
        $result = $this->M_Auth->proses($data);
        if ($result == true) {
            $response = array('statusCode' => 200, 'hakakses' => $result[0]->hak_akses);
            $session = array('id' => $result[0]->id, 'nama' => $result[0]->uname, 'mail' => $result[0]->usr_mail, 'hakakses' => $result[0]->hak_akses, 'nik' => $result[0]->nik, 'gambar' => $result[0]->pict);
            $this->session->set_userdata($session);
        } else {
            $response = array('statusCode' => 201, 'message' => 'Maaf, username dan password Anda salah. Harap periksa kembali username dan password Anda.');
        }
        $this->output
                ->set_status_header($response['statusCode'])
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    function Logout() {
        $this->session->sess_destroy();
        redirect('Auth/Login', 'refresh');
    }

}
