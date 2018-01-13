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

    public function change_position()
    {
        $data = $_POST['data'];
        $data = json_decode($data);
        $this->user_m->save(array(""));
        $this->user_m->get(1);
        $this->user_m->get_by(array("f1" => "a1"), false);
    }
    public function migration()
    {
        $this->load->library('migration');
        if (!$this->migration->current()) {
            $this->data['data'] = show_error($this->migration->error_string());
        } else {
            $this->data['data'] = "Pomyślnie dokonano migracji!";
        }
        $this->load->view('api', $this->data);
    }
}