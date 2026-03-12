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

	
<title>Treinamentos em Segurança do Trabalho</title>
</head>
<body>

	<?php
		$paginaatual="treinamentos";
		require("includes/topo.php");
	?>	

	
	
<div id="caixabranca">
	<div class="conteudo">
		<div class="coluna100">
			<p class="textopadrao">
				<br>
Toda empresa precisa de treinamento de Segurança do Trabalho e tem que ser levado como prioridade, seja para seguir as normas estabelecidas pela legislação brasileira, ou pela preocupação com a saúde e bem estar de seus trabalhadores.<br>
<br>
O treinamento é sempre a melhor forma de prevenir acidentes no dia a dia de trabalho mantendo assim o ambiente seguro e livre de riscos.				
			</p>			
		</div>
		<div class="coluna25" id="areanrs">

			
<?php
require"scripts/conecta.php";
$ultimanr="";
					echo"<div class=\"bts btsativo\"><a href=\"/treinamentos\">TODAS</a></div>";

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
	$qpp=22;	
	if(($inicio=="")||($inicio=="Valor não recebido")||($inicio=="-")){
		$inicio="0";
	}	
	$contadorimovel=0;
	
// Executa uma consulta que pega cinco notícias
$sql = "SELECT * FROM textos WHERE tipo='treinamento' ORDER BY visualizacao DESC, titulo ASC LIMIT $inicio,$qpp";
$query = $mysqli->query($sql);
while ($dados = $query->fetch_array()) {
	$titulo=$dados['titulo'];
	$texto=$dados['texto']; 
	$linhafina=$dados['linhafina']; 
	$url=$dados['url']; 
	$img=$dados['img']; 
		$titulo=utf8_encode($titulo);
		$texto=utf8_encode($texto);
		$linhafina=utf8_encode($linhafina);
		
			$tamanhotitulo=strlen($titulo);
			if($tamanhotitulo>=100){
				$titulo_mostrar=substr($titulo,0,100);
					$titulo_mostrar=$titulo_mostrar."...";
					//$titulo_mostrar=mb_strtolower("$titulo_mostrar",'UTF-8');
			}
			else{
				$titulo_mostrar=$titulo;
				//$titulo_mostrar=mb_strtolower("$titulo_mostrar",'UTF-8');
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

<div onclick=\"window.location='/treinamento/$url';\" class=\"caixatreinamentos\" style=\"background-image: URL('/imagens/treinamentos/$img')\">
	<div class=\"titulocaixatreinamentos\"><a href=\"/treinamento/$url\" title=\"$titulo\">$titulo_mostrar</a></div>
</div>

";
	$contadorimovel++;

}

if($contadorimovel==0){
	echo"Nenhum nessa tela...";
}


?>			
			
			<!--
			<div class="caixatreinamentos" style="background-image: URL('imagens/treinamentos/01.jpg')">
				<div class="titulocaixatreinamentos"><a href="/treinamento/comissao-interna-de-prevencao">Comissão interna de prevenção de acidentes</a></div>
			</div>
			<div class="caixatreinamentos" style="background-image: URL('imagens/treinamentos/01.jpg')">
				<div class="titulocaixatreinamentos">Comissão interna de prevenção de acidentes</div>
			</div>
			<div class="caixatreinamentos" style="background-image: URL('imagens/treinamentos/01.jpg')">
				<div class="titulocaixatreinamentos">Comissão interna de prevenção de acidentes</div>
			</div>
			<div class="caixatreinamentos" style="background-image: URL('imagens/treinamentos/01.jpg')">
				<div class="titulocaixatreinamentos">Comissão interna de prevenção de acidentes</div>
			</div>
			<div class="caixatreinamentos" style="background-image: URL('imagens/treinamentos/01.jpg')">
				<div class="titulocaixatreinamentos">Comissão interna de prevenção de acidentes</div>
			</div>
			<div class="caixatreinamentos" style="background-image: URL('imagens/treinamentos/01.jpg')">
				<div class="titulocaixatreinamentos">Comissão interna de prevenção de acidentes</div>
			</div>
			-->
			

    	<div class="coluna100">

<?php
//prepara o rodape
	if(($inicio=="")||($inicio=="Valor não recebido")){
		$inicio="0";
	}

	$sql="SELECT COUNT(*) AS total FROM textos WHERE tipo='treinamento'";
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
	$qualEstou="0";	
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
	$sql="SELECT COUNT(*) AS total FROM textos WHERE tipo='treinamento'";
	$result = $mysqli->query($sql);
	$row = $result->fetch_row();
	$totalAnunciosEsse=$row[0];
	
	


//echo"<strong><br>Total:</strong> $totalAnunciosEsse</strong><br />";
echo"

	<p class=\"textopaginacao\" align=\"center\">
";

if($anterior<0){
}
else{
	echo"<a href='/treinamentos/$anterior'> ANTERIOR </a> ";
}
//echo"<a href='/categorias/$url' style='color:#000'> << </a> ";

//$paginas=$paginas;
for($c=$qttPaginasInicio;$c<=$qttPaginasFim;$c++)
{
	if($inicio==$qualEstouValida){
		echo"<a href='' style=\"color:#ccc\">$c</a> ";		
	}
	else{
		echo"<a href='/treinamentos/$inicio'>$c</a> ";		
	}

$inicio=$inicio+$qpp;

}

//prepara chamada ultima pagina
$ultimaPagina=$mostrarTotal/$qpp;
$ultimaPagina=ceil($ultimaPagina);
$ultimaPagina=$ultimaPagina*$qpp;
$ultimaPagina=$ultimaPagina-$qpp;
if($proxima>$ultimaPagina){
}
else{
	echo"<a href='/treinamentos/$proxima'> PRÓXIMA </a> ";	
}
//echo"<a href='/categorias/$url/$ultimaPagina' style='color:#000'> >> </a> ";

//echo"<a href='?i=$proxima' style='color:#000000'> >> </a>";
//echo"<br />Exibindo $qpp por página.<br /></font>";
   echo"
            </p>
        </div>   
   ";

		
?>
            <br><br>
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
