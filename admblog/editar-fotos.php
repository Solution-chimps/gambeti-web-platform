<?php
require "scripts/verifica.php";
require "scripts/pegarDados.php";
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
			font-family: "Trebuchet MS", "Helvetica", "Arial", "Verdana", "sans-serif";
			font-size: 62.5%;
		}
	</style>
	<link rel="stylesheet" href="estilos/jquery-ui.css">
	<script src="scripts/jquery-1.9.1.js"></script>
	<script src="scripts/jquery-ui.js"></script>
	<script>
		$(function() {
			$("#from").datepicker({
				dateFormat: 'dd/mm/yy',
				dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
				dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
				dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
				monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
				monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
				nextText: 'Próximo',
				prevText: 'Anterior',
				defaultDate: "+1w",
				changeMonth: true,
				numberOfMonths: 1,
				onClose: function(selectedDate) {
					$("#to").datepicker("option", "minDate", selectedDate);
				}
			});
			$("#to").datepicker({
				dateFormat: 'dd/mm/yy',
				dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
				dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
				dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
				monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
				monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
				nextText: 'Próximo',
				prevText: 'Anterior',
				defaultDate: "+1w",
				changeMonth: true,
				numberOfMonths: 1,
				onClose: function(selectedDate) {
					$("#from").datepicker("option", "maxDate", selectedDate, {
						dateFormat: 'dd-mm-yy'
					});
				}
			});
		});
	</script>
</head>
<link rel="stylesheet" href="estilos/padrao.css" />

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
			<td colspan="2" id="linhalogo" align="center"><img src="default/logo.png" border="0" /></td>
		</tr>
		<tr>
			<td id="linhamenu" valign="top"><?php require "menu.php" ?></td>
			<td align="left" valign="top" id="linhaconteudo">
				<div id="chamadapagina"><br />&nbsp;&nbsp;Fotos<br />
					<font size="2">&nbsp;&nbsp;&nbsp;Gerencie as fotos desse álbum.</font>
				</div>
				Lista de Fotos
				<br /><br /><br />
				<?php
				$idalbum = $_GET["idalbum"];
				?>
				<table width="96%" border="0" cellpadding="0" cellspacing="0">
					<?php
					/*if($perfilUsuario!="1"){
		}
		else{*/
					echo "<td align=\"right\"><div style=\"width:150px\" class=\"btlaranja\" onclick=\"window.location='adicionar-foto-album.php?idalbum=$idalbum';\">Adicionar Foto</div></td>";
					//}
					?>


					<tr>
						<td align="right" height="40">
							<?php
							$palavra = $_GET["palavra"];
							$inicio = $_GET["to"];
							$fim = $_GET["from"];
							?>

							<form action="fotos.php" method="get">
								<div id="caixabusca">
									<div id="btbusca"></div>
									<div id="areatexto"><input value="<?= $palavra ?>" type="text" name="palavra" class="configcampobusca" /></div>
								</div>

								<input type="hidden" name="to" id="to_x1" value="<?= $inicio ?>" />
								<input type="hidden" name="idalbum" id="to_x1" value="<?= $idalbum ?>" />
								<input type="hidden" name="from" id="from_x1" value="<?= $fim ?>" />
								<input type="hidden" name="qntpp" value="9999999999999" />

							</form>

						</td>
					</tr>
					<tr>
						<td>
							<?php
							$inicio = $_GET["to"];
							$fim = $_GET["from"];

							if (($inicio != "") && ($fim != "")) {
								$btlimpar = "<input type='button' value='Limpar datas' class='btverde' onclick='limpar()'>";
							}
							?>

						</td>
					</tr>
				</table>

				<table class="tabelalistagem" width="96%" cellpadding="8" cellspacing="0" border="0">

					<tr class="linhaindice">
						<td class="celularindice" align="center" valign="middle">Foto</td>
						<td class="celularindice" align="center" valign="middle" style="border-right:none;">Ações</td>
					</tr>


					<?php
					//consulta o banco para retornar clientes.
					require "../scripts/conecta.php";
					require "scripts/funcoes.php";


					$dtinicio = $_GET["to"];
					if ($dtinicio != "") {
						$dtinicio = formataDataInvertida($dtinicio);
					}
					$dtfim = $_GET["from"];
					if ($dtfim != "") {
						$dtfim = formataDataInvertida($dtfim);
					}



					$busca = " WHERE idalbum = '$idalbum'";

					$palavra = $_GET["palavra"];
					$palavra = strtolower($palavra);
					$dataformatada = formataDataInvertida($palavra);

					if (($dtfim != "") && ($dtinicio != "")) {
						$complemento = " AND data>='$dtfim' AND data<='$dtinicio'";
					} else {
						$complemento = " WHERE idalbum = '$idalbum'";
					}


					if ($palavra != "") {
						$busca = " WHERE descricao REGEXP '$palavra' AND idalbum = '$idalbum'";
					}



					if (($palavra == "") && ($dtinicio != "")) {
						$busca = " WHERE data>='$dtfim' AND data<='$dtinicio'";
					}




					$inicio = $_GET["i"];
					$inicio = limparString($inicio);

					$qntpp = $_GET["qntpp"];
					$qntpp = limparString($qntpp);

					if (($qntpp == "") || ($qntpp == "-")) {
						$qpp = 20;
					} else {
						$qpp = $qntpp;
					}


					if (($inicio == "") || ($inicio == "-")) {
						$inicio = "0";
					}




					$contador = "0";
					$consulta = "SELECT *FROM fotos$busca ORDER BY id ASC LIMIT $inicio,$qpp";

					//echo $consulta;

					$resultado = $mysqli->query($consulta) or die("<br />Falha na execução da consulta 2. Erro: " . $mysqli_error);
					while ($linha = $resultado->fetch_assoc()) {
						$id = $linha["id"];

						$imagem = $linha["foto"];
						$nome = $linha["descricao"];







						$contador++;
						$divisaor = $contador % 2;

						$valortotalos = $valortotalos + $total;



						$btstatus = "<div class=\"btcinza\" onclick=\"dlbanner('$id', '$idalbum')\">Deletar</div><div class=\"btcinza\" onclick=\"dfcapa('$id', '$idalbum')\">Definir como capa</div>";



						if ($divisaor == "0") {
							echo "
	<tr class=\"linhacomumpar\">
    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\"><img src='../imagens/$imagem' width='100' class='arredondarfoto' /></td>
			
		<td class=\"celularcomum\" align=\"center\" valign=\"middle\" style=\"border-right:none;\" width=\"140\">$btstatus</td>
    </tr>
";
						} else {
							echo "
	<tr class=\"linhacomumimpar\">
    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\"><img src='../imagens/$imagem' width='100' class='arredondarfoto' /></td>
		<td class=\"celularcomum\" align=\"center\" valign=\"middle\" style=\"border-right:none;\" width=\"140\">$btstatus</td>
    </tr>
";
						}
					}



					if ($contador == "0") {
						echo "
	<tr>
		<td colspan=\"5\" align=\"center\">Nenhuma foto encontrada... Cadastre no botão acima.</td>
	</tr>
";
					} else {
						//mostra o valor total das os

						$valortotalos = number_format($valortotalos, 2, '.', '');
						echo "
	<tr class=\"linhacomuimpar\">
    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\" colspan=\"5\" style=\"border-right:none;height:2px;\"></td>
    </tr>
";
					}
					?>




				</table>

				<br />

				<table align="right" border="0" cellpadding="0" cellspacing="0">


					<tr>
						<td align="right">

							<?php
							//prepara o rodape

							if (($inicio == "") || ($inicio == "-")) {
								$inicio = "0";
							}
							$consulta = $mysqli->query("SELECT COUNT(*) AS total FROM fotos $busca");
							$mostrarTotal = $consulta->fetch_assoc();
							$mostrarTotal = $mostrarTotal['total'];

							$paginas = $mostrarTotal / $qpp;
							$paginas = ceil($paginas);



							$qualEstou = $_GET["i"];
							$qualEstouValida = $_GET["i"];
							if (($qualEstou == "") || ($qualEstou == "0")) {
								$qualEstou = "1";
							}

							$anterior = $qualEstou - $qpp;
							$proxima = $qualEstou + $qpp;
							//echo"$qualEstou";

							$qttPaginasInicio = $qualEstou / $qpp - 1;
							$qttPaginasFim = $qualEstou / $qpp + 3;

							if ($qttPaginasFim >= $paginas) {
								$qttPaginasFim = $paginas;
							}
							if ($qttPaginasInicio <= "1") {
								$qttPaginasInicio = 1;
							}

							$inicio = $qttPaginasInicio * $qpp - $qpp;


							$inicioxxx2 = $_GET["to"];
							$fimxxx2 = $_GET["from"];


							//verifica total de anuncios na consulta solicitada
							$result = $mysqli->query("SELECT COUNT(*) as Regs FROM fotos $busca");
							$num = $result->fetch_array();
							$totalAnunciosEsse = $num['Regs'];

							echo "<td align=\"right\"><div class=\"btspaginacaoinicio\" onclick=\"window.location='?idalbum=$idalbum&i=0&palavra=$palavra&qntpp=$qntpp&to=$inicioxxx2&from=$fimxxx2';\">Primeira</div>";

							//$paginas=$paginas;
							for ($c = $qttPaginasInicio; $c <= $qttPaginasFim; $c++) {
								if ($inicio == $qualEstouValida) {
									echo "<div class=\"btspaginacaoativo\" style='text-decoration:none;color:#000'>$c</div>";
								} else {
									echo "<div class=\"btspaginacao\" onclick=\"window.location='?idalbum=$idalbum&i=$inicio&palavra=$palavra&qntpp=$qntpp&to=$inicioxxx2&from=$fimxxx2';\">$c</div>";
								}

								$inicio = $inicio + $qpp;
							}

							//prepara chamada ultima pagina
							$ultimaPagina = $mostrarTotal / $qpp;
							$ultimaPagina = ceil($ultimaPagina);
							$ultimaPagina = $ultimaPagina * $qpp;
							$ultimaPagina = $ultimaPagina - $qpp;

							echo "<div class=\"btspaginacaofim\" onclick=\"window.location='?idalbum=$idalbum&i=$ultimaPagina&palavra=$palavra&qntpp=$qntpp&to=$inicioxxx2&from=$fimxxx2';\">Última</div>";



							?>

							<?php
							//valida o total por páginas para mostrar
							if ($qpp == "9999999999999") {
								$qpptratado = "todos";
								$btmostrar = "<a style=\"color:#333;\" href=\"?idalbum=$idalbum&palavra=$palavra&qntpp=20&to=$inicioxxx2&from=$fimxxx2\">Mostrar 20 por página</a>";
							} else {
								$qpptratado = $qpp . "  por página";
								$btmostrar = "<a style=\"color:#333;\" href=\"?idalbum=$idalbum&palavra=$palavra&qntpp=9999999999999&to=$inicioxxx2&from=$fimxxx2\">Mostrar todos</a>";
							}
							?>


						</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>
					<tr>
						<td></td>
						<td align="right"><br />Total encontrado: <b><?= $totalAnunciosEsse ?></b><br />Mostrando <?= $qpptratado ?><br /><br /><?= $btmostrar ?><br /><br /></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>

				</table>


			</td>
		</tr>
	</table>
	<br />
	<br />
	<br />
	<br />


	<div id="menurodape"><a href="http://www.piovezam.com" target="_blank">Piovezam Soluções Web</a></div>


	<script>
		function alterarstatus(idos) {
			$("#fundoLight").fadeIn('fast');
			$("#idos").attr("value", idos);
		}

		function fechar() {
			$("#fundoLight").fadeOut('fast');
		}

		function limpar() {
			document.getElementById("to_x1").value = "";
			document.getElementById("from_x1").value = "";
			document.getElementById("to").value = "";
			document.getElementById("from").value = "";
			document.getElementById("formfiltrardatas").submit();

		}

		function dlbanner(id, idalbum) {
			var answer = confirm("Deseja mesmo deletar essa foto?")
			if (answer) {
				window.location = "scripts/dlfoto-album.php?id=" + id + "&idalbum=" + idalbum;
			} else {}
		}

		function dfcapa(id, idalbum) {
			var answer = confirm("Deseja mesmo definir essa foto como capa?")
			if (answer) {
				window.location = "scripts/dfcapa-album.php?id=" + id + "&idalbum=" + idalbum;
			} else {}
		}
	</script>
</body>

</html>