<?php 
	//url do site
	define('URL', 'https://www.hotboys.com.br/gpagamentos1/');
	
	//atualiza o css, imagens e js toda vez que alguma alteracao acontece
	define('Version', '145');
	
	//Variavel que chama o favicon e o CSS / arquivo head
	$head = 'includes/estrutura/topo/head.php';
	
	//Variavel dos javascripts
	$footer = 'includes/estrutura/rodape/footer.php';
	
	//Variavel do modal termos e condicoes
	$modal_termos = 'includes/modal/modal-termos-condicoes.php';
	
	//Variavel do modal politica de privacidade
	$modal_politica = 'includes/modal/modal-politica-privacidade.php';
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>GPagamentos</title>
		
		<!-- Favicon e CSS / arquivo head -->
		<?php include_once ($head); ?>
	</head>
	<body>
		
		<!-- Todo Conteudo -->
		<div class="container">
			<form class="form-pagamento">
				
				<!-- Topo -->
				<div id="header">
					<div class="row">
						
						<!-- logo -->
						<div class="col-xl-5 col-lg-3 col-md-3 col-sm-4 col-6 mr-auto align-self-center">
							<!-- imagem logo desktop-->
							<img src="<?php echo URL ?>assets/img/logo-home.jpg" class="desktop"/>
							
							<!-- imagem logo mobile -->
							<img src="<?php echo URL ?>assets/img/logo-mobile.jpg" class="mobile"/>
						</div>
						
						<!-- selecao de idiomas -->
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-4 ml-auto p-0">
							<select id="id1" class="form-control form-control-sm">
								<option value="ar">عربى</option>
								<option value="cs">Český</option>
								<option value="da">Dansk</option>
								<option value="de">Deutsch</option>
								<option value="en">English</option>
								<option value="es">Español</option>
								<option value="fr">français</option>
								<option value="hu">Magyar</option>
								<option value="it">italiano</option>
								<option value="ja">日本語</option>
								<option value="ko">한국어</option>
								<option value="nl">Nederlands</option>
								<option value="no">Norsk</option>
								<option selected="selected" value="pt">português</option>
								<option value="ru">Pyccĸий</option>
								<option value="sr">Srpski</option>
								<option value="zh">中文简体</option>
								<option value="zh_TW">繁體中文</option>
							</select>
						</div>
					</div>
				</div>
				
				<!-- Informacoes do Plano 
				<div id="InfoPagamento">
					<div class="row"><span>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo...</span></div>
				</div>
				-->
				
				<!-- Dados de Acesso -->
				<div id="dadosAcesso">
				<h6>Dados de Acesso</h6>
					<div class="row mb-3">
						
						<!-- Email / Login -->
							<div class="col-12">
								<label class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-4 control-label float-left" for="name">
									<span>E-mail:</span>
								</label>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-9 col-8 campo float-left">
									<input type="text" class="form-control" id="cvv2" pattern="[0-9]" maxlength="70">
								</div>
							</div>
							
							<!-- Senha -->
							<div class="col-12">
								<label class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-4 control-label float-left" for="name">
									<span>Senha:</span>
								</label>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-9 col-8 campo float-left">
									<input type="passw" class="form-control" id="cvv2" pattern="[0-9]" maxlength="3" data-toggle="tooltip" data-placement="bottom" data-html="true" title="<p>Localização do CVV2</p><img src='https://hotboys.com.br/gpagamentos1/assets/img/pagamentos/cartao-cvv2.jpg' />" placeholder="insira apenas número" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
								</div>
							</div>
							
						</div>
					</div>
				
				<!-- Formas de Pagamento-->
				<div id="FormasPagamento">
				<h6>Forma de Pagamento</h6>
					<div class="row">
						
						<!-- cartoes -->
						<div class="cartoes offset-sm-3">
							<div class="control-group">
								<div class="form-check">
									<label class="form-check-label" for="exampleRadios1">
										<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
										<div class="tipos-pagamentos">
											<img src="<?php echo URL ?>assets/img/pagamentos/cartoes/visa.png">
											<img src="<?php echo URL ?>assets/img/pagamentos/cartoes/mastercard.png">
											<img src="<?php echo URL ?>assets/img/pagamentos/cartoes/american.png">
											<img src="<?php echo URL ?>assets/img/pagamentos/cartoes/discover.png">
											<img src="<?php echo URL ?>assets/img/pagamentos/cartoes/dinners.png">
											<img src="<?php echo URL ?>assets/img/pagamentos/cartoes/maestro.png">
										</div>
									</label>
								</div>
							</div>
							
						
						</div>
						
					</div>
				</div>
				
				<!-- Formulario cartoes -->
				<div class="conteudo-cartoes">
					<div id="FormularioPagamento">
						<div class="row">
							
							<!-- campo nome completo
							<div class="col-12">
								<label class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-4 control-label float-left" for="name">
									<span>Nome completo</span>
								</label>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-9 col-8 campo float-left">
									<input type="email" class="form-control" id="exampleFormControlInput1" maxlength="50" onkeyup="this.value=this.value.replace(/[^\9]/,'')">
								</div>
							</div>
							 -->
							 
							<!-- campo nome do cartao -->
							<div class="col-12">
								<label class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-4 control-label float-left" for="name">
									<span>Número do cartão</span>
								</label>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-9 col-8 campo float-left">
									<input type="text" class="form-control" id="nomeCartao" pattern="[0-9]" maxlength="19" placeholder="insira apenas número" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
								</div>
							</div>
							
							<!-- campo CVV2 -->
							<div class="col-12">
								<label class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-4 control-label float-left" for="name">
									<span>CVV2</span>
								</label>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-9 col-8 campo float-left">
									<input type="text" class="form-control" id="cvv2" pattern="[0-9]" maxlength="3" data-toggle="tooltip" data-placement="bottom" data-html="true" title="<p>Localização do CVV2</p><img src='https://hotboys.com.br/gpagamentos1/assets/img/pagamentos/cartao-cvv2.jpg' />" placeholder="insira apenas número" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
								</div>
							</div>
							<!-- campo expiracao -->
							<div class="col-12">
								<label class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-4 control-label float-left" for="name">
									<span>Expiração</span>
								</label>
								
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-9 col-8 campo float-left">
									<!-- mes -->
									<div class="col-7 float-left p-0">
										<select class="form-control form-control-sm" id="expmes">
											<option selected="selected" value="--">Mês</option>
											<option>01</option>
											<option>02</option>
											<option>03</option>
											<option>04</option>
											<option>05</option>
											<option>06</option>
											<option>07</option>
											<option>08</option>
											<option>09</option>
											<option>10</option>
											<option>11</option>
											<option>12</option>
										</select>
									</div>
									<!-- ano -->
									<div class="col-5 float-left pr-0">
										<select name="" class="form-control form-control-sm" id="expanos">
											<option selected="selected" value="--">Ano</option>
											<option value="2020">2020</option>
											<option value="2021">2021</option>
											<option value="2022">2022</option>
											<option value="2023">2023</option>
											<option value="2024">2024</option>
											<option value="2025">2025</option>
											<option value="2026">2026</option>
											<option value="2027">2027</option>
											<option value="2028">2028</option>
											<option value="2029">2029</option>
											<option value="2030">2030</option>
											<option value="2031">2031</option>
											<option value="2032">2032</option>
											<option value="2033">2033</option>
											<option value="2034">2034</option>
											<option value="2035">2035</option>
											<option value="2036">2036</option>
											<option value="2037">2037</option>
											<option value="2038">2038</option>
											<option value="2039">2039</option>
											<option value="2040">2040</option>
											<option value="2041">2041</option>
											<option value="2042">2042</option>
											<option value="2043">2043</option>
											<option value="2044">2044</option>
										</select>
									</div>
									
								</div>
							</div>
							
							<!-- campo Email 
							<div class="col-12">
								<label class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-4 control-label float-left" for="name">
									<span>Email</span>
								</label>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-9 col-8 campo float-left">
									<input type="email" class="form-control" id="email">
								</div>
							</div>
							-->
							
							<!-- campo país 
							<div class="col-12">
								<label class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-4 control-label float-left" for="name">
									<span>País</span>
								</label>
								
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-9 col-8 campo float-left">
									<select class="form-control form-control-sm" id="pais">
										<option value="AF">Afeganistão</option>
										<option value="AL">Albânia</option>
										<option value="DE">Alemanha</option>
										<option value="AD">Andorra</option>
										<option value="AO">Angola</option>
										<option value="AI">Anguila</option>
										<option value="AN">Antilhas Holandesas</option>
										<option value="AQ">Antártica</option>
										<option value="AG">Antígua E Barbuda</option>
										<option value="AR">Argentina</option>
										<option value="DZ">Argélia</option>
										<option value="AM">Armênia</option>
										<option value="AW">Aruba</option>
										<option value="SA">Arábia Saudita</option>
										<option value="AU">Austrália</option>
										<option value="AZ">Azerbaijão</option>
										<option value="BS">Bahamas</option>
										<option value="BH">Bahrein</option>
										<option value="BD">Bangladesh</option>
										<option value="BB">Barbados</option>
										<option value="BZ">Belize</option>
										<option value="BJ">Benim</option>
										<option value="BM">Bermudas</option>
										<option value="BY">Bielorrússia</option>
										<option value="BO">Bolívia</option>
										<option value="BQ">Bonaire, Sint Eustatius And Saba</option>
										<option value="BW">Botsuana</option>
										<option selected="selected" value="BR">Brasil</option>
										<option value="BN">Brunei</option>
										<option value="BG">Bulgária</option>
										<option value="BF">Burquina Fasso</option>
										<option value="BI">Burundi</option>
										<option value="BT">Butão</option>
										<option value="BE">Bélgica</option>
										<option value="BA">Bósnia E Herzegovina</option>
										<option value="CV">Cabo Verde</option>
										<option value="CM">Camarões</option>
										<option value="KH">Camboja</option>
										<option value="CA">Canadá</option>
										<option value="QA">Catar</option>
										<option value="KZ">Cazaquistão</option>
										<option value="TD">Chade</option>
										<option value="CL">Chile</option>
										<option value="CN">China</option>
										<option value="CY">Chipre</option>
										<option value="CO">Colômbia</option>
										<option value="KM">Comores</option>
										<option value="CG">Congo</option>
										<option value="KR">Coreia, República Da</option>
										<option value="CI">Costa Do Marfim</option>
										<option value="CR">Costa Rica</option>
										<option value="HR">Croácia (nome Local: Hrvatska) </option>
										<option value="CW">Curacao</option>
										<option value="DK">Dinamarca</option>
										<option value="DJ">Djibuti</option>
										<option value="DM">Dominica</option>
										<option value="EG">Egito</option>
										<option value="SV">El Salvador</option>
										<option value="AE">Emirados Árabes Unidos</option>
										<option value="EC">Equador</option>
										<option value="ER">Eritreia</option>
										<option value="SK">Eslováquia (república Eslovaca)</option>
										<option value="SI">Eslovênia</option>
										<option value="ES">Espanha</option>
										<option value="US">Estados Unidos</option>
										<option value="EE">Estônia</option>
										<option value="ET">Etiópia</option>
										<option value="RU">Federação Russa</option>
										<option value="FJ">Fiji</option>
										<option value="PH">Filipinas</option>
										<option value="FI">Finlândia</option>
										<option value="FR">França</option>
										<option value="FX">França, Metropolitana</option>
										<option value="GA">Gabão</option>
										<option value="GH">Gana</option>
										<option value="GE">Geórgia</option>
										<option value="GI">Gibraltar</option>
										<option value="GD">Grenada</option>
										<option value="GL">Groenlândia</option>
										<option value="GR">Grécia</option>
										<option value="GP">Guadalupe</option>
										<option value="GU">Guam</option>
										<option value="GT">Guatemala</option>
										<option value="GY">Guiana</option>
										<option value="GF">Guiana Francesa</option>
										<option value="GN">Guiné</option>
										<option value="GQ">Guiné Equatorial</option>
										<option value="GW">Guiné-bissau</option>
										<option value="GG">Guérnesei</option>
										<option value="GM">Gâmbia</option>
										<option value="HT">Haiti</option>
										<option value="NL">Holanda</option>
										<option value="HN">Honduras</option>
										<option value="HK">Hong Kong</option>
										<option value="HU">Hungria</option>
										<option value="BV">Ilha Bouvet</option>
										<option value="CX">Ilha Christmas</option>
										<option value="IM">Ilha De Man</option>
										<option value="NF">Ilha Norfolk</option>
										<option value="AX">Ilhas Aland</option>
										<option value="KY">Ilhas Caiman</option>
										<option value="CC">Ilhas Cocos (keeling)</option>
										<option value="CK">Ilhas Cook</option>
										<option value="PC">Ilhas Do Pacífico</option>
										<option value="PU">Ilhas Do Pacífico Dos Estados Unidos</option>
										<option value="FO">Ilhas Faroé</option>
										<option value="GS">Ilhas Geórgia Do Sul E Sanduíche Do Sul</option>
										<option value="HM">Ilhas Heard E Mcdonald</option>
										<option value="FK">Ilhas Malvinas</option>
										<option value="MP">Ilhas Marianas Setentrionais</option>
										<option value="MH">Ilhas Marshall</option>
										<option value="UM">Ilhas Menores Distantes Dos Estados Unidos</option>
										<option value="PN">Ilhas Picárnia</option>
										<option value="SB">Ilhas Salomão</option>
										<option value="TC">Ilhas Turks E Caicos</option>
										<option value="VI">Ilhas Virgens (americanas)</option>
										<option value="VG">Ilhas Virgens (britânicas)</option>
										<option value="WF">Ilhas Wallis E Futuna</option>
										<option value="ID">Indonésia</option>
										<option value="IQ">Iraque</option>
										<option value="IE">Irlanda</option>
										<option value="IS">Islândia</option>
										<option value="IL">Israel</option>
										<option value="IT">Itália</option>
										<option value="YU">Iugoslávia</option>
										<option value="YE">Iêmen</option>
										<option value="JM">Jamaica</option>
										<option value="JP">Japão</option>
										<option value="JE">Jersey</option>
										<option value="JO">Jordânia</option>
										<option value="KW">Kuaite</option>
										<option value="LS">Lesoto</option>
										<option value="LV">Letônia</option>
										<option value="LR">Libéria</option>
										<option value="LI">Liechtenstein</option>
										<option value="LT">Lituânia</option>
										<option value="LU">Luxemburgo</option>
										<option value="LB">Líbano</option>
										<option value="MO">Macau</option>
										<option value="MK">Macedônia, Antiga República Iugoslava Da</option>
										<option value="MG">Madagascar</option>
										<option value="YT">Maiote</option>
										<option value="MW">Malaui</option>
										<option value="MV">Maldivas</option>
										<option value="ML">Mali</option>
										<option value="MT">Malta</option>
										<option value="MY">Malásia</option>
										<option value="MA">Marrocos</option>
										<option value="MQ">Martinica</option>
										<option value="MR">Mauritânia</option>
										<option value="MU">Maurício</option>
										<option value="MM">Mianmar</option>
										<option value="FM">Micronésia, Estados Federados Da</option>
										<option value="MD">Moldávia, República Da</option>
										<option value="MN">Mongólia</option>
										<option value="ME">Montenegro</option>
										<option value="MS">Montserrat</option>
										<option value="MZ">Moçambique</option>
										<option value="MX">México</option>
										<option value="MC">Mônaco</option>
										<option value="NA">Namíbia</option>
										<option value="NR">Nauru</option>
										<option value="NP">Nepal</option>
										<option value="NI">Nicarágua</option>
										<option value="NG">Nigéria</option>
										<option value="NU">Niuê</option>
										<option value="NO">Noruega</option>
										<option value="NC">Nova Caledônia</option>
										<option value="NZ">Nova Zelândia</option>
										<option value="NE">Níger</option>
										<option value="OM">Omã</option>
										<option value="PW">Palau</option>
										<option value="PA">Panamá</option>
										<option value="PG">Papua-nova Guiné</option>
										<option value="PK">Paquistão</option>
										<option value="PY">Paraguai</option>
										<option value="PE">Peru</option>
										<option value="PF">Polinésia Francesa</option>
										<option value="PL">Polônia</option>
										<option value="PR">Porto Rico</option>
										<option value="PT">Portugal</option>
										<option value="KI">Quiribati</option>
										<option value="KE">Quênia</option>
										<option value="UK">Reino Unido</option>
										<option value="CF">República Centro-africana</option>
										<option value="KG">República De Quirguistão</option>
										<option value="CD">República Democrática Do Congo</option>
										<option value="LA">República Democrática Popular Do Laos</option>
										<option value="DO">República Dominicana</option>
										<option value="CZ">República Tcheca</option>
										<option value="RE">Reunion</option>
										<option value="RO">Romênia</option>
										<option value="RW">Ruanda</option>
										<option value="EH">Saara Ocidental</option>
										<option value="AS">Samoa Americana</option>
										<option value="WS">Samôa</option>
										<option value="SM">San Marino</option>
										<option value="SH">Santa Helena</option>
										<option value="LC">Santa Lúcia</option>
										<option value="VA">Santa Sé (vaticano)</option>
										<option value="SJ">Savlbard E Jan Mayen</option>
										<option value="SC">Seicheles</option>
										<option value="SN">Senegal</option>
										<option value="SL">Serra Leoa</option>
										<option value="SG">Singapura</option>
										<option value="SX">Sint Maarten (dutch Part)</option>
										<option value="SO">Somalia</option>
										<option value="LK">Sri Lanka</option>
										<option value="SZ">Suazilândia</option>
										<option value="SR">Suriname</option>
										<option value="SE">Suécia</option>
										<option value="CH">Suíça</option>
										<option value="BL">São Bartolomeu</option>
										<option value="KN">São Cristóvão E Neves</option>
										<option value="PM">São Pedro E Miquelão</option>
										<option value="ST">São Tomé E Príncipe</option>
										<option value="VC">São Vicente E Granadinas</option>
										<option value="RS">Sérvia</option>
										<option value="TJ">Tadjikstão</option>
										<option value="TH">Tailândia</option>
										<option value="TW">Taiwan, Província Da China</option>
										<option value="TZ">Tanzânia, República Unida De</option>
										<option value="IO">Território Británico Do Ocêano Índico</option>
										<option value="PS">Território Palestino</option>
										<option value="TF">Territórios Franceses Do Sul</option>
										<option value="TL">Timor-leste</option>
										<option value="TG">Togo</option>
										<option value="TO">Tonga</option>
										<option value="TK">Toquelau</option>
										<option value="TT">Trinidad E Tobago</option>
										<option value="TN">Tunísia</option>
										<option value="TM">Turcomenistão</option>
										<option value="TR">Turquia</option>
										<option value="TV">Tuvalu</option>
										<option value="UA">Ucrânia</option>
										<option value="UY">Uruguai</option>
										<option value="UZ">Uzbequistão</option>
										<option value="VU">Vanuatu</option>
										<option value="VE">Venezuela</option>
										<option value="VN">Vietnã</option>
										<option value="ZW">Zimbábue</option>
										<option value="ZM">Zâmbia</option>
										<option value="ZA">África Do Sul</option>
										<option value="AT">Áustria</option>
										<option value="IN">Índia</option>
									</select>
								</select>
							</div>
						</div>
						-->
						<!-- campo CEP 
						<div class="col-12">
							<label class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-4 control-label float-left" for="name">
								<span>Código Postal</span>
							</label>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-9 col-8 campo float-left">
								<input type="text" class="form-control" id="cep" maxlength="10" placeholder="insira apenas número">
							</div>
						</div>
						-->
					</div>
				</div>
			</div>
			
				<!-- paypal -->
							<div class="paypal offset-sm-3 mt-4 mb-4">
							<div class="control-group">
								<div class="form-check">
									<label class="form-check-label" for="exampleRadios2">
										<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" onclick="window.location='https://payment.hotmidias.com.br'">
										<div class="tipos-pagamentos paypal">
											<img src="<?php echo URL ?>assets/img/pagamentos/paypal.png">
										</div>
									</label>
								</div>
							</div>
							</div>
							
			<!-- Descricao -->
			<div id="TextoDescricao">
				<div class="row">
					<p>Ao realizar esta transação, está confirmando que tem 18 anos ou idade superior, concorda com <a href="#" data-toggle="modal" data-target="#termosCondicoes">Termos e Condições</a> desta compra e leu a <a href="#" data-toggle="modal" data-target="#politicaPrivacidade">Política de Privacidade</a>.</p>
				</div>
			</div>
			
			<!-- Botao concluir a compra -->
			<div class="row">
				<button type="submit" class="btn btn-block btn-primary">
					<span>CONCLUA A COMPRA</span>
				</button>
			</div>
			
			<!-- Rodape -->
			<div id="TextosInformacoes" class="mt-4">
				<div class="row">
					<div class="col-12">
						<ul>
							<li>GPAGAMENTOS.COM.BR *ketu entretenimento irá aparecer no seu extrato de titular do cartão</li>
							<li>GPAGAMENTOS.COM.BR é o Facilitador de Pagamento para HOTBOYS (www.hotboys.com.br)</li>
							<li>Você concorda que o GPagamentos armazene suas informações de pagamento para que possa realizar novas compras sem precisar preencher todos os dados.</li>
						</ul>
					</div>
				</div>
			</div>
			
			<!-- Rodape -->
			<div id="Footer" class="footer">
				<div class="row">
					<div class="col-12">
						<p>Gpagamentos · Todos os direitos reservados © 2019</p>
					</div>
				</div>
			</div>
			
		</form>
		
		<!-- include rodape -->
		<?php include_once $footer ?>
		
		<!-- include modal dos termos e condicoes -->
		<?php include_once $modal_termos ?>
		
		<!-- include modal da politica de privacidade -->
		<?php include_once $modal_politica ?>
		
		<!-- tooltip/aviso ao passar o mouse no input CVV2 -->
		<script>
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>
		
	</div>
</body>
</html>