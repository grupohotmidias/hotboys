<? include "cabecalho.inc";?> 
<form name="form1" method="post" action="newsletter.php">
<b>Email: 
    <input type="text" name="email" maxlength="255">
    <br>
    <input type="radio" name="opcao" value="cadastrar" checked>
    Cadastrar 
    <input type="radio" name="opcao" value="descadastrar">
    Descadastrar<br>
    <input type="submit" name="Submit" value="Enviar">
    </b>
  </form>
<? include "rodape.inc";?>
