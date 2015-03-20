<!DOCTYPE html>
<html>
	
	<header>
		<meta charset=”UTF-8”>
		<title>CRUD</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="js/bootstrap.js">
	</header>
	
	<body>
	
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="contato.php">Contato</a></li>
		</ol>
		
		<ol class="breadcrumb">
			<li class="active">Cadastrar novo usuario!</li>
		</ol>
		<form method="POST" action="conexao.php" class="form-inline">
			</label><input class="form-control" placeholder="Nome" type="text" name="nome" id="nome">
			</label><input class="form-control" placeholder="CPF" type="text" name="cpf" id="cpf">
			</label><input class="form-control" placeholder="Foto" type="file" name="foto" id="foto">
			<input class="btn btn-default" type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
			<input class="btn btn-default" type="reset" value="Limpar Dados" id="reset" name="reset">
		</form></br>
		
		<ol class="breadcrumb">
			<li class="active">Editar usuario!</li>
		</ol>
		<form method="POST" action="conexao.php" class="form-inline">
			</label><input class="form-control" placeholder="ID" type="text" name="id" id="id">
			</label><input class="form-control" placeholder="Nome" type="text" name="nome" id="nome">
			</label><input class="form-control" placeholder="CPF" type="text" name="cpf" id="cpf">
			</label><input class="form-control" placeholder="Foto" type="file" name="foto" id="foto">
			<input class="btn btn-default" type="submit" value="Editar" id="editar" name="editar">
			<input class="btn btn-default" type="reset" value="Limpar Dados" id="reset" name="reset">
		</form></br>
		
		<ol class="breadcrumb">
			<li class="active">Apagar usuario!</li>
		</ol>
		<form method="POST" action="conexao.php" class="form-inline">
			</label><input class="form-control" placeholder="ID" type="text" name="id" id="id">
			<input class="btn btn-default" type="submit" value="Apagar" id="apagar" name="apagar">
		</form></br>
			<?php
				if(!@($conexao = pg_connect("host=localhost port=5432 dbname=pessoa user=postgres password=root")))
				{
				   print "Não foi possível estabelecer uma conexão com o banco de dados.";}
				else{
					 $query = "select id, nome, cpf from pessoa";
					 $result = pg_query($conexao, $query);

					/* Retonar um array associativo correspondente a cada linha da tabela */
				echo '<form action="vb.php" method="POST" class="form-inline">';
				echo '<table align="lefth" width=300px border="2"> 
				<tr> 
					<td align="center">ID</td>
					<td align="center">Nome</td> 
					<td align="center">CPF</td>
				</tr>';
				
				while ($consulta = pg_fetch_assoc($result)) 
				{
					echo "<tr>\n";
					echo "<td><input value=".$consulta['id']."></td>\n";
					echo "<td><input value=".$consulta['nome']."></td>\n";
					echo "<td><input value=".$consulta['cpf']."></td>\n";
				}
				echo "</table>\n";
				echo "</form>";
				
							
			pg_close($conexao);}
			?>
			
		</body></br>
		
		<footer>
			
			<ol class="breadcrumb">
			  <li class="active">Todos os direitor reservados para Eloir Terribille.</li>
			</ol>
			
		</footer>
		
</html>

		
		
		
