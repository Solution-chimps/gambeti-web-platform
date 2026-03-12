<?php


    // processar o formulario
// DECLARO AS VARIAVEIS
$nome=$_POST["nome"];
$email=$_POST["email"];
$telefone=$_POST["telefone"];
$empresa=$_POST["empresa"];
$pagina=$_POST["pagina"];
$mensagem=$_POST["mensagem"];


///////////////////////////////////////////////////////////////////////////


// FUNCIONAMENTO DO E-MAIL
$email_remetente = "comercial@gambeti.com.br";
$headers = "MIME-Version: 1.1\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: $email_remetente\n"; // remetente
$headers .= "Return-Path: $email_remetente\n"; // return-path
$headers .= "Reply-To: $email\n"; // Endereço (devidamente validado) que o seu usuário informou no contato
///////////////////////////////////////////////////////////////////////////



// PASSANDO PRA UTF8
$nome=utf8_decode($nome);
$email=utf8_decode($email);
///////////////////////////////////////////////////////////////////////////


// ACESSANDO O BANCO E SALVANDO
/*
 require "conecta.php";
 require "salvaemail.php";
 */
///////////////////////////////////////////////////////////////////////////


 // ESTRUTURA DO CORPO DE E-MAIL
$corpo_email="
<font color='#000' face='arial'>Solicitação de orçamento pelo site.<br />
<br />
<b>Página:</b> $pagina<br />
<b>Nome:</b> $nome<br />
<b>E-mail:</b> $email<br />
<b>Telefone:</b> $telefone<br />
<b>Mensagem:</b> $mensagem<br />

";
$corpo_email=utf8_decode($corpo_email);
///////////////////////////////////////////////////////////////////////////


// REPRODUZIR LOCALMENTE

// echo $corpo_email;
// echo"<hr>";
// echo $corpo_email_visitante;
///////////////////////////////////////////////////////////////////////////



// DECLARANDO O ASSUNTO
$assunto = "Orçamento Site - $nome"; 
$assunto=utf8_decode($assunto);
///////////////////////////////////////////////////////////////////////////

// validação dos campos em brancos
if(($nome=="")||($email=="")||($telefone=="")){
	echo"
	<script> 
	alert('Preencha todos os campos!');
	history.go (-1);
	</script>
	";

	exit;
}
else{

}


// SISTEMA DO ENVIO DE E-MAIL
require_once('phpmailer-master/master/class.phpmailer.php');
$email_php = new PHPMailer();

$email_php->IsHTML(true);
$email_php->From      = "comercial@gambeti.com.br"; // QUEM ENVIOU O E-MAIL
$email_php->FromName  = $nome;
$email_php->Subject   = $assunto;
$email_php->Body      = $corpo_email;
$email_php->AddAddress( "comercial@gambeti.com.br" ); // RECEPTOR DO E-MAIL				
	//$email_php->AddAddress( "contato@piovezam.com.br" ); // RECEPTOR DO E-MAIL								

$email_php->AddReplyTo($email, $nome);
$file_to_attach = '../arquivos/'.$novo_nome;
$email_php->AddAttachment( $file_to_attach );

$email_php->Send();
 // envio do e-mail
if($end!=""){
	unlink("../arquivos/$novo_nome");
}
 


///////////////////////////////////////////////////////////////////////////


// VALIDANDO O ENVIO PRA RETORNAR PRO CLIENTE
if($email_php==true){
	echo"<script>window.location='/obrigado?ref=orcamentoservico';</script>";
}
else{
	echo"
		<script>
			alert('Erro ao enviar, tente novamente!');
			history.go (-1);
		</script>
		";
	}






?>