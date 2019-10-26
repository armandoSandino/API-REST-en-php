<?php

use Restserver\Libraries\REST_Controller;

defined("BASEPATH") OR exit("no tiene acceso al fichero");

require APPPATH.'libraries\REST_Controller.php';
require APPPATH.'libraries\Format.php';
///
// peticion delete
///
class RestDeleteController extends CI_Controller{
    use REST_Controller{
        REST_Controller::__construct as private __resTraitConstruct;
        
    }
    function __construct(){
        parent::__construct();
        $this->__resTraitConstruct();
        $this->load->model("ContactModel","mi_modelo");
    }
    //server/proyecto/index.php/restdeletecontroller/borrar_contacto/12 
    //function delete_contact_delete( $id ){
        //$id  = $this->delete( $id );
        function delete_contact_delete(  ){
        $id  = $this->delete( "id" );
        $this->response( array('exe'=> 'el id es :'.$id ) );
        $res = $this->mi_modelo->borrar( $id );
        if( $res == false ){
            $this->response( array('status'=>'ERROR_NO_DATA') );
        }else{
            $this->response( array('status'=>'200 OK') );
        }
    }
}