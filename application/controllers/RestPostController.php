
<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';
require APPPATH.'libraries/Format.php';

//////
// peticion post
//////

class RestPostController extends CI_Controller{
    
    use REST_Controller{
        REST_Controller::__construct as private __resTraitConstruct;
        }
    
        function __construct(){
            parent::__construct();
            $this->__resTraitConstruct();
            //cargamos y renombramos el modelo
        $this->load->model('ContactModel','modelo');
        //$this->load->model('ContactModel');
    }
    //server/proyecto/index.php/restpostcontroller/add_contact
    function add_contact_post(){
        //$this->post() es un alias de $this->input->post() de CodeIgniter
        //para acceder a variables $_POST con proteccion XSS
        $name = $this->post('name');
        $direc = $this->post('direc');
        $tele = $this->post('tele');
        $resul = $this->modelo->add_contacto($name,$direc,$tele);
        if( $resul==false ){
            $this->response( array('status'=>'ERROR_NO_DATA') );
        }else{
            $this->response(array('status'=>'200 OK') );
        }
    }

}