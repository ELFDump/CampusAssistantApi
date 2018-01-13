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
        $this->load->model("actual_in_room_m");
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
        $this->actual_in_room_m->save(array("id_user" => $user->id, "room" => $room->id_room));
        //$this->data['data'] = $data;
        //$this->load->view('api', $this->data);
    }

    public function get()
    {
        $this->db->join("rooms", "rooms.id_room = pos_log.room");
        $data = $this->pos_log_m->get();

        $rooms = $this->room_m->get();
        $datas = array();
        foreach ($rooms as $room) {
            $datas[$room->UUID] = 0;
        }
        foreach ($data as $r) {
            if ($r->description == "ENTER") {

                $datas[$r->UUID]++;
            } else if ($r->description == "LEAVE") {
                $datas[$r->UUID]--;
            }
        }

        echo(json_encode($datas));
    }
}