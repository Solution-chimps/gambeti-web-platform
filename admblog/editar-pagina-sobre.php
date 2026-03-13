<?php
	require"scripts/verifica.php";
	require"scripts/pegarDados.php";
	require"../scripts/conecta.php";	
	require"../scripts/funcoes.php";		
	
	//carrego infos dessa noticia
	$id=$_GET["id"];	
$consulta= "SELECT *FROM paginas WHERE id='2'";
$resultado = $mysqli->query($consulta) or die("Falha na execução da consulta");

	while ($linha = $resultado->fetch_assoc()){
		$id=$linha["id"];
		$nome=$linha["nome"];			
		$imagem=$linha["foto"];	
		$foto1=$linha["foto1"];	
		$foto2=$linha["foto2"];						
		$texto1=$linha["texto1"];	
			$texto1=str_replace("<br />", "\n", $texto1);		
		$texto2=$linha["texto2"];			
			$texto2=str_replace("<br />", "\n", $texto2);				
		$texto3=$linha["texto3"];							
			$texto3=str_replace("<br />", "\n", $texto3);				
		$texto4=$linha["texto4"];			
			$texto4=str_replace("<br />", "\n", $texto4);				
		$texto5=$linha["texto5"];							
			$texto5=str_replace("<br />", "\n", $texto5);				
		$texto6=$linha["texto6"];							
			$texto6=str_replace("<br />", "\n", $texto6);				
		$texto7=$linha["texto7"];											
			$texto7=str_replace("<br />", "\n", $texto7);		
		$texto8=$linha["texto8"];		
			$texto8=str_replace("<br />", "\n", $texto8);				
				
	}
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="default/favicon.ico" />
<link rel="icon" href="default/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Painel de Administração</title>
<style>
body {
	font-family: "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
	font-size: 62.5%;
}
</style>
<link rel="stylesheet" href="estilos/jquery-ui.css">

<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script src="scripts/jquery-ui.js"></script>



</head>
<link rel="stylesheet" href="estilos/padrao.css" />
<body >




  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
    dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],	  		
	});
  });
  </script>

<!-- TinyMCE -->
<script type="text/javascript" src="tinymce_pt/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript"
   src="tinymce_pt/jscripts/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
    language : "pt",
		mode : "exact",
        elements : "texto",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
theme_advanced_buttons1:
"code,bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,cleanup,link,unlink,image,table,formatselect,fontselect,fontsizeselect,forecolor,backcolor,fullscreen",

		// Theme options
		theme_advanced_buttons2 : "",
		theme_advanced_buttons3 : "",
		theme_advanced_buttons4 : "",


		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		extended_valid_elements : 'iframe[src|style|width|height|scrolling|marginwidth|marginheight|frameborder],style,script',		

		// Example content CSS (should be your site CSS)
	 content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
    file_browser_callback : "tinyBrowser",
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->
<div id="menutopo">
	<div id="alinhadormenutopo">
		<div class="bttopo" onclick="window.location='deslogar.php';">DESLOGAR</div>   
		<div class="bttopo" onclick="window.location='../index.html';">VOLTAR AO SITE</div>         
        
	</div>

</div>

<table id="tbconteudo" border="0" height="800" cellpadding="0" cellspacing="0">
	<tr>
    	<td colspan="2" id="linhatopo"><!-- espacador --></td>
	</tr>
	<tr>
    	<td colspan="2" id="linhalogo" align="center"><img src="default/logo.png" border="0" /></td>
	</tr>
    <tr>
    	<td id="linhamenu" valign="top"><?php require "menu.php"?></td>
    	<td align="left" valign="top" id="linhaconteudo">
        <div id="chamadapagina"><br />&nbsp;&nbsp;Editar Página Sobre<br /><font size="2">&nbsp;&nbsp;&nbsp;Preencha as informações abaixo e edite a página.</font></div>
        <br />
		<br />
        <form action="scripts/edt-pagina-sobre.php" method="post">


        
        Foto Principal<br />
        <img src="../imagens/<?=$imagem?>" class="fotoprincipal" /><br /><br />
		<a href='#' onClick="window.open('verFotoPGSobre.php?id=<?=$id?>','TrocarFoto','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=400,height=200,top=25,left=25'); return false;">alterar</a><br /><br />
        


        <fieldset>
<legend>Textos</legend>
        
<?php
$totalprodutos=0;
$id=$_GET["id"];
//carrega todos produtos desse orcamento
	$consulta= "SELECT *FROM textossobre WHERE idprograma='1' ORDER BY ordem";
	$resultado = $mysqli->query($consulta) 
    or die("<br />Falha na execução da consulta 1. Erro: " . $mysqli->error);
	while ($linha = $resultado->fetch_assoc())
	{
$totalprodutos++;		
		$titulo=$linha["titulo"];
		$texto=$linha["texto"];
		$ordem=$linha["ordem"];		
		
echo"
<div id=\"caixaproduto$totalprodutos\"\">

Ordem<br /><input type=\"text\" name=\"ordem$totalprodutos\" id=\"ordem$totalprodutos\" class=\"configcampomenor\" value=\"$ordem\" /><br /><br />Título<br /><input type=\"text\" name=\"titulo$totalprodutos\" id=\"titulo$totalprodutos\" class=\"configcampomenor\" value=\"$titulo\" /><br /><br />Texto<br /><textarea type=\"text\" name=\"texto_sec$totalprodutos\" id=\"texto_sec$totalprodutos\" class=\"configtextomenor\">$texto</textarea><br /><br />
<input type=\"button\" value=\"DELETAR\" class=\"btvermelho\" onclick=\"deletar_prod('$totalprodutos')\"/>
</div>

";		


	}
?>


<span id="produtos"></span>
</fieldset>
        <div class="btlaranja" style="width:190px" onclick="maisprodutos()">Adicionar mais textos</div>  <br />

        		<input type="hidden" id="totalprodutos" name="totalprodutos" value="<?=$totalprodutos?>" />

<script>	


var num_campoFotos=<?=$totalprodutos?>;
function maisprodutos()
{
num_campoFotos=parseInt(num_campoFotos)+parseInt(1);

$("#produtos").append("Ordem<br /><input type=\"text\" name=\"ordem"+num_campoFotos+"\" class=\"configcampomenor\" /><br /><br />Título<br /><input type=\"text\" name=\"titulo"+num_campoFotos+"\" class=\"configcampomenor\" /><br /><br />Texto<br /><textarea type=\"text\" name=\"texto"+num_campoFotos+"\" class=\"configtextomenor\"></textarea><br /><br />");
//$("#produtos").append("<div class=\"produtos\" id=\"caixaproduto"+num_campoFotos+"\">Produtos<br /><input type=\"text\" name=\"produto"+num_campoFotos+"\" class=\"configcampomenor\" /><br />Medidas<br /><input type=\"text\" name=\"medidas"+num_campoFotos+"\" class=\"configcampomenor\"  /><br />Descrição<br /><textarea type=\"text\" name=\"descricao"+num_campoFotos+"\" class=\"configtextomenor\"></textarea><br />Quantidade<br /><input type=\"text\" name=\"quantidade"+num_campoFotos+"\" class=\"configcampomenor\"  /><br />Valor<br /><input type=\"text\" name=\"valor"+num_campoFotos+"\" id=\"valor"+num_campoFotos+"\" class=\"configcampomenor\" onkeyup=\"numerico('"+num_campoFotos+"');somar()\"  /><br /></div>");

document.getElementById("totalprodutos").value=num_campoFotos;

}
</script>
<script>
	function deletar_prod(qual){
		document.getElementById("titulo"+qual).value="DELETAR";
		document.getElementById("texto"+qual).value="0.00";				
		document.getElementById("caixaproduto"+qual).style.display="NONE";
	}

</script>

     
        Foto Treinadores<br />
        <img src="../imagens/<?=$foto1?>" class="fotoprincipal" /><br /><br />
		<a href='#' onClick="window.open('verFotoPGSobreTreinadores.php?id=<?=$id?>','TrocarFoto','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=400,height=200,top=25,left=25'); return false;">alterar</a><br /><br />

       Treinadores<br />
		<textarea name="texto6" class="configtexto"><?=$texto6?></textarea>  <br /><br />
      
       Equipe<br />
		<textarea name="texto7" class="configtexto"><?=$texto7?></textarea>  <br /><br />

              
            <br />
			<br />  
        <p align="right">
	        <input type="submit" class="btlaranja" value="Salvar alterações" />
        </p>
        </form>
        
        <br /><br /><br />
 





        
        </td>
    </tr>
</table>

<br />
<br />
<br />
<br />

<div id="menurodape"><a href="http://www.piovezam.com" target="_blank">Piovezam Soluções Web</a></div>

<script>
	function mudar(valor){
		if(valor=='cliente'){
			document.getElementById("listaclientes").style.display="block";
			document.getElementById("listafornecedores").style.display="none";			
		}
		else{
			document.getElementById("listaclientes").style.display="none";
			document.getElementById("listafornecedores").style.display="block";				
		}
		
	}
</script>

<script src="scripts/jquery.maskMoney.js" type="text/javascript"></script>
<script type="text/javascript">$("#total").maskMoney({prefix:'R$ ', thousands:'', decimal:',', affixesStay: true});</script>

   
   
</body>
</html>