<?php

class Migration_Create_rooms extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_room' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'TEXT'
            ),
            'id_category' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
        ));

        $this->dbforge->add_key('id_room', TRUE);
        $this->dbforge->create_table('rooms');
    }

    public function down()
    {
        $this->dbforge->drop_table('rooms');
    }
}
