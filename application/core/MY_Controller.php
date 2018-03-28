<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of My_Controller
 *
 * @author quentin
 */
class MY_Controller extends CI_Controller {

    public $prefixEncode = PREFIX_ENCODE;

    public function __construct() {
        parent::__construct();
    }

    protected function isLoggedIn() {
        if (!$this->session->userdata('isLoggedIn')) {
            return false;
        } else {
            return true;
        }
    }

}