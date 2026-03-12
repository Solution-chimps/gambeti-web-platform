<div id="topo">
	<div id="alinhadortopo">
		<div id="arearedes">
			<a href="https://www.facebook.com/gambetisst/" target="_blank"><img src="/default/iconefacebook.png" border="0" alt="Facebook da Gambeti" width="31" height="31"></a>
			<a href="https://www.instagram.com/gambetisst/" target="_blank"><img src="/default/iconeinstagram.png" border="0" alt="Instagram da Gambeti" width="31" height="31"></a>
			<a href="/whats" target="_blank"><img src="/default/iconewhats.png" border="0" alt="WhatsApp da Gambeti" width="31" height="31"></a>
			<a href="https://www.linkedin.com/in/gambeti-assessoria-e-treinamento-365209273/" target="_blank"><img src="/default/iconelinkedin.png" border="0" alt="LinkedIn da Gambeti" width="31" height="31"></a>
			
		</div>
		<div id="areabusca">
			<form action="/busca" method="get" id="formbusca">
<?php
				if($paginaatual=="busca"){
						echo"<input type=\"text\" name=\"palavra\" id=\"palavra\" class=\"campobusca\" placeholder=\"Digite o que procura\" value=\"$palavra\">";					
				}
				else{
					echo"<input type=\"text\" name=\"palavra\" id=\"palavra\" class=\"campobusca\" placeholder=\"Digite o que procura\">";
				}
?>
            	
				<div id="btbusca" onClick="buscar()"><img src="/default/btbusca.png" border="0" alt="Botão Buscar" width="19" height="19"></div> 
			</form>
		</div>
		<div id="areatelefones">		
		(11) 9.9774-2018
		</div>
		<div id="areaiconetelefones">
				<img src="/default/iconetelefone.png" alt="absmiddle" width="29" height="29">
			</div>	
		</div>		
</div>
<div id="areamenu">
	<div id="arealogo"><a href="/"><img src="/default/logohorizontal.png" alt="Logo Gambeti" border="0" width="279" height="67" title="Logo Gambeti"></a></div>
	<div id="menu">
		<nav class="nav nav-aberta">
			<div class="wrap" >
				<ul class="listaNav">
					<li><a href="/">INÍCIO</a></li>
					<li><a href="/busca?palavra=esocial&ref=menu">eSocial</a></li>
					<li><a href="/treinamentos">TREINAMENTOS</a></li>
					<li><a href="/inspecoes">INSPEÇÕES</a></li>
					<li><a href="/laudos">LAUDOS</a></li>
					<!--<li><a href="/servicos">SERVIÇOS</a></li>-->
					<!--<li><a href="/contato">CONTATO</a></li>-->
					<li><a href="/principais-servicos">SERVIÇOS</a></li>
					<li><a href="https://ead.gambeti.com.br" target="_blank">EAD</a></li>                                                                
				</ul>
			</div>
		</nav>
	</div>  	
</div>
<?php
	if($paginaatual=="home"){
		echo"
			<div id=\"banner\" onClick=\"window.location='/contato';\">
			</div>		
		";
	}
	else if($paginaatual=="treinamentos"){
		echo"
			<div id=\"banner2\">
				<span>Treinamentos</span>
			</div>		
		";
	}
	else if($paginaatual=="inspecoes"){
		echo"
			<div id=\"banner2\">
				<span>Inspeções</span>
			</div>		
		";
	}
	else if($paginaatual=="laudos"){
		echo"
			<div id=\"banner2\">
				<span>Laudos</span>
			</div>		
		";
	}
	else if($paginaatual=="servicos"){
		echo"
			<div id=\"banner2\">
				<span>serviços</span>
			</div>		
		";
	}
	else if($paginaatual=="esocial"){
		echo"
			<div id=\"banner2\">
				<span>esocial</span>
			</div>		
		";
	}
	else if($paginaatual=="inspecao"){
		echo"
			<div id=\"banner2\">
				<span>Inspeções</span>
			</div>		
		";
	}
	else if($paginaatual=="contato"){
		echo"
			<div id=\"banner2\">
				<span>Contato</span>
			</div>		
		";
	}
	else if($paginaatual=="obrigado"){
		echo"
			<div id=\"banner2\">
				<span>Obrigado</span>
			</div>		
		";
	}
	else if($paginaatual=="busca"){
		echo"
			<div id=\"banner2\">
				<span>Busca</span>
			</div>		
		";
	}
	else if($paginaatual=="seo"){
		echo"
			<div id=\"banner2\" style=\"height:152px\"></div>		
		";
	}

	else{
		echo"
			<div id=\"banner2\">
				<span></span>
			</div>		
		";

	}
?>