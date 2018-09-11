<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller{

    function __construct(){

        parent::__construct();

        $this->load->database();

        // if(!$this->session->userdata('isLog')){
        //     redirect('login');
        // }
        $this->load->model('ProductosModel');
        $this->load->model('ProveedoresModel');
        $this->utilerias->validateLog();


        // $this->load->view('template/header');
        $this->utilerias->header();
        
    }


    public function index(){

        if(! file_exists(APPPATH.'views/productos/index.php')){
            show_404();
        }
        $this->data['proveedores'] = $this->ProveedoresModel->getProveedores();
        $this->load->view('productos/index', $this->data);
        //$this->_footering();
        $this->utilerias->footer();

    }

    public function eliminarProducto(){
        $id = $this->input->post('id');
        echo json_encode($this->ProductosModel->eliminarProducto($id));
        die();
    }

    public function agregarProducto(){
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'tiempo_respuesta' => $this->input->post('tiempo_respuesta'),
            'capacidad_produccion' => $this->input->post('capacidad_produccion'),
            'lugar_entrega' => $this->input->post('lugar_entrega'),
            'fecha_creacion' => date('Y-m-d H:i:s'),
            'active' => ($this->input->post('active') == "true")? 1 : 0,
            'fk_proveedor' => $this->input->post('proveedor'),
            'fk_usuario_prod' => $this->session->userdata('id')
        );

        $restul = $this->ProductosModel->agregarProducto($data);

        if($restul != FAlSE){
            $returnered = array(
                'ok' => true,
                'msg' => "Producto agregado correctamente",
                'data' => $restul
            );
            echo json_encode($returnered);
        }else{
            $returnered = array(
                'ok' => false,
                'msg' => "Error en agregar al producto"
            );
            echo json_encode($returnered);
        }
        die();
    }

    public function editarProducto(){
        //actualizarProducto
        $id = $this->input->post('id');

        $data = array(
            'nombre' => $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'tiempo_respuesta' => $this->input->post('tiempo_respuesta'),
            'capacidad_produccion' => $this->input->post('capacidad_produccion'),
            'lugar_entrega' => $this->input->post('lugar_entrega'),
            'active' => ($this->input->post('active') == "true")? 1 : 0,
            'fk_proveedor' => $this->input->post('proveedor')
        );

        echo json_encode($this->ProductosModel->actualizarProducto($id, $data));
        die();

    }


    public function getProductos(){
        echo json_encode($this->ProductosModel->obtenerProductos());
        die();
    }

}