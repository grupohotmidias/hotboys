function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function abre(url,janela,larg,alt,scroll,pos1,pos2){
window.open(url,janela,'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars='+scroll+',resizable=no,copyhistory=no,top='+pos1+',left='+pos2+',screenY='+pos1+',screenX='+pos2+',width='+larg+',height='+alt);
}


function menu_over(src,clrOver) {
 if (!src.contains(event.fromElement)) {
  src.style.cursor = 'hand';
  src.bgColor = clrOver;
 }
}
function menu_out(src,clrIn) {
 if (!src.contains(event.toElement)) {
  src.style.cursor = 'default';
  src.bgColor = clrIn;
 }
}

function janela(param,w,h,nome) {
   var nomearq = param;
   var windowvar = window.open(nomearq,nome,"scrollbars=yes,location=no,directories=no,status=yes,menubar=no,resizable=no,toolbar=no,top=0,left=0,width="+ w + ",height=" +h );
}

function erro(msg) {
	alert(msg);
	return false;
}

function erro_focus(msg, obj) {
	alert(msg);
	obj.focus();
	return false;
}

function dataValida(data) {
	// número de dias para cada mês
	dias = new Array (31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

	d = data.split(/\//);

	if (d.length < 3) return false;
	
	// verifica o ano
	if (d[2] < 1900) return false;

	// verifica o mês
	if (d[1] < 1 || d[1] > 12) return false;

	// verifica o dia
	dm = dias[d[1] - 1];
	if (d[1] == 2) { if (d[2] % 4 == 0) dm = 29; }
	if (d[0] < 1 || d[0] > dm) return false;

	return true;
}

// verifica o email digitado.
function emailValido(mail) {
	return mail.match(/[0-9A-Za-z\.\_\-]+\@{1,1}[0-9A-Za-z\_\-]+\.{1,1}[0-9A-Za-z\_\-]+/);
}

// retorna se um campo está vazio desconsiderando espaços no início e no final
function vazio(valor) {
	s = new String(valor);
	s = s.replace(/^ +/, '');
	s = s.replace(/ +$/, '');
	return s.length == 0;
}

// retorna se um identificador contém apenas caracteres válidos
function idValido(id) {
	s = new String(id);
	validos = new String('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_');
	valido = true;
	for (i = 0; i < s.length; i++) valido = valido && validos.indexOf(s.charAt(i)) != -1;
	return valido && !vazio(id);
}

// submete os dados de um form ao servidor
function submitForm(cmd, frm) {
	if (!frm) {
		frm = document.forms[0];
	}
	frm.cmd.value = cmd;
	frm.submit();
}

// confirma um comando de exclusão e chama o submitForm
function confirmar(msg, cmd) {
	if (confirm(msg)) 
	location.href=(cmd);
}



function fillSelectFromArray(selectCtrl, itemArray, defaultItem) {
	var i, j;
	
	if (itemArray != null) {
		// prepara o select com os valores do array de sub-categorias
		for (i = selectCtrl.options.length; i >= 0; i--) {
			selectCtrl.options[i] = null;
		}
		
		// disponibiliza somente os valores relacionados a categoria
		//   escolhida.
		j = 0;
		for (i = 0; i < itemArray.length; i++) {
			selectCtrl.options[j] = new Option(itemArray[i][0]);
			if (itemArray[i][1] != null) {
				selectCtrl.options[j].value = itemArray[i][1];
				if (itemArray[i][1] == defaultItem) {
					selectCtrl.options[j].selected = true;
				}
			}
			j++;
		}
	}
}

function fillSelectFromArray1(selectCtrl, itemArray, defaultItem) {
	var i, j;
	
	if (itemArray != null) {
		// prepara o select com os valores do array de sub-categorias
		for (i = selectCtrl.options.length; i >= 0; i--) {
			selectCtrl.options[i] = null;
		}
		
		// disponibiliza somente os valores relacionados a categoria
		//   escolhida.
		j = 0;
		for (i = 0; i < itemArray.length; i++) {
			selectCtrl.options[j] = new Option(itemArray[i][0]);
			if (itemArray[i][1] != null) {
				selectCtrl.options[j].value = itemArray[i][1];
				if (itemArray[i][1] == defaultItem) {
					selectCtrl.options[j].selected = true;
				}
			}
			j++;
		}
	}
}


function valida_CGC_CPF(cgc_cpf) {
	ok = true

	if ( ( cgc_cpf.length == 14 || cgc_cpf.length == 11 ) &&
	     ( cgc_cpf != "00000000000" && cgc_cpf != "00000000000000" ) )
	{
		val_cgc_cpf = cgc_cpf.substring(0,cgc_cpf.length-2)
		val_cgc_cpf = val_cgc_cpf + dig_cgc_cpf(val_cgc_cpf)
		val_cgc_cpf = val_cgc_cpf + dig_cgc_cpf(val_cgc_cpf)
	    if (cgc_cpf != val_cgc_cpf)	{
    	    ok = false
			}
	}
	else {
		ok = false
  }

	return ok
}

function dig_cgc_cpf(cgc_cpf) {
	soma = 0
	for (var i = 0; i < cgc_cpf.length ; i++) {
		if (cgc_cpf.length >= 12)
			k = ( 2 +  i  % 8 )
		else
			k = ( i + 2 )
		soma = soma + parseInt(cgc_cpf.charAt(cgc_cpf.length - i - 1)) * k
	}	
	dig = ((10*soma)%11)%10
	digito = dig.toString() 
	return digito
}

