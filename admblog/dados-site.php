<?php
require "scripts/verifica.php";
require "scripts/pegarDados.php";
?>
<?php
//consulta o banco para retornar clientes.
require "../scripts/conecta.php";
require "scripts/funcoes.php";

$consulta = "SELECT *FROM infossite WHERE id='1'";
$resultado = $mysqli->query($consulta) or die("Falha na execução da consulta");
while ($linha = $resultado->fetch_assoc()) {
	$nome = $linha["nome"];
	$title = $linha["title"];
	$descricao = $linha["descricao"];
	$palavrachave = $linha["palavrachave"];
	$email = $linha["email"];
	$telefone = $linha["telefone"];
	$facebook = $linha["facebook"];
	$youtube = $linha["youtube"];
	$instagram = $linha["instagram"];
	$periscope = $linha["periscope"];
	$twitter = $linha["twitter"];
	$tokenpagseguro = $linha["tokenpagseguro"];
	$emailpagseguro = $linha["emailpagseguro"];
	$localizacao = $linha["localizacao"];
	$codigoanalytics = $linha["codigoanalytics"];
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
			<td colspan="2" id="linhalogo" align="center"><a href="../index.html" target="_blank"><img src="default/logo.png" border="0" /></a></td>
		</tr>
		<tr>
			<td id="linhamenu" valign="top"><?php require "menu.php" ?></td>
			<td align="left" valign="top" id="linhaconteudo">
				<div id="chamadapagina"><br />&nbsp;&nbsp;Editar Dados dos Site<br />
					<font size="2">&nbsp;&nbsp;&nbsp;Edite as informações do site.</font>
				</div>
				<br />
				<br />
				<form action="scripts/edtdadossite.php" method="post">

					Nome<br />
					<input type="text" name="nome" class="configcampo" value="<?= $nome ?>" /><br /><br />


					Slogan Topo<br />
					<input type="text" name="descricao" class="configcampo" value="<?= $descricao ?>" /><br /><br />

					E-mail<br />
					<input type="text" name="email" class="configcampo" value="<?= $email ?>" /><br /><br />
					Telefone<br />
					<input type="text" name="telefone" class="configcampo" value="<?= $telefone ?>" /><br /><br />
					Link Facebook<br />
					<input type="text" name="facebook" class="configcampo" value="<?= $facebook ?>" /><br /><br />

					Link Instagram<br />
					<input type="text" name="instagram" class="configcampo" value="<?= $instagram ?>" /><br /><br />
					Link LinkedIn<br />
					<input type="text" name="periscope" class="configcampo" value="<?= $periscope ?>" /><br /><br />
					Link Youtube<br />
					<input type="text" name="youtube" class="configcampo" value="<?= $youtube ?>" /><br /><br />
					Link Twitter<br />
					<input type="text" name="twitter" class="configcampo" value="<?= $twitter ?>" /><br /><br />


					Token PagSeguro<br />
					<input type="text" name="tokenpagseguro" class="configcampo" value="<?= $tokenpagseguro ?>" /><br /><br />

					E-mail PagSeguro<br />
					<input type="text" name="emailpagseguro" class="configcampo" value="<?= $emailpagseguro ?>" /><br /><br />

					Endereço<br />
					<textarea name="localizacao" class="configtexto"><?= $localizacao ?></textarea><br /><br />

					Código Google Analytics<br />
					<textarea name="codigoanalytics" class="configtexto"><?= $codigoanalytics ?></textarea><br /><br />







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
		function funcaoteste() {
			var estadoescolhido = $("#pais").val();
			//alert(estadoescolhido);
			$("#campoestado").html("Carregando...");
			var request = $.ajax({
				url: "carregaestado.php",
				type: "GET",
				data: 'es=' + estadoescolhido,
				dataType: "html"
			}); //fechamento chamada ajax
			request.done(function(msg) {
				$("#campoestado").html(msg);
				//  $("p").html( msg );
			}); //fechamnento sucesso
			request.fail(function(jqXHR, textStatus) {
				alert("Request failed: " + textStatus);
			}); // fechamento falha

		}

		function funcaoteste2() {
			var estadoescolhido = $("#estado").val();
			//alert(estadoescolhido);
			$("#campocidade").html("Carregando...");
			var request = $.ajax({
				url: "carregacidades.php",
				type: "GET",
				data: 'es=' + estadoescolhido,
				dataType: "html"
			}); //fechamento chamada ajax
			request.done(function(msg) {
				$("#campocidade").html(msg);
				//  $("p").html( msg );
			}); //fechamnento sucesso
			request.fail(function(jqXHR, textStatus) {
				alert("Request failed: " + textStatus);
			}); // fechamento falha

		}

		function funcaoteste3() {
			var estadoescolhido = $("#cidade").val();
			//alert(estadoescolhido);
			$("#campobairro").html("Carregando...");
			var request = $.ajax({
				url: "carregabairro.php",
				type: "GET",
				data: 'es=' + estadoescolhido,
				dataType: "html"
			}); //fechamento chamada ajax
			request.done(function(msg) {
				$("#campobairro").html(msg);
				//  $("p").html( msg );
			}); //fechamnento sucesso
			request.fail(function(jqXHR, textStatus) {
				alert("Request failed: " + textStatus);
			}); // fechamento falha

		}
	</script>


	<script language="javascript" type="text/javascript" src="scripts/lightbox.js"></script>

</body>

</html>