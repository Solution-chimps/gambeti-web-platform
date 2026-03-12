<?php
	require"scripts/conecta.php";
	require"scripts/funcoes.php";		
?>
<?php
	$iniciopagina=$_GET["ip"];
		$iniciopagina=addslashes($iniciopagina);
		if(is_numeric($iniciopagina)){
		}
		else{
				$iniciopagina=0;
		}		

		
	$categoria=$_GET["cat"];
		$categoria=addslashes($categoria);
		
		
	
	//descubro as informacoes desssa tag
$sql = "SELECT *FROM tags WHERE urlamigavel = '$categoria'";
$query = $mysqli->query($sql);
while ($linha = $query->fetch_array()) {
		
		$idtag=$linha["id"];
		$nometag=$linha["nome"];
		$urltagz=$linha["urlamigavel"];				
		$idtagz=$linha["id"];		
	}
	if($nometag==""){
		$idtag=0;
		$urltagz=$categoria;				
		$nometag="Tag não encontrada";
		$idtagz=0;		
	}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="canonical" href="https://www.gambeti.com.br/<?=$endereco?>">

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

	
<title><?=$nometag?> - Blog da Gambeti</title>
</head>
<body>

	<?php
		$paginaatual="seo";
		require("includes/topo.php");
	?>	

	
	
<div id="caixabranca">
	<div class="conteudo">

		<div class="coluna75">
           <h1>Tag: <?=$nometag?></h1>
<?php


//carrego artigos
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
		$inicio=limparString($inicio);
	$qpp=5;	
	if(($inicio=="")||($inicio=="Valor não recebido")||($inicio=="-")){
		$inicio="0";
	}	
$contadornot="0";

//descubro quais noticias apresentam essa tag
$sql = "SELECT *FROM tagiado WHERE idtag='$idtag' ORDER BY idnot DESC LIMIT $inicio,$qpp";
$query = $mysqli->query($sql);
while ($linha = $query->fetch_array()) {
		
		


		$idnot=$linha["idnot"];
		$idtag=$linha["idtag"];		

//carrega as outras noticias

$sql = "SELECT *FROM noticias WHERE id='$idnot'";
$query = $mysqli->query($sql);
while ($linha = $query->fetch_array()) {
		
		
		$idnot=$linha["id"];
		$titulonot=$linha["titulo"];

			$tamanhotitulonot=strlen($titulonot);
			if($tamanhotitulonot>30){
				$titulonot=substr($titulonot,0,30);	
				$titulonot=$titulonot."...";					
			}	
		
		$linhafinanot=$linha["linhafina"];
			$linhafinanotp1=substr($linhafinanot,0,150);		
				$tamanholinhafinanot=strlen($linhafinanot);			
				if($tamanholinhafinanot>150){
					$linhafinanotp1=$linhafinanotp1."...";					
				}						
		$urlamigavelnot=$linha["urlamigavel"];
		$datanot=$linha["data"];
			$datanotformatada=formataData($datanot);		

			$mesartigo=pegaMes($datanot);
			$anoartigo=pegaAno($datanot);			

		$previewnot=$linha["preview"];	



	if($contadornot==0){
		echo"
        <div class=\"artigogrande\">
        	<div class=\"fotoartigogrande\" style=\"background-image:URL('/uploads/$previewnot');\" onClick=\"window.location='/blog/$anoartigo/$mesartigo/$urlamigavelnot.html'\" style=\"cursor:pointer;\"></div>
        	<div class=\"infoartigogrande\">

            	<p class=\"tituloartigo\"><a href=\"/blog/$anoartigo/$mesartigo/$urlamigavelnot.html\">$titulonot</a></p>
            	<p class=\"dataartigo\">$datanotformatada</p>
            	<p class=\"linhafinaartigo\">
$linhafinanotp1<br>
                </p>  
                                              
            </div>            
        </div>		
		";
	}
	else{
		echo"
        <div class=\"artigopequeno\">
        	<div class=\"fotoartigopequeno\" style=\"background-image:URL('/uploads/$previewnot');\" onClick=\"window.location='/blog/$anoartigo/$mesartigo/$urlamigavelnot.html'\" style=\"cursor:pointer;\"></div>
        	<div class=\"infoartigogrande\">

            	<p class=\"tituloartigo\"><a href=\"/blog/$anoartigo/$mesartigo/$urlamigavelnot.html\">$titulonot</a></p>
            	<p class=\"dataartigo\">$datanotformatada</p>
            	<p class=\"linhafinaartigo\">
$linhafinanotp1<br>
                </p>  
                                              
            </div>            
        </div>		
		";		
		
	}

	$contadornot++;	


	}




	}//fechamento leitor de tags.
	
if($contadornot==0){
	echo"<p class=\"textopadrao\">Nenhum resultado encontrado.</p>";
}
else{	

//prepara o rodape
	if(($inicio=="")||($inicio=="Valor não recebido")){
		$inicio="0";
	}

	$sql="SELECT COUNT(*) AS total FROM tagiado WHERE idtag='$idtagz'";
	$result = $mysqli->query($sql);
	$row = $result->fetch_row();
	$mostrarTotal=$row[0];	
	
	
$paginas=$mostrarTotal/$qpp;
$paginas=ceil($paginas);



$qualEstou=$_GET["ip"];
		$qualEstou=addslashes($qualEstou);
		if(is_numeric($qualEstou)){
		}
		else{
				$qualEstou=0;
		}	
$qualEstouValida=$_GET["ip"];
		$qualEstouValida=addslashes($qualEstouValida);
		if(is_numeric($qualEstouValida)){
		}
		else{
				$qualEstouValida=0;
		}	
if(($qualEstou=="")||($qualEstou=="0")){
	$qualEstou="1";	
}

$anterior=$qualEstou-$qpp;
$proxima=$qualEstou+$qpp;
//echo"$qualEstou";

$qttPaginasInicio=$qualEstou/$qpp-1;
$qttPaginasFim=$qualEstou/$qpp+3;

if($qttPaginasFim>=$paginas){
	$qttPaginasFim=$paginas;
}
if($qttPaginasInicio<="1"){
	$qttPaginasInicio=1;
}

$inicio=$qttPaginasInicio*$qpp-$qpp;

//echo"<a href='?i=$anterior' style='color:#000000'> << </a>";

//verifica total de anuncios na consulta solicitada

	$sql="SELECT COUNT(*) as Regs FROM tagiado WHERE idtag='$idtagz'";
	$result = $mysqli->query($sql);
	$row = $result->fetch_row();
	$totalAnunciosEsse=$row[0];	

//echo"<strong><br>Total:</strong> $totalAnunciosEsse</strong><br />";
echo"
<div class=\"coluna100\">
	<p class=\"paginacao\" align=\"center\">
";
echo"<a href='/tag/$urltagz/'> << </a> ";

//$paginas=$paginas;
for($c=$qttPaginasInicio;$c<=$qttPaginasFim;$c++)
{
	if($inicio==$qualEstouValida){
		echo"<b>[$c]</b> ";				
	}
	else{
		echo"<a href='/tag/$urltagz/$inicio'>$c</a> ";		
	}

$inicio=$inicio+$qpp;

}

//prepara chamada ultima pagina
$ultimaPagina=$mostrarTotal/$qpp;
$ultimaPagina=ceil($ultimaPagina);
$ultimaPagina=$ultimaPagina*$qpp;
$ultimaPagina=$ultimaPagina-$qpp;

echo"<a href='/tag/$urltagz/$ultimaPagina'> >> </a> ";

//echo"<a href='?i=$proxima' style='color:#000000'> >> </a>";
//echo"<br />Exibindo $qpp por página.<br /></font>";
   echo"
            </p>
        </div>   
   ";
	}
		
?>        
    	           

		</div>
		<div class="coluna25">



        
        
    	<div class="boxlateral">
	    	<p class="chamadacaixalateral">Outros temas</p>

<?php

//confiro total de tags


	$sql="SELECT COUNT(*) as Regs FROM noticias";
	$result = $mysqli->query($sql);
	$row = $result->fetch_row();
	$totaltagiados=$row[0];	


$mostrando=0;
   
//carrega tags
	

	
$sql = "SELECT *FROM tags ORDER BY nome";
$query = $mysqli->query($sql);
while ($linha = $query->fetch_array()) {
	
		$idtag=$linha["id"];
		$nometag=$linha["nome"];
		$urlamigaveltag=$linha["urlamigavel"];
		$vezes="0";
		
		echo"<p class=\"tags\" onClick=\"window.location='/tag/$urlamigaveltag';\" style=\"cursor:pointer;\">$nometag</p>";


	}
?>

		</div>
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
