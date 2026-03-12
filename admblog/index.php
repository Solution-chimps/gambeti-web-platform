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
</head>
<link rel="stylesheet" href="estilos/padrao.css" />
<?php
	$tela=$_GET["tela"];
	if($tela==""){	
		echo"<body onload=\"abrir('1');\">";
	}
	else{
		echo"<body onload=\"abrir('$tela');\">";		
	}
?>
<!--divs do lightbox-->
<div id="fundoLight">
	<div id="caixastatus">
    <h1 style="border-bottom:solid 1px #F5F5F5;">&nbsp;&nbsp;&nbsp;Alterar Status</h1>
    <form action="scripts/attstatus.php" method="post">
    <input type="hidden" name="idos" id="idos" />
    Status<br />
    <select style="width:320px" name="status" class="configcampo">
        	<option value="">Selecione</option>
        	<option value="1">Aberto</option>
        	<option value="2">Em Produção</option>                        
        	<option value="3">Finalizado</option>                        
    </select><br /><br />

    <div class="btcinza" onclick="fechar()" style="width:100px;float:left">Fechar</div><input type="submit" class="btazul" style="width:100px;float:left" value="Salvar Status"></input>
    </form>
    </div>
</div>
<!--fim divs do lightbox-->


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
    	<td colspan="2" id="linhalogo" align="center"><a href="http://www.clickmenus.com.br" target="_blank"><img src="default/logo.png" border="0" /></a></td>
	</tr>
    <tr>
    	<td id="linhamenu" valign="top"><?php require "menu.php"?></td>
    	<td align="left" valign="top" id="linhaconteudo">
        <div id="chamadapagina"><br />&nbsp;&nbsp;Página Inicial<br /><font size="2">&nbsp;&nbsp;&nbsp; Olá <?=$nomeUsuario?>. Selecione a opção no menu ao lado.</font></div>
        
        <br /><br /><br />

<!--
        <div id="espacoabas">
	        <div id="aba1" class="abaativa" onclick="abrir('1')">Clientes</div>
	        <div id="aba2" class="abas" onclick="abrir('2')">Fornecedores</div>
	        <div id="aba3" class="abas" onclick="abrir('3')">Ordens de serviço</div>
	        <div id="aba4" class="abas" onclick="abrir('4')">Contas a pagar</div>
	        <div id="aba5" class="abas" onclick="abrir('5')">Contas a receber</div>
		</div>            
	        
	        <div class="conteudos" id="conteudoaba1">aba1</div>
	        <div class="conteudos" id="conteudoaba2">aab2</div>
	        <div class="conteudos" id="conteudoaba3">aab3</div>
	        <div class="conteudos" id="conteudoaba4">aba4</div>                                                      
	        <div class="conteudos" id="conteudoaba5">aba5</div>        
-->
        
        </td>
    </tr>
</table>
<br />
<br />
<br />
<br />
<br />


<div id="menurodape"><a href="http://www.piovezam.com" target="_blank">Piovezam Soluções Web</a></div>


<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script>
	function abrir(qual){
		$("#conteudoaba1").fadeOut('fast');	
		$("#conteudoaba2").fadeOut('fast');	
		$("#conteudoaba3").fadeOut('fast');	
		$("#conteudoaba4").fadeOut('fast');	
		$("#conteudoaba5").fadeOut('fast');	

		$( "#aba1" ).removeClass('abaativa');
		$( "#aba2" ).removeClass('abaativa');
		$( "#aba3" ).removeClass('abaativa');
		$( "#aba4" ).removeClass('abaativa');
		$( "#aba5" ).removeClass('abaativa');	

		$( "#aba1" ).addClass('abas');
		$( "#aba2" ).addClass('abas');
		$( "#aba3" ).addClass('abas');
		$( "#aba4" ).addClass('abas');
		$( "#aba5" ).addClass('abas');										

		$("#conteudoaba"+qual).fadeIn('slow');
		$( "#aba"+qual ).toggleClass('abaativa');
	}
</script>
<script>
	function alterarstatus(idos){
		$("#fundoLight").fadeIn('fast');	
		$("#idos").attr("value", idos);
	}		
	function fechar(){
		$("#fundoLight").fadeOut('fast');		
	}
</script>
</body>
</html>