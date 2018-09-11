<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busqueda extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->database();

        $this->utilerias->validateLog();
        $this->load->model('ProductosModel');
        $this->load->model('ProveedoresModel');
        $this->load->model('ProveedoresTipoModel');

        $this->utilerias->header();
    }

    public function productos(){
        $this->data['productos'] = $this->ProductosModel->obtenerProductosBusqueda();

        $this->load->view('busqueda/productos', $this->data);
        $this->utilerias->footer();
    }

    public function getProductos(){
        echo json_encode($this->ProductosModel->obtenerProductosBusqueda());
        die();
    }

    public function searchProducto(){
        $condition = $this->input->post('cond');
        echo json_encode($this->ProductosModel->searchProducto($condition));
        die();
    }

    public function proveedores(){
        $this->data['tipos'] = $this->ProveedoresTipoModel->obtenerTiposActivos();
        $this->load->view('busqueda/proveedores', $this->data);
        $this->utilerias->footer();
    }

    public function getProveedores(){
        echo json_encode($this->ProveedoresModel->obtenerProveedoresBusqueda());
        die();
    }

    public function searchProveedor(){
        $condition = $this->input->post('cond');
        echo json_encode($this->ProveedoresModel->searchProveedor($condition));
        die();
    }

}