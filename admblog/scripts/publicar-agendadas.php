<?php
require"../../scripts/conecta.php";

//carrego as notificas programadas
$dthj=date("Y-m-d");
$hrhj=date("H:i:s");

	//$dthj="2021-01-04";
	//$hrhj="20:30:00";

$sql = "SELECT * FROM noticiasprog WHERE data<='$dthj'";
$query = $mysqli->query($sql);
while ($dados = $query->fetch_array()) {
 $id=$dados['id'];
 $data=$dados['data']; 
 $hora=$dados['hora'];  
 $titulo=$dados['titulo'];  
 $autor=$dados['autor'];  
 $autorurl=$dados['autorurl'];  
 $urlamigavel=$dados['urlamigavel'];  
 $linhafina=$dados['linhafina'];  
 $preview=$dados['preview'];  
 $destaque=$dados['destaque'];  
 $aberturas=$dados['aberturas'];  
 $identificador=$dados['identificador']; 
 
 echo"Notícia encontrada: $titulo<br />Agendada para $data às $hora<br />";
 	if($dthj>$data){
		//se a data ja passou eu forco a data pra ja publicar
		$hrhj=$hora;
	}
	
 	if($hrhj>=$hora){
		//publico
		//altero os destaques
		$sql2 = "UPDATE noticias SET destaque='0' WHERE destaque='$destaque'";
		$query2 = $mysqli->query($sql2);
		if($query2==true){}
		else{
			echo"<script>alert('Erro ao alterar o destaque.\\nTente novamente!');</script><script>history.go(-1);</script>";
			exit;
		}	
		
		//cadastro no bd a notifica	
		$sql3 = "INSERT INTO noticias (data, hora, titulo, autor, urlamigavel, linhafina, preview, destaque, identificador, autorurl) VALUES ('$data','$hora', '$titulo', '$autor', '$urlamigavel', '$linhafina','$preview', '$destaque','$identificador','$autorurl')";
		$query3 = $mysqli->query($sql3);
		if($query3==true){
			
			//consulto id dela
			$sql4 = "SELECT *FROM noticias WHERE identificador='$identificador'";
			$query4 = $mysqli->query($sql4);
			if ($dados4 = $query4->fetch_array()) {
			 $idNoticiaCadastradaAgora=$dados4['id'];

				//carrego o texto
				$arquivo = "../../textosprog/".$id.".txt";
				$fp = fopen($arquivo,"r");
				$texto= fread($fp, filesize($arquivo));
		 
				//cria o novo txt do texto
				$fp = fopen("../../textos/".$idNoticiaCadastradaAgora.".txt" , "w");
				fwrite($fp, $texto);	
				
				//consulto as tags
				$sql5 = "SELECT *FROM tagiadoprog WHERE idnot='$id'";
				$query5 = $mysqli->query($sql5);
				while ($dados5 = $query5->fetch_array()) {
					$idtag=$dados5['idtag'];
						echo "Tags encontradas $idtag<br />";

					//insiro no novo tagiado
					$sql6 = "INSERT INTO tagiado (idnot, idtag) VALUES ('$idNoticiaCadastradaAgora', '$idtag')";
					$query6 = $mysqli->query($sql6);
					if($query6==true){
							echo"Inseridas nas tags<br />";
					}
					else{
						echo"<script>alert('Erro ao cadastrar tags.\\nTente novamente!');</script><script>history.go(-1);</script>";
						exit;
						
					}
					
						
				}				
				
			}
		
		echo"$titulo - Cadastrada com sucesso!<br />";	
		

		
		//limpo o agendamento
		$sql7 = "DELETE FROM noticiasprog WHERE id='$id'";
		$query7 = $mysqli->query($sql7);
		if($query7==true){}
		else{
			echo"<script>alert('Erro ao deletar do agendamento.\\nTente novamente!');</script><script>history.go(-1);</script>";
			exit;
						
		}
		$sql8 = "DELETE FROM tagiadoprog WHERE idnot='$id'";
		$query8 = $mysqli->query($sql8);
		if($query8==true){}
		else{
			echo"<script>alert('Erro ao deletar do agendamento.\\nTente novamente!');</script><script>history.go(-1);</script>";
			exit;
						
		}		
		

			
		}
		else{
			echo"<script>alert('Erro ao cadastrar notícia.\\nTente novamente!');</script><script>history.go(-1);</script>";
			exit;
		}		
		
		
		
	}
 
}
	




























	
	

?>