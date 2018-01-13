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

        $sql = "CREATE TABLE IF NOT EXISTS `categories` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pos_log`
--

CREATE TABLE IF NOT EXISTS `pos_log` (
  `id_pos_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `description` text COLLATE utf8_polish_ci NOT NULL,
  `room` int(11) NOT NULL,
  PRIMARY KEY (`id_pos_log`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id_room` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id_room`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UUID` text COLLATE utf8_polish_ci NOT NULL,
  `nickname` text COLLATE utf8_polish_ci NOT NULL,
  `description` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;
";

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
            $this->data['output'] = show_error($this->migration->error_string());
        } else {
            $this->data['output'] = "Pomyślnie dokonano migracji!";
        }
        $this->load->view('api', $this->data);
    }
}