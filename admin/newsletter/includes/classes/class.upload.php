<?php


		class Upload{
			
			var $extensoesPermitidas = array('jpg', 'jpeg', 'gif', 'png');
			var $diretorioArquivos = '../arquivos/';
			var $linkArquivos = 'http://localhost/arquivos/';
			var $nomeInput = "arquivo";
			var $arquivoAtual;
			
			
			
			
			
			/*
			 * Faz o upload
			 */
			function fazerUpload($file, $nome){
				
				if($file[$this->nomeInput][name] != ''){
				//enviou arquivo	
				
					$extensao = explode('.', $file[$this->nomeInput][name]);
					$extensao = strtolower(end($extensao));
		
					//verifica se extensão é permitida
					if(in_array($extensao, $this->extensoesPermitidas)){
					//extensao válida	
					
						$nomeArquivo = time()."-".rand(0, 10000)."-".Dados::urlAmigavel($nome).".".$extensao;			
						if(move_uploaded_file($file[$this->nomeInput][tmp_name], $this->diretorioArquivos.$nomeArquivo)) {
						//upload com sucesso						
							return array('erro'=>false, 'nome'=>$nomeArquivo);					   		
						} else {
						//erro no upload	
					    	return array('erro'=>true);
						}						
						
					} else {
					//extensao invalida	
						return array('erro'=>true);
						
					}
					
				} else {
				//não enviou arquivo	
					return false;
				}
			}
			
			
			
			
			
			
			
			function listarExtensoes(){
				
				foreach($this->extensoesPermitidas as $extensao){
					$extensoes = $extensoes.', '.$extensao;
				}				
				
				$extensoes = substr($extensoes, 2);
				return "($extensoes)";				
			}
			
			
			
			
			
			function gerarJavaScript(){
				
				$saida = '<script>
					document.getElementById("'.$this->nomeInput.'").onchange = function () {
					    document.getElementById("txt_'.$this->nomeInput.'").value = this.value;
					};
				</script>';
				
				return $saida;
			}
			
			
			
			
			
			
			function excluirArquivo($arquivo){
				
				if(file_exists($this->diretorioArquivos.$arquivo)){
					@unlink($this->diretorioArquivos.$arquivo);				
				}
			}
			
			
			
			
			/*
			 * Faz upload do arquivo novo. Caso der tudo certo, exclui o arquivo antigo
			 */
			function substituirArquivo($arquivoAntigo, $fileNovo, $nome){
				
				$arquivo = $this->fazerUpload($fileNovo, $nome);
				
				if($arquivo[nome]){
				//sucesso no upload	
				
					//exclui arquivo antigo
					$this->excluirArquivo($arquivoAntigo);
					return $arquivo[nome];
					
				} else {
				//nao fez upload, ou erro	
					return $arquivoAntigo;
										
				}
				
				
			}
			
			
			
			
			
			
			
		}
