<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProveedoresModel extends CI_Model{

    function obtenerProvedores(){
        $query = $this->db->query("select pro.idproveedor, pro.nombre, pro.ciudad, pro.estado, pro.telefono, pro.con_nombre, pro.con_email, pro.con_telefono, pro.con_extension, pro.active, pro.fecha_creacion, u1.nombre as 'nombre_usuario_peticion', tp.nombre as 'nombre_tipo', u2.nombre as 'nombre_usuario_autorizo'
        from proveedores pro 
        left join tipo_proveedor tp on tp.idtipo_proveedor = pro.fk_tipo
        left join usuarios u1 on u1.idusuario = pro.fk_usuario_prove
        left join usuarios u2 on u2.idusuario = pro.fk_usuario_aut");

        return $query->result();
    }

    function agregarProveedor($data){

        return $this->db->insert('proveedores', $data);

    }

    function eliminarProveedor($id){
        $this->db->where('idtipo_proveedor', $id);
        $query = $this->db->delete('tipo_proveedor');
        return $query;
    }

    function actualizarProveedor($id, $data){
        $this->db->where('idtipo_proveedor', $id);
        return $this->db->update('tipo_proveedor', $data);
    }

}