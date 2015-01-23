<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author Ryannathan
 */
class Admin extends CI_Controller {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
}
