<?php
	class Cron_model extends CI_Model {

		function __construct(){

			parent::__construct();
			$this->load->helper('url');
		}

		function randomProduto(){
            
            $res = $this->db->query("SELECT * FROM produtos");
            $row =  $res->num_rows();
            $offset = mt_rand(0, $row-1);

            $res = $this->db->query("SELECT * FROM produtos LIMIT $offset, 1");
            $row = $res->result();
            
            return $row;
		}
        
        function randomOrder($prod){
            
            foreach ($prod as $row) {
                $p_id = $row->id;
                $produto = $row->nome_produto;
                $valor_unit = $row->preco;
                $quantidade = $row->estoque;
                    
                $offset = mt_rand(1, $quantidade);

                $valor_total = ($valor_unit * $offset);
            }
            
            
            $query = $this->db->query("insert into encomenda (P_Id, produto, quant, valor_unit, valor_total) 
            valores ($p_id, '$produto', $offset, $valor_unit, $valor_total)");
        }
        
        function getOrders(){
            
            $query = $this->db->query("SELECT * FROM encomendas");
            
            return $query->result();
		}
	}
?>