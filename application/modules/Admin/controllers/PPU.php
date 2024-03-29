<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nota
 *
 * @author casug
 */
class PPU extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_PPU');
        $this->load->helper("terbilang");
        $this->result = $this->M_User->Auth();
    }

    function index() {
        $data = [
            'title' => 'Data.Nota | PT CAB',
            'formtitle' => '',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'value' => $this->M_PPU->Read(),
        ];
        $data['content'] = $this->load->view('V_PPU', $data, true);
        $this->load->view('template', $data);
    }

    function Tambah() {
        $data = [
            'title' => 'Data Nota | PT CAB',
            'formtitle' => 'Tambah Data PPU',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'ppu' => $this->M_PPU->Tambah()
        ];
        $data['content'] = $this->load->view('v_addppu', $data, true);
        $this->load->view('template', $data);
    }

    function Simpan() {
        $data = [
            'no_ppu' => $this->input->post('ppu')[0],
            'vendor' => $this->input->post('vendor')[0],
            'keterangan' => $this->input->post('keterangan'),
            'jumlah' => $this->input->post('jumlah'),
            'satuan' => $this->input->post('satuan'),
            'harga' => $this->input->post('harga'),
            'tgl_ppu' => date("Y-m-d"),
            'tgl_pembayaran' => '',
            'stat' => 1,
            'syscreateuser' => $this->session->userdata('id'),
            'syscreatedate' => date("Y-m-d"),
            'nama_proyek' => $this->input->post('proyek')[0],
            'tmt' => $this->input->post('tmtstart'),
            'tmt_stop' => $this->input->post('tmtstop'),
            'pemilik_proyek' => $this->input->post('pemilik_proyek')
        ];
        $this->M_PPU->Simpan($data);
    }

    function Detail($ppu) {
        $data = [
            'title' => 'Detail PPU | PT CAB',
            'formtitle' => 'permintaan pembayaran & uang',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'ppu' => $this->M_PPU->Detail($ppu)
        ];
        $data['content'] = $this->load->view('V_ppudetail', $data, true);
        $this->load->view('template', $data);
    }

    function Bukti($no_ppu) {
        $data = [
            'title' => 'bukti transfer | PT CAB',
            'formtitle' => '',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'value' => $this->M_PPU->Bukti($no_ppu)
        ];
        $data['content'] = $this->load->view('V_ppubukti', $data, true);
        $this->load->view('template', $data);
    }

    function Cetak($no_ppu) {
        $data = [
            'title' => 'Print PPU | PT CAB',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->uname,
            'usr_mail' => $this->result[0]->usr_mail,
            'hak_akses' => $this->result[0]->hak_akses,
            'pict' => $this->result[0]->pict,
            'ppu' => $this->M_PPU->Detail($ppu)
        ];
        $data['content'] = $this->load->view('V_ppudetail', $data, true);
        $this->load->view('template', $data);
    }

}
