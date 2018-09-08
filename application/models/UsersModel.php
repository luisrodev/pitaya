<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {

    function getUsers(){
        $this->db->select('idusuario, nombre, username, email, rol');
        // $this->db->from('usuarios');
        $query = $this->db->get('usuarios');
        // $query = $this->db->get('usuarios');
        return $query->result();
    }

    function agregarUsuario($d){
        // $data = array(
        //     'nombre' => $d.nombre,
        //     'username' => $d['username'],
        //     'password' => $d['password'],
        //     'email' => $d['email'],
        //     'rol' => $d['rol']
        // );
        $success = $this->db->insert('usuarios', json_decode($d));

        // if($success)
        return  ($success)? $this->db->insert_id() : FALSE;
    }
	
}
