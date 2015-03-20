
		<?php
				$conexao = pg_connect("host=localhost port=5432 dbname=pessoa user=postgres password=root")
							or die ("<script>window.location='index.php';alert('Erro ao Conectar com o Banco de Dados!');</script>");
				$query = "select id, nome, cpf from pessoa";
				$result = pg_query($conexao, $query);
				
				$id  = $_POST['id'];
				$nome= $_POST['nome'];
				$cpf = $_POST['cpf'];

				function get_post_action($name)
				{
					$params = func_get_args();

					foreach ($params as $name) {
						if (isset($_POST[$name])) {
							return $name;
						}
					}
				}
				switch (get_post_action('cadastrar', 'editar', 'apagar')) {
				case 'cadastrar':
					//grava os dados no banco
					$inserir = pg_query("INSERT INTO pessoa (nome, cpf) VALUES ('$nome', '$cpf')");
					if($inserir==''){
						echo "<script>window.location='index.php';alert('Erro ao enviar os Dados!');</script>";
					}else {
							echo "<script>window.location='index.php';alert('$nome, Dados enviados com sucesso!');</script>";
						}
					break;

				case 'editar':
					// Constrói a consulta SQL
					$conexao = "UPDATE pessoa set "; 
					$conexao = $conexao . "nome= '$nome', "; 
					$conexao = $conexao . "cpf= '$cpf' "; 

					$conexao = $conexao . "Where id = $id"; 

					// Executa a consulta 
					pg_query($conexao);
					if($conexao==''){
						echo "<script>window.location='index.php';alert('Erro ao editar os Dados!');</script>";
					}else {
							echo "<script>window.location='index.php';alert('$nome, Dados editados com sucesso!');</script>";
						}
					break;

				case 'apagar':
					//seleciona o id e o apaga
					$dl = "DELETE FROM pessoa WHERE id = $id";
					pg_query($dl);
					
					if($id==''){
						echo "<script>window.location='index.php';alert('Erro ao apagar os Dados!');</script>";
					}else{	
						echo "<script>window.location='index.php';alert('Dados apagados com sucesso!');</script>";
					}
					break;

				default:
					echo "<script>window.location='index.php';alert('Botao desconecido!');</script>";
				}
				
				// Encerra a conexão
				pg_close();
		?>
