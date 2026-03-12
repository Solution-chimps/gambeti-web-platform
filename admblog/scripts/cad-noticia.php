<?php
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	
	require"../attfeed.php";		
	
	$titulo=$_POST["titulo"];
		$urlcriada=transf_url($titulo);		
		$titulo=str_replace("\"","&#34",$titulo);								
		$titulo=str_replace("'","&#39",$titulo);			
	

	$data=$_POST["data"];
		$dataformatada=formataDataInvertida($data);

	$hora=$_POST["hora"];
	
	$datahojeprog=date("Y-m-d");
	$horaagoraprog=date("H:i:s");
	if($dataformatada==$datahojeprog){
		if($hora>=$horaagoraprog){
			//echo "Programar 1";
			require"programar.php";
			//break;
		}
		else{
			//echo"Sem programar";
			require"pubblicaragora.php";			
		}		
	}
	else if($dataformatada>=$datahojeprog){
			//echo "Programar 2";		
		require"programar.php";
		//break;		
	}
	else{
		//echo"Nada";
			//echo"Sem programar2";		
		require"pubblicaragora.php";					
	}









	
	

?>