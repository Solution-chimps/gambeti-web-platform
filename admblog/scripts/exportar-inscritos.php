<?php	

	$palavra=$_GET["palavra"];
		$palavra=strtolower($palavra);		
	if($palavra!=""){
		$busca=" WHERE nome REGEXP '$palavra' OR nomecurso REGEXP '$palavra' OR datacurso REGEXP '$palavra' OR statuspg REGEXP '$palavra' OR formapg REGEXP '$palavra' OR identificador REGEXP '$palavra'";
	}


$montandoaplanilha.="
	<table border=\"1\">
		<tr style=\"font:bold 14px arial\">
     	<td class=\"celularindice\" align=\"center\" valign=\"middle\">Cod. Inscrição</td>        
     	<td class=\"celularindice\" align=\"center\" valign=\"middle\">Nome</td>        
     	<td class=\"celularindice\" align=\"center\" valign=\"middle\">Celular</td>
    	<td class=\"celularindice\" align=\"center\" valign=\"middle\">Telefone</td>  
    	<td class=\"celularindice\" align=\"center\" valign=\"middle\" >E-mail</td>     
    	<td class=\"celularindice\" align=\"center\" valign=\"middle\" >Data de Nascimento</td>             
    	<td class=\"celularindice\" align=\"center\" valign=\"middle\" >CPF</td>                     
    	<td class=\"celularindice\" align=\"center\" valign=\"middle\" >Cidade</td>    			
    	<td class=\"celularindice\" align=\"center\" valign=\"middle\" >Empresa</td>    					
    	<td class=\"celularindice\" align=\"center\" valign=\"middle\" >Como nos Conheceu</td>    					
    	<td class=\"celularindice\" align=\"center\" valign=\"middle\" >Curso</td>    									
    	<td class=\"celularindice\" align=\"center\" valign=\"middle\" >Valor</td>    											
    	<td class=\"celularindice\" align=\"center\" valign=\"middle\" >Data do Curso</td>    													
    	<td class=\"celularindice\" align=\"center\" valign=\"middle\" >Status Pagamento</td>    															
    	<td class=\"celularindice\" align=\"center\" valign=\"middle\" >Forma de Pagamento</td>    																	
    	<td class=\"celularindice\" align=\"center\" valign=\"middle\" >Parcelas</td>    																			
		</tr>
		<tr>
			<td colspan=\"15\"></td>																						
		</tr>		
";


	require_once("../../scripts/conecta.php");
	require_once("funcoes.php");	
	$consultaCli= "SELECT *FROM inscritos$busca ORDER BY nome ASC, nomecurso ASC";
	$resultadoCli = mysql_query($consultaCli) or die("Falha na execução da consulta");
	while($linha=mysql_fetch_assoc($resultadoCli))
	{
		$identificador=$linha["identificador"];
		
		$nome=$linha["nome"];
		$celular=$linha["celular"];
		$telefone=$linha["telefone"];		
		$email=$linha["email"];
		$dtnascimento=$linha["dtnascimento"];

		$cpf=$linha["cpf"];
		$cidade=$linha["cidade"];
		$empresa=$linha["empresa"];						
		$como=$linha["como"];						
		$nomecurso=$linha["nomecurso"];						
		$valor=$linha["valor"];												
			$valor=number_format($valor, 2, ',', '');			
		$datacurso=$linha["datacurso"];

		$statuspg=$linha["statuspg"];	
		$formapg=$linha["formapg"];	
		$parcelas=$linha["parcelas"];																				

$montandoaplanilha.="
		<tr>
    	<td class=\"celularcomum\" nowrap=\"nowrap\" align=\"center\" valign=\"middle\">$identificador</td>
    	<td class=\"celularcomum\" nowrap=\"nowrap\" align=\"center\" valign=\"middle\">$nome</td>
    	<td class=\"celularcomum\" nowrap=\"nowrap\" align=\"center\" valign=\"middle\">$celular</td>		
    	<td class=\"celularcomum\" nowrap=\"nowrap\" align=\"center\" valign=\"middle\">$telefone</td>
    	<td class=\"celularcomum\" nowrap=\"nowrap\" align=\"center\" valign=\"middle\">$email</td>
    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\">$dtnascimento</td>	
    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\">$cpf</td>			
    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\">$cidade</td>			
    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\">$empresa</td>			
    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\">$como</td>			
    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\">$nomecurso</td>									
    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\">R$ $valor</td>									
    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\">$datacurso</td>													
    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\">$statuspg</td>															
    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\">$formapg</td>																	
    	<td class=\"celularcomum\" align=\"center\" valign=\"middle\">$parcelas</td>																			
		</tr>

																						
			

";


		
	}	
	$diahj=date('d/m/Y');
	$horahj=date('H:i:s');	
	$datahoje=$diahj." às ".$horahj;
$montandoaplanilha.="
		<tr>
			<td colspan=\"15\"><br /><br /><font size='1'><strong>Exportado em $datahoje</strong><br />Powered by: Piovezam Soluções Web</font></td>																						
		</tr>	
";		
	
	$montandoaplanilha=utf8_decode($montandoaplanilha);

$nomeArquivo=date("d-m-Y");
$nomeArquivo=$nomeArquivo."_inscritos.xls";
// Configurações header para forçar o download
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=$nomeArquivo" );
header ("Content-Description: PHP Generated Data" );

// Envia o conteúdo do arquivo
echo $montandoaplanilha;
exit;





?>
        


</body>
</html>