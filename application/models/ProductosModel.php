<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductosModel extends CI_Model{

    function obtenerProductos(){
        // $query = $this->db->query("select prod.idproducto, prod.nombre, prod.descripcion, prod.tiempo_respuesta, prod.capacidad_produccion, prod.lugar_entrega,
        // prod.fecha_creacion, prod.active, prove.nombre as 'nombre_proveedor', u1.nombre as 'nombre_usuario'
        // from productos prod
        // left join proveedores prove on prove.idproveedor = prod.fk_proveedor
        // left join usuarios u1 on u1.idusuario = prod.fk_usuario_prod");

        $query = $this->db->query("select prod.idproducto, prod.nombre, prod.descripcion, prod.tiempo_respuesta, prod.capacidad_produccion, prod.lugar_entrega,
        prod.fecha_creacion, prod.active, u1.nombre as 'nombre_usuario', prove.nombre as 'nombre_proveedor', prove.ciudad, prove.estado,
        prove.con_nombre, prove.con_email, prove.con_telefono, prove.con_extension, tp.nombre as 'tipo'
        from productos prod
        left join proveedores prove on prove.idproveedor = prod.fk_proveedor
        left join tipo_proveedor tp on tp.idtipo_proveedor = prove.fk_tipo
        left join usuarios u1 on u1.idusuario = prod.fk_usuario_prod");

        return $query->result();
    }

    function agregarProducto($data){
        return $this->db->insert('productos', $data);
    }

    function eliminarProducto($id){
        $this->db->set('active', 0);
        $this->db->where('idproducto', $id);
        return $this->db->update('productos');
    }

    function actualizarProducto($id, $data){
        $this->db->set('nombre', $data['nombre']);
        $this->db->set('descripcion', $data['descripcion']);
        $this->db->set('tiempo_respuesta', $data['tiempo_respuesta']);
        $this->db->set('capacidad_produccion', $data['capacidad_produccion']);
        $this->db->set('lugar_entrega', $data['lugar_entrega']);
        $this->db->set('active', $data['active']);
        $this->db->set('fk_proveedor', $data['fk_proveedor']);
        $this->db->set('fk_usuario_prod', $this->session->userdata('id'));

        $this->db->where('idproducto', $id);
        return $this->db->update('productos');
    }

}