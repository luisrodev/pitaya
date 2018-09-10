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

    function eliminarUsuario($id){
        $this->db->set('active', 0);
        $this->db->where('idusuario', $id);
        // $success = $this->db->delete('usuarios');
        $success = $this->db->update('usuarios');
        return $success;
    }

    function actualizarUsuario($id, $data){

        if($data['password'] != ""){
            $this->db->set('password', $data['password']);
        }
        $this->db->set('nombre', $data['nombre']);
        $this->db->set('username', $data['username']);
        $this->db->set('email', $data['email']);
        $this->db->set('rol', $data['rol']);
        $this->db->set('active', $data['active']);

        
        $this->db->where('idusuario', $id);
        return $this->db->update('usuarios');
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
