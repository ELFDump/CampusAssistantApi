<?php

/**
 * @property MY_Controller data
 */
class Pos_log extends User_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("pos_log_m");
        $this->load->model("user_m");
        $this->load->model("room_m");
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
        $user = $this->user_m->get_by(array("UUID" => $data->uuid), true);
        $room = $this->room_m->get_by(array("UUID" => $data->placeId), true);
        $this->pos_log_m->save(array("id_user" => $user->id, "time" => $data->time, "description" => $data->action, "room" => $room->id_room));
        //$this->data['data'] = $data;
        //$this->load->view('api', $this->data);
    }

    public function get()
    {
        $data = $this->pos_log_m->get();
        //$this->db->join("rooms", "rooms.id_room = pos_log.room");

        $rooms = $this->room_m->get();
        $datas = array();
        foreach ($rooms as $room) {
            $datas[$room->id_room]['count'] = 0;
            $datas[$room->id_room]['uuid'] = $room->UUID;
        }
        foreach ($data as $r) {
            if ($r->description == "ENTER") {

                $datas[$r->room]['count']++;
            } else if ($r->description == "LEAVE") {
                $datas[$r->room]['count']--;
            }
        }

        echo(json_encode($datas));
    }
}