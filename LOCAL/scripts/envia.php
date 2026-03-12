<?php

// incluir a funcionalidade do recaptcha
require_once "../relib/recaptchalib.php";

// definir a chave secreta
$secret = "6Lc8PBkaAAAAAEMYc_VIzd1_gA8tRDZvq2KU7_JG";

// verificar a chave secreta
$response = null;
$reCaptcha = new ReCaptcha($secret);

if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]);
}

// deu tudo certo?
if ($response != null && $response->success) {
    // processar o formulario

// DECLARO AS VARIAVEIS
$nome=$_POST["nome"];
$email=$_POST["email"];
$telefone=$_POST["telefone"];
$txtarea=$_POST["mensagem"];

///////////////////////////////////////////////////////////////////////////


// FUNCIONAMENTO DO E-MAIL
$email_remetente = "comercial@fortalezza.com.br";
$headers = "MIME-Version: 1.1\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: $email_remetente\n"; // remetente
$headers .= "Return-Path: $email_remetente\n"; // return-path
$headers .= "Reply-To: $email\n"; // Endereço (devidamente validado) que o seu usuário informou no contato
///////////////////////////////////////////////////////////////////////////

$end=$_FILES['arquivo']['name'];

$uploaddir = "../arquivos/";
$uploadfile = $uploaddir . $_FILES['arquivo']['name'];


if($end==""){
	$mostraplanta="";
}
else{

if(move_uploaded_file($_FILES['arquivo']['tmp_name'],$uploadfile)){

	$numerorandomico=rand(0,1000);
	$novo_nome=$numerorandomico.$_FILES['arquivo']['name'];
	$novo_nome=str_replace(" ","",$novo_nome);
	$novo_nome=str_replace("-","",$novo_nome);
	$novo_nome= strtolower($novo_nome);
	
	rename("../arquivos/$end","../arquivos/".$novo_nome);
		$mostraplanta="<b>Planta:</b> Em Anexo <br />";
		

	}
	else{
	echo"<script>alert('Erro ao subir arquivo, tente novamente.');history.go(-1);</script>";
	exit;

	}
	
}//fechamentovalidacao campo vazio upload
	

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
<font color='#000' face='arial'>Foi solicitado um contato em seu site, segue abaixo os dados:<br />
<br />

<b>Nome:</b> $nome<br />
<b>E-mail:</b> $email<br />
<b>Telefone:</b> $telefone<br />
<b>Msg:</b> $txtarea<br />
";
$corpo_email=utf8_decode($corpo_email);
///////////////////////////////////////////////////////////////////////////


// REPRODUZIR LOCALMENTE

// echo $corpo_email;
// echo"<hr>";
// echo $corpo_email_visitante;
///////////////////////////////////////////////////////////////////////////



// DECLARANDO O ASSUNTO
$assunto = "Contato Site - $nome"; 
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
$email_php->From      = "comercial@fortalezza.com.br"; // QUEM ENVIOU O E-MAIL
$email_php->FromName  = $nome;
$email_php->Subject   = $assunto;
$email_php->Body      = $corpo_email;
$email_php->AddAddress( "comercial@fortalezza.com.br" ); // RECEPTOR DO E-MAIL				
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
	echo"<script>window.location='/obrigado?ref=contato';</script>";
}
else{
	echo"
		<script>
			alert('Erro ao enviar, tente novamente!');
			history.go (-1);
		</script>
		";
	}

}//fim valida captcha
else{
	echo"<script>alert('Responda a pergunta corretamente');history.go(-1);</script>";
	exit;
	
}




?>