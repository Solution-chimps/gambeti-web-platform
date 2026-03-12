<?php
require"scripts/conecta.php";

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
		<link rel="canonical" href="https://gambeti.com.br/principais-servicos">

    <meta name="description" content="<?=$descricao?>">
    <meta name="keywords" content="<?=$palavraschaves?>">
<link rel="shortcut icon" href="/default/favicon.ico"/>
<link rel="icon" href="/default/favicon.ico" />
<title>Principais serviços em Segurança do Trabalho</title>
</head>
<body>

	<?php
		$paginaatual="seo";
		require("includes/topo.php");
	?>	

	
	
<div id="caixabranca">
	<div class="conteudo">

		<div class="coluna100">
			<h1>Principais Serviços</h1>
			<p>Oferecemos os principais <strong>serviços em Segurança do Trabalho</strong>, confira abaixo a lista completa organizada por cidades. Você também pode fazer uma busca na caixa acima.</p>
			
			
			
			
		
		<ul>
<?php
	$sql = "SELECT * FROM textosseo ORDER BY servico, cidade";
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
			
			echo "<li><a href='/principais-servicos/$cidadeurlx/$servicourlx'>$titulo</a></li>";
		
	}
	
?>
		
		 </ul>
		
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
<style>
	li{
		font: normal 15px gt;
		line-height: 22px;
	}
	li a{
		color: #191919;
		
	}
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
