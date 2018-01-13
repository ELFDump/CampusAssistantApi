<?php

/**
 * @property MY_Controller data
 */
class Users extends User_Controller
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


    public function create()
    {
        $data = json_decode(file_get_contents("php://input"));
        //var_dump($data);

        $this->user_m->save(array("UUID"=>$data->uuid, "nickname"=>$data->nickname, "description"=>$data->description));
        //$this->data['data'] = $data;
        //$this->load->view('api', $this->data);
    }

    public function get($uuid){
        //$data = json_decode(file_get_contents("php://input"));
        //var_dump($data);
        //var_dump($uuid);
        $data = $this->user_m->get_by(array("UUID"=>$uuid), true);
        echo (json_encode($data));
    }
}