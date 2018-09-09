<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model{

    function autenticar($datos){
        $this->db->select('nombre, password, username, rol, active');
        $this->db->where('username', $datos['username']);
        $this->db->where('password', $datos['password']);
        $query = $this->db->get('usuarios');
        
        if($query->num_rows() == 1){
            //isLoged
            $datos = array(
                'nombre' => $query->row()->nombre,
                'username' => $query->row()->username,
                'rol' => $query->row()->rol
            );
            return array(
                'ok' => true,
                'msg' => "Logeado correctamente",
                'data' => $datos
            );
        }else{
            return array(
                'ok' => false,
                'msg' => "Error al tratar de ingresar"
            );
        }
    }

}