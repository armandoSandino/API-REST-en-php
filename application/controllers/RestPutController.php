<?php

use Restserver\Libraries\REST_Controller;

defined("BASEPATH") OR exit("no tiene acceso al fichero");

require APPPATH.'libraries\REST_Controller.php';
require APPPATH.'libraries\Format.php';

///
// peticion put(update) server/proyecto/index.php/restputcontroller/update_contact
//
class RestPutController extends  CI_Controller{

    use REST_Controller{
        REST_Controller::__construct as private __resTraitConstruct;
    }
    function __construct(){
        parent::__construct();
        $this->__resTraitConstruct();

        $this->load->model("ContactModel","el_modelo");
    }
    function update_contact_put(){
        $id = $this->put("id");
        $name = $this->put("name");
        $dire = $this->put("dire");
        $tele = $this->put("tele");
        $res = $this->el_modelo->actualizar_contacto(
            $id,$name,$dire,$tele
        );
        if( $res  ==false ){
            $this->response( array('status'=>'ERROR_NO_DATA') );
        }else{
            $this->response( array('status'=>'200 OK') );
        }
    }
}