<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Report
 *
 * @author casug
 */
class Report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Report');
        $this->result = $this->M_User->Auth();
    }

    function ppu() {
        $data = [
            'title' => 'Report PPU | PT RMB',
            'formtitle' => 'Report PPU',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'year' => $this->M_Report->year(),
            'value' => $this->M_Report->index()
        ];
        $data['content'] = $this->load->view('V_Reportppu', $data, true);
        $this->load->view('template', $data);
    }

    function tess() {
        for ($x = 1; $x <= 4; $x++){
            echo $x;
        }
    }

}
