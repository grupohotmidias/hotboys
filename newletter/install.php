<? include "cabecalho.inc";
include "config.inc";
mysql_connect($mysqlhost,$mysqluser,$mysqlpass) or die("Não é possível abrir a conexão com o MySql server!");
mysql_select_db($nomedb);
mysql_query("
	create table $nometabela(
		id int NOT NULL auto_increment,
		email char(255) NOT NULL,
		primary key(id)
	);") or die ("Não pode criar a tabela na database!");
mysql_close();
echo "Database criada com sucesso...</p>Apague o arquivo install.php!!!";
include "rodape.inc" ?>