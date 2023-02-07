<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "Session_Secure.php";
class Home extends Session_Secure {

    public function __construct()
    {
        parent::__construct();
        $this->checkSession("user",base_url("login"));
    }
     public function index()
    {
        // code here brow
    }

    public function adminHome(){
        $this->load->view("admin");
    }
}
