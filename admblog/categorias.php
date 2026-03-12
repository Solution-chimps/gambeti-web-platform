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
        <div id="chamadapagina"><br />&nbsp;&nbsp;Categorias Fotos<br /><font size="2">&nbsp;&nbsp;&nbsp;Gerencie as categorias das galerias do site.</font></div>
        Lista de Categorias
        <br /><br /><br />

<table width="96%" border="0" cellpadding="0" cellspacing="0">
    <?php
		/*if($perfilUsuario!="1"){
		}
		else{*/
			echo"<td align=\"right\"><div style=\"width:150px\" class=\"btlaranja\" onclick=\"window.location='adicionar-categoria.php';\">Adicionar Categoria</div></td>";
		//}
	?>


	<tr>
    	<td align="right" height="40">
<?php
	$palavra=$_GET["palavra"];
	$inicio=$_GET["to"];
	$fim=$_GET["from"];
?>           

        	<form action="categorias.php" method="get">
        	<div id="caixabusca">
            	<div id="btbusca"></div>
            	<div id="areatexto"><input value="<?=$palavra?>" type="text" name="palavra" class="configcampobusca" /></div>                
            </div>

            <input type="hidden" name="to" id="to_x1" value="<?=$inicio?>" />
            <input type="hidden" name="from" id="from_x1" value="<?=$fim?>" />
            <input type="hidden" name="qntpp" value="9999999999999" />                  
           
            </form>
           
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
    	<td class="celularindice" align="center" valign="middle">Nome</td>
    	<td class="celularindice" align="center" valign="middle">Link direto</td>        
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
	$consulta= "SELECT *FROM categorias$busca ORDER BY ordem ASC LIMIT $inicio,$qpp";
	
	


	
	$resultado = mysql_query($consulta) or die("<br />Falha na execução da consulta 2. Erro: ".mysql_error());
	while($linha=mysql_fetch_assoc($resultado))
	{
		$id=$linha["id"];



		$ordem=$linha["ordem"];
		$urlamigavel=$linha["urlamigavel"];					
		$nome=$linha["nome"];		

		$data=$linha["data"];		
			$data=formataData($data);


//trata categoria
	if($categoria==1){
		$nomecategoria="Fotos";
	}
	else if($categoria==2){
		$nomecategoria="Vídeos";		
	}
	else if($categoria==3){
		$nomecategoria="Áudios";		
	}	




		
		$contador++;
		$divisaor=$contador%2;
		
		$valortotalos=$valortotalos+$total;
		


echo"
	<tr class=\"linhacomumpar\">

    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\">$nome</td>	
    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\">http://www.institutoi9c.com.vc/evento/$urlamigavel.html</td>			
    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\">$ordem</td>					
		<td class=\"celularcomum\" align=\"center\" valign=\"middle\" style=\"border-right:none;\" width=\"140\"><div class=\"btcinza\" onclick=\"window.location='editar-categoria.php?id=$id';\">Editar</div><div class=\"btcinza\" onclick=\"deletar('$id');\">Deletar</div> $btedicao</td>
    </tr>
";	



	
	
	}
	


	
	if($contador=="0"){
echo"
	<tr>
		<td colspan=\"5\" align=\"center\">Nenhuma categoria encontrada... Contate o administrador.</td>
	</tr>
";
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
	function deletar(id){
		var answer = confirm("Deseja mesmo deletar essa categoria?")
		if (answer){
			window.location = "scripts/dlcategoria.php?id="+id;
		}
		else{
		}
	}	
</script>
</body>
</html>