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

	
<title>Fale com a Gambeti Engenharia e Seguança do Trabalho</title>
</head>
<body>

	<?php
		$paginaatual="contato";
		require("includes/topo.php");
	?>	

	
	
<div id="caixabranca">
	<div class="conteudo">

		<div class="coluna75">
<?php
    $urlatual= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>			
			<p class="textopadrao"><br>Preencha o formulário abaixo para enviar sua<br>mensagem ou use os dados ao lado.<br><br></p>
			<form action="/solicitarligacao5" method="post">
				<input type="text" name="nome" id="nome" class="configcampoformligacao3" placeholder="Preencha com seu nome">
				<input type="text" name="email" id="email" class="configcampoformligacao3" placeholder="Preencha com seu email">
				<input type="text" name="telefone" id="telefone" class="configcampoformligacao3" placeholder="Preencha com seu telefone/whatsapp">
				<input type="text" name="empresa" id="empresa" class="configcampoformligacao3" placeholder="Preencha com o nome da sua empresa">
				<textarea name="mensagem" id="mensagem" class="configcampomensagem3" placeholder="Se desejar envie mais informações sobre sua solicitação"></textarea>
				<input type="hidden" name="pagina" id="pagina" value="<?=$urlatual?>">				
				<input type="submit" class="btformligacao3" value="Enviar e receber um orçamento">
			</form>
			
			
		</div>
		<div class="coluna25">
<p class="textopadrao" align="right">
	<br>

<strong>CONTATOS</strong><br><br>
(11) 9.9774-2018<br>
comercial@gambeti.com.br<br>
<br>
<strong>ATENDIMENTO</strong><br><br>
Segunda a Sexta<br>
das 08h às 18h<br>
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
