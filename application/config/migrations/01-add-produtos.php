<?php
    class Migration_Add_produtos extends CI_Migration {
        
        public function up(){
            
            $this->dbforge->add_field(
                array(
                    'id' => array('type' => 'INT', 'constraint' => 6, 'auto_increment' => TRUE),
                    'nome_produto' => array('type' => 'VARCHAR', 'constraint' => 255),
                    'preco' => array('type' => 'FLOAT'),
                    'estoque' => array('type' => 'INT')
                )
            );
            
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('produtos');
        }
        
        public function down(){
            $this->dbforge->drop_table('produtos');
        }
    }
?>