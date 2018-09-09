<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {

    function getUsers(){
        $this->db->select('idusuario, nombre, username, email, rol, fecha_creacion, active');
        // $this->db->from('usuarios');
        $query = $this->db->get('usuarios');
        // $query = $this->db->get('usuarios');
        return $query->result();
    }

    function agregarUsuario($d){
        //echo json_decode($d);
        // $data = array(
        //     'nombre' => $d['nombre'],
        //     'username' => $d['username'],
        //     'password' => $d['password'],
        //     'email' => $d['email'],
        //     'rol' => $d['rol'],
        //     'fecha_creacion' => now(),
        //     'active' => $d['active']
        // );



        // $data = array(
        //     'nombre' => $d['nombre'],
        //     'username' => $d['username'],
        //     'password' => $d['password'],
        //     'email' => $d['email'],
        //     'rol' => $d['rol'],
        //     'fecha_creacion' => date('Y-m-d H:i:s', now()),
        //     'active' => $d['active']
        // );
        

        // $success = $this->db->insert('usuarios', json_decode($d));
        $success = $this->db->insert('usuarios', $d);

        // if($success)
        return  ($success)? $this->db->insert_id() : FALSE;
    }
	
}
