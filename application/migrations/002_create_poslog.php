<?php

class Migration_Create_poslog extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_poslog' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'id_user' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'time' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'direction' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'room' => array(
                'type' => 'INT',
                'constraint' => 11
            )

        ));

        $this->dbforge->add_key('id_poslog', TRUE);
        $this->dbforge->create_table('pos_log');
    }

    public function down()
    {
        $this->dbforge->drop_table('pos_log');
    }
}
