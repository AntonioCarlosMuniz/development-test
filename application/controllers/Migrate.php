<?php

class Migrate extends CI_Controller {
        
        public function __construct(){
            parent::__construct();
            $this->load->library('migration');
        }

        public function index(){
            if ($this->migration->current() === FALSE){
                show_error($this->migration->error_string());
            } else {
                echo 'Migration concluída com sucesso!';
                
                echo anchor('Welcome', '<button>Retornar a página inicial</button>', 'class="link-class"');
            }
        }

}
?>