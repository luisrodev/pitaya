<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SolicitudesModel extends CI_Model{

    function agregarSolicitud($data){
        return $this->db->insert('solicitudes', $data);
    }
}