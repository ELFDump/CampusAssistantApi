<?php
/**
 * Created by PhpStorm.
 * User: iks
 * Date: 13/01/18
 * Time: 20:02
 */

class Counted_in_room_m extends MY_Model
{
    protected $_table_name = 'counted_in_room';
    protected $_order_by = 'id_actual';

    function __construct()
    {
        parent::__construct();
    }
}