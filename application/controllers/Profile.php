<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct() {
        parent::__construct();	  
        $this->load->library('mediumapi', array('token'=>MEDIA_INTEGRATION_TOKEN));
	}

    public function index() {
        $profile = $this->mediumapi->getProfile();
        if (!empty($profile)) {
            $data = $profile->data;
            echo 'name: ' . $data->name;
            echo '</br>';
            echo 'url: ' . $data->url;
        } else {
            echo "You can't get profile information.";
        }
    }
}

?>