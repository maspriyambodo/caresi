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

    function ppu($ppu) {
        $exec = $this->db->select('nama_proyek')
                ->from('proyek')
                ->where('proyek.id_ppu', $ppu)
                ->get()
                ->result();
        return $exec;
    }

    function Uploadpoto($data) {
        $this->db->trans_begin();
        $this->db->insert('dokumen_pendukung', $data);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    function Lunas($no_ppu) {
        $cek = $this->db->select()
                ->from('dokumen_pendukung')
                ->where('no_ppu', $no_ppu)
                ->get()
                ->result();
        if ($cek == false) {
            $msg = ['status' => false, 'msg' => 'Error, bukti pembayaran atau transfer belum terupload !'];
            return $msg;
        } else {
            $this->db->trans_begin();
            $this->db->set(['stat' => 2, 'tgl_pembayaran' => date("Y-m-d"), 'sysupdateuser' => $this->session->userdata('id')]);
            $this->db->where('ppu.no_ppu', $no_ppu);
            $this->db->update('ppu');
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $msg = ['status' => false, 'msg' => 'Error, Status pembayaran gagal diubah !'];
                return $msg;
            } else {
                $this->db->trans_commit();
                $msg = ['status' => true, 'msg' => 'Success, Status pembayaran berhasil diubah !'];
                return $msg;
            }
        }
    }

}
