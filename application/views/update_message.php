<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title ?></title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
		line-height: 30px;
	}

	</style>
</head>

<body>
<div id="container">
	<h1>Alterar produto 
		<?php foreach ($produto_data as $value) {
			echo $value->nome_produto;
		}
		?> 
	</h1>

	<div id="body">
		<?php foreach ($produto_data as $value) { ?> 
			<form action="" method="post">

			<table>
				<tr> 
					<td> <label>Nome do produto:</label> </td> 
					<td> <input name="nome_produto" type="textfield" value="<?php echo $value->nome_produto; ?>"> </td> 
				</tr>
				<tr> 
					<td> <label>Preço:</label> </td> 
					<td> <input name="preco_produto" type="textfield" value="<?php echo $value->preco; ?>"> </td> 
				</tr>
				<tr> 
					<td> <label>Quantidade no estoque:</label> </td>
					<td> <input name="estoque_produto" type="textfield" value="<?php echo $value->estoque; ?>"> </td> 
				</tr>
				
			</table>
			<input type="submit" value="Alterar produto">
				
			</form>
		<?php } ?>
	</div>

	<p class="footer">&nbsp;</p>
</div>

</body>
</html>