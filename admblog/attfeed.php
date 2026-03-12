

<?php
$feed="<?xml version=\"1.0\"?> 
<rss version=\"2.0\"> 
<channel> 


<title>Piovezam Soluções Web</title>
<link>https://www.piovezam.com</link>
<description>Acompanhe as novidades do nosso blog.</description>

";
	$datahoje=date('Y-m-d');	
	$consulta= "SELECT *FROM noticias WHERE data<='$datahoje' ORDER BY data DESC, id DESC LIMIT 0,150";
	$resultado = mysql_query($consulta) or die("Falha na execução da consulta. Erro: ".mysql_error());
	while($linha=mysql_fetch_assoc($resultado))
	{
		$idNoticia=$linha["id"];					
		$dataNoticia=$linha["data"];
			$mesartigo=pegaMes($dataNoticia);
			$anoartigo=pegaAno($dataNoticia);			
		$tituloNoticia=$linha["titulo"];
			$tituloNoticia=substr($tituloNoticia,0,65);											
		$linhaFinaNoticia=$linha["linhafina"];		
			$tituloNoticia=str_replace("&#34","",$tituloNoticia);											
			$tituloNoticia=str_replace("'","",$tituloNoticia);															
			$tituloNoticia=str_replace("\"","",$tituloNoticia);			
			$tituloNoticia=str_replace("&","",$tituloNoticia);							
						
			$linhaFinaNoticia=str_replace("&#34","",$linhaFinaNoticia);									
			$linhaFinaNoticia=str_replace("'","",$linhaFinaNoticia);															
			$linhaFinaNoticia=str_replace("\"","",$linhaFinaNoticia);	
			$linhaFinaNoticia=str_replace("&","",$linhaFinaNoticia);				

		$urlamigavel=$linha["urlamigavel"];				
			

								
	$feed.="
<item>
<title>$tituloNoticia</title>
<link>https://www.piovezam.com/blog/$anoartigo/$mesartigo/$urlamigavel.html</link>
<description>$linhaFinaNoticia</description>
</item>	
	";
	}

$feed.="
</channel>
</rss>
";
		//cria o txt do texto
		$fp = fopen("../../feed.xml" , "w");
		fwrite($fp, $feed);		
?>