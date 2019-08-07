<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PPU
 *
 * @author casug
 */
class PPU extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_ppu');
        $this->load->helper("terbilang");
        $this->result = $this->M_User->Auth();
    }

    function index() {
        $data = [
            'title' => 'Data PPU | Finance',
            'formtitle' => 'Data PPU',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'value' => $this->M_ppu->Read()
        ];
        $data['content'] = $this->load->view('V_ppu', $data, true);
        $this->load->view('template', $data);
    }

    function Detail($id) {
        $data = [
            'title' => 'Detail PPU | Finance',
            'formtitle' => 'Detail PPU',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'value' => $this->M_ppu->Detail($id)
        ];
        $data['content'] = $this->load->view('V_ppudetail', $data, true);
        $this->load->view('template', $data);
    }

    function Uploadpoto($ppu) {
        $no_ppu = $this->M_ppu->ppu($ppu);
        static $no = 1;
        $config = ['upload_path' => './assets/images/Finance/', 'allowed_types' => 'gif|jpg|png|pdf|jpeg', 'file_name' => $no_ppu[0]->nama_proyek . '_' . date("Y_m_d") . '_' . $no++, 'remove_spaces' => true, 'file_ext_tolower' => true, 'detect_mime' => true, 'mod_mime_fix' => true];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $response = array('error' => $this->upload->display_errors());
        } else {
            $response = ['success' => 'bukti transfer berhasil diupload'];
            $Uploadpoto = ['no_ppu' => $ppu, 'nama' => $no_ppu[0]->nama_proyek, 'path' => 'assets/images/Finance/' . $this->upload->data('file_name')];
            $this->M_ppu->Uploadpoto($Uploadpoto);
        }
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    function Lunas($no_ppu) {
        $exec = $this->M_ppu->Lunas($no_ppu);
        if ($exec['status'] == true) {
            $response = ['statuscode' => 200, 'msg' => $exec['msg']];
        } else {
            $response = ['statuscode' => 200, 'msg' => $exec['msg']];
        }
        $this->output
                ->set_status_header($response['statuscode'])
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

}
