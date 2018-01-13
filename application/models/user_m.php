<?php

class User_m extends MY_Model
{
    public $rules = array(
        'login' => array(
            'field' => 'login',
            'label' => 'Login',
            'rules' => 'trim|required|xss_clean'
        ),
        'firstname' => array(
            'field' => 'firstname',
            'label' => 'Imię',
            'rules' => 'trim|required|xss_clean'
        ),
        'surname' => array(
            'field' => 'surname',
            'label' => 'Nazwisko',
            'rules' => 'trim|required|xss_clean'
        ),
        'phone' => array(
            'field' => 'phone',
            'label' => 'Telefon',
            'rules' => 'trim|required|xss_clean'
        ),

    );
    protected $_table_name = 'users';
    protected $_order_by = 'surname';

    function __construct()
    {
        parent::__construct();
    }
}