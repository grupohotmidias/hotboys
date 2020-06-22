// Scripts por:
//		Obscura		http://www.hpobscura.cjb.net
//		 Página Feita Por Fabio Nascimento Brandão
//		    Contatos ICQ UIN 42660795 Jøñ £ðrd®
//				Copyright 2000

mensagem="www.hpobscura.cjb.net..."
window.defaultStatus=mensagem;

function mudamenu(src,Cor,link){
	src.style.backgroundColor = Cor;
	src.children.tags('A')[0].style.color=link;
}

function vaimenu(lugar){
	window.location=lugar;
}