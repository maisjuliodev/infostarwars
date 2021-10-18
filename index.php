<!DOCTYPE html>
	<html lang="pt-br">
		<head>
			<meta charset="UTF-8">
			<title> Consumindo API no PHP com a função file_get_contents</title>
		</head>		
			<body>
				<hr>
			<h3>Teste de GET de star wars com wp rest api puxando algumas características:</h3>
			<br>
			<br>
			
			<?php
			$url ="https://swapi.dev/api/people/";
			$ch = curl_init($url);
			//curl_exec($ch);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
			$resultado = json_decode(curl_exec($ch));

			var_dump($resultado);

			//foreach ($resultado as $value) {
				//echo "<hr>";
				
				//echo $resultado;
				//var_dump($value);
				//echo "<br>";
			//}
			?>
			
			
			<h3>E agora, vamos listar algumas características dos atores de Star Wars</h3>
			<?php
				foreach ($resultado->results as $ator) {

				echo "<hr>";
				//var_dump($ator);
				echo "Nome: " . $ator->name . "<br>";
				echo "Cor do cabelo dos atores: " . $ator->hair_color . "<br>";
				echo "Altura em cm: " . $ator->height . "<br>";

				foreach ($ator->films as $filme) {
					echo "Filme: " . $filme . "<br>";
				}
			}

			?>
				</body>
		</html>	