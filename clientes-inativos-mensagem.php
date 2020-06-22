<html lang="pt-br" class="no-js">
	<head>
		<!-- Titulo da Pagina-->
		<title>Gpagamentos - www.gpagamentos.com.br</title>
		
		<!-- Metas Tags -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Language" content="pt-br, en">
		<meta name="keywords" content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">
		
		<!-- CSS Bootstrap -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" title="bootstrap">
		
		<!-- CSS da Pagina -->
		<link rel="stylesheet" href="https://www.hotboys.com.br/css/clientes-inativos.css">
		
		<!-- Javascripts Externos -->
		<script type="text/javascript" src="https://www.gpagamentos.com.br/js/jquery.js"></script>
		<script type="text/javascript" src="https://www.gpagamentos.com.br/js/jquery.idTabs.min.js"></script>
		<script type="text/javascript" src="https://www.gpagamentos.com.br/js/jquery.maskedinput.js"></script>
		
		<!-- Javascripts Internos -->
		<!-- Mascara de preenchimento de formulario -->
		<script>
			jQuery(function($){  
				$("#validade_cartao").mask("99/99");
				$("#numero_cartao").mask("9999-9999-9999-999?9");  
			});
		</script>
	
	<!-- Formas de Pagamentos -->
	<script>
	function tipo_plano(forma_pgto){
	if(forma_pgto=='1'){
	//Cartão de Crédito		
	var plano_selecionado = document.formulario.plano_cartao.value;			
	document.getElementById("forma_pagamento").value = 1;
	
	} else if(forma_pgto=='2'){
	//Tranferência Bancária
	var plano_selecionado = document.formulario.plano_transferencia.value;
	document.getElementById("forma_pagamento").value = 2;	
	} else if(forma_pgto=='3') {
	//Depósito Bancário	
	var plano_selecionado = document.formulario.plano_deposito.value;	
	document.getElementById("forma_pagamento").value = 3;
	} else if(forma_pgto=='4')  {
	//Paypal	
	var plano_selecionado = document.formulario.plano_paypal.value;	
	document.getElementById("forma_pagamento").value = 4;
	} else {
	//Boleto Bancário	
	var plano_selecionado = document.formulario.plano_boleto.value;	
	document.getElementById("forma_pagamento").value = 5;
	}
	
	
	/* Oculta ou exibe as condições do planode R$ 1,99 por 24 horas */
	/*if(plano_selecionado == '1dia'){
	//exibe condições
	document.getElementById('condicoes-plano-1-real').style.display = "block";
	} else {
	//oculta condições	
	document.getElementById('condicoes-plano-1-real').style.display = "none";
	}
	*/
	
	
	/* Oculta ou exibe a opção de parcelamento */
	if(forma_pgto=='1'){
	//cartão de crédito	
	
	if(plano_selecionado=='2' || plano_selecionado=='3' || plano_selecionado=='4' || plano_selecionado=='5'){
	//plano bimestral, trimestral, semestral ou anual
	document.getElementById('parcelamento-cartao').style.display = "block";
	} else {
	//outros planos
	document.getElementById('parcelamento-cartao').style.display = "none";
	}
	
	} else {
	//não é cartão de crédito	
	document.getElementById('parcelamento-cartao').style.display = "none";
	}
	
	
	
	}
	</script>
	
	<!-- Chama IFRAME / Pagina externa -->
	<script type="text/javascript" charset="UTF-8">
	/* <![CDATA[ */
	try { if (undefined == xajax.config) xajax.config = {}; } catch (e) { xajax = {}; xajax.config = {}; };
	xajax.config.requestURI = "https://www.gpagamentos.com.br/1/iframe.php?id=VZlWzVFboFWTXZkckZEZaV2R5clWVlTYiZkWoJFbkNVWVpVdWpmW31kVSRlUtBHVTVVNIV1a0tmYGZ1MiFjVrd1aaV0Vth2SS1mSz8EVKZ1YzI0VZZlULJ1RGllWEZEaZVVNXZFSOdnVt5kVldUMWVleGZFVYR2aWZFZwQFbo9kVwoVcWZFcL1EbJdXZFR2VkV0b4VVbGFWYxYVTXxmWpNVMKN3VVh2bNFjWZZlaGlmTGB3RZtWOHJmVWhVUsh2TVNjQ0VVMRFjVWp0MU1WNXdFWoRXWWJ1ahFjWa5EVCdVZGZ1RX5GZzIlMShVTXFzUNpnRWRFWOFWTGpFMVxGaXZVMaNnVzgWYNVVM6JVbxYFZIJkcadkRhFWMadVVtFzUkFDcWZVMjhnUXZFWRxmUPd1a1cUWtVUMSZFcwEmRkhlVwUTRZ5WV4J1VKB1TWRWYTVkWxZ1a1cnVxkkeX1GeoF1MSRnVu5ENNtWMwN2R1I1VGB3VUhFZh1kRaFTUshmWUxGczZVMsdnYGpEaS1WMWN2MCZkVxg2VWtWNNJ1aklmVxAXcW5mS3ZVbGZVUtBHWXZFcXVVb0tmYsxWSXxmWqllVaJnVu5UYiVUMUplRWhFZG92dZZFZhJFbvd3UXFDbSFDcHZlbONUTxoFWUtmUoVmVvhXWYhmbiZkW4dVb0hlYHFFeXRlWzJWRxgkUtFjVjp3a5plRStmUtZFUTpmROFFM1UnVuZVYNdkUPdVb0hVVHJ1VZpmQvZFbwhVUq50UWZlWHl1MatkUyoEahdEdWNWMwdlVR1TP";
	xajax.config.statusMessages = false;
	xajax.config.waitCursor = true;
	xajax.config.version = "xajax 0.5";
	xajax.config.defaultMode = "asynchronous";
	xajax.config.defaultMethod = "POST";
	xajax.config.JavaScriptURI = "https://www.gpagamentos.com.br/includes/xajax/";
	/* ]]> */
	</script>
	
	<script type="text/javascript" src="https://www.gpagamentos.com.br/includes/xajax/xajax_js/xajax_core.js" charset="UTF-8"></script>
	<script type="text/javascript" charset="UTF-8">
	/* <![CDATA[ */
	window.setTimeout(
	function() {
	var scriptExists = false;
	try { if (xajax.isLoaded) scriptExists = true; }
	catch (e) {}
	if (!scriptExists) {
	alert("Error: the xajax Javascript component could not be included. Perhaps the URL is incorrect?\nURL: https://www.gpagamentos.com.br/includes/xajax/xajax_js/xajax_core.js");
	}
	}, 2000);
	/* ]]> */
	</script>
	
	<script type="text/javascript" charset="UTF-8">
	/* <![CDATA[ */
	xajax_alteracao_dados = function() { return xajax.request( { xjxfun: 'alteracao_dados' }, { parameters: arguments } ); };
	/* ]]> */
	</script>
	
	</head>
	<body>
	<div id="modal-cliente-inativo">
	
	<div id="exTab1">
	
	<!-- Logo Topo -->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="logo-modal">
	<img src="https://www.hotboys.com.br/imagens/logos/logo-topo.png"/>
	</div>
	</div>
	
	<!-- Titulo e Texto Topo -->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:35px">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 titulo-acesso-desativado">
	<span><img src="https://hotboys.com.br/imagens/modal-clientes-inativos/alerta-inativo.gif" style="margin-top:-4px"/> Seu acesso está desativado</span>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 texto-efetuar-pagamento">
	<span>Gostaria de efetuar o pagamento para ativá-lo? </span>
	</div>
	</div>
	
	<!-- Email do Cliente Inativo-->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="col-lg-3 col-md-3 col-sm-7 col-xs-12 email-clientes-inativos">
	<strong>E-mail:</strong> fontes05@gmail.com
	</div>
	</div>
	
	<!-- Chamada Form -->
	<form name="formulario" id="formulario" onsubmit="xajax_alteracao_dados(xajax.getFormValues('formulario')); return false;">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div id="form-campos">
	
	<!-- Aba / Menu -->
	<div>
	<ul class="nav nav-pills">
	<li><a href="#tab1"  onclick="tipo_plano('1');" class=""><span><img src="https://hotboys.com.br/imagens/modal-clientes-inativos/cartao-inativo.png"/></span> Cartão de Crédito</a></li>
	<li><a href="#tab2"  onclick="tipo_plano('2');" class=""><span><img src="https://hotboys.com.br/imagens/modal-clientes-inativos/transferencia-inativo.png"/></span> Transferência Bancária</a></li>
	<li><a href="#tab3"  onclick="tipo_plano('3');" class=""><span><img src="https://hotboys.com.br/imagens/modal-clientes-inativos/deposito-inativo.png"/></span> Depósito Bancário</a></li>
	<li><a href="#tab5"  onclick="tipo_plano('5');" class=""><span><img src="https://hotboys.com.br/imagens/modal-clientes-inativos/boleto-inativo.png"/></span>  Boleto Bancário</a></li>
	<li><a href="#tab4"  onclick="tipo_plano('4');" class=""><span><img src="https://hotboys.com.br/imagens/modal-clientes-inativos/paypal-inativo.png"/></span> Paypal</a></li>
	</ul>
	</div>
	
	<!-- Conteudo da Pagina -->
	<div class="tab-content clearfix">
	<div id="envolve-form">
	<div id="tab1" style="display: none;">
	<div class="col-lg-4 col-md-5 col-sm-9 col-xs-9" style="margin-bottom:15px">
	<div class="col-lg-6 col-md-6 col-sm-5 col-xs-12 form-linha">
	<div class="form-linha-nome"><strong>Plano:</strong></div>
	<div class="form-linha-input">
	<select class="form-linha-input-select" id="plano_cartao" name="plano_cartao" onchange="tipo_plano('1');">
	<option value="">Selecione...</option>
	<!-- <option value="1dia"  >24 horas por R$ 1,99</option>   -->
	<option value="1">Mensal =&gt; R$ 29,90</option>
	<option value="2">Bimestral =&gt; R$ 49,90</option>
	<option value="3">Trimestral =&gt; R$ 69,90</option>
	<option value="4">Semestral =&gt; R$ 119,90</option>
	<option value="5">Anual  =&gt; R$ 240,00</option>
	</select>
	</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-5 col-xs-12 form-linha " id="parcelamento-cartao" >
	<div class="form-linha-nome"><strong>Parcelamento:</strong></div>
	<div class="form-linha-input">
	<select class="form-linha-input-select" id="parcelamento" name="parcelamento">
	<option value="À Vista">À Vista</option>
	<option value="2 parcelas">2 parcelas</option>
	<option value="3 parcelas">3 parcelas</option>
	<option value="4 parcelas">4 parcelas</option>
	<option value="5 parcelas">5 parcelas</option>
	<option value="6 parcelas">6 parcelas</option>
	</select>
	</div>
	</div>
	</div>
	<div class="c" style="height:15px;"></div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:15px">
	<div class="form-linha-nome"><strong>Bandeira do Cartão:</strong></div>
	<div class="cartao-bloco" style="margin-left:0px;">
	<div class="cartao-bloco-img">
	<label for="cartao_1"><img src="https://www.gpagamentos.com.br/layout/visa.png"></label>
	</div>
	<div class="cartao-bloco-radio">
	<input type="radio" id="cartao_1" name="cartao" value="1">
	</div>
	</div>
	<div class="cartao-bloco">
	<div class="cartao-bloco-img">
	<label for="cartao_2"><img src="https://www.gpagamentos.com.br/layout/mastercard.png"></label>
	</div>
	<div class="cartao-bloco-radio">
	<input type="radio" id="cartao_2" name="cartao" value="2">
	</div>
	</div>
	<div class="cartao-bloco">
	<div class="cartao-bloco-img">
	<label for="cartao_3"><img src="https://www.gpagamentos.com.br/layout/aura.png"></label>
	</div>
	<div class="cartao-bloco-radio">
	<input type="radio" id="cartao_3" name="cartao" value="3">
	</div>
	</div>
	<div class="cartao-bloco">
	<div class="cartao-bloco-img">
	<label for="cartao_4"><img src="https://www.gpagamentos.com.br/layout/elo.png"></label>
	</div>
	<div class="cartao-bloco-radio">
	<input type="radio" id="cartao_4" name="cartao" value="5">
	</div>
	</div>
	<div class="cartao-bloco">
	<div class="cartao-bloco-img">
	<label for="cartao_5"><img src="https://www.gpagamentos.com.br/layout/american-express.png"></label>
	</div>
	<div class="cartao-bloco-radio">
	<input type="radio" id="cartao_5" name="cartao" value="4">
	</div>
	</div>
	<div class="cartao-bloco">
	<div class="cartao-bloco-img">
	<label for="cartao_6"><img src="https://www.gpagamentos.com.br/layout/hipercard.png"></label>
	</div>
	<div class="cartao-bloco-radio">
	<input type="radio" id="cartao_6" name="cartao" value="6">
	</div>
	</div>
	<div class="c" style="height:15px;"></div>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:15px">
	<div class="form-linha">
	<div class="form-linha-nome"><strong>Número do Cartão:</strong></div>
	<div class="form-linha-input">
	<input type="input" class="form-linha-input-text" id="numero_cartao" name="numero_cartao" placeholder="____-____-____-____">
	</div>
	</div>
	<div class="c" style="height:15px;"></div>
	</div>
	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:15px">
	<div class="col-lg-2 col-md-3 col-sm-5 col-xs-9 form-linha">
	<div class="form-linha-nome"><strong>Data de Validade: </strong><span class="tip">mm/aa</span></div>
	<div class="form-linha-input">
	<input type="input" class="form-linha-input-text" id="validade_cartao" name="validade_cartao" placeholder="__/__">
	
	</div>
	</div>
	<div class="col-lg-2 col-md-3 col-sm-5 col-xs-9 form-linha">
	<div class="form-linha-nome"><strong>Cód. Segurança:</strong></div>
	<div class="form-linha-input">
	<input type="input" class="form-linha-input-text" style="width:40px;" name="cod_seguranca_cartao" id="cod_seguranca_cartao">
	<span><a href="javascript:void(0);" class="tip" title="Você encontra o Código de Segurança no versão do seu Cartão de Crédito. Geralmente o Código de Segurança tem 3 ou 4 digitos.">O que é?</a></span> </div>
	</div>
	<div class="c"></div>
	</div>
	<div class="form-linha">
	<div id="btn-cadastrar">
	<button>Alterar Pagamento para Cartão de Crédito</button>
	</div>
	</div>
	</div>
	<div id="tab2" style="display: none;">
	<div class="form-linha">
	<div class="form-linha-nome"><strong>Plano:</strong></div>
	<div class="form-linha-input">
	<select class="form-linha-input-select" name="plano_transferencia" id="plano_transferencia" onchange="tipo_plano('2');">
	<option value="">Selecione...</option>
	<option value="1">Mensal =&gt; R$ 35,00</option>
	<option value="2">Bimestral =&gt; R$ 59,90</option>
	<option value="3">Trimestral =&gt; R$ 85,00</option>
	<option value="4">Semestral =&gt; R$ 145,00</option>
	<option value="5">Anual  =&gt; R$ 260,00</option>
	</select>
	</div>
	</div>
	<div class="c"></div>
	<div class="form-linha">
	<div id="btn-cadastrar">
	<button>Alterar Pagamento para Transferência</button>
	</div>
	</div>
	</div>
	<div id="tab3" style="display: none;">
	<div class="form-linha">
	<div class="form-linha-nome"><strong>Plano:</strong></div>
	<div class="form-linha-input">
	<select class="form-linha-input-select" name="plano_deposito" id="plano_deposito" onchange="tipo_plano('3');">
	<option value="">Selecione...</option>
	<option value="1">Mensal =&gt; R$ 35,00</option>
	<option value="2">Bimestral =&gt; R$ 59,90</option>
	<option value="3">Trimestral =&gt; R$ 85,00</option>
	<option value="4">Semestral =&gt; R$ 145,00</option>
	<option value="5">Anual  =&gt; R$ 260,00</option>
	</select>
	</div>
	</div>
	<div class="c"></div>
	<div class="form-linha">
	<div id="btn-cadastrar">
	<button>Alterar Pagamento para Depósito</button>
	</div>
	</div>
	</div>
	<div id="tab4" style="display: block;">
	<div class="form-linha">
	<div class="form-linha-nome"><strong>Plan:</strong></div>
	<div class="form-linha-input">
	<select class="form-linha-input-select" name="plano_paypal" id="plano_paypal" onchange="tipo_plano('4');">
	<option value="">Select...</option>
	<option value="1" selected="">Mensal =&gt; USD 29,95</option>
	<option value="2">Bimestral =&gt; USD 45,90</option>
	<option value="3">Trimestral =&gt; USD 69,95</option>
	<option value="4">Semestral =&gt; USD 99,90</option>
	<option value="5">Anual  =&gt; USD 115,95</option>
	</select>
	</div>
	</div>
	<div class="c"></div>
	<div class="form-linha">
	<div id="btn-cadastrar">
	<button>Change to Paypal payment</button>
	</div>
	</div>
	</div>
	<div id="tab5" style="display: none;">
	<div class="form-linha">
	<div class="form-linha-nome"><strong>Plano:</strong></div>
	<div class="form-linha-input">
	<select class="form-linha-input-select" name="plano_boleto" id="plano_boleto" onchange="tipo_plano('5');">
	<option value="">Selecione...</option>
	<option value="1">Mensal =&gt; R$ 35,00</option>
	<option value="2">Bimestral =&gt; R$ 59,90</option>
	<option value="3">Trimestral =&gt; R$ 85,00</option>
	<option value="4">Semestral =&gt; R$ 145,00</option>
	<option value="5">Anual  =&gt; R$ 260,00</option>
	</select>
	</div>
	</div>
	<div class="c"></div>
	<div class="form-linha">
	<div id="btn-cadastrar">
	<button>Alterar Pagamento para Boleto Bancário</button>
	</div>
	</div>
	</div>
	<div class="c"></div>
	</div>
	<script type="text/javascript"> 
	$("#form-campos ul").idTabs(); 
	</script> 
	</div>
	</div>
	</div>
	</form>
	</div>
	<div class="c" style="height:15px;"></div>
	<input type="hidden" name="forma_pagamento" id="forma_pagamento" value="4">
	</div>
	
	
	</body>
	
	</html>	