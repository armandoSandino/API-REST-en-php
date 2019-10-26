<?php

defined('BASEPATH') OR exit('No direct script access allowed');

///////////
// descripcion de modelo contacto
///////////

class ContactModel extends CI_Model{

    private $contacto = 'contact';//nombre de la tabla en la DB

    function get_contact_list(){
        $query = $this->db->get( $this->contacto );
        if( $query ){
            return $query->result();
        }
        return  null;
    }

    function get_contact( $id ){
        $query = $this->db->get_where(
            $this->contacto , array("contact_id"=>$id)
        );
        if( $query ){
            return $query->row();
        }
        return null;
    }
    function add_contacto( $nom ,$dire ,$tele ){
        //arreglo con los nombres de los campos de la DB como claves del arreglo asociativo
        //pasandole los valores que recibimos desde el controlador
        $da = array(
            'contact_name'=>$nom,
            'contact_address'=>$dire,
            'contact_phone'=>$tele
        );
        //arg 1: nombre de la tabla en la DB, arg 2: datos a insertar
        return $this->db->insert( $this->contacto, $da );
    }
    function actualizar_contacto( $id ,$nom ,$dire ,$tele ){
        $da = array(
            'contact_name'=>$nom,
            'contact_address'=>$dire,
            'contact_phone'=>$tele
        );
        $this->db->where( 'contact_id', $id );
       return $this->db->update( $this->contacto , $da );   
    }
    function borrar( $id ){
        $this->db->where('contact_id' , $id );
       return $this->db->delete( $this->contacto );
    }
}