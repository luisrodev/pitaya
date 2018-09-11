<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitudes extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->database();
        $this->load->model('SolicitudesModel');
        $this->utilerias->validateLog();

        $this->utilerias->header();
    }

    public function agregarSolicitud(){
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'ciudad' => $this->input->post('ciudad'),
            'estado' => $this->input->post('estado'),
            'telefono' => $this->input->post('telefono'),
            'con_nombre' => $this->input->post('con_nombre'),
            'con_email' => $this->input->post('con_email'),
            'con_telefono' => $this->input->post('con_telefono'),
            'con_extension' => $this->input->post('con_extension'),
            'peticion' => 'A', //Por que es agregar
            'razon' => $this->input->post('razon'),
            'fecha_solicitud' => date('Y-m-d H:i:s'),
            'pendiente' => 1,
            'fk_tipo_soli' => $this->input->post('tipo_proveedor'),
            'fk_usuario_soli' => $this->session->userdata('id')
        );

        $restul = $this->SolicitudesModel->agregarSolicitud($data);

        if($restul != FAlSE){
            $returnered = array(
                'ok' => true,
                'msg' => "Peticion agregado correctamente",
                'data' => $restul
            );
            echo json_encode($returnered);
        }else{
            $returnered = array(
                'ok' => false,
                'msg' => "Error en agregar al  peticin"
            );
            echo json_encode($returnered);
        }

        // echo json_encode($res);
        die();
    }
}