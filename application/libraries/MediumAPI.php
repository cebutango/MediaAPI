<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MediumAPI {

    private $api_endpoint = "https://api.medium.com/v1";

    public function __construct() {
    }

    public function getProfile() {
        $api = $this->api_endpoint . "/me";
        $headers = array(
            "Accept: application/json",
            "Authorization: Bearer " . MEDIA_INTEGRATION_TOKEN,
        );
        $ch = curl_init($api);
        curl_setopt($ch, CURLOPT_URL, $api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result);
        return $response;
    }

    public function postContent($title, $content) {
        $profile_id = ""; 
        $profile = $this->getProfile();
        if (!empty($profile)) {
            $data = $profile->data;
            $profile_id = $data->id;
        }

        if (!empty($profile_id)) {
            $api = $this->api_endpoint . "/users/".$profile_id."/posts";
            $headers = array(
                "Content-Type: application/json",
                "Accept: application/json",
                "Authorization: Bearer " . MEDIA_INTEGRATION_TOKEN,
            );
            $postdata = array();
            $postdata['title'] = $title;
            $postdata['contentFormat'] = "html";
            $postdata['content'] = $content;
            $postdata['publishStatus'] = "draft";         
            $ch = curl_init($api);
            curl_setopt($ch, CURLOPT_URL, $api);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));
            $result = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($result);
            return true;
        }

        return false;
    }

    public function getPublications() {  
        $profile_id = ""; 
        $profile = $this->getProfile();
        if (!empty($profile)) {
            $data = $profile->data;
            $profile_id = $data->id;
        }  
        print_r($profile);
        
        if (!empty($profile_id)) {
            $api = $this->api_endpoint . "/users/".$profile_id."/publications";
            $headers = array(
                "Content-Type: application/x-www-form-urlencoded",
                "Authorization: Bearer " . MEDIA_INTEGRATION_TOKEN,
            );
            $ch = curl_init($api);
            curl_setopt($ch, CURLOPT_URL, $api);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($result);
            return $response;
        }
    }
}

?>