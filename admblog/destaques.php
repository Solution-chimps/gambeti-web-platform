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
<script src="scripts/jquery-1.9.1.js"></script>
<script src="scripts/jquery-ui.js"></script>
  <script>

  
  $(function() {
    $( "#from" ).datepicker({
    dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'	,
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
    dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior',		
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate,{ dateFormat: 'dd-mm-yy' } );
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
    	<td id="linhamenu" valign="top"><?php require "menu.php"?></td>
    	<td align="left" valign="top" id="linhaconteudo">
        <div id="chamadapagina"><br />&nbsp;&nbsp;Destaques<br /><font size="2">&nbsp;&nbsp;&nbsp;Gerencie os destaques do site.</font></div>
        Lista de Destaques
        <br /><br /><br />

<table width="96%" border="0" cellpadding="0" cellspacing="0">




	<tr>
    	<td align="right" height="40">
<?php
	$palavra=$_GET["palavra"];
	$inicio=$_GET["to"];
	$fim=$_GET["from"];
?>           



        </td>
    </tr>
    <tr>
    	<td>
<?php
	$inicio=$_GET["to"];
	$fim=$_GET["from"];	
	
	if(($inicio!="")&&($fim!="")){
		$btlimpar="<input type='button' value='Limpar datas' class='btverde' onclick='limpar()'>";
	}
?>           
 
        </td>
    </tr>
</table>

<table class="tabelalistagem" width="96%" cellpadding="8" cellspacing="0" border="0">

	<tr class="linhaindice">
    	<td class="celularindice" align="center" valign="middle">Posição</td>
    	<td class="celularindice" align="center" valign="middle" style="border-right:none;">Ações</td>                                                
    </tr>


<?php
//consulta o banco para retornar clientes.
require"../scripts/conecta.php";
require"scripts/funcoes.php";


	$dtinicio=$_GET["to"];
		if($dtinicio!=""){
			$dtinicio=formataDataInvertida($dtinicio);
		}
	$dtfim=$_GET["from"];	
		if($dtfim!=""){
			$dtfim=formataDataInvertida($dtfim);
		}
		

		
	

	$palavra=$_GET["palavra"];
		$palavra=strtolower($palavra);		
		$dataformatada=formataDataInvertida($palavra);

if(($dtfim!="")&&($dtinicio!="")){
	$complemento=" AND data>='$dtfim' AND data<='$dtinicio'";
}
else{
	$complemento="";	
}


	if($palavra!=""){
		$busca=" WHERE nome REGEXP '$palavra'";
	}


	
if(($palavra=="")&&($dtinicio!="")){
		$busca=" WHERE data>='$dtfim' AND data<='$dtinicio'";	
}
	


	
	$inicio=$_GET["i"];
		$inicio=limparString($inicio);

	$qntpp=$_GET["qntpp"];
		$qntpp=limparString($qntpp);
		
	if(($qntpp=="")||($qntpp=="-")){
		$qpp=20;	
	}
	else{
		$qpp=$qntpp;
	}
				

	if(($inicio=="")||($inicio=="-")){
		$inicio="0";
	}	
		


		
	$contador="0";
	$consulta= "SELECT *FROM destaques$busca ORDER BY id ASC LIMIT $inicio,$qpp";
	
	//echo $consulta;
	



echo"
	<tr class=\"linhacomumpar\">

    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\">Posição 1</td>					
		<td class=\"celularcomum\" align=\"center\" valign=\"middle\" style=\"border-right:none;\" width=\"140\"><div class=\"btcinza\" onclick=\"window.location='editar-destaque.php?id=1';\">Editar</div></td>
    </tr>
";

echo"
	<tr class=\"linhacomumpar\">

    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\">Posição 2</td>					
		<td class=\"celularcomum\" align=\"center\" valign=\"middle\" style=\"border-right:none;\" width=\"140\"><div class=\"btcinza\" onclick=\"window.location='editar-destaque.php?id=2';\">Editar</div></td>
    </tr>
";

echo"
	<tr class=\"linhacomumpar\">

    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\">Posição 3</td>					
		<td class=\"celularcomum\" align=\"center\" valign=\"middle\" style=\"border-right:none;\" width=\"140\"><div class=\"btcinza\" onclick=\"window.location='editar-destaque.php?id=3';\">Editar</div></td>
    </tr>
";

	
	$resultado = mysql_query($consulta) or die("<br />Falha na execução da consulta 2. Erro: ".mysql_error());
	while($linha=mysql_fetch_assoc($resultado))
	{
		$id=$linha["id"];

		$imagem=$linha["foto"];		
		$nome=$linha["nome"];		



			


		
		$contador++;
		$divisaor=$contador%2;
		
		$valortotalos=$valortotalos+$total;
		
		



	
	
	}
	


	
	if($contador=="0"){


	}
	else{
//mostra o valor total das os

			$valortotalos=number_format($valortotalos, 2, '.', '');					
echo"
	<tr class=\"linhacomuimpar\">
    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\" colspan=\"5\" style=\"border-right:none;height:2px;\"></td>
    </tr>
";			
	}
?>



    
</table>   

<br />


        
        </td>
    </tr>
</table>
<br />
<br />
<br />
<br />


<div id="menurodape"><a href="http://www.piovezam.com" target="_blank">Piovezam Soluções Web</a></div>


<script>
	function alterarstatus(idos){
		$("#fundoLight").fadeIn('fast');	
		$("#idos").attr("value", idos);
	}		
	function fechar(){
		$("#fundoLight").fadeOut('fast');		
	}
	function limpar(){
		document.getElementById("to_x1").value="";
		document.getElementById("from_x1").value="";
		document.getElementById("to").value="";
		document.getElementById("from").value="";	
		document.getElementById("formfiltrardatas").submit();			
							
	}
	function dlbanner(id){
		var answer = confirm("Deseja mesmo deletar esse elenco?")
		if (answer){
			window.location = "scripts/dlelenco.php?id="+id;
		}
		else{
		}
	}	
</script>
</body>
</html>