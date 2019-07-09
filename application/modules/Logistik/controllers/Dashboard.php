<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard
 *
 * @author casug
 */
class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Dashboard');
        $this->result = $this->M_User->Auth();
    }

    function index() {
        $data = [
            'title' => 'Dashboard | PT CAB',
            'formtitle' => 'Dashboard logistik',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
        ];
        $data['content'] = $this->load->view('V_Dashboard', $data, true);
        $this->load->view('template', $data);
    }

}
