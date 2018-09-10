<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->database();
        

        // if(!$this->session->userdata('isLog')){
        //     redirect('login');
        // }
        $this->utilerias->validateLog();
        $this->load->model('ProveedoresModel');


        //$this->load->view('template/header');
        $this->utilerias->header();

    }

    // public function validateRol($rol, $rol2){
    //     if($this->session->userdata('rol') == $rol || $this->session->userdata('rol') == $rol2){
    //         //redirect('usuarios/gestion');
    //         // redirect('dashboard');
    //         return;
    //     }else{
    //         redirect('dashboard');
    //     }
    // }


    public function index(){

        if(! file_exists(APPPATH.'views/proveedores/index.php')){
            show_404();
        }

        //$this->validateRol('administrador', 'gerente');
        $this->utilerias->validarRol('Administrador', 'Gerente');


        $this->load->view('proveedores/index');

        //$this->_footering();
        $this->utilerias->footer();
    }


    public function agregarProveedor(){

        $data = array(
            'nombre' => $this->input->post('nombre'),
            'ciudad' => $this->input->post('ciudad'),
            'estado' => $this->input->post('estado'),
            'telefono' => $this->input->post('telefono'),
            'con_nombre' => $this->input->post('con_nombre'),
            'con_email' => $this->input->post('con_email'),
            'con_telefono' => $this->input->post('con_telefono'),
            'con_extension' => $this->input->post('con_extension'),
            'active' => $this->input->post('active'),
            'fecha_creacion' => date('Y-m-d H:i:s'),
            'fk_tipo' => $this->input->post('tipo'),
            'fk_usuario_prove' => $this->session->userdata('id'),
            'fk_usuario_aut' => $this->session->userdata('id')
        );

        $res = $this->ProveedorModel->agregarProveedor($data);

        echo json_encode($res);
        die();
        
    }

    public function getProveedores(){
        echo json_encode($this->ProveedoresModel->obtenerProvedores());
        die();
    }

    // private function _footering(){
    //     $this->load->view('template/footer');
    // }

}