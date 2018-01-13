<?php

class Migration_Create_users extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'firstname' => array(
                'type' => 'TEXT'
            ),
            'surname' => array(
                'type' => 'TEXT'
            ),
            'album' => array(
                'type' => 'TEXT'
            ),
            'phone' => array(
                'type' => 'TEXT'
            )
        ));

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}