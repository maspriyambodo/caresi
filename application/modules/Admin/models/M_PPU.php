<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_Nota
 *
 * @author casug
 */
class M_PPU extends CI_Model {

    function Simpan($data) {
        print_r($data);
        die;
    }

    function Tambah() {
        $exec = $this->db->select('MAX(no_ppu) + 1 AS no_ppu')
                ->from('ppu')
                ->get()
                ->result();
        return $exec;
    }

    function Read() {
        $exec = $this->db->select()
                ->from('ppu')
                ->join('proyek', 'ppu.no_ppu = proyek.id_ppu', 'LEFT')
                ->join('usr_adm', 'ppu.syscreateuser = usr_adm.id', 'LEFT')
                ->group_by('ppu.no_ppu')
                ->get()
                ->result();
        return $exec;
    }

    function Detail($ppu) {
        $exec = $this->db->select()
                ->select('(SELECT SUM(jumlah * harga) FROM ppu WHERE ppu.no_ppu=' . $ppu . ') AS total')
                ->from('ppu')
                ->where('ppu.no_ppu', $ppu)
                ->get()
                ->result();
        return $exec;
    }

    function Update() {
        
    }

    function Delete() {
        
    }

}
