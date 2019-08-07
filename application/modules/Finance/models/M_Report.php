<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_Report
 *
 * @author casug
 */
class M_Report extends CI_Model {

    function index() {
        $exec = $this->db->select('ppu.no_ppu,ppu.tgl_pembayaran,ppu.vendor,proyek.nama_proyek,ppu.jumlah,ppu.harga,(SELECT SUM(ppu.jumlah * ppu.harga) FROM ppu WHERE ppu.no_ppu=proyek.id_ppu) AS total ,( SELECT SUM( jumlah * harga ) FROM ppu WHERE ppu.stat = 2 ) AS gtotal ')
                ->from('proyek')
                ->join('ppu', 'proyek.id_ppu = ppu.no_ppu', 'LEFT')
                ->where('ppu.stat', 2)
                ->group_by('ppu.no_ppu')
                ->get()
                ->result();
//        print_r($this->db->last_query());die;
        return $exec;
    }

    function year() {
        $exec = $this->db->select('YEAR(ppu.tgl_ppu) AS tahun')
                ->from('ppu')
                ->group_by('tahun')
                ->get()
                ->result();
        return $exec;
    }

}
