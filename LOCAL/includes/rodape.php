<div id="rodape">
	<div class="conteudo">
		<div class="coluna25">
			<p class="textorodape">
			<strong>MENU</strong><br>
			<br>
			<a href="/">• Home</a><br>
			<a href="/treinamentos">• Treinamentos</a><br>
			<a href="/inspecoes">• Inspeções</a><br>
			<a href="/laudos">• Laudos</a><br>
			<a href="/servicos">• Serviços</a><br>
			<a href="/contato">• Contato</a><br>
			<a href="https://ead.gambeti.com.br" target="_blank">• EAD</a><br>
			<br>
				Tudo o que sua empresa precisa na área de <strong>segurança do trabalho</strong> você encontra aqui!
			</p>
		</div>
		<div class="coluna50" style="margin-top: 1%;">
			<p class="textorodape">
			<strong>ORÇAMENTO RODAPÉ</strong><br>
		
<?php
    $urlatual= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>		
<form action="/solicitarligacao6" method="post" class="textorodape">            
Nome<br>
<input type="text" name="nome" class="configcamporodape"><br>
Telefone<br>
<input type="text" name="telefone" class="configcamporodape"><br>
Mensagem<br>
<textarea name="mensagem" class="configcampotextorodape"></textarea><br>
<input type="hidden" name="pagina" id="pagina" value="<?=$urlatual?>">

	
<input type="submit" value="ENVIAR" class="configbtrodape">
</form>				
			</p>
		</div>
		<div class="coluna25">
			<p class="textorodape">
<strong>CONTATOS</strong><br>
<br>
(11) 9.9774-2018<br>

comercial@gambeti.com.br<br>
<br>
<strong>ATENDIMENTO</strong><br>
Segunda a Sexta<br>
das 08h às 18h<br><br>
				
			<a href="https://www.facebook.com/gambetisst/" target="_blank"><img src="/default/iconefacebook.png" border="0" alt="Facebook da Gambeti"></a>
			<a href="https://www.instagram.com/gambetisst/" target="_blank"><img src="/default/iconeinstagram.png" border="0" alt="Instagram da Gambeti"></a>
			<a href="/whats" target="_blank"><img src="/default/iconewhats.png" border="0" alt="WhatsApp da Gambeti"></a>
				
			</p>
			<p class="textorodapeassinatura">
&copy; Gambeti - 2022 <br>
Todos os direitos reservados<br><br>
<a href="https://www.piovezam.com" target="_blank">Site Desenvolvido por: <br>
Soluções em Marketing Digital Piovezam	</a>
			</p>
		</div>		
	</div>
</div>

<div class="btn-whats">
    <div class="pulse-button" onclick="window.location='/whats';">
        <img src="/default/simbolowhats.png" border="0" alt="Botão WhatsApp" />
    </div>
</div>

<style type="text/css">
   .btn-whats{position:fixed;bottom:20px;left:20px;z-index:999;display:block;}
   button.pulse-button i{color:#fff;font-size:30px;margin:0;}
   button.pulse-button:focus{outline:0}
   .pulse-button{position:relative;width:55px;height:55px;border:none;box-shadow:0 0 0 0 rgba(122,237,148,.29);border-radius:50%;background:no-repeat #34d95a;background-image:-webkit-linear-gradient(top,#34d95a,#22a30f);background-image:-moz-linear-gradient(top,#34d95a,#22a30f);background-image:-ms-linear-gradient(top,#34d95a,#22a30f);background-image:-o-linear-gradient(top,#34d95a,#22a30f);background-image:linear-gradient(to bottom,#34d95a,#22a30f);background-size:cover;cursor:pointer;-webkit-animation:pulse 1.25s infinite cubic-bezier(.16,0,0,1);-moz-animation:pulse 1.25s infinite cubic-bezier(.16,0,0,1);-ms-animation:pulse 1.25s infinite cubic-bezier(.16,0,0,1);animation:pulse 1.25s infinite cubic-bezier(.16,0,0,1)}
   .pulse-button:hover{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}
   .pulse-button img{
	   width:50px;
	   margin-top:2px;
	   margin-left:4px;
   }
   @-webkit-keyframes pulse{to{box-shadow:0 0 0 45px rgba(232,76,61,0)}}
   @-moz-keyframes pulse{to{box-shadow:0 0 0 45px rgba(232,76,61,0)}}
   @-ms-keyframes pulse{to{box-shadow:0 0 0 45px rgba(232,76,61,0)}}
   @keyframes pulse{to{box-shadow:0 0 0 45px rgba(232,76,61,0)}}
@media only screen and (max-width: 800px) {
	.btn-whats{
		display:block;		
	}
}
</style>