/*Expandable Sticky Bar (Initial: Nov 1st, 2010)
* This notice must stay intact for usage 
* Author: Dynamic Drive at http://www.dynamicdrive.com/
* Visit http://www.dynamicdrive.com/ for full source code
*/

jQuery.noConflict()

function expstickybar(usersetting){
	var setting=jQuery.extend({position:'bottom', peekamount:30, revealtype:'mouseover', speed:200}, usersetting)
	var thisbar=this
	var cssfixedsupport=!document.all || document.all && document.compatMode=="CSS1Compat" && window.XMLHttpRequest //verifique se há suporte fixo para CSS
	if (!cssfixedsupport || window.opera)
		return
	jQuery(function($){ //em document.ready
		if (setting.externalcontent){
			thisbar.$ajaxstickydiv=$('<div id="ajaxstickydiv_'+setting.id+'"></div>').appendTo(document.body) //criar div em branco para abrigar a barra adesiva DIV
			thisbar.loadcontent($, setting)
			}
		else
			thisbar.init($, setting)
	})
}

expstickybar.prototype={

	loadcontent:function($, setting){
		var thisbar=this
		var ajaxfriendlyurl=setting.externalcontent.replace(/^http:\/\/[^\/]+\//i, "http://"+window.location.hostname+"/") 
		$.ajax({
			url: ajaxfriendlyurl, //caminho para o conteúdo externo
			async: true,
			dataType: 'html',
			error:function(ajaxrequest){
				alert('Error fetching Ajax content.<br />Server Response: '+ajaxrequest.responseText)
			},
			success:function(content){
				thisbar.$ajaxstickydiv.html(content)
				thisbar.init($, setting)
			}
		})

	},

	showhide:function(keyword, anim){
		var thisbar=this, $=jQuery
		var finalpx=(keyword=="show")? 0 : -(this.height-this.setting.peekamount)
		var positioncss=(this.setting.position=="bottom")? {bottom:finalpx} : {top:finalpx}
		this.$stickybar.stop().animate(positioncss, (anim)? this.setting.speed : 0, function(){
			thisbar.$indicators.each(function(){
				var $indicator=$(this)
				$indicator.attr('src', (thisbar.currentstate=="show")? $indicator.attr('data-closeimage') : $indicator.attr('data-openimage'))
			})
		})
		
		thisbar.currentstate=keyword
	},

	toggle:function(){
		var state=(this.currentstate=="show")? "hide" : "show"
		this.showhide(state, true)
	},

	init:function($, setting){
		var thisbar=this
		this.$stickybar=$('#'+setting.id).css('visibility', 'visible')
		this.height=this.$stickybar.outerHeight()
		this.currentstate="hide"
		setting.peekamount=Math.min(this.height, setting.peekamount)
		this.setting=setting
		if (setting.revealtype=="mouseover")
			this.$stickybar.bind("mouseenter mouseleave", function(e){
				thisbar.showhide((e.type=="mouseenter")? "show" : "hide", true)
		})
		this.$indicators=this.$stickybar.find('img[data-openimage]') //encontrar imagens dentro da barra com o atributo data-openimage
		this.$stickybar.find('a[href=#togglebar]').click(function(){ //encontre links dentro da barra com href = # togglebar e atribua o comportamento de alternância a eles
			thisbar.toggle()
			return false
		})
		setTimeout(function(){
			thisbar.height=thisbar.$stickybar.outerHeight() //reenvie a altura da barra após 1 segundo (última alteração para obter corretamente a altura da barra adesiva)
		}, 1000)
		this.showhide("hide")
	}
}


/////////////Código de inicialização://///////////////////////////

//Uso: var unqiuevar=new expstickybar(configuração)

var mystickybar=new expstickybar({
	id: "formulariowhatsapp", //id da barra adesiva DIV
	position:'bottom', //'top' ou 'bottom'
	revealtype:'mouseover', //'mouseover' ou 'manual'
	peekamount:31, //número de pixels para revelar quando a barra adesiva está fechada
	speed:200 //duração da animação (em milissegundos)
})

