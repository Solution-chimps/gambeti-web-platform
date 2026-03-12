<?php
	require"scripts/verifica.php";
	require"scripts/pegarDados.php";
	require"../scripts/conecta.php";	
	require"../scripts/funcoes.php";		
	
	//carrego infos dessa noticia
	$id=$_GET["id"];	
$consulta= "SELECT *FROM cursos WHERE id='$id'";
$resultado = mysql_query($consulta) or die("Falha na execução da consulta");

	while($linha=mysql_fetch_assoc($resultado)){
		
		$nome=$linha["nome"];
		$datae=$linha["datae"];
		$dtexpiracao=$linha["dtexpiracao"];
			$dtexpiracao=formataData($dtexpiracao);
		$dtlimiteinscr=$linha["dtlimiteinscr"];
			$dtlimiteinscr=formataData($dtlimiteinscr);		
		$senha=$linha["senha"];						
		$valor=$linha["valor"];
		$parcelamento=$linha["parcelamento"];		
			//$valor=str_replace(".",",",$valor);
			$valor=number_format($valor, 2, ',', '');			
			$valor="R$ ".$valor;

		$duracao=$linha["duracaocert"];
		$local=$linha["localcert"];
		$data=$linha["datacert"];							

		$valoravista=$linha["valoravista"];							
			$valoravista=number_format($valoravista, 2, ',', '');			
			$valoravista="R$ ".$valoravista;
		
		$descontoavista=$linha["descontoavista"];											
		
		$descricao=$linha["descricao"];	
		$destino=$linha["destino"];	
		$inscricao=$linha["inscricao"];	
			if($inscricao==""){
				$inscricao="Sim";
			}
		$imgdestaque=$linha["imgdestaque"];	
									





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
<body onload="posicionar();validaescolhidainscricao();">

<script>
	function posicionar(){
		document.getElementById("parcelamento").value="<?=$parcelamento?>";
		document.getElementById("descontoavista").value="<?=$descontoavista?>";		
		document.getElementById("inscricao").value="<?=$inscricao?>";				
	}
</script>



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
        <div id="chamadapagina"><br />&nbsp;&nbsp;Editar Curso<br /><font size="2">&nbsp;&nbsp;&nbsp;Preencha as informações abaixo e edite o curso.</font></div>
        <br />
		<br />
        <form action="scripts/edt-curso.php?id=<?=$id?>" method="post">








        Nome<br />
		<input type="text" name="nome" value="<?=$nome?>" class="configcampo"><br /><br />  

        Data por Extenso <a title="Data exibida no select ao lado do nome do curso">[?]</a><br />
		<input type="text" name="datae" value="<?=$datae?>" class="configcampo"><br /><br />  

        Data Limite para Inscrição<br />
		<input type="text" name="dtlimiteinscr" value="<?=$dtlimiteinscr?>" class="configcampo"><br /><font size="1">dd/mm/aaaa</font><br /><br />                  
        
         Imagem de destaque<br />
        <img src="../imagens/<?=$imgdestaque?>" class="fotoprincipal" /><br />
		<a href='#' onClick="window.open('verFotoCurso.php?id=<?=$id?>','TrocarFoto','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=400,height=200,top=25,left=25'); return false;">alterar</a><br /><br />


        


        Descrição<br />
		<textarea name="descricao" class="configtextomenor"><?=$descricao?></textarea><br /><br />                  
        
        
        Link de destino<br />
		<input type="text" name="destino" value="<?=$destino?>" class="configcampo"><br /><br />  

        
        Permitir inscrição?<br />
		<select name="inscricao" id="inscricao" class="configcampo" onchange="validaescolhidainscricao()">
        	<option value="">Escolha</option>
        	<option value="Sim">Sim</option>
        	<option value="Não">Não</option>                        
        </select>
        <br /><br />       
        
        <div id="camposinscricao" style="display:none">
 
        Data de Expiração do Certificado<br />
		<input type="text" name="dtexpiracao" value="<?=$dtexpiracao?>" class="configcampo"><br /><font size="1">dd/mm/aaaa</font><br /><br />          
        

        Senha<br />
		<input type="text" name="senha" value="<?=$senha?>" class="configcampo"><br /><br />  

        Valor<br />
		<input type="text" name="valor" id="valor" value="<?=$valor?>" class="configcampo"><br /><br />          


        Permitir parcelamento?<br />
		<select name="parcelamento" id="parcelamento" class="configcampo">
        	<option value="">Escolha</option>
        	<option value="Sim">Sim</option>
        	<option value="Não">Não</option>                        
        </select>
        <br /><br />          

       Desconto a Vista?<br />
		<select name="descontoavista" id="descontoavista" class="configcampo">
        	<option value="">Escolha</option>
        	<option value="Sim">Sim</option>
        	<option value="Não">Não</option>                        
        </select>
        <br /><br /> 

        Valor a vista com desconto [<a title="Preencha apenas em caso de resposta positiva acima">?</a>]<br />
		<input type="text" name="valoravista" id="valoravista" value="<?=$valoravista?>" class="configcampo"><br /><br />          
                  
        
<fieldset>
	<legend>Dados impressos no certificado</legend>

        Duração<br />
		<input type="text" name="duracaocert" value="<?=$duracao?>" class="configcampo"><br /><br />  
        
        Local<br />
		<input type="text" name="localcert" value="<?=$local?>" class="configcampo"><br /><br />  

        Data<br />
		<input type="text" name="datacert" value="<?=$data?>" class="configcampo"><br /><br />          



    
</fieldset>


        </div>
              
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
	function validaescolhidainscricao(){
		var valor=document.getElementById("inscricao").value;
		if(valor=='Sim'){
			document.getElementById("camposinscricao").style.display="block";			
		}
		else{
			document.getElementById("camposinscricao").style.display="none";					
		}
	}
</script>

<script src="scripts/jquery.maskMoney.js" type="text/javascript"></script>
<script type="text/javascript">$("#valor").maskMoney({prefix:'R$ ', thousands:'', decimal:',', affixesStay: true});</script>
<script type="text/javascript">$("#valoravista").maskMoney({prefix:'R$ ', thousands:'', decimal:',', affixesStay: true});</script>

   
   
</body>
</html>