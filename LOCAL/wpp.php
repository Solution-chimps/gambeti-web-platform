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
<body onLoad="setTimeout('chamar()',3000);">

<?php
	$numero=$_GET["numero"];
	$texto=$_GET["texto"];	
	
		if($numero==""){$numero="5511997742018";}
		if($numero=="Sergio"){$numero="5511998907358";}
		if($numero=="Erika"){$numero="5511992376926";}
		
		if($texto==""){$texto="Olá, estou no site, pode me ajudar?";}
		if($texto=="AnuncioFace"){$texto="Oi, vi seu anúncio, quero saber mais. Pode me ajudar?";}
?>
<script>
function chamar(){
	window.location='https://wa.me/<?=$numero?>?text=<?=$texto?>';
}


</script><br>

<p align="center" style="font:normal 14px Arial, Helvetica, sans-serif">
Olá, vamos conversar pelo Whats?<br>
Basta clicar no botão abaixo e já te redireciono :)<br>
<br>
<a href="#" onClick="chamar()"><img src="/default/btwhats.png" border="0" alt="Clique para chamar no Whats"></a>
</p>

	
</body>
</html>
