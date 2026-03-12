<?php
require"scripts/conecta.php";
	$cidadeurl=$_GET["cidade"];
	$servicourl=$_GET["servico"];
			$cidadeurl=addslashes($cidadeurl);
			$servicourl=addslashes($servicourl);

	$sql = "SELECT * FROM textosseo WHERE urlcidade='$cidadeurl' AND urlservico='$servicourl'";
	$query = $mysqli->query($sql);
	if($dados = $query->fetch_array()) {
		$id=$dados['id'];
		$servico=$dados['servico'];
		$cidade=$dados['cidade']; 
		$palavraschaves=$dados['palavraschaves']; 
		$descricao=$dados['descricao']; 
		$titulo=$dados['titulo'];
		$texto=$dados['texto'];
	
			$servico=utf8_encode($servico);
			$cidade=utf8_encode($cidade);
			$palavraschaves=utf8_encode($palavraschaves);
			$descricao=utf8_encode($descricao);
			$titulo=utf8_encode($titulo);
			$texto=utf8_encode($texto);
			//$texto=str_replace("\n","<br>",$texto);
		
	}
	else{
		$texto="<h1>Podemos te ajudar?</h1><p>Procurando por $servicourl em $cidadeurl?<br>Deixe seus dados abaixo, que te chamamos.</p>";
	}
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
	<link rel="canonical" href="https://gambeti.com.br/principais-servicos/<?=$cidadeurl?>/<?=$servicourl?>">
    <meta name="description" content="<?=$descricao?>">
    <meta name="keywords" content="<?=$palavraschaves?>">
<link rel="shortcut icon" href="/default/favicon.ico"/>
<link rel="icon" href="/default/favicon.ico" />
<title><?=$titulo?></title>
</head>
<body>

	<?php
		$paginaatual="seo";
		require("includes/topo.php");
	?>	

	
	
<div id="caixabranca">
	<div class="conteudo">

		<div class="coluna100">
			<?=$texto?>
			<img src="/imagens-servicos/seguranca-do-trabalho.webp" alt="<?=$titulo?>" title="<?=$titulo?>" width="100%">
			
			
<div class="tituloform">
	Para solicitar um orçamento de forma rápida, deixe seus dados abaixo.
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
			
			
		</div>
		<h3>Oferecemos <strong><?=$servico?></strong> também em outras cidades:</h3>
		<p>
<?php
	$sql = "SELECT * FROM textosseo WHERE urlservico='$servicourl'";
	$query = $mysqli->query($sql);
	while($dados = $query->fetch_array()) {
		$id=$dados['id'];
		$servico=$dados['servico'];
		$servicourlx=$dados['urlservico']; 
		$cidade=$dados['cidade']; 
		$cidadeurlx=$dados['urlcidade']; 
		$palavraschaves=$dados['palavraschaves']; 
		$descricao=$dados['descricao']; 
		$titulo=$dados['titulo'];
		$texto=$dados['texto'];
	
			$servico=utf8_encode($servico);
			$cidade=utf8_encode($cidade);
			$palavraschaves=utf8_encode($palavraschaves);
			$descricao=utf8_encode($descricao);
			$titulo=utf8_encode($titulo);
			$texto=utf8_encode($texto);
			//$texto=str_replace("\n","<br>",$texto);
			
			echo "<a href='/principais-servicos/$cidadeurlx/$servicourlx'>$titulo</a>, ";
		
	}
	
?>
		
		 </p>
		
		
	</div>
</div>
	<div class="conteudo"><h4>Principais serviços</h4></div>
	<div class="conteudo areaoutrosservicos">
			
			<a href="/principais-servicos/sao-paulo/esocial">
			<div class="caixasoutrosservicos">
				<div class="imgoutrosservicos" style="background-image: url('/imagens-servicos/esocial.webp')"></div>
				<div class="titulooutrosservicos"><a href="/principais-servicos/sao-paulo/esocial">eSocial</a></div>
			</div>
			</a>
			<a href="/principais-servicos/sao-jose-do-rio-preto/inspecao-em-silo-de-armazenamento">
			<div class="caixasoutrosservicos">
				<div class="imgoutrosservicos" style="background-image: url('/imagens-servicos/inspecao-em-silo-de-armazenamento.webp')"></div>
				<div class="titulooutrosservicos"><a href="/principais-servicos/sao-jose-do-rio-preto/inspecao-em-silo-de-armazenamento">Inspeção em Silo de Armazenamento</a></div>
			</div>
			</a>
			<a href="/principais-servicos/sao-paulo/inspecao-em-vasos-de-pressao-nr13">
			<div class="caixasoutrosservicos">
				<div class="imgoutrosservicos" style="background-image: url('/imagens-servicos/inspecao-nr13-vasos-de-pressao.webp')"></div>
				<div class="titulooutrosservicos"><a href="/principais-servicos/sao-paulo/inspecao-em-vasos-de-pressao-nr13">Inspeção NR13<br>Vasos de Pressão</a></div>
			</div>
			</a>
			<a href="/principais-servicos/sao-jose-do-rio-preto/inspecao-de-caldeiras-nr13">
			<div class="caixasoutrosservicos">
				<div class="imgoutrosservicos" style="background-image: url('/imagens-servicos/inspecao-nr13-caldeiras.webp')"></div>
				<div class="titulooutrosservicos"><a href="/principais-servicos/sao-jose-do-rio-preto/inspecao-de-caldeiras-nr13">Inspeção NR13<br>Caldeiras</a></div>
			</div>
			</a>
			<a href="/principais-servicos/sao-paulo/laudo-eletrico">
			<div class="caixasoutrosservicos">
				<div class="imgoutrosservicos" style="background-image: url('/imagens-servicos/laudo-eletrico.webp')"></div>
				<div class="titulooutrosservicos"><a href="/principais-servicos/sao-paulo/laudo-eletrico">Laudo Elétrico</a></div>
			</div>
			</a>
			<a href="/principais-servicos/sao-paulo/laudo-spda">
			<div class="caixasoutrosservicos">
				<div class="imgoutrosservicos" style="background-image: url('/imagens-servicos/laudo-spda.webp')"></div>
				<div class="titulooutrosservicos"><a href="/principais-servicos/sao-paulo/laudo-spda">Laudo SPDA</a></div>
			</div>	
			</a>
		
		
		</div>
	
	

	<?php
		require("includes/rodape.php");
	?>	
	

	
	
<!-- estilos -->
<link rel="stylesheet" href="/estilos/padrao.css" />
<link rel="stylesheet" href="/estilos/estilo.css" />
<link rel="stylesheet" href="/estilos/fontes.css" />
<link rel="stylesheet" href="/css/style.css" media="screen" type="text/css" />
<style>
	.areaoutrosservicos{
        display:flex;
        align-items: center;
        justify-content: center;
        /*flex-direction: row | row-reverse | column | column-reverse;*/
        /* flex-wrap: nowrap | wrap | wrap-reverse;*/
        /*flex-flow: row nowrap | row wrap | column nowrap | column wrap;*/
        /*justify-content: flex-start | flex-end | center | space-between | space-around | space-evenly;*/
        /*align-items: stretch | flex-start | flex-end | center | baseline;*/
		align-items: flex-start;
		justify-content: space-between;
		flex-wrap: wrap ;
	}
	.caixasoutrosservicos{
		background-color: #FFFFFF;
		border-radius:6px;
		width: 150px;
		margin-bottom: 20px;
		margin-top: 20px;
		
	}
	.imgoutrosservicos{
		width: 100%;
		height: 100px;
		background-color: #975C5D;
		border-radius:6px 6px 0px 0px;
		background-size: cover;
	}
	.titulooutrosservicos{
		width: 100%;
		height: 50px;
		background-color:#fff;
		display: flex;
		align-content: center;
		justify-content: center;
		text-align: center;
		flex-wrap: wrap;
		border-radius:0px 0px 6px 6px;
		font: normal 14px arial;
		color: #1E1E1E;
	}
	.titulooutrosservicos a{
		text-decoration: none;
		color: #1E1E1E;
	}
	p{
		font: normal 15px gt;
		line-height: 22px;
	}
	p a{
		color: #000;
	}
	h2{
		font: bold 22px 'Sawarabi Gothic', sans-serif;
    	color: #5a3b26;
   	 	margin: 0px;
    	margin-top: 10px;
	}
	h3{
		font: bold 16px 'Sawarabi Gothic', sans-serif;
    	color: #5a3b26;
   	 	margin: 0px;
    	margin-top: 10px;
	}	
	h4{
		font: bold 20px 'Sawarabi Gothic', sans-serif;
    	color: #5a3b26;
   	 	margin: 0px;
    	margin-top: 10px;
	}		
</style>
<!-- scripots -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--<script type="text/javascript" language="javascript" src="/scripts/jquery-1.9.1.js"></script>-->
<script src="/js/index.js"></script>


</body>
</html>
