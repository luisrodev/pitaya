<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProveedoresTipo extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->database();
        $this->load->model('ProveedoresTipoModel');

        // if(!$this->session->userdata('isLog')){
        //     redirect('login');
        // }
        $this->utilerias->validateLog();


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
        if(! file_exists(APPPATH.'views/usuarios/index.php')){
            show_404();
        }


        $this->utilerias->validarRol('Administrador', 'Gerente');


        $this->load->view('proveedores-tipo/index');

        //$this->_footering();
        $this->utilerias->footer();

    }

    public function getData(){

        echo json_encode($this->ProveedoresTipoModel->obtenerTipos());
        die();

    }

    public function getTiposActivos(){
        echo json_encode($this->ProveedoresTipoModel->obtenerTiposActivos());
        die();
    }

    public function agregarTipo(){
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'active' => ($this->input->post('active') == "true")? 1 : 0
        );

        $restul = $this->ProveedoresTipoModel->agregarTipo($data);

        echo json_encode($restul);
        die();

    }

    public function eliminarTipo(){
        $id = $this->input->post('id');
        echo json_encode($this->ProveedoresTipoModel->eliminarTipo($id));
        die();
        
    }

    public function updateTipo(){
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'active' => ($this->input->post('active') == "true")? 1 : 0
        );

        echo json_encode($this->ProveedoresTipoModel->actualizarTipo($this->input->post('id'), $data));

        die();

    }


    // private function _footering(){
    //     $this->load->view('template/footer');
    // }

}