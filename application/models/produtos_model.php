<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos_model extends CI_Model {

		function __construct(){

			parent::__construct();
			$this->load->helper('url');
		}

		function getProducts(){

			$query = $this->db->query("SELECT * FROM produtos");

            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return NULL;
            }
		}

		function getProduct($id){

			$query = $this->db->query("SELECT * FROM produtos WHERE id=$id");

			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return NULL;
			}
		}
        
        function searchProduct($query){
            
            $query = $this->db->query("SELECT * FROM produtos WHERE nome_produto LIKE '%$query%'");

            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return NULL;
            }
		}
		
		function dropProduct($id) {
            
            $query = $this->db->query("DELETE FROM produtos WHERE id='$id'");	
				
		}

		function updateProduct($id, $nome_produto, $preco_produto, $estoque_produto) {		
            
			$query = $this->db->query("UPDATE produtos SET nome_produto='$nome_produto', 
			preco='$preco_produto', estoque='$estoque_produto' WHERE id='$id'");
			
            redirect('Produtos', 'location');
			
		}

		function setProducts($nome_produto, $preco_produto, $estoque_produto){

            $query = $this->db->query("INSERT INTO produtos (nome_produto,preco, estoque) 
			VALUES ('$nome_produto', '$preco_produto', '$estoque_produto')");

			redirect('Produtos', 'location');
		}
	}
?>