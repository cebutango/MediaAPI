<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publications extends CI_Controller {
    public function __construct() {
        parent::__construct();	      
	}

    public function index() {
        $publications = $this->mediumapi->getPublications();
        $data = $publications->data;
        if (!count($data)) {
            echo "You have not publications";
        } else {
            print_r($data);
        }
    }
}

?>