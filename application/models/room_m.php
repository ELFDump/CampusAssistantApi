<?php

class Room_m extends MY_Model
{
    protected $_table_name = 'rooms';
    protected $_order_by = 'id_room';

    function __construct()
    {
        parent::__construct();
    }
}