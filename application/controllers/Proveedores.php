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
        $this->load->model('ProveedoresTipoModel');


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

        $this->data['tipos'] = $this->ProveedoresTipoModel->obtenerTiposActivos();


        $this->load->view('proveedores/index', $this->data);

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
            'active' => ($this->input->post('active') == "true")? 1 : 0,
            'fecha_creacion' => date('Y-m-d H:i:s'),
            'fk_tipo' => $this->input->post('fk_tipo'),
            'fk_usuario_prove' => $this->session->userdata('id'),
            'fk_usuario_aut' => $this->session->userdata('id')
        );

        $restul = $this->ProveedoresModel->agregarProveedor($data);

        if($restul != FAlSE){
            $returnered = array(
                'ok' => true,
                'msg' => "Usuario agregado correctamente",
                'data' => $restul
            );
            echo json_encode($returnered);
        }else{
            $returnered = array(
                'ok' => false,
                'msg' => "Error en agregar al  usuario"
            );
            echo json_encode($returnered);
        }

        // echo json_encode($res);
        die();
        
    }

    public function eliminarProveedor(){
        $id = $this->input->post('id');

        echo json_encode($this->ProveedoresModel->eliminarProveedor($id));
        die();
    }

    public function editarProveedor(){
        $id = $this->input->post('id');

        $data = array(
            'nombre' => $this->input->post('nombre'),
            'ciudad' => $this->input->post('ciudad'),
            'estado' => $this->input->post('estado'),
            'telefono' => $this->input->post('telefono'),
            'con_nombre' => $this->input->post('con_nombre'),
            'con_email' => $this->input->post('con_email'),
            'con_telefono' => $this->input->post('con_telefono'),
            'con_extension' => $this->input->post('con_extension'),
            'active' => ($this->input->post('active') == "true")? 1 : 0,
            'tipo' => $this->input->post('tipo')
            //'active' => $isActive
        );

        echo json_encode($this->ProveedoresModel->actualizarProveedor($id, $data));
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