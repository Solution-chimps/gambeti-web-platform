        
        <?php
		require"../../scripts/conecta.php";
	$consulta= "SELECT *FROM tags ORDER BY nome ASC";
	$resultado = $mysqli->query($consulta) or die("<br />Falha na execução da consulta 2. Erro: " . $mysqli_error);	while ($linha = $resultado->fetch_assoc())
	{
		$idtag=$linha["id"];
		$nometag=$linha["nome"];
		
		echo"<input type=\"checkbox\" name=\"tagsx[]\" id=\"$idtag\" value=\"$idtag\" class=\"campotags\"><label for=\"$idtag\" class=\"arealabel\"> $nometag</label>";
	}
		?>