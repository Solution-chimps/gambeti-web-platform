<?php
function validaEmail($email) {
	$conta = '/^[a-zA-Z0-9\._-]+?@';
	$domino = '[a-zA-Z0-9_-]+?\.';	
	$gTLD = '[a-zA-Z]{2,6}'; //.com; .coop; .gov; .museum; etc.	
	$ccTLD = '((\.[a-zA-Z]{2,4}){0,1})$/'; //.br; .us; .scot; etc.
	$pattern = $conta.$domino.$gTLD.$ccTLD;
	
	if (preg_match($pattern, $email)){
		return true;
	}
	else{
		return false;
	}
}
	//retira aspas, barras e < >
	function trataget($valor){
		$valor=str_replace("\"","&#34",$valor);								
		$valor=str_replace("'","&#39",$valor);
		$valor=strip_tags($valor);	
		$valor=addslashes($valor);		
		return $valor;		
	}
	function limparString($valor){
		if($valor==""){
			return "-";
		}
		else{
			$valor=str_replace("'"," ",$valor);
			$valor=str_replace("\""," ",$valor);
			$valor=str_replace("\\"," ",$valor);		
			$valor=str_replace("\/"," ",$valor);			
			$valor=str_replace("<"," ",$valor);	
			$valor=str_replace(">"," ",$valor);				
			return $valor;
		}
	}	
	function aspasemasci($valor){
			$valor=str_replace("\"","&#34",$valor);								
			$valor=str_replace("'","&#39",$valor);
			return $valor;					
	}
	function limparStringUrl($valor){
		if($valor==""){
			return "-";
		}
		else{
			$valor=str_replace("'"," ",$valor);
			$valor=str_replace("\""," ",$valor);
			$valor=str_replace("<"," ",$valor);	
			$valor=str_replace(">"," ",$valor);				
			return $valor;
		}
	}	
	function limparStringEspecial($valor){
		if($valor==""){
			return "-";
		}
		else{
			$valor=str_replace("'"," ",$valor);
			$valor=str_replace("\""," ",$valor);
			$valor=str_replace("<"," ",$valor);	
			$valor=str_replace(">"," ",$valor);				
			return $valor;
		}
	}	
	function limparString3($valor){
		if($valor==""){
			return "-";
		}
		else{
			$valor=str_replace("'","",$valor);
			$valor=str_replace("\"","",$valor);
			$valor=str_replace("\\","",$valor);		
			$valor=str_replace("\/","",$valor);			
			$valor=str_replace("<","",$valor);	
			$valor=str_replace(">","",$valor);					
			$valor=str_replace(" ","",$valor);
			$valor=str_replace("-","",$valor);
			$valor=str_replace("(","",$valor);
			$valor=str_replace(")","",$valor);
			$valor=str_replace("[","",$valor);
			$valor=str_replace("]","",$valor);	
			$valor=str_replace("‡","",$valor);
			$valor=str_replace("+","",$valor);								
			return $valor;
		}
	}	
	function removeAcento($valor){
			return strtr($valor, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ","aaaaeeiooouucAAAAEEIOOOUUC");		
	}
	function limparString2($Msg)
	{
	$Msg=strtolower($Msg);
	$Msg=str_replace("-","",$Msg);
	$Msg=str_replace("'","xx",$Msg);
	$Msg=str_replace("\"","",$Msg);
	$Msg=str_replace(",","",$Msg);
	$Msg=str_replace(" ","_",$Msg);
	$Msg=str_replace("\\","",$Msg);
	$Msg=str_replace("\/","",$Msg);
	$Msg=str_replace("<","",$Msg);
	$Msg=str_replace(">","",$Msg);
	$Msg=str_replace("©","",$Msg);
	$Msg = ereg_replace("[áàâãªä]","a",$Msg);	
	$Msg = ereg_replace("[éèêë]","e",$Msg);	
	$Msg = ereg_replace("[íìîï]","i",$Msg);	
	$Msg = ereg_replace("[óòôõºö]","o",$Msg);	
	$Msg = ereg_replace("[úùûüü]","u",$Msg);	
	$Msg = str_replace("ç","c",$Msg);
	return $Msg;

	}		
   function formataDataInvertida($data) {
		$dia = substr($data, 0, 2);
		$mes = substr($data, 3, 2);
		$ano = substr($data, 6, 4);
		
		return "$ano-$mes-$dia";
   }

   function formataData($data) {
		$dia = substr($data, 8, 2);
		$mes = substr($data, 5, 2);
		$ano = substr($data, 0, 4);
		
		return "$dia/$mes/$ano";
   }

   function pegaAno($data) {
		$dia = substr($data, 8, 2);
		$mes = substr($data, 5, 2);
		$ano = substr($data, 0, 4);
		
		return "$ano";
   }
   function pegaDia($data) {
		$dia = substr($data, 8, 2);
		$mes = substr($data, 5, 2);
		$ano = substr($data, 0, 4);
		
		return "$dia";
   }
   function pegaMes($data) {
		$dia = substr($data, 8, 2);
		$mes = substr($data, 5, 2);
		$ano = substr($data, 0, 4);
		
		return "$mes";
   }	
	function semanaAno($dia,$mes,$ano){
		$dia=$dia+1;
		$numSemana=intval( date('z', mktime(0,0,0,$mes,$dia,$ano) ) / 7 ) + 1;
		return $numSemana;
	}   

	function mesExtenso($mes){
		if(($mes=="01")||($mes=="1")){
			$mesExtenso="Janeiro";
		}
		else if(($mes=="02")||($mes=="2")){
			$mesExtenso="Fevereiro";
		}		
		else if(($mes=="03")||($mes=="3")){
			$mesExtenso="Março";
		}		
		else if(($mes=="04")||($mes=="4")){
			$mesExtenso="Abril";
		}		
		else if(($mes=="05")||($mes=="5")){
			$mesExtenso="Maio";
		}				
		else if(($mes=="06")||($mes=="6")){
			$mesExtenso="Junho";
		}				
		else if(($mes=="07")||($mes=="7")){
			$mesExtenso="Julho";
		}		
		else if(($mes=="08")||($mes=="8")){
			$mesExtenso="Agosto";
		}						
		else if(($mes=="09")||($mes=="9")){
			$mesExtenso="Setembro";
		}				
		else if($mes=="10"){
			$mesExtenso="Outubro";
		}				
		else if($mes=="11"){
			$mesExtenso="Novembro";
		}				
		else if($mes=="12"){
			$mesExtenso="Dezembro";
		}
		else{
			$mesExtenso="ND";			
		}
		return $mesExtenso;
	} 
	function tirarAcento($palavra){
		$palavra=str_replace("á","a",$palavra);
		$palavra=str_replace("à","a",$palavra);
		$palavra=str_replace("â","a",$palavra);
		$palavra=str_replace("ã","a",$palavra);
		$palavra=str_replace("ä","a",$palavra);
		$palavra=str_replace("ª","a",$palavra);								

		$palavra=str_replace("Á","a",$palavra);
		$palavra=str_replace("À","a",$palavra);
		$palavra=str_replace("Â","a",$palavra);
		$palavra=str_replace("Ã","a",$palavra);
		$palavra=str_replace("Ä","a",$palavra);

		$palavra=str_replace("é","e",$palavra);								
		$palavra=str_replace("è","e",$palavra);								
		$palavra=str_replace("ê","e",$palavra);								
		$palavra=str_replace("ë","e",$palavra);																

		$palavra=str_replace("É","e",$palavra);								
		$palavra=str_replace("È","e",$palavra);								
		$palavra=str_replace("Ê","e",$palavra);								
		$palavra=str_replace("Ë","e",$palavra);			

		$palavra=str_replace("í","i",$palavra);																
		$palavra=str_replace("ì","i",$palavra);																
		$palavra=str_replace("î","i",$palavra);																
		$palavra=str_replace("ï","i",$palavra);																								

		$palavra=str_replace("Í","i",$palavra);																
		$palavra=str_replace("Ì","i",$palavra);																
		$palavra=str_replace("Î","i",$palavra);																
		$palavra=str_replace("Ï","i",$palavra);			

		$palavra=str_replace("ó","o",$palavra);																
		$palavra=str_replace("ò","o",$palavra);																
		$palavra=str_replace("ô","o",$palavra);																
		$palavra=str_replace("õ","o",$palavra);			
		$palavra=str_replace("ö","o",$palavra);					
		$palavra=str_replace("º","o",$palavra);							
		
		$palavra=str_replace("Ó","o",$palavra);																
		$palavra=str_replace("Ò","o",$palavra);																
		$palavra=str_replace("Ô","o",$palavra);																
		$palavra=str_replace("Õ","o",$palavra);			
		$palavra=str_replace("Ö","o",$palavra);					

		$palavra=str_replace("ú","u",$palavra);		
		$palavra=str_replace("ù","u",$palavra);
		$palavra=str_replace("û","u",$palavra);
		$palavra=str_replace("ü","u",$palavra);	

		$palavra=str_replace("Ú","o",$palavra);																
		$palavra=str_replace("Ù","o",$palavra);																
		$palavra=str_replace("Û","o",$palavra);																
		$palavra=str_replace("Ü","o",$palavra);			

		$palavra=str_replace("ç","c",$palavra);	
		$palavra=str_replace("Ç","c",$palavra);			
		return $palavra;							
	}
	
function transf_url($valor){
	$valor=tirarAcento($valor);					
	$valor=strtolower($valor);	
	$valor=str_replace("´","",$valor);	
	$valor=str_replace("\"","",$valor);	
	$valor=str_replace("\'","",$valor);		
	$valor=str_replace(" ","-",$valor);	
	$valor=str_replace("/","",$valor);	
	$valor=str_replace("\\","",$valor);		
	$valor=str_replace("_","",$valor);
	$valor=str_replace("!","",$valor);	
	$valor=str_replace("?","",$valor);
	$valor=str_replace("(","",$valor);
	$valor=str_replace(")","",$valor);		
	$valor=str_replace(".","",$valor);	
	$valor=str_replace(",","",$valor);		
	$valor=str_replace(":","",$valor);
	$valor=str_replace("<","",$valor);	
	$valor=str_replace(">","",$valor);		
	$valor=str_replace("&#34","",$valor);								
	$valor=str_replace("&#39","",$valor);			


	return $valor;
}	  	
function geraTimestamp($data) {
$partes = explode('/', $data);
return mktime(0, 0, 0, $partes[1], $partes[0], $partes[2]);
}
   
   function mascaradocumento($data) {
	   	$tamanhodocumento=strlen($data);

			if($tamanhodocumento==9){
				//é um rg
				$p1 = substr($data, 0, 2);
				$p2 = substr($data, 2, 3);
				$p3 = substr($data, 5, 3);
				$p4 = substr($data, 8, 2);		
				
				return "$p1.$p2.$p3-$p4";
			}		
			if($tamanhodocumento==11){
				//é um cpf
				$p1 = substr($data, 0, 3);
				$p2 = substr($data, 3, 3);
				$p3 = substr($data, 6, 3);
				$p4 = substr($data, 9, 2);		
				
				return "$p1.$p2.$p3-$p4";
			}
			if($tamanhodocumento=="14"){
				//é um cnnpj
				$p1 = substr($data, 0, 2);
				$p2 = substr($data, 2, 3);
				$p3 = substr($data, 5, 3);
				$p4 = substr($data, 8, 4);		
				$p5 = substr($data, 12, 2);						
				
				return "$p1.$p2.$p3/$p4-$p5";				
			}
			else{
				return $data;
			}
   }
   
   

?>