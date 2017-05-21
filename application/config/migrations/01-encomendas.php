<?php
    class Migration_Add_encomendas extends CI_Migration {
        
        public function up(){
            
            $this->dbforge->add_field(
                array(
                    'id' => array('type' => 'INT', 'constraint' => 6, 'auto_increment' => TRUE),
                    'P_Id' => array('type' => 'INT', 'constraint' => 6),
                    'produto' => array('type' => 'VARCHAR', 'constraint' => 255),
                    'quant' => array('type' => 'INT', 'constraint' => 6),
                    'value_unit' => array('type' => 'FLOAT'),
                    'value_total' => array('type' => 'FLOAT'),
                    'reg_date' => array('type' => 'TIMESTAMP')
                )
            );
            
            $this->dbforge->add_field('FOREIGN KEY (P_Id) REFERENCES produto(id)');
            
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('encomendas');
        }
        
        public function down(){
            $this->dbforge->drop_table('encomendas');
        }
    }
?>