<?php
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	

	
	$id=$_GET["id"];
	
	$titulo=$_POST["titulo"];
		$urlcriada=transf_url($titulo);		
		$titulo=str_replace("\"","&#34",$titulo);								
		$titulo=str_replace("'","&#39",$titulo);			
	

	$data=$_POST["data"];
		$dataformatada=formataDataInvertida($data);

	$hora=$_POST["hora"];		
		
	
	$destaque=$_POST["destaque"];
		
	$linhafina=$_POST["linhafina"];
		$linhafina=str_replace("\"","&#34",$linhafina);								
		$linhafina=str_replace("'","&#39",$linhafina);	

	$autor=$_POST["autor"];
		$autorurlcriada=transf_url($autor);		
		$autor=str_replace("\"","&#34",$autor);								
		$autor=str_replace("'","&#39",$autor);		
		
	$texto=$_POST["texto"];
	
	$tags=$_POST["tagsx"];	
	

if(($titulo=="")||($data=="")||($destaque=="")||($linhafina=="")||($texto=="")||($autor=="")||($tags=="")){
	echo"<script>alert('Os campos Título / Data / Destaque / Linha Fina / Tags / Preview e Texto, não podem ficar em branco!');history.go(-1);</script>";
}
else{

	


	$consultab="UPDATE noticias SET data='$dataformatada', autorurl='$autorurlcriada', hora='$hora', titulo='$titulo', autor='$autor', urlamigavel='$urlcriada', linhafina='$linhafina', destaque='$destaque' WHERE id='$id'";
	
		echo $consultab;
	if($resultadob=mysql_query($consultab)){
		//edita o txt do texto
		$fp = fopen("../../textos/".$id.".txt" , "w");
		fwrite($fp, $texto);

	}
	else{
		echo"<script>alert('Erro ao editar.\\nTente novamente!');</script><script>history.go(-1);</script>";
	
	}	
	
	
//limpo tags dessa noticia no tagiado.
$consulta="DELETE FROM tagiado WHERE idnot='$id'";
if($resultado=mysql_query($consulta)){

}
else{
		echo"<script>alert('Erro ao deletar tags antigas.\\nTente novamente!');</script><script>history.go(-1);</script>";
}





//vejo as tags desse texto
$tags=$_POST["tagsx"];
if($tags==""){
	echo"<script>alert('Selecione ao menos 1 tag');history.go(-1);</script>";
}
else{
    foreach($tags as $tag){
		


	$consulta="INSERT INTO tagiado (idnot, idtag) VALUES ('$id', '$tag')";
			if($resultado=mysql_query($consulta)){

			}
			else{
				echo"<script>alert('Erro ao salvar tags da notícia. Por favor, tente novamente!');</script><script>history.go(-1);</script>";	
			}//fechamento else salvar no banco
		
	}//fechamento foreach
}//fechamento else valida campo vazio		



echo"<script>window.location='../editar-noticia.php?id=$id';</script>";




}//fechamento else valida campo vaio
	

?>