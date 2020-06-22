<?php
	session_start();
	
	$dirImg = 'https://www.hotboys.com.br/arquivos/'; //diretorio com imagens dos videos	
	
		$servidor = 'localhost';
		$usuario = 'c1hotboys';
		$senha = 'eF!jr4cZmFGD';
		$bd = 'c1hotboys_admin';
	
	$conexaoMysql_hot = mysql_connect($servidor, $usuario, $senha) or die (mysql_error());
	mysql_select_db($bd, $conexaoMysql_hot) or die (mysql_error());
	
	
	//atualiza o css toda vez que alguma alteracao acontece
	define('Version', '326334');
	
	
	define('URL', 'https://www.hotboys.com.br/');
	define('URL_VIP', 'https://www.hotboys.com.br/vip/');
	define('URL_SOLO', 'https://www.solohot.com.br/');
	define('URL_BARE', 'https://www.bareback.com.br/');
	define('CAMINHO_SISTEMA', '/var/www/clients/client1/web6/web/');
	define('CAMINHO_IMAGENS', '/var/www/clients/client1/web6/web/arquivos/');
	define('CAMINHO_IMAGENS_PERFIL', '/var/www/clients/client1/web6/web/vip/imagens/area-do-cliente/fotos-clientes/');
	define('DOMINIO_IMG', URL.'arquivos/');
	define('DOMINIO_IMG_PERFIL', URL.'vip/imagens/area-do-cliente/fotos-clientes/');
	define('SERV_IMG','https://server2.hotboys.com.br/arquivos/');
	
	$urlnow = $_SERVER['REQUEST_URI'];
	$lingua = explode('/', $urlnow); 
	$idioma = $lingua['1'];
	
	define('BARE_B', 'BAREBACK');
	
	
	// envio de email
	define('EMAIL_SERVIDOR',  'mail.hotboys.com.br');
    define('EMAIL_PORTA',     '587');
    define('EMAIL_USUARIO',   'naoresponda@hotboys.com.br');
    define('EMAIL_SENHA',     '2a5a8dfsdf7');
    define('EMAIL_SECURE',    '');	
	
	
	
	//telefones
	define('TELEFONE','(21) 3005-3221');
	
	
	//links do site
	define('ASSINE', 'https://www.hotboys.com.br/assine');
	
	
	// textos das paginas VIP
	define('MINHA_CONTA', 'Minha Conta do prazer');
    define('CENAS_FAVORITAS', 'Cenas que me excitam');
	define('SAIR', 'Sair');
	
	
	
	// diversos
	define('LEIA_TERMOS','LEIA OS NOSSOS TERMOS ANTES DE ENTRAR:');
	define('EU_CONCORDO','Eu Concordo');
	define('CONCORDO','CONCORDO');
	define('NCONCORDO','EU NÃO CONCORDO');
	define('MENU','Menu');
	define('D_USUARIO','Dados de Usuário:');
	define('EMAIL','E-Mail*:');
	define('E_MAIL','E-mail Hot');
	define('SENHA','Senha*:');
	define('CONTATO','Contatos Hot');
	define('CONTATO1','CONTATO');
	define('PERG_FREQ','PERGUNTAS FREQUENTES.');
	define('TAGS','Tags');
	define('ELENCO','Elenco');
	define('CONT_SERIE','CONTINUAÇÕES DESSA SÉRIE');
	define('FOTOS','FOTOS');
	define('FOTOS1','Fotos');
	define('ASSI_TBM','ASSISTA TAMBÉM');
	define('M_VISTOS','Mais Vistos');
	define('O_ALEATORIA','Ordem Aleatória');
	define('O_ALFABETICA','Ordem Alfabética');
	define('M_RECENTES','Mais Recentes');
	define('EMAIL_CONTATO','contato@hotmidias.com.br');
	define('ENVIAR','Enviar');
	
	
	// paginacao
	define('PAGINACAO_A','A');
	define('PAGINACAO_B','B');
	define('PAGINACAO_C','C');
	define('PAGINACAO_D','D');
	define('PAGINACAO_E','E');
	define('PAGINACAO_F','F');
	define('PAGINACAO_G','G');
	define('PAGINACAO_H','H');
	define('PAGINACAO_I','I');
	define('PAGINACAO_J','J');
	define('PAGINACAO_L','L');
	define('PAGINACAO_K','K');
	define('PAGINACAO_M','M');
	define('PAGINACAO_N','N');
	define('PAGINACAO_O','O');
	define('PAGINACAO_P','P');
	define('PAGINACAO_Q','Q');
	define('PAGINACAO_R','R');
	define('PAGINACAO_S','S');
	define('PAGINACAO_T','T');
	define('PAGINACAO_U','U');
	define('PAGINACAO_V','V');
	define('PAGINACAO_W','W');
	define('PAGINACAO_X','X');
	define('PAGINACAO_Y','Y');
	define('PAGINACAO_Z','Z');
	
	
	
	//ASSINE
	define('ASSINE_TITULO','Assine');
	define('CARTAO','CARTÃO DE CRÉDITO');
	define('P_ANUAL','Plano Anual');
	define('P_SEMESTRAL','Plano Semestral');
	define('P_TRIMESTRAL','Plano Trimestral');
	define('P_BIMESTRAL','Plano Bimestral');
	define('P_MENSAL','Plano mensal');
	define('GOLD_H','GOLD HOT');
	define('GOLD_ANUAL','R$ 240,00');
	define('PREMIUM_ANUAL','R$ 119,90');
	define('MEGA_ANUAL','R$ 69,90');
	define('TOP_VALOR','R$ 49,90');
	define('HOT_ANUAL','R$ 29,90');
	define('PREMIUM_BOLETO','R$ 145,00');
	define('MEGA_BOLETO','R$ 85,00');
	define('TOP_BOLETO','R$ 59,90');
	define('HOT_BOLETO','R$ 35,00');
	define('GOLD_BOLETO','R$ 260,00');
	define('GOLD_MENSAL','Apenas R$ 20,00 por mês');
	define('MEGA_MENSAL','Apenas R$ 23,30 por mês');
	define('TOP_MENSAL','Apenas R$ 24,95 por mês');
	define('TOP_H','TOP HOT');
	define('HOT','HOT');
	define('MEGA_H','MEGA HOT');
	define('PREMIUM_H','PREMIUM HOT');
	define('PREMIUM_MENSAL','Apenas R$ 20,00 por mês');
	define('HOT_DIA','Apenas R$ 0,99 por dia');
	define('VANTAGENS_ASSINANTE','VANTAGENS DO ASSINANTE');
	define('ASSINE_VEJA','ASSINE AGORA E VEJA');
	define('PAYPAL','PAYPAL');
	define('BOLETO','BOLETO BANCÁRIO');
	define('VALOR_EMISSAO_BOLETO','Obs: É cobrado o valor de R$ 2,70 adicional pela emissão do boleto');
	define('ASSINE_ICONE_VIDEOS','Mais de 300 vídeos');
	define('ASSINE_HORAS_VIDEOS','Mais de 9.000 horas de vídeos');
	define('ASSINE_ATUALIZ_SEMANAIS','Atualizações Semanais');
	define('ASSSINE_LIBER_IMEDIATA','Liberação Imediata');
	define('ASSINE_LIVRE_VIRUS','100% Livre de Vírus');
	define('ASSINE_NAO_MENCIONADO_FATURA','Não é mencionado em sua fatura');
	define('ASSINE_TEMPO_MERCADO','12 anos de mercado adulto');
	define('ASSINE_SUPORTE_COMPLETO','Suporte Completo');
	define('ASSINE_TXT_DUVIDAS','Para dúvidas, você pode entrar em');
	define('ASSINE_TXT_ACESSO','conosco ou acessar nossa página de');
	define('ASSINE_TERMO1','');
	define('ASSINE_TERMO2','Os preços podem variar de acordo com a forma de pagamento graças a taxas bancárias, emissões de boleto ou diversos outros fatores que podem ocasionar o aumento.');
	define('ASSINE_TERMO3','O site HOTBOYS nunca compartilha suas informações com terceiros ou lhe enviará spams.');
	define('ASSINE_TERMO4','Liberação imediata mediante aprovação do pagamento.');
	define('ASSINE_TERMO5','O prazo de liberação para pagamento via boleto bancário é de até 3(três) dias úteis.');
	define('ASSINE_TERMO6','As assinaturas são renovadas automaticamente até o cliente solicitar o cancelamento junto a nossa agente de cobrança autorizada G Pagamentos.');
	
	
	//busca
	define('BUSCA_TXT_RESUL1','Encontramos');
	define('BUSCA_TXT_RESUL2','resultados para');
	define('BUSCA_SEM_RESUL','Sem resultado de cena(s) para esta busca');
	
	
	//cena
	define('CENA','CENA');
	define('CENA_PROBLEMA_VIDEO','Problema com este vídeo ?');
	define('SUGESTAO','Sugestão');
	define('CENA_PROBLEMA_VIDEO2','Estou tendo problemas com este vídeo');
	
	
	//cenas
	define('CENAS_HOT','CENAS HOT');
	
	
	//contato
	define('CONTATO_CANAIS_ATEND','TÁ AÍ NOSSOS CANAIS DE APOIO HOT. <br>POSSO TE DAR UMA MÃOZINHA?');
	define('OPCAO1','(opção 1)');
	define('OPCAO2','(opção 2)');
	define('LIGUE','LIGUE');
	define('PROBLEMA_SITE','Problemas com o site?');
	define('PROBLEMA_PAGAMENTO','Problemas com pagamento?');
	define('DUV_DIVERSAS','Dúvidas diversas?');
	define('MODELO','Modelo');
	define('ADMINISTRATIVO','Administrativo');
	define('COLABORADOR_TRABALHO','Tá afim de fazer parte do site mais quente da net? É muito fácil, cadastre-se e faça parte da nossa família. Venha levar prazer e satisfação e muito sexo para todos os amantes do site HotBoys. ( obs.: se cadastre na função que você quer desempenhar)
	');
	define('CURRICULO','CURRÍCULO HOT');
	define('CONTATO_TRAB_ENVIE','Trabalhe conosco , envie seu');
	define('CLIENTE','Cliente');
	define('JA_SOU','Já Sou');
	define('CONTATO_TXT_01','Você que já é nosso cliente e está com algum problema? Envie-nos a sua dúvida que resolveremos o mais breve possível.');
	define('CONTATO_TXT_02','Está sufocado com algum caso em especial? aquele pepino Grande e Grosso que não sabe o que fazer? mande para nós que resolveremos e responderemos em breve. Você sabe que de Grande e Grosso o site mais quente da net entende. 
	');
	define('ATEND_POR','Atendimento por');
	define('BT_CONTATO_EMAIL','ENVIAR');
	
	
	//contato email
	define('CONTATO_FORM_TEXTO','Ainda está com alguma dúvida e/ou necessita de alguma ajuda específica? Envie-nos sua dúvida que iremos responde-lo em breve.');
	define('CONTATO_FORM_NOME','Nome:');
	define('CONTATO_FORM_SOBRENOME','Sobrenome:');
	define('CONTATO_FORM_EMAIL','E-mail*:');
	define('CONTATO_FORM_ASSUNTO','Assunto:');
	define('CONTATO_FORM_MENSAGEM','Mensagem:');
	
	
	
	// contato modelo
	define('CONTATO_MODELO_MAIORIDADE','Eu afirmo que sou maior de 18 anos, certifico que todas as informações aqui enviadas são corretas, enviadas com propósito de serem analisadas pelo site HOTBOYS.com.br.');
	define('CONTATO_MODELO_VIAJAR','Eu afirmo que tenho disponibilidade para viajar e gravar com o HOTBOYS caso não more no Rio de Janeiro.');
	define('CONTATO_MODELO_INFO_ADICIONAIS','Informações Adicionais:');
	define('CONTATO_MODELO_CONCORDA_INFO','Ao enviar este formulário, você concorda com as seguintes informações');
	define('CONTATO_MODELO_ROSTO','Foto do Rosto');
	define('CONTATO_MODELO_CORPO','Foto do corpo');
	define('CONTATO_MODELO_OUTRAS_FOTOS','Outras fotos');
	define('TXT_TATTOO_0','Nenhuma');
	define('TXT_TATTOO_1','Um');
	define('TXT_TATTOO_2','Dois');
	define('TXT_TATTOO_01','Uma');
	define('TXT_TATTOO_02','Duas');
	define('TXT_TATTOO_05','Algumas');
	define('TXT_TATTOO_07','Várias');
	
	define('TXT_PELOS_0','Natural');
	define('TXT_PELOS_1','Pouco Aparado');
	define('TXT_PELOS_2','Bem aparado');
	define('TXT_PELOS_3','Completamente depilado');
	
	define('TXT_PELOS_CORPO_0','Nenhum');
	define('TXT_PELOS_CORPO_1','Poucos');
	define('TXT_PELOS_CORPO_2','Na média');
	define('TXT_PELOS_CORPO_3','Acima da média');
	define('TXT_PELOS_CORPO_4','Peludo');
	define('TXT_PELOS_CORPO_00','Pelos no Corpo:');
	define('TXT_PELOS_PUBIANOS_1','Pelos Pubianos:');
	define('CONTATO_MODELO_TATUAGENS','Tatuagens:');
	define('CONTATO_MODELO_PIERCINGS','Piercings:');
	
	define('CONTATO_MODELO_MANHA','Manhã');
	define('CONTATO_MODELO_TARDE','Tarde');
	define('CONTATO_MODELO_NOITE','Noite');
	define('CONTATO_MODELO_TODOS','Todos');
	define('CONTATO_MODELO_ALGUNS','Alguns');
	define('CONTATO_MODELO_VARIOS','Vários');
	define('CONTATO_MODELO_TELEFONE','Telefone*:');
	define('CONTATO_MODELO_WHATSAPP','Whatsapp*:');
	
	define('TWITTER_LABEL','Twitter:');
	define('INSTAGRAM_LABEL','Instagram:');
	define('FACEBOOK_LABEL','Facebook:');
	define('DISP_GRAVACOES','Disponibilidade de Horário para Gravações*:');
	define('DISP_CONTATO','Disponibilidade de Horário para Contato*:');
	define('CONTATO_MODEL_FORM_CIDADE','Cidade*:');
	define('CONTATO_MODEL_FORM_ESTADO','Estado*:');
	
	define('CONTATO_MODELO_TOTAL','Total');
	define('CONTATO_MODELO_PARCIAL','Parcial');
	define('CONTATO_MODEL_FINS_SEMANA','Somente fins de semana');
	define('CONTATO_MODEL_PLACEHOLD_TEL','Ex.: (00) 0000-0000');
	define('CONTATO_MODEL_HIV','Status de HIV*:');
	
	define('CONTATO_MODEL_HIV_01','Gay');
	define('CONTATO_MODEL_HIV_02','Hétero');
	define('CONTATO_MODEL_HIV_03','Bissexual');
	
	define('CONTATO_MODEL_POS_SEX_0','Posição Sexual*');
	
	define('CONTATO_MODEL_POS_SEX_1','Ativo');
	define('CONTATO_MODEL_POS_SEX_2','Passivo');
	define('CONTATO_MODEL_POS_SEX_3','Versátil');
	
	define('CONTATO_MODEL_ORIENTACAO','Orientação Sexual*:');
	
	define('CONTATO_MODEL_ORIENTA_01','Positivo');
	define('CONTATO_MODEL_ORIENTA_02','Negativo');
	define('CONTATO_MODEL_ORIENTA_03','Indetectável');
	
	define('CONTATO_TIPO_TIT','Em que tipo físico você acredita se encaixar?');
	define('CONTATO_MODEL_NASCIM','Data de Nasc*:');
	define('CONTATO_TIPO_FISICO_00','Musculoso');
	define('CONTATO_TIPO_FISICO_01','Malhado');
	define('CONTATO_TIPO_FISICO_02','Atlético');
	define('CONTATO_TIPO_FISICO_03','Magro');
	define('CONTATO_TIPO_FISICO_04','Acima do peso');
	define('CONTATO_TIPO_FISICO_05','Voluptuoso');
	
	define('CONTATO_TXT_PESO','Peso*:');
	define('CONTATO_TXT_PESO_00','60 kg');
	define('CONTATO_TXT_PESO_01','61-65 kg');
	define('CONTATO_TXT_PESO_02','66-70 kg');
	define('CONTATO_TXT_PESO_03','71-75 kg');
	define('CONTATO_TXT_PESO_04','76-80 kg');
	define('CONTATO_TXT_PESO_05','81-85 kg');
	define('CONTATO_TXT_PESO_06','86-90 kg');
	define('CONTATO_TXT_PESO_07','91-95 kg');
	define('CONTATO_TXT_PESO_08','96-100 kg');
	define('CONTATO_TXT_PESO_09','101-105 kg');
	define('CONTATO_TXT_PESO_10','106-110 kg');
	define('CONTATO_TXT_PESO_11','111-115 kg');
	define('CONTATO_TXT_PESO_12','116-120 kg');
	define('CONTATO_TXT_PESO_13','120 + kg');
	
	define('CONTATO_TXT_ALTURA','Altura*:');
	define('CONTATO_TXT_ALTURA_00','-1,5 m');
	define('CONTATO_TXT_ALTURA_01','1,5 m');
	define('CONTATO_TXT_ALTURA_02','1,6 m');
	define('CONTATO_TXT_ALTURA_03','1,7 m');
	define('CONTATO_TXT_ALTURA_04','1,8 m');
	define('CONTATO_TXT_ALTURA_05','1,9 m');
	define('CONTATO_TXT_ALTURA_06','2 m');
	define('CONTATO_TXT_ALTURA_07','2,1 m');
	define('CONTATO_TXT_ALTURA_08','2,2 m');
	define('CONTATO_TXT_ALTURA_09','2,3 m');
	
	define('CONTATO_TXT_DOTE','Dote*');
	define('CONTATO_TXT_NOME_ARTISTICO','Nome Artístico (se houver):');
	define('CONTATO_TXT_SOBRENOME','Sobrenome*:');
	define('CONTATO_TXT_NOME','Nome*:');
	
	define('CONTATO_TXT_PARAGRAFOS_00','O site HOTBOYS já trabalha há mais de dez anos produzindo cenas de sexo gay, reality shows gays, web-séries gays e ensaios sensuais (solos). Todo esse conteúdo é disponibilizado exclusivamente para os assinantes HOTBOYS.');
	define('CONTATO_TXT_PARAGRAFOS_01','Hoje, o HOTBOYS já é referência no Brasil, na Europa e nos EUA como um grande exportador de talentos. Diversos atores que hoje fazem enorme sucesso em grandes produtoras internacionais começaram aqui no HOTBOYS, como, por exemplo: Eduardo Picasso e Andy Star.');
	define('CONTATO_TXT_PARAGRAFOS_02','Você acha que tem talento e vocação para entrar no mercado adulto e só precisa de uma oportunidade? Então, mande seu material pra gente! Nossa equipe irá analisar seu perfil e, se aprovado, você pode se tornar o mais novo Modelo HOT do site mais quente da net.');
	define('CONTATO_TXT_PARAGRAFOS_03','Para ser avaliado, você deverá preencher o formulário abaixo e anexar pelo menos uma foto de rosto, uma foto de corpo inteiro e duas fotos pelado. Mesmo que as fotos sejam de celular, dê preferência para as fotos nítidas e de um ângulo bom, onde dê para vê-lo perfeitamente.');
	define('CONTATO_TXT_PARAGRAFOS_04','(O envio de fotos não garante nenhum vínculo com o site HOTBOYS. Todas as fotos são descartadas IMEDIATAMENTE após a avaliação)');
	define('CONTATO_TXT_PARAGRAFOS_05','Mas, atenção: Todas as gravações são realizadas apenas com homens maiores de 18 anos e na cidade do Rio de Janeiro. Ou seja, se você não mora no Rio de Janeiro, só se inscreva se tiver disponibilidade para viajar e gravar conosco.');
	define('CONTATO_TXT_PARAGRAFOS_06','Desejamos boa sorte e esperamos vê-lo em nosso site.');
	define('CONTATO_TXT_PARAGRAFOS_07','Até breve!');
	
	
	
	
	// entramos em contato
	define('CONTATO_BREVE_DESCRICAO','Breve Descrição do Problema*:');
	define('TXT_LABEL_TEL','Telefone:');
	
	
	// conto
	define('CONTO','CONTO');
	
	
	// contos
	define('CONTOS','Contos');
	define('','');
	define('','');
	
	//modelos
	define('TITULO_MODELOS_02','MODELOS HOT');
	
	
	// nomes empresas
	define('HOT_B','HOTBOYS');
	define('S_HOT','SOLOHOT');
	
	
	// topo
	define('CLIQUE_MUDAR','CLIQUE PARA MUDAR');
	define('M_CONTA','Minha Conta');
	define('SLOGAN','O Site Mais Quente da Net!');
	define('S_CLARO','SITE CLARO');
	define('S_ESCURO','SITE ESCURO');
	
	
	//popup
	define('TERMO_USOH','TERMOS DE USO DO SITE HOTBOYS');
	define('TERMO_1','1. SITE ADULTO');
	define('TERMO_2','2. CONTEÚDO');
	define('TERMO_3','3. ENTRETENIMENTO');
	define('TERMO_4','4. ACESSO');
	define('TERMO_5','5. COMENTÁRIOS');
	define('TERMO_6','6. DIREITOS AUTORAIS');
	define('TERMO_7','7. DE ACORDO');
	define('TERMO_TXT1','TODO O CONTEÚDO DO SITE HOTBOYS NÃO É RECOMENDADO PARA MENORES DE IDADE. E, ao acessá-lo, você declara ter maioridade penal para tal ato.');
	define('TERMO_TXT2','No caso do Brasil, ao concordar com este termo, você garante que tem idade maior ou igual a 18 anos.');
	define('TERMO_TXT3','O HOTBOYS, site que você está prestes a acessar, possui conteúdo pornográfico. Ao acessar este site você declara estar ciente à cerca da temática do site e de acordo com o material postado.');
	define('TERMO_TXT4','Todo o conteúdo divulgado pelo HOTBOYS se refere, única e exclusivamente, à fetiches sexuais. Nenhuma das nossas postagens tem como objetivo incentivar práticas consideradas ofensivas, crimes ou discurso de ódio a qualquer grupo social.');
	define('TERMO_TXT5','É importante lembrar que, em nenhum momento, o site HOTBOYS compactua com estes tipos de comportamento ou com a prática destas ações, nos limitamos apenas a usar de tais temas a fim de entretenimento em obras de ficção.');
	define('TERMO_TXT6','Ao acessar o site HOTBOYS, você se abstém do direito de protestar judicialmente sobre o conteúdo do site explicados nos itens número 2 e 3 (acima).');
	define('TERMO_TXT7','Os comentários feitos no site HOTBOYS podem ser excluídos sem prévio aviso se forem avaliados como: spam, propagandas, links para outros sites, divulgação de informações pessoais do membro ou discurso de ódio e preconceito de qualquer natureza.');
	define('TERMO_TXT8','Todo conteúdo produzido e divulgado pelo site HOTBOYS é protegido por direitos autorais. Sua distribuição, venda e/ou compartilhamento deverá ser previamente autorizado pelos responsáveis legais do site HOTBOYS. Caso contrário, o usuário infrator poderá ser acionado judicialmente para dar maiores explicações.');
	define('TERMO_TXT9','Ao clicar em “EU CONCORDO”, você está informando que leu todos os termos de uso do siteHOTBOYS e que está de acordo com todos os itens. Caso você não esteja de acordo com algumdos itens, clique em “EU NÃO CONCORDO” para sair do site.');
	
	
	//Avisos
	define('AVISO_IMPORTANTE','Aviso IMPORTANTE!');
	
	
	//Titulos
	define('HOTVIPS','HOTVIPS ASSISTINDO AGORA');
	define('CONTOS_HOT','CONTOS ERÓTICOS HOT');
	define('GOSTOSOS_QUENTES','OS GOSTOSOS MAIS QUENTES DA SEMANA');
	define('SAIU_FORNO','SAIU DO FORNO HOT');
	define('TITULO_PRINCIPAL','🌶️ HOTBOYS O Site Mais Quente da Net !!!'); 
	define('TITULO_ASSINE','Assine Já HotBoys - O Conteúdo Gay Mais Quente da Net');
	define('TITULO_CENAS','Videos HotBoys - As Cenas de Vídeos gay de Homens Fodendo');
	define('TITULO_SEJA_MODELO','Seja um Modelo - Site HotBoys');
    define('TITULO_CONTOS','Contos Eróticos HotBoys - Os melhores contos eróticos gays da internet.');
	define('TITULO_CONTATO_MODELO','Quer ser um modelo HOT?');
	define('TITULO_ENTRAMOS_CONTATO','Quer que a gente fale com você ?');
	define('TITULO_MODELOS','Homens HotBoys - Os Homens mais gostosos do Brasil.');
	
	
	
	//Botoes
	define('V_MAIS','VEJA MAIS');
