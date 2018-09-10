<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller{

    function __construct(){

        parent::__construct();

        $this->load->database();

        // if(!$this->session->userdata('isLog')){
        //     redirect('login');
        // }
        $this->utilerias->validateLog();


        // $this->load->view('template/header');
        $this->utilerias->header();
        
    }


    public function index(){

        if(! file_exists(APPPATH.'views/productos/index.php')){
            show_404();
        }

        $this->load->view('productos/index');
        //$this->_footering();
        $this->utilerias->footer();

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


    // private function _footering(){
    //     $this->load->view('template/footer');
    // }

}