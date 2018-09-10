<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilerias{

    protected $CI;

    public function __construct(){
        $this->CI =& get_instance();
        $this->CI->load->helper('url');
        $this->CI->load->library('session');

    }

    public function validarRol($rol1, $rol2){
        if($this->CI->session->userdata('rol') == $rol1 || $this->CI->session->userdata('rol') == $rol2){
            //redirect('usuarios/gestion');
            // redirect('dashboard');
            return;
        }else{
            redirect('dashboard');
        }
    }

    public function header(){
        $this->CI->load->view('template/header');
    }


    public function footer(){
        $this->CI->load->view('template/footer');
    }

    public function validateLog(){
        if(!$this->CI->session->userdata('isLog')){
            redirect('login');
        }
    }

    public function cerrarSesion(){
        $this->CI->session->unset_userdata('isLog');
        $this->CI->session->unset_userdata('id');
        $this->CI->session->unset_userdata('nombre');
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('rol');

        $this->CI->session->sess_destroy();

        redirect('login');
    }
}