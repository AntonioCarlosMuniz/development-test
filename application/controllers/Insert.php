<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insert extends CI_Controller {

	public function index() {
		$this->home();
	}

	public function home() {
		$this->load->model('produtos_model');

		$data['title'] = "Teste Xtech Antonio Carlos";
		$data['page_header'] = 'Cadastrar produtos';

		$this->load->view("insert_message", $data);
        
        $this->insertProduct();
	}
    
    public function insertProduct(){
    	if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome_produto = $this->input->post('nome_produto');
            $preco_produto = $this->input->post('preco_produto');
            $estoque_produto = $this->input->post('estoque_produto');
            
            $this->produtos_model->setProdutos($nome_produto, $preco_produto, $estoque_produto);            
        }
    }
}
