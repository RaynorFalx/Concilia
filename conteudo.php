<html>
	<?php
		$data_aud=$_GET['data'];
		$id = $_GET['id'];
		$total= $_GET['total'];
		$horario = $_GET['horario'];
		$lotacao = $_GET['lotacao'];
		$sala = urlencode($_GET['sala']);
		$total_disponivel=$_GET['total_disponivel'];
		$entidade=$_GET['entidade'];
	?>    
	<body>
		<form>
			<?php echo "AAA $id"; ?>
			Nome: <input type="text" name="nome"><br/>
			E-mail: <input type="text" name="email"><br/>
			<button type="button" id="butEnviar">Enviar</button>
		</form>
		<br/><br/>
		<div id="saida"></div>
	
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

		<script>
			$(document).ready(function() {
			   //definir evento "onclick" do elemento (botao) ID butEnviar 
			   $("#butEnviar").click(function() {

				  //capturar o valor dos campos do fomulario
				  var nome  = $("input[name=nome]").val();
				  var email =  $("input[name=email]").val();

				  //usar o metodo ajax da biblioteca jquery para postar os dados em processar.php
					$.ajax
					({
					 "url": "processar.php",
					 "dataType": "html",
					 "data": 
						{
							"nome" : nome,
							"email":email 
						},
						"success": function(response) 
						{
						//em caso de sucesso, a div ID=saida recebe o response do post
						$("div#saida").html(response);
						}
					});
				});
			});
		</script>
	</body>
</html>



