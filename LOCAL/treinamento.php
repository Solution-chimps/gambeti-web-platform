<?php
require"scripts/conecta.php";
	$url=$_GET["url"];
	$tipo=$_GET["tipo"];
			$url=addslashes($url);
			$tipo=addslashes($tipo);

	$sql = "SELECT * FROM textos WHERE url='$url' AND tipo='$tipo'";
	$query = $mysqli->query($sql);
	if($dados = $query->fetch_array()) {
		$id=$dados['id'];
		$titulo=$dados['titulo'];
		$texto=$dados['texto']; 
		$linhafina=$dados['linhafina']; 
		$url=$dados['url']; 
		$visualizacao=$dados['visualizacao'];
			$texto=str_replace("–","",$texto); 
		
			$titulo=utf8_encode($titulo);
			$texto=utf8_encode($texto);
			$linhafina=utf8_encode($linhafina);
				$texto=str_replace("\n","<br>",$texto);
				
				$novavisualizacao=$visualizacao+1;
	}
	
	$sql = "UPDATE textos SET visualizacao='$novavisualizacao' WHERE id='$id'";
	$query = $mysqli->query($sql);
	if($query==true){}
	else{}
	
	
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

	
<title><?=$titulo?></title>
</head>
<body>

	<?php
		$paginaatual="treinamentos";
		require("includes/topo.php");
	?>	

	
	
<div id="caixabranca">
	<div class="conteudo">
		<div class="coluna100">
			<h1>
				<?=$titulo?>
			</h1>			
		</div>
		<div class="coluna25" id="areanrs">
<?php

require"scripts/conecta.php";
$ultimanr="";
					echo"<div class=\"bts\"><a href=\"/treinamentos\">TODAS</a></div>";

// Executa uma consulta que pega cinco notícias
$sql = "SELECT * FROM textos WHERE tipo='treinamento' ORDER BY nr";
$query = $mysqli->query($sql);
while ($dados = $query->fetch_array()) {
	$nr_bd=$dados['nr'];
		if($ultimanr==$nr_bd){
		}
		else{
			$ultimanr=$nr_bd;
			
				if($nr_bd==$nr){
					echo"<div class=\"bts btsativo\"><a href=\"/treinamentos-por-nr/$nr_bd\">$nr_bd</a></div>";
					
				}
				else{
					echo"<div class=\"bts\"><a href=\"/treinamentos-por-nr/$nr_bd\">$nr_bd</a></div>";
				}
			
			
		}
}
			
?>
		</div>
		<div class="coluna75">
			<p class="textopadrao">
<?=$texto?>
<br>
<br>
<div class="tituloform">
	Para solicitar um orçamento de <?=$titulo?> de forma rápida, deixe seus dados abaixo.
</div>
<?php
    $urlatual= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<form action="/solicitarligacao" method="post">
	<input type="text" name="nome" id="nome" class="configcampoformligacao" placeholder="Preencha com seu nome">
	<input type="text" name="email" id="email" class="configcampoformligacao" placeholder="Preencha com seu email">
	<input type="text" name="telefone" id="telefone" class="configcampoformligacao" placeholder="Preencha com seu telefone/whatsapp">
	<input type="text" name="empresa" id="empresa" class="configcampoformligacao" placeholder="Preencha com o nome da sua empresa">
	<textarea name="mensagem" id="mensagem" class="configcampomensagem" placeholder="Se desejar envie mais informações sobre sua solicitação"></textarea>
	<input type="hidden" name="pagina" id="pagina" value="<?=$urlatual?>">
	<input type="submit" class="btformligacao" value="Enviar e receber um orçamento">
</form>
			</p>
		</div>
		
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
