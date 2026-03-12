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
<body onload="carregartags()">
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
    	<td colspan="2" id="linhalogo" align="center"><a href="http://www.uee.org.br" target="_blank"><img src="default/logo.png" border="0" /></a></td>
	</tr>
    <tr>
    	<td id="linhamenu" valign="top"><?php require "menu.php"?></td>
    	<td align="left" valign="top" id="linhaconteudo">
        <div id="chamadapagina"><br />&nbsp;&nbsp;Adicionar Notícia<br /><font size="2">&nbsp;&nbsp;&nbsp;Preencha as informações abaixo e adicione uma notícia ao site.</font></div>
        <br />
		<br />
        <form action="scripts/cad-noticia.php" method="post" enctype="multipart/form-data">


        Título <br />
		<input type="text" name="titulo" class="configcampo" /><br /><br />  

		Data &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hora&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Autor<br />
		<input type="text" name="data" id="datepicker" value="<?=date("d/m/Y")?>" class="configcampo" style="width:70px" /> <input type="text" name="hora" value="<?=date("H:i:s")?>" class="configcampo" style="width:70px" /> <input type="text" name="autor" value="<?=$nomeUsuario?>" class="configcampo" /><br /><br />  

        Imagem destaque <font size="1">1199x371px</font><br />
		<input type="file" name="preview" class="configcampo"><br /><br />
        
        Destaque<br />
        <select name="destaque" class="configcampo">
        	<option value="0">Não colocar no destaque</option>
        	<option value="1">Posição 1</option>
        	<option value="2">Posição 2</option>
        	<option value="3">Posição 3</option>  
        	<option value="4">Posição 4</option>  
        	<option value="5">Posição 5</option>                                                
        </select><br /><br />
        
        
        Linha fina<br />
		<textarea name="linhafina" class="configtextomenor"></textarea><br /><br />

        Texto<br />
		<textarea name="texto" id="editor"></textarea><br /><br />        
        
        Tags 
        <a href="" onClick="window.open('adicionar-tag-pop.php','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=400,height=180,left=25,top=25'); return false;">[+ adicionar tag]</a><br />
        
        <div class="configtextomenor" id="mostrartags" style="overflow:auto;height:auto"></div>
        
              
            <br />
			<br />  
        <p align="right">
	        <input type="submit" class="btlaranja" value="Criar notícia" />
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


          
<script type="text/javascript">
function carregartags(){


	$("#mostrartags").html("Carregando...");


var request = $.ajax({
  url: "scripts/carregartags.php",
  type: "GET",
  dataType: "html"
}); //fechamento chamada ajax


request.done(function(msg) {
	
	
	$("#mostrartags").html( msg );
//  $("p").html( msg );
}); //fechamnento sucesso

request.fail(function(jqXHR, textStatus) {
  alert( "Request failed: " + textStatus );
}); // fechamento falha




}
	
</script>
<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/samples/js/sample.js"></script><!--configuracoes da caixa-->
<script>
	initSample();	
</script>



</body>
</html>