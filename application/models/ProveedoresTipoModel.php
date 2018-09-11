<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProveedoresTipoModel extends CI_Model{

    function obtenerTipos(){
        $query = $this->db->get('tipo_proveedor');

        return $query->result();
    }

    function obtenerTiposActivos(){
        $this->db->where('active', 1);
        $query = $this->db->get('tipo_proveedor');
        return $query->result();
    }

    function agregarTipo($data){

        return $this->db->insert('tipo_proveedor', $data);

    }

    function eliminarTipo($id){
        $this->db->set('active', 0);
        $this->db->where('idtipo_proveedor', $id);
        // $query = $this->db->delete('tipo_proveedor');
        $query = $this->db->update('tipo_proveedor');
        return $query;
    }

    function actualizarTipo($id, $data){
        $this->db->where('idtipo_proveedor', $id);
        return $this->db->update('tipo_proveedor', $data);
    }

}