<?php

//use Restserver\Libraries;

use Restserver\Libraries\REST_Controller;

//use api\libraries\REST_Controller;


defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';
require APPPATH.'libraries/Format.php';


//////////////////
// descripcion de RestGet
//////////////////

//class RestGetController extends REST_Controller {
class RestGetController extends CI_Controller {

    use REST_Controller{
    REST_Controller::__construct as private __resTraitConstruct;
    }
    function __construct(){
        parent::__construct();
        $this->__resTraitConstruct();
        //importamos el mdelo y lo renombramos para llamar a nuestro gusto
        $this->load->model('ContactModel' , 'el_modelo' );
        /*
        if (is_array($this->response->lang))
        {
          $this->load->language('application', $this->response->lang[0]);
        }
        else
        {
          $this->load->language('application', $this->response->lang);
        }*/

    }
    //server/proyecto/index.php/restgetcontroller/contacts
    function contacts_get(){
        $contactos = $this->el_modelo->get_contact_list();
        if( $contactos ){
            $this->response( $contactos , 200 );
        }else{
            $this->response( NULL,  404 );
        }
    }
    //server/proyecto/index.php/restgetcontroller/contact?id=12
    function contact_get(){
        if( ! $this->get('id') ){
            $this->response( null , 400 );
        }
        $contacto = $this->el_modelo->get_contact( $this->get('id') );

        if( $contacto ){
            $this->response( $contacto, 200 );
        }else{
            $this->response( null , 404 );
        }
    }

}












