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
        $this->db->trans_begin();
        $i = 0;
        for ($i = 0; $i < count($data['keterangan']); $i++) {
            $this->db->set([
                'no_ppu' => $data['no_ppu'],
                'vendor' => $data['vendor'],
                'keterangan' => $data['keterangan'][$i],
                'jumlah' => $data['jumlah'][$i],
                'satuan' => $data['satuan'][$i],
                'harga' => $data['harga'][$i],
                'tgl_ppu' => $data['tgl_ppu'],
                'tgl_pembayaran' => '',
                'stat' => $data['stat'],
                'syscreateuser' => $data['syscreateuser'],
                'syscreatedate' => $data['syscreatedate']
            ])->insert('ppu');
        }
        $this->db->set([
            'id_ppu' => $data['no_ppu'],
            'nama_proyek' => $data['nama_proyek'],
            'tmt' => $data['tmt'],
            'tmt_stop' => $data['tmt_stop'],
            'pemilik_proyek' => $data['nama_proyek']
        ])->insert('proyek');
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
            echo '<script>alert("Success, tambah data ppu berhasil !");window.location.href="' . base_url('Admin/PPU/index') . '"</script>';
        }
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
                ->join('proyek', 'ppu.no_ppu = proyek.id_ppu', 'LEFT')
                ->where('ppu.no_ppu', $ppu)
                ->get()
                ->result();
        return $exec;
    }

    function Update() {
        
    }

    function Delete() {
        
    }

    function Bukti($no_ppu) {
        $exec = $this->db->select()
                ->from('dokumen_pendukung')
                ->where('dokumen_pendukung.no_ppu', $no_ppu)
                ->get()
                ->result();
        return $exec;
    }

}
