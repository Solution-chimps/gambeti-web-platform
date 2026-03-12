<?php
	require"scripts/conecta.php";
	require"scripts/funcoes.php";		
?>
<?php
$ano=$_GET["ano"];
		$ano=addslashes($ano);
		if(is_numeric($ano)){
		}
		else{
			$ano=1;
		}
$mes=$_GET["mes"];
		$mes=addslashes($mes);
		if(is_numeric($mes)){
		}
		else{
			$mes=1;
		}
$url=$_GET["url"];
		$url=addslashes($url);
	
$totaldias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
$datainicio="$ano-$mes-01";
$datafim="$ano-$mes-$totaldias";

//carrego infos da noticia
$sql = "SELECT *FROM noticias WHERE data>='$datainicio' AND data<='$datafim' AND urlamigavel='$url'";
$query = $mysqli->query($sql);
while ($linha = $query->fetch_array()) {
	
		$idnoticia=$linha["id"];
		$titulonoticia=$linha["titulo"];
		$linhafinanoticia=$linha["linhafina"];		
		$autornoticia=$linha["autor"];	
		$urlamigavelnoticia=$linha["urlamigavel"];
		$datanoticia=$linha["data"];		
		$previewnoticia=$linha["preview"];				
		
			$datanoticiaformatada=formataData($datanoticia);

			$mesnoticia=pegaMes($datanoticia);
			$dianoticia=pegaDia($datanoticia);
			$anonoticia=pegaAno($datanoticia);
									
			$mesporextenso=mesExtenso($mesnoticia);
			
			$dataextenso="$dianoticia de $mesporextenso de $anonoticia";
		$aberturas=$linha["aberturas"];				
		$aberturasunicas=$linha["aberturasunicas"];			

		$arquivo = "textos/$idnoticia.txt";
		$fp = fopen($arquivo,"r");
		$texto= fread($fp, filesize($arquivo));

		$texto=str_replace("\\","",$texto);		
		$texto=str_replace("&#34","\"",$texto);						
		$texto=str_replace("&#39","\'",$texto);							
		$texto=str_replace("\\'","'",$texto);
		$texto=str_replace("\\","",$texto);	

		$texto=str_replace("../","/",$texto);	
		$texto=str_replace("<p>","",$texto);				
		$texto=str_replace("</p>","<br/><br/>",$texto);						
		$texto=str_replace("<p style=\"text-align: justify;\">","",$texto);						
		$texto=str_replace("<p style=\"text-align: left;\">","",$texto);						
		$texto=str_replace("<p style=\"text-align: right;\">","",$texto);										
		$texto=str_replace("<p style=\"text-align: center;\">","",$texto);								
		$texto=str_replace("<p class=\"MsoNormal\" style=\"text-align: justify;\">","",$texto);												

	}
		
			
	if($titulonoticia==""){
		$titulonoticia="Desculpe. Notícia não localizada...";
	}
	if($texto==""){
		$texto="Tente novamente.";		
	}


//atualizo aberturas 
$novaabertura=$aberturas+1;		
$sql = "UPDATE noticias SET aberturas='$novaabertura' WHERE id='$idnoticia'";
$query = $mysqli->query($sql);
if($query==true){
		
	}
	else{
	}				
	
//atualizo aberturas unicas
$ipdesseusuario = $_SERVER["REMOTE_ADDR"];

		
$sql = "SELECT *FROM noticias WHERE id='$idnoticia'";
$query = $mysqli->query($sql);
if ($linha = $query->fetch_array()) {
		
		
		$ultimoip=$linha["ultimoip"];
		
		if($ultimoip==$ipdesseusuario){
		}
		else{
			//atualizo unicas
			$novaaberturaunica=$aberturasunicas+1;

$sql = "UPDATE noticias SET aberturasunicas='$novaaberturaunica', ultimoip='$ipdesseusuario' WHERE id='$idnoticia'";
$query = $mysqli->query($sql);
if($query==true){

			}
			else{
			}				
		}
	}
?>
<?php
	//pega url atual
	$server = $_SERVER['SERVER_NAME'];
	$endereco = $_SERVER ['REQUEST_URI'];
	$urlatual="http://" . $server . $endereco;	
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

	
<title><?=$titulonoticia?></title>
</head>
<body>

	<?php
		$paginaatual="seo";
		require("includes/topo.php");
	?>	

	
	
<div id="caixabranca">
	<div class="conteudo">

		<div class="coluna75 textonoblog">
            <h1 align="left"><?=$titulonoticia?></h1>
            <font size="1" face="arial"><?=$datanoticiaformatada?></font><br><br>
      <style>
		.textopadrao{
			line-height:35px;
			text-align:justify;
		}
		.textopadrao span{
			font-size:18px;			
		}
		.textopadrao a{
			text-decoration:underline;
			color:#000;
		}
		.textopadrao ul{
			float:left;
		}
		.textopadrao li{
			float:left;
			display: list-item;
		}
	</style>
<img src="/uploads/<?=$previewnoticia?>" width="100%"><br><br>
<!--<div class="fotoartigograndepostagem" style="background-image:URL('/uploads/<?=$previewnoticia?>');"></div>-->

	<?=$texto?>

  <br><br>
  <hr>


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
