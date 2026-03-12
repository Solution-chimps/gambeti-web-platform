<?php
	require"scripts/verifica.php";
	require"scripts/pegarDados.php";
	require"../scripts/conecta.php";	
	require"../scripts/funcoes.php";		
	
	//carrego infos dessa noticia
	$id=$_GET["id"];	
$consulta= "SELECT *FROM paginas WHERE id='3'";
$resultado = mysql_query($consulta) or die("Falha na execução da consulta");

	while($linha=mysql_fetch_assoc($resultado)){
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
        <form action="scripts/edt-pagina-contato.php" method="post">







        Fale Conosco<br />
		<textarea name="texto1" class="configtexto"><?=$texto1?></textarea>  <br /><br />
        Locailização<br />
		<textarea name="texto2" class="configtexto"><?=$texto2?></textarea>  <br /><br />


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