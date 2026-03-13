<?php
	require"scripts/verifica.php";
	require"scripts/pegarDados.php";	
?>
<?php
//consulta o banco para retornar clientes.
require"../scripts/conecta.php";
require"scripts/funcoes.php";

	$consulta= "SELECT *FROM usuarios WHERE id='$idUsuario'";
	$resultado = $mysqli->query($consulta) or die("Falha na execução da consulta");
	while ($linha = $resultado->fetch_assoc())
	{
		$nome=$linha["nome"];
		//$senha=$linha["senha"];
		$email=$linha["email"];


	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="default/favicon.ico" />
<link rel="icon" href="default/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Painel de Administração</title>
</head>
<link rel="stylesheet" href="estilos/padrao.css" />
<link rel="stylesheet" href="estilos/lightbox.css" />
<body>



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
        <div id="chamadapagina"><br />&nbsp;&nbsp;Editar Seus Dados<br /><font size="2">&nbsp;&nbsp;&nbsp;Edite as informações de seu estabelecimento.</font></div>
        <br />
		<br />
        <form action="scripts/edtmeusdados.php?id=<?=$id?>" method="post">

        Nome<br />
		<input type="text" name="nome" class="configcampo" value="<?=$nome?>" /><br /><br /> 
        E-mail<br />
		<input type="text" name="email" class="configcampo" value="<?=$email?>" /><br /><br />         
        Senha [<a title="Caso não queira alterar a senha, basta deixar esse campo em branco">?</a>]<br />
		<input type="password" name="senha" class="configcampo" value="<?=$senha?>" /><br /><br />         
        


 

        <button class="btlaranja">Salvar alterações</button>  
        
        
        
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




<script src="scripts/jquery-1.7.2.js"></script>
<script src="scripts/jquery-1.7.2.min.js"></script>

<script>


function funcaoteste(){
	var estadoescolhido=$("#pais").val();
	//alert(estadoescolhido);
	$("#campoestado").html("Carregando...");
var request = $.ajax({
  url: "carregaestado.php",
  type: "GET",
  data:'es='+estadoescolhido,
  dataType: "html"
}); //fechamento chamada ajax
request.done(function(msg) {
	$("#campoestado").html( msg );
//  $("p").html( msg );
}); //fechamnento sucesso
request.fail(function(jqXHR, textStatus) {
  alert( "Request failed: " + textStatus );
}); // fechamento falha

}

function funcaoteste2(){
	var estadoescolhido=$("#estado").val();
	//alert(estadoescolhido);
	$("#campocidade").html("Carregando...");
var request = $.ajax({
  url: "carregacidades.php",
  type: "GET",
  data:'es='+estadoescolhido,
  dataType: "html"
}); //fechamento chamada ajax
request.done(function(msg) {
	$("#campocidade").html( msg );
//  $("p").html( msg );
}); //fechamnento sucesso
request.fail(function(jqXHR, textStatus) {
  alert( "Request failed: " + textStatus );
}); // fechamento falha

}

function funcaoteste3(){
	var estadoescolhido=$("#cidade").val();
	//alert(estadoescolhido);
	$("#campobairro").html("Carregando...");
var request = $.ajax({
  url: "carregabairro.php",
  type: "GET",
  data:'es='+estadoescolhido,
  dataType: "html"
}); //fechamento chamada ajax
request.done(function(msg) {
	$("#campobairro").html( msg );
//  $("p").html( msg );
}); //fechamnento sucesso
request.fail(function(jqXHR, textStatus) {
  alert( "Request failed: " + textStatus );
}); // fechamento falha

}
</script>


<script language="javascript" type="text/javascript" src="scripts/lightbox.js"></script>

</body>
</html>