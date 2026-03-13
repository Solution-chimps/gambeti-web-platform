        
        <?php
		require"../../scripts/conecta.php";
		$idnot=$_GET["idnot"];
		
	$consulta= "SELECT *FROM tags ORDER BY nome ASC";
	$resultado = $mysqli->query($consulta) or die("<br />Falha na execução da consulta 2. Erro: " . $mysqli_error);	while ($linha = $resultado->fetch_assoc())
	{
		$idtag=$linha["id"];
		$nometag=$linha["nome"];

	$consultaxx= "SELECT *FROM tagiadoprog WHERE idtag='$idtag' AND idnot='$idnot'";
	$resultadoxx = mysql_query($consultaxx) or die("<br />Falha na execução da consulta 2. Erro: ".mysql_error());
	if($linha=mysql_fetch_assoc($resultadoxx)){
		echo"<input id=\"$idtag\" type=\"checkbox\" checked=\"checked\" name=\"tagsx[]\" value=\"$idtag\" class=\"campotags\"><label for=\"$idtag\" class=\"arealabel\">$nometag</label>";		
	}
	else{
		echo"<input id=\"$idtag\" type=\"checkbox\" name=\"tagsx[]\" value=\"$idtag\" class=\"campotags\"><label for=\"$idtag\" class=\"arealabel\">$nometag</label>";		
	}
		

	}
	
		?>