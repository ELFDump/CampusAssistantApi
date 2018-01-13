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
        $this->load->model("counted_in_room_m");
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
        $id_action = $this->actual_in_room_m->get_by(array("id_user" => $user->id), true);
        if (((count($id_action) != 0 and $data->action == "ENTER") or (count($id_action) == 0 and $data->action == "LEAVE")) and $room->id_doom==$id_action->id_room) {
            return;
        }
        if (count($user) == 0) {
            $this->user_m->save(array("UUID" => $data->uuid, "nickname" => "Test", "description" => "test"));
        }

        //var_dump($room);
        if (count($room) == 0) {
            $this->room_m->save(array("UUID" => $data->placeId, "id_category" => 1));
        }
        $this->pos_log_m->save(array("id_user" => $user->id, "time" => $data->time, "description" => $data->action, "room" => $room->id_room));
        if ($data->action == "ENTER") {
            $this->actual_in_room_m->save(array("id_user" => $user->id, "id_room" => $room->id_room));
        } else if ($data->action == "LEAVE") {
            $this->actual_in_room_m->delete($id_action->id_actual);
        }
        //$this->data['data'] = $data;
        //$this->load->view('api', $this->data);
    }

    public function get()
    {
        $this->db->join("rooms", "rooms.id_room = actual_in_room.id_room");
        $data = $this->actual_in_room_m->get();

        $rooms = $this->room_m->get();
        $datas = array();
        foreach ($rooms as $room) {
            $datas[$room->UUID] = 0;
        }
        foreach ($data as $r) {
            $datas[$r->UUID]++;
        }

        echo(json_encode($datas));
    }

    public function hour_stat()
    {
        $this->db->group_by("id_user");
        $this->db->group_by("room");
        $data = $this->pos_log_m->get();
        $room_state = array();
        foreach ($data as $current) {
            var_dump($current);
            if (!isset($room_state[$current->room])) {
                $room_state[$current->room] = 0;
            }
            if ($current->description == "ENTER") {
                $room_state[$current->room]++;
            }
            if ($current->description == "LEAVE") {
                $room_state[$current->room]--;
            }
        }

        foreach ($room_state as $key => $current) {
            $this->counted_in_room_m->save(array("id_room" => $key, "state" => $current, "hour" => date("H")));
        }


    }

    public function day_clean_up()
    {
        $this->db->empty_table("pos_log");
    }
}