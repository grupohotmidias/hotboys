// Scripts por:
//		Obscura		http://www.hpobscura.cjb.net
//		 P�gina Feita Por Fabio Nascimento Brand�o
//		    Contatos ICQ UIN 42660795 J���rd�
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