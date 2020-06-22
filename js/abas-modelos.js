$(document).ready(function(){
	$("#content .conteudo:nth-child(1)").show();
	$(".aba").click(function(){
		$(".aba").removeClass("ativa");
		$(this).addClass("ativa");
		var indice = $(this).parent().index();
		indice++;
		$("#content .conteudo").hide();
		$("#content .conteudo:nth-child("+indice+")").show();
                return false;
	});
});