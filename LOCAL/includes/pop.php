<?php
	setcookie("pop21", "ess", time()+86400, "/");   	
	$pop21=$_COOKIE["pop21"];
	$datahojepop21_valida=date("Y-m-d");
	//$datahojepop21_valida=2021-08-23;
	//$datahojepop21_valida="2021-05-10";
	//if(($pop21=="01062021")&&($datahojepop21_valida>="2021-08-24")&&($datahojepop21_valida<="2021-08-25")){
		
	if(($pop21!="ess")&&($datahojepop21_valida>="2022-09-28")&&($datahojepop21_valida<="2050-12-31")){		
?>
<div id="bgpop21">
    <div id="closepop21"><img src="/default/btfechar.png" onclick="fecharpop21()"/></div>
	<div id="pop21"><a href="/busca?palavra=esocial&ref=pop"><img src="/pops/esocial.png" border="0" /></a></div>
</div>

<style>
	#bgpop21{
		z-index:99999999999;
		position:fixed;
		width:100vw;
		height:100vh;
		background-color:rgba(0,0,0,.9);
	}
	#pop21{
		width:80vw;
		height:auto;
		margin:auto;
		max-width:600px;
		overflow:hidden;		
	}
	#pop21 img{
		width:100%;
		height:auto;
	}
	#closepop21{
		width:80vw;
		height:auto;
		overflow:auto;
		margin:auto;
		max-width:600px;
		text-align:right;
		margin-top:5vh;
		
	}
	#closepop21 img{
		background-color:#FFF;
		padding:.5%;
		border-radius:50%;
	}
</style>
<script>
	function fecharpop21(){
		document.getElementById("bgpop21").style.display="none";
	}
</script>
<?php
	}
	else{
	}
?>