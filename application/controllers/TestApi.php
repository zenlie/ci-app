<?php

require APPPATH . 'libraries/Rest_Controller.php';

class TestApi extends Rest_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index_get()
    {
        $response['status'] = 200;
        $response['error'] = false;
        $response['message'] = 'Pesan untuk response';

        $this->response($response);
    }
    
    public function user_get()
    {
        $response['status'] = 200;
        $response['error'] = false;
        $response['user']['username'] = 'Jono';
        $response['user']['email'] = 'jono@politekpos.ac id';
        $response['user']['detail']['full_name'] = 'Jono Sujono';
        $response['user']['detail']['position'] = 'Programmer';
        $response['user']['detail']['specialize'] = 'Android, IOS, WEB, Desktop';
        
        $this->response($response);
    }
}
