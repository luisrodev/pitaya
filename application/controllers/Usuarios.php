<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller{

    function __Construct(){
        parent::__Construct();
        
        $this->load->database();
        $this->load->model('UsersModel');
        $this->data['titulo'] = 'Usuarios';
        $this->load->view('template/header', $this->data);
    }
    
    public function index(){

        if(! file_exists(APPPATH.'views/usuarios/index.php')){
            show_404();
        }

        
        //$data['saludo'] = "Hola weon como estas?";
        $this->data['saludo'] = "Hola viajero vienes en busca de CRUD USUARIOS";
        $this->load->view('usuarios/index', $this->data);
        $this->_footering();
        //$this->load->view('template/header', $data);
    }

    public function sayHi(){
        $this->data['saludo'] = "HOLA HOLA, THIS IS JUST A FUCKING SALUDO";
        //$data['saludo'] = "HIHIHIHI";
        $this->load->view('usuarios/index', $this->data);
        $this->_footering();
    }

    public function show(){
        $this->data['users'] = $this->UsersModel->getUsers();
        $this->data['title'] = "Listado Usuarios";
        $this->data['saludo'] = "Hola viajero que buscas los datos de los usuarios";
        $this->load->view('usuarios/listado', $this->data);
        $this->_footering();
    }

    public function update(){

    }
    
    public function eliminar(){
        //$this->input->post('id');
        //alert('Eliminar php');
        $this->data['id'] = $this->input->post('id');
        $this->load->view('usuarios/eliminar', $this->data);
        $this->_footering();
    }

    private function show_deleted(){
        
    }

    private function _footering(){
        $this->load->view('template/footer');
    }

    public function agregarUsuario(){

        // $data = array(
        //     'nombre' => $this->input->post('nombre'),
        //     'username' => $this->input->post('username'),
        //     'password' => $this->input->post('password'),
        //     'email' => $this->input->post('email'),
        //     'rol' => $this->input->post('rol')
        // );

        $data = $this->input->post('data');
        //echo $data;

        $restul = $this->UsersModel->agregarUsuario($data);

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
        die();

        //header("Content-type: application/json");

        //echo json_encode($data);
        //echo json_encode($data);
        //echo $this->input->post('rol');
        // echo $this->input->post('dataToSend');
    }
}