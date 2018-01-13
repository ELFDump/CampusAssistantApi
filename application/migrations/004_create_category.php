<?php

class Migration_Create_category extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_category' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'TEXT'
            ),
        ));

        $this->dbforge->add_key('id_category', TRUE);
        $this->dbforge->create_table('category');
    }

    public function down()
    {
        $this->dbforge->drop_table('category');
    }
}
