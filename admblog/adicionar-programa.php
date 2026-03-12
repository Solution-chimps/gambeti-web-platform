<?php
	require"scripts/verifica.php";
	require"scripts/pegarDados.php";	
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
<body onload="maisprodutos()">
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
        <div id="chamadapagina"><br />&nbsp;&nbsp;Adicionar Programa<br /><font size="2">&nbsp;&nbsp;&nbsp;Preencha as informações abaixo e adicione esse programa na lista: Para Você.</font></div>
        <br />
		<br />
        <form action="scripts/cad-programavoce.php" method="post" enctype="multipart/form-data">
        
        Ordem<br />
		<input type="text" name="ordem" class="configcampo" value="<?=$ordem?>"><br /><br />  
        
        
                        <fieldset>
        <legend>Destaque</legend>
        
        



        Foto<br />
		<input type="file" name="logo" class="configcampo"><br /><font size="1">Dimensão ideal: 147px x 179px</font><br /><br />  
ou<br />
<br />
Vídeo
<input type="text" name="video" class="configcampo" value="<?=$video?>"><br /><br /> 

</fieldset>
<br />
        Destaque<br />
		<select name="destaque" id="destaque" class="configcampo">
        	<option value="">Escolha</option>
        	<option value="0">Não colocar em destaque</option>            
        	<option value="1">Posição 1</option>
        	<option value="2">Posição 2</option>            
        	<option value="3">Posição 3</option>            
        </select><br /><br />


        Categoria<br />
		<select name="categoria" id="categoria" class="configcampo">
        	<option value="">Escolha</option>
        	<option value="treinamentos">Treinamentos</option>
        	<option value="workshops">Workshops</option>            
        	<option value="coaching">Coaching</option>            
        	<option value="empreendedorismo">Empreendedorismo</option>                                    
        </select><br /><br />



        Nome<br />
		<input type="text" name="nome" value="" class="configcampo"><br /><br />  


        Sinopse<br />
		<textarea name="sinopse" class="configtexto"></textarea><br /><br />  


        Data<br />
		<input type="text" name="data" value="" class="configcampo"><br /><br />  

        Hora<br />
		<input type="text" name="hora" value="" class="configcampo"><br /><br />  

        Local<br />
		<input type="text" name="local" value="" class="configcampo"><br /><br />  

        Exibir Botão de Fotos<br />
		<select name="exibirbt" id="exibirbt" class="configcampo" onchange="validarfotos(this.value)">
        	<option value="">Escolha</option>
        	<option value="Sim">Sim</option>
        	<option value="Não">Não</option>            
        </select>
        <br /><br />  

<div id="areaenderecofotos" style="display:none">
        Endereço do Álbum<br />
		<input type="text" name="enderecoalbum" id="enderecoalbum" value="" class="configcampo"><br /><br />  
</div>


        Tipo de Botão de Ação<br />
		<select name="tipobt" id="tipobt" class="configcampo">
        	<option value="">Escolha</option>
        	<option value="O">Orçamento</option>
        	<option value="I">Inscrição</option>            
        	<option value="F">Contato</option>                        
        </select><br /><br />

<fieldset>
<legend>Textos</legend>
<input type="hidden" id="totalprodutos" name="totalprodutos" />                
<span id="produtos"></span>
</fieldset>
<br />
<br />

<div class="btlaranja" style="width:190px" onclick="maisprodutos()">Adicionar mais textos</div>  <br />



        <p align="right">
	        <input type="submit" class="btlaranja" value="Cadastrar" />
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
<script type="text/javascript" src="scripts/jquery.min.js"></script>

<script>	


var num_campoFotos=0;
function maisprodutos()
{
num_campoFotos=parseInt(num_campoFotos)+parseInt(1);

$("#produtos").append("Ordem<br /><input type=\"text\" name=\"ordem"+num_campoFotos+"\" class=\"configcampomenor\" /><br /><br />Título<br /><input type=\"text\" name=\"titulo"+num_campoFotos+"\" class=\"configcampomenor\" /><br /><br />Texto<br /><textarea type=\"text\" name=\"texto"+num_campoFotos+"\" class=\"configtextomenor\"></textarea><br /><br />");
//$("#produtos").append("<div class=\"produtos\" id=\"caixaproduto"+num_campoFotos+"\">Produtos<br /><input type=\"text\" name=\"produto"+num_campoFotos+"\" class=\"configcampomenor\" /><br />Medidas<br /><input type=\"text\" name=\"medidas"+num_campoFotos+"\" class=\"configcampomenor\"  /><br />Descrição<br /><textarea type=\"text\" name=\"descricao"+num_campoFotos+"\" class=\"configtextomenor\"></textarea><br />Quantidade<br /><input type=\"text\" name=\"quantidade"+num_campoFotos+"\" class=\"configcampomenor\"  /><br />Valor<br /><input type=\"text\" name=\"valor"+num_campoFotos+"\" id=\"valor"+num_campoFotos+"\" class=\"configcampomenor\" onkeyup=\"numerico('"+num_campoFotos+"');somar()\"  /><br /></div>");

document.getElementById("totalprodutos").value=num_campoFotos;

}
</script>
<script>


	function validarfotos(valor){
		if(valor=='Sim'){
			document.getElementById("areaenderecofotos").style.display="block";
		}
		else{
			document.getElementById("areaenderecofotos").style.display="none";
			document.getElementById("enderecoalbum").value="";			
		}
		
	}
</script>

<script src="scripts/jquery.maskMoney.js" type="text/javascript"></script>
<script type="text/javascript">$("#total").maskMoney({prefix:'R$ ', thousands:'', decimal:',', affixesStay: true});</script>

          
         
         
</body>
</html>