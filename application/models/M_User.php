<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_User
 *
 * @author X45LDB
 */
class M_User extends CI_Model {

    function Auth($level = null) {
        if ($this->uri->segment(1, 0) == 'Admin') {
            $level = 1;
        } elseif ($this->uri->segment(1, 0) == 'Direktur') {
            $level = 4;
        } elseif ($this->uri->segment(1, 0) == 'Finance') {
            $level = 3;
        } elseif ($this->uri->segment(1, 0) == 'Logistik') {
            $level = 2;
        } else {
            $level = 0;
        }
        $this->db->cache_on();
        $exec = $this->db->select('*')
                ->from('usr_adm')
                ->where('usr_adm.id', $this->session->userdata('id'))
                ->where('usr_adm.nik', $this->session->userdata('nik'))
                ->where('usr_adm.uname', $this->session->userdata('nama'))
                ->where('usr_adm.hak_akses', $level)
                ->get()
                ->result();
        if ($exec == []) {
            echo '<script>alert("You do not have permission to access");</script>';
            $this->session->sess_destroy();
            redirect('Auth/Login', 'refresh');
        } else {
            return $exec;
        }
    }

}
