<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    function __construct(){
        parent::__construct();
        // header('Access-Control-Allow-Origin: *');
        // header('Access-Control-Allow-Origin: *');
        // header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

        //$this->load->helper('url');
        $this->load->database();
        $this->load->model('LoginModel');
        
    }
    
    public function index(){
        $this->load->view('login/index');
    }

    public function cerrarSesion(){
        $this->utilerias->cerrarSesion();
    }
    

    public function logIn(){
        
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        $res = $this->LoginModel->autenticar($data);
        // redirect('/account/login', 'refresh');
        // echo json_encode($res);
        //redirect('usuarios', 'location');
        //return redirect('Usuarios/show', 'refresh');
        //echo json_encode($data);
        //echo json_encode($this->input->post('username'));
        if($res['ok'] == true){
            //echo "Se logeo";
            //redirect('usuarios', 'refresh');
            //echo json_encode("Log");
            $this->session->set_userdata('isLog', 'true');
            $this->session->set_userdata('id', $res['data']['idusuario']);
            $this->session->set_userdata('nombre', $res['data']['nombre']);
            $this->session->set_userdata('username', $res['data']['username']);
            $this->session->set_userdata('rol', $res['data']['rol']);



            //redirect('Usuarios');
            redirect('dashboard');
        }else{
            //echo "No se logeo";
            redirect('login');
        }


        // if($res){
        //     echo "Login";
        // }else{
        //     echo "NOLOGIN";
        // }

        // if($res->num_rows() == 1){
        //     //LOGIN
        //     echo "LOGIN";
        // }else{
        //     //NOLOGIN
        //     echo "NOLOGIDN";
        // }

        


        

    }

}