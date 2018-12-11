<?php
  /**
   *
   */
  class Administrador
  {
    private $id_administrador;
    private $full_name_administrador;
    private $email_administrador;
    private $telephone_administrador;
    private $school_administrador;
    private $image_profile_administrador;
    function __construct()
    {

    }

    public function set_id_administrador($id_administrador)
    {
       $this->id_administrador = $id_administrador;
    }

    public function set_full_name_admnistrador($full_name_administrador)
    {
      $this->full_name_administrador = $full_name_administrador;
    }
    public function set_email_administrador($email_administrador)
    {
      $this->email_administrador = $email_administrador;
    }

    public function set_telephone_administrador($telephone_administrador)
    {
      $this->telephone_administrador = $telephone_administrador;
    }

    public function set_school_administrador($school_administrador)
    {
      $this->school_administrador = $school_administrador;
    }

    public function set_image_profile_administrador($image_profile_administrador)
    {
      $this->image_profile_administrador = $image_profile_administrador;
    }



    public function get_id_administrador()
    {
       return $this->id_administrador;
    }

    public function get_full_name_admnistrador()
    {
      return $this->full_name_administrador;
    }
    public function get_email_administrador()
    {
      return $this->email_administrador;
    }

    public function get_telephone_administrador()
    {
      return $this->telephone_administrador;
    }

    public function get_school_administrador()
    {
      return $this->school_administrador;
    }

    public function get_image_profile_administrador()
    {
      return $this->image_profile_administrador;
    }
  }


?>
