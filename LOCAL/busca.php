<?php
require"scripts/conecta.php";
require"scripts/funcoes.php";


	$palavra=$_GET["palavra"];
		$partes = explode("/", $palavra);
		$palavra=$partes[0];
	
	setcookie("palavrabusca", $palavra, time()+86400, "/");
	$palavra=trataget($palavra);
			$palavrabuscar=utf8_decode($palavra);



?>
<?php
	require"includes/pop.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="url" content="www.gambeti.com.br" />
<meta name="autor" content="Piovezam Soluções Web" />
<meta name="company" content="Piovezam Soluções Web" />
<meta name="revisit-after" content="1" />
<link rev="made" href="mailto:contato@piovezam.com" />
<meta http-equiv="Content-Language" content="pt-br" />
<meta name="rating" content="General" />
<meta name="robots" content="All" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="seguranca do trabalho, inspecoes, laudos, treinamentos, nrs, normas regulamentadoras, cipa, sipat"/>
<meta name="description" content="Somos uma Empresa que realiza Treinamentos, Laudos, Inspeções e Pericias, na área de Engenharia de Segurança do Trabalho, inspirando confiança nos clientes e compradores. Nós garantimos que a qualidade e desempenho do seu Equipamento, Unidade Fabril ou estabelecimento cumpra os requisitos cabíveis, sejam estes normativos e regulatórios, voluntários ou em consideração às especificações de um cliente." />
<link rel="shortcut icon" href="/default/favicon.ico"/>
<link rel="icon" href="/default/favicon.ico" />

	
<title>Resultados por: <?=$palavra?></title>
</head>
<body>

	<?php
		$paginaatual="busca";
		require("includes/topo.php");
	?>	

	
	
<div id="caixabranca">
	<div class="conteudo">

		<br>

<?php

if ((strpos($palavra, 'online') !== false) || (strpos($palavra, 'ead') !== false) || (strpos($palavra, 'e-learning') !== false) || (strpos($palavra, 'distancia') !== false) || (strpos($palavra, 'distância') !== false)  ){

echo"
	<p class=\"textoresultadosbusca\">
	<a href=\"https://ead.gambeti.com.br/\" target=\"_blank\" style=\"text-transform:uppercase\"><strong>• CURSOS ONLINE</strong></a><br>
	<a href=\"https://ead.gambeti.com.br/\" target=\"_blank\">Confira nossa lista de cursos EAD e comece um hoje mesmo. Clique aqui e confira a lista completa de soluções para seu treinamento online.</a><br><br>
	<a href=\"https://ead.gambeti.com.br/\" target=\"_blank\" style=\"float:right\">••• SAIBA MAIS</a><br><br>
	<hr width=\"90%\">
	<br>
	</p>
	";
	
}

	$iniciopagina=$_GET["ip"];
		$iniciopagina=addslashes($iniciopagina);
		if(is_numeric($iniciopagina)){
		}
		else{
				$iniciopagina=0;
		}	
	$contador=0;
	$inicio=$_GET["ip"];
		$inicio=addslashes($inicio);
		if(is_numeric($inicio)){
		}
		else{
				$inicio=0;
		}		
		$inicio=addslashes($inicio);
	$qpp=9;	
	if(($inicio=="")||($inicio=="Valor não recebido")||($inicio=="-")){
		$inicio="0";
	}	
	$contadorimovel=0;
	
// Executa uma consulta que pega cinco notícias
$sql = "SELECT * FROM textos WHERE titulo REGEXP '$palavrabuscar' OR texto REGEXP '$palavrabuscar' ORDER BY visualizacao DESC, titulo ASC";
$query = $mysqli->query($sql);
while ($dados = $query->fetch_array()) {
	$titulo=$dados['titulo'];
	$texto=$dados['texto']; 
	$linhafina=$dados['linhafina']; 
	$url=$dados['url']; 
	$tipo=$dados['tipo']; 
		$titulo=utf8_encode($titulo);
		$texto=utf8_encode($texto);
		$linhafina=utf8_encode($linhafina);
		
			$tamanhotitulo=strlen($titulo);
			if($tamanhotitulo>=40){
				$titulo_mostrar=substr($titulo,0,40);
					$titulo_mostrar=$titulo_mostrar."...";
			}
			else{
				$titulo_mostrar=$titulo;
			}
		
			$tamanholinhafina=strlen($linhafina);
			if($tamanholinhafina>=150){
				$linhafina_mostrar=substr($linhafina,0,150);
					$linhafina_mostrar=$linhafina_mostrar."...";
			}
			else{
				$linhafina_mostrar=$linhafina;
			}
			
echo"
<p class=\"textoresultadosbusca\" style=\"width:90%;\">
<a href=\"/$tipo/$url\" style=\"text-transform:uppercase\"><strong>• $titulo</strong></a><br>
<a href=\"/$tipo/$url\">$linhafina</a><br><br>
<a href=\"/$tipo/$url\" style=\"float:right\">••• SAIBA MAIS</a><br><br>
<hr width=\"90%\">
<br>
</p>
";
	$contadorimovel++;

}

if($contadorimovel==0){
	echo"Nenhum nessa tela...";
}


?>		
		
		
	</div>
</div>	
	
	

	<?php
		require("includes/rodape.php");
	?>	
	

	
	
<!-- estilos -->
<link rel="stylesheet" href="/estilos/padrao.css" />
<link rel="stylesheet" href="/estilos/estilo.css" />
<link rel="stylesheet" href="/estilos/fontes.css" />
<link rel="stylesheet" href="/css/style.css" media="screen" type="text/css" />
<!-- scripots -->
<script type="text/javascript" language="javascript" src="/scripts/jquery-1.9.1.js"></script>
<script src="/js/index.js"></script>
<!-- ------------------------------------------EFEITO ANIMAÇÃO--------------------------------------- -->
<link href="/scripts/aos-master/dist/aos.css" rel="stylesheet">
<script src="/scripts/aos-master/dist/aos.js"></script>
<script>AOS.init();</script>


</body>
</html>
