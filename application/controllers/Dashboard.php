<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();


        // if(!$this->session->userdata('isLog')){
        //     redirect('login');
        // }
        $this->utilerias->validateLog();

        //$this->load->view('template/header');
        $this->utilerias->header();
    
    }

    function index(){
        $this->load->view('dashboard/index');
        $this->utilerias->footer();
    }
}