<?php

/**
 * @property MY_Controller data
 */
class Dashboard extends User_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_m");
    }

    public function index()
    {

        $data = ["test1" => "Test"];

        $this->data['data'] = json_encode($data);
        $this->load->view('api', $this->data);
    }
}