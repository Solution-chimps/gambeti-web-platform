        
        <?php
		require"../../scripts/conecta.php";
	$consulta= "SELECT *FROM tags ORDER BY nome ASC";
	$resultado = mysql_query($consulta) or die("<br />Falha na execução da consulta 2. Erro: ".mysql_error());
	while($linha=mysql_fetch_assoc($resultado))
	{
		$idtag=$linha["id"];
		$nometag=$linha["nome"];
		
		echo"<input type=\"checkbox\" name=\"tagsx[]\" id=\"$idtag\" value=\"$idtag\" class=\"campotags\"><label for=\"$idtag\" class=\"arealabel\"> $nometag</label>";
	}
		?>