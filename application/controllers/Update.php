<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {

	public function index($id) {
		if ($id !== NULL) {
			$this->home($id);
		} else {
			echo "Produto não encontrado.";
		}
	}

	public function home($id) {
		$this->load->model('produtos_model');

		$data['title'] = "Teste Xtech Antonio Carlos";
		$data['page_header'] = 'Alterar produto';

		$data['produto_data'] = $this->produtos_model->getProduto($id);

		$this->load->view("update_message", $data);
        
        $this->updateProduct($id);
	}
    
    public function updateProduct($id){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome_produto = $this->input->post('nome_produto');
            $preco_produto = $this->input->post('preco_produto');
            $estoque_produto = $this->input->post('estoque_produto');
            
            $this->produtos_model->updateProduct($id, $nome_produto, $preco_produto, $estoque_produto);
        }
    }
}
