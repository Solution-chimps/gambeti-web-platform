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

	
<title>Inspeções em Segurança do Trabalho</title>
</head>
<body onLoad="fechartodas();">

	<?php
		$paginaatual="inspecoes";
		require("includes/topo.php");
	?>	

	
	
<div id="caixabranca">
	<div class="conteudo">
		<div class="coluna100">
			<p class="textopadrao">
				<br>
As Inspeções de Segurança são extremamente importantes, sejam elas períodicas, eventuais, oficiais, especiais, gerais, parciais e de rotina são procedimentos com o objetivo de avaliar e investigar determinados serviços, produtos ou ambientes para poder detectar possíveis condições perigosas que possam causar acidentes de trabalho e doenças ocupacionais.

Suas inspeções devem estar sempre em dia, lembre-se segurança vem em primeiro lugar, confira as opções que a Gambeti oferece, basta clicar no menu abaixo para saber mais sobre alguma delas.			</p>			
		</div>
		


<?php
require"scripts/conecta.php";

	
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
	$qpp=50;	
	if(($inicio=="")||($inicio=="Valor não recebido")||($inicio=="-")){
		$inicio="0";
	}	
	$contadorimovel=0;
	
// Executa uma consulta que pega cinco notícias
//$sql = "SELECT * FROM textos WHERE tipo='inspecao' ORDER BY titulo LIMIT $inicio,$qpp";
$sql = "SELECT * FROM textos WHERE tipo='inspecao' ORDER BY ordem";
$query = $mysqli->query($sql);
while ($dados = $query->fetch_array()) {
	$idtexto=$dados['id'];
	$titulo=$dados['titulo'];
	$textoinsp=$dados['texto']; 
	$linhafina=$dados['linhafina']; 
	$url=$dados['url']; 
	$img=$dados['img']; 
		$titulo=utf8_encode($titulo);
		$textoinsp=utf8_encode($textoinsp);
		$linhafina=utf8_encode($linhafina);
		
		$textoinsp=str_replace("\n","<br>",$textoinsp);
		
		
if($iddoprimeiro==""){
	$iddoprimeiro=$idtexto;
	$primeiraurl=$url;
}
			$tamanhotitulo=strlen($titulo);
			if($tamanhotitulo>=450){
				$titulo_mostrar=substr($titulo,0,450);
					$titulo_mostrar=$titulo_mostrar."...";
			}
			else{
				$titulo_mostrar=$titulo;
			}
			$tamanholinhafina=strlen($linhafina);
			if($tamanholinhafina>=100){
				$linhafina_mostrar=substr($linhafina,0,100);
					$linhafina_mostrar=$linhafina_mostrar."...";
			}
			else{
				$linhafina_mostrar=$linhafina;
			}
/*
echo"
<div class=\"caixaitenspg\" onClick=\"window.location='/inspecao/$url';\">
	<div class=\"tituloitenspg\"><a href=\"/inspecao/$url\">$titulo_mostrar</a></div>
	<div class=\"descricaoitenspg\">$linhafina_mostrar</div>
	<div class=\"btitenspg\">••• SAIBA MAIS</div>
</div>          
";
*/

	/*
$areamenuinsp.="<div class=\"btmenulateralinspecoes\" id=\"btinspecao$idtexto\" onClick=\"abririnspecao('$idtexto', '$url')\">$titulo_mostrar</div>";
$areatextosinsp.="<div class=\"textosinspecoes\" id=\"textoinspecao$idtexto\"><h1>$titulo_mostrar</h1>$textoinsp<br><br><br><strong>Solicite um orçamento entrando em contato, ou clique no botão abaixo para preencher o formulário.</strong><br><br>
(11) 2581-2552<br>
(11) 9.9890-7358<br>
comercial@fortalezza.com.br<div class=\"btorcamento\" style=\"margin-left:0px;font-size:12px;\"><a href=\"/inspecao/$url\" style=\"color:#000\">SOLICITAR UM ORÇAMENTO PELO FORMULÁRIO</a></div><br><br><hr></div>";
	*/
    $urlatual= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

echo"
		<div class=\"caixainspecao caixasx\" id=\"caixa$contadorimovel\" onClick=\"abrircaixa('$contadorimovel')\">
			<div class=\"tituloinspecao titulosx\" id=\"titulo$contadorimovel\">$titulo</div>
			<div class=\"textoinspecao textosx\" id=\"texto$contadorimovel\"><br>$textoinsp<br><br>
<div class=\"tituloform\">
	Deixe seus dados abaixo para nossa equipe te chamar
</div>
<form action=\"/solicitarligacao2\" method=\"post\">
	<input type=\"text\" name=\"nome\" id=\"nome\" class=\"configcampoformligacao2\" placeholder=\"Preencha com seu nome\">
	<input type=\"text\" name=\"email\" id=\"email\" class=\"configcampoformligacao2\" placeholder=\"Preencha com seu email\">
	<input type=\"text\" name=\"telefone\" id=\"telefone\" class=\"configcampoformligacao2\" placeholder=\"Preencha com seu telefone/whatsapp\">
	<input type=\"hidden\" name=\"pagina\" id=\"pagina\" value=\"$urlatual\">	
	<input type=\"hidden\" name=\"servico\" id=\"servico\" value=\"$titulo\">	
	<div id=\"alinhadorbotao\"><input type=\"submit\" class=\"btformligacao2\" value=\"Enviar e receber um orçamento\"></div>
</form>				
			</div>
		</div>

";
	
$contadorimovel++;

}

if($contadorimovel==0){
	echo"Nenhum nessa tela...";
}


?>    		
		
		
<br><br><br>
		
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


<script>
	function abrircaixa(qual){
	
		fechartodas();	
		$("#caixa"+qual).removeClass("caixainspecaofechada");
		$("#caixa"+qual).addClass("caixainspecao");
		
		
		$("#texto"+qual).show();
		

		
	}
	function fechartodas(){
		$(".caixasx").removeClass("caixainspecao");
		$(".caixasx").addClass("caixainspecaofechada");
		$(".textosx").hide();
	}
</script>
	
</body>
</html>
