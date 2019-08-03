<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_ppu
 *
 * @author casug
 */
class M_ppu extends CI_Model {

    function Read() {
        $exec = $this->db->select('usr_adm.uname,ppu.no_ppu,ppu.tgl_ppu,proyek.nama_proyek,proyek.pemilik_proyek,proyek.tmt,proyek.tmt_stop')
                ->from('ppu')
                ->join('proyek', 'ppu.no_ppu = proyek.id_ppu', 'LEFT')
                ->join('usr_adm', 'ppu.syscreateuser = usr_adm.id', 'LEFT')
                ->where('ppu.stat', 1)
                ->group_by('ppu.no_ppu')
                ->get()
                ->result();
        return $exec;
    }

    function Detail($id) {
        $exec = $this->db->select('ppu.no_ppu,ppu.keterangan,ppu.satuan,ppu.jumlah,ppu.harga,ppu.id_ppu,ppu.tgl_ppu,proyek.nama_proyek,proyek.pemilik_proyek,usr_adm.uname,(SELECT SUM(jumlah * harga) FROM ppu WHERE ppu.no_ppu=' . $id . ') AS total')
                ->from('ppu')
                ->join('proyek', 'ppu.no_ppu = proyek.id_ppu', 'LEFT')
                ->join('usr_adm', 'ppu.syscreateuser = usr_adm.id', 'LEFT')
                ->where('ppu.no_ppu', $id)
                ->get()
                ->result();
        return $exec;
    }

}
