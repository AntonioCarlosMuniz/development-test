<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function index() {
		$this->home();
        $this->drop();
		$this->load->helper("url");
	}

	public function home() {
		$this->load->model('produtos_model');

		$data['title'] = "Teste Xtech Antonio Carlos";
		$data['page_header'] = 'Tabela de produtos';
        $data['produto_data'] = $this->produtos_model->getProducts();
        
        if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET != NULL) {
            $query = $this->input->get('search');
            
            $data['produto_data'] = $this->produtos_model->searchProduto($query);
            
            if($data['produto_data'] == NULL) {
                $data['produto_data'] = $this->produtos_model->getProducts();
                
                echo "Produto não encontrado.";
            }
        }
        
        $this->load->view("mensagem_produto", $data);
	}
    
    public function drop(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id = $_POST['id'];
				
            if ($_POST['action'] == "Delete") {
                $this->produtos_model->dropProduct($id);
                    
                redirect('Produtos', 'refresh');
            } else {
            	$this->update($id);
            }
        }
    }

	public function update($id){				
        redirect("Update/index/$id");
    }
}
