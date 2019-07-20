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
        $this->result = $this->M_User->Auth();
    }

    function index() {
        $data = [
            'title' => 'Data PPU | Logistik',
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
            'title' => 'Detail PPU | Logistik',
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

    function Update($no_ppu) {
        $data = [
            'keterangan' => $this->input->post('keterangan'),
            'id_ppu' => $this->input->post('id'),
            'satuan' => $this->input->post('satuan'),
            'jumlah' => $this->input->post('jumlah'),
            'harga' => str_replace(',', '', $this->input->post('harga')),
            'stat' => 2,
            'no_ppu' => $no_ppu
        ];
        $exec = $this->M_ppu->Update($data);
        if ($exec == true) {
            echo '<script>alert("Success,Data berhasil diubah !");window.location.href="' . base_url('Logistik/PPU/index') . '"</script>';
        }
    }

    function Laporan() {
        $data = [
            'title' => 'Detail PPU | Logistik',
            'formtitle' => 'Detail PPU',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'value' => $this->M_ppu->Laporan()
        ];
        $data['content'] = $this->load->view('V_Laporan', $data, true);
        $this->load->view('template', $data);
    }

    function Lapdetail($no_ppu) {
        $data = [
            'title' => 'Detail PPU | Logistik',
            'formtitle' => 'Detail PPU',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'value' => $this->M_ppu->Lapdetail($no_ppu)
        ];
        $data['content'] = $this->load->view('V_Lapdetail', $data, true);
        $this->load->view('template', $data);
    }

}
