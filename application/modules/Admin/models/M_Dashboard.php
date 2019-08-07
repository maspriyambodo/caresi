<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_Dashboard
 *
 * @author casug
 */
class M_Dashboard extends CI_Model {

    function index() {
        $exec = $this->db->select('MAX(no_ppu) AS totppu,( SELECT COUNT(DISTINCT no_ppu) FROM ppu WHERE ppu.stat = 1  ) AS unppu,( SELECT COUNT(DISTINCT no_ppu) FROM ppu WHERE ppu.stat = 2  ) AS procppu  ')
                ->from('ppu')
                ->where('syscreateuser', $this->session->userdata('id'))
                ->get()
                ->result();
        return $exec;
    }

}
