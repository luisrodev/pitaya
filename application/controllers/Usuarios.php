<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller{
    
    function __Construct(){
        parent::__Construct();
        // header('Access-Control-Allow-Origin: *');
        // header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        // header('Access-Control-Allow-Origin: *');
        //$this->load->library('utilerias');
        $this->load->database();
        $this->load->model('UsersModel');
        //$this->data['titulo'] = 'Usuarios';
        // if(!$this->session->userdata('isLog')){
        //     redirect('login');
        // }

        $this->utilerias->validateLog();



        //$this->load->view('template/header');
        $this->utilerias->header();
        $this->load->view('usuarios/index');
    }

    //Rol solicitado para ver si tiene acceso
    // public function validateRol($rol, $rol2){
    //     if($this->session->userdata('rol') == $rol || $this->session->userdata('rol') == $rol2){
    //         //redirect('usuarios/gestion');
    //         // redirect('dashboard');
    //         return;
    //     }else{
    //         redirect('dashboard');
    //     }
    // }


    public function getNav(){
        //TODO: Aqui es donde dependiendo del usuario que esta logeado se mostraran o no los modulos para clickear.
        $rol = $this->session->userdata('rol');

        switch($rol){
            case "Administrador":
                echo json_encode(array(
                    array(
                        'headName' => 'Administración',
                        'lista' => array(
                            array(
                                'icon' => 'user-cog',
                                'name' => ' Gestión Usuarios ',
                                'to' => 'http://localhost/pitaya/usuarios/gestion'
                            ),
                            array(
                                'icon' => 'address-book',
                                'name' => ' Gestión Tipo Proveedores ',
                                'to' => 'http://localhost/pitaya/proveedorestipo'
                            ),
                        )
                ),array(
                        'headName' => 'Proveedores',
                        'lista' => array(
                            // array(
                            //     'icon' => 'user',
                            //     'name' => ' Gestión Usuarios ',
                            //     'to' => 'http://localhost/pitaya/usuarios/gestion'
                            // ),
                            array(
                                'icon' => 'address-card',
                                'name' => ' Gestión Proveedores ',
                                'to' => 'http://localhost/pitaya/proveedores'
                            ),
                            array(
                                'icon' => 'list-alt',
                                'name' => ' Gestión Productos ',
                                'to' => 'http://localhost/pitaya/productos'
                            ),
                        )
            )));
                break;
            case "Gerente":
            echo json_encode(array(
                array(
                    'headName' => 'Administración',
                    'lista' => array(
                        array(
                            'icon' => 'user-cog',
                            'name' => ' Gestión Usuarios ',
                            'to' => 'http://localhost/pitaya/usuarios/gestion'
                        )
                        )),
                        array(
                            'headName' => 'Proveedores',
                            'lista' => array(
                                // array(
                                //     'icon' => 'user',
                                //     'name' => ' Gestión Usuarios ',
                                //     'to' => 'http://localhost/pitaya/usuarios/gestion'
                                // ),
                                array(
                                    'icon' => 'address-card',
                                    'name' => ' Gestión Proveedores ',
                                    'to' => 'http://localhost/pitaya/proveedores/'
                                ),
                                array(
                                    'icon' => 'list-alt',
                                    'name' => ' Gestión Productos ',
                                    'to' => 'http://localhost/pitaya/productos'
                                ),
                            )
                        )
            ));

                break;
            case "Empleado":
            echo json_encode(array(
                array(            
                    'headName' => 'Consultas',
                    'lista' => array(
                        array(
                            'icon' => 'search',
                            'name' => ' Busqueda Productos ',
                            'to' => 'http://localhost/pitaya/busqueda/productos'
                        ),
                        array(
                            'icon' => 'search',
                            'name' => ' Busqueda Proveedores ',
                            'to' => 'http://localhost/pitaya/busqueda/proveedores'
                        ),
                    )
                )));
                break;
        }
        

            die();
    }

    public function index(){

        $this->utilerias->validarRol('Administrador', 'Gerente');
        
        

        if(! file_exists(APPPATH.'views/usuarios/index.php')){
            show_404();
        }

        
        //$data['saludo'] = "Hola weon como estas?";
        // $this->data['saludo'] = "Hola viajero vienes en busca de CRUD USUARIOS";
        $this->load->view('usuarios/index');
        //$this->_footering();
        $this->utilerias->footer();
        //$this->load->view('template/header', $data);
    }

    public function sayHi(){
        //$this->clearSession();
        // $this->data['saludo'] = "HOLA HOLA, THIS IS JUST A FUCKING SALUDO";
        //$data['saludo'] = "HIHIHIHI";
        $this->load->view('usuarios/index');
        $this->_footering();
    }

    public function gestion(){
        // $this->validateRol('administrador', 'gerente');
        $this->utilerias->validarRol('Administrador', 'Gerente');
        $this->data['users'] = $this->UsersModel->getUsers();
        $this->data['titulo'] = "Gestión Usuarios";
        // $this->data['saludo'] = "Hola viajero que buscas los datos de los usuarios";
        // echo json_encode($this->data['users']);
        $this->load->view('usuarios/listado', $this->data);
        // $this->_footering();
        $this->utilerias->footer();
    }

    public function getUsuarios(){
        //TODO: Traer los usuarios pero ordenandolos por activo = 1
        //echo json_encode($this->UsersModel->getUsers());
        $d = array(
            'data' => $this->UsersModel->getUsers(),
            'rol' => $this->session->userdata('rol')
        );

        echo json_encode($d);
        die();
    }

    
    
    public function eliminar(){

        $id = $this->input->post('id');
        echo json_encode($this->UsersModel->eliminarUsuario($id));
        die();
        //echo json_encode($id);
        //$this->input->post('id');
        //alert('Eliminar php');
        // $this->data['id'] = $this->input->post('id');
        // $this->load->view('usuarios/eliminar', $this->data);
        // $this->_footering();
    }

    // private function _footering(){
    //     $this->load->view('template/footer');
    // }

    public function update(){
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
            'rol' => $this->input->post('rol'),
            'active' => ($this->input->post('active') == "true")? 1 : 0
            //'active' => $isActive
        );

        

        echo json_encode($this->UsersModel->actualizarUsuario($this->input->post('id'), $data));
        die();
    }

    public function agregarUsuario(){
        // $isActive = 0;
        // echo $this->input->post('active');
        // if($this->input->post('active') == "true"){
        //     $isActive = 1;
        // }

        // echo $isActive;

        // echo ($this->input->post('active'))? 1 : 0;
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
            'rol' => $this->input->post('rol'),
            'fecha_creacion' => date('Y-m-d H:i:s'),
            'active' => ($this->input->post('active') == "true")? 1 : 0
            //'active' => $isActive
        );

        // $data = $this->input->post('data');
        // echo $data;

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