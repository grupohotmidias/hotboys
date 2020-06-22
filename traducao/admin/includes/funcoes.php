<?php

		function moeda_remove($valor){
				
			$valor =  str_replace('R$', '', $valor);
			$valor = str_replace('.', '', $valor);
			$valor = str_replace(',', '.', $valor);
				
			return $valor;
		}

		
		
		
		
		//verificar se usuario esta logado
		function validar_usuario(){
			
			$query = "SELECT * FROM `administradores` WHERE login='$_SESSION[login]'";
			$consulta = mysql_query($query);
			$total = mysql_num_rows($consulta);
		
			if($total==1){
			//sucesso	
				return true;
			} else {
			//erro	
				header("Location: index.php");
				exit();
			}
		}









		function id_agenciador(){
		//retorna o ID do usuario	
			
			$query = "SELECT * FROM `administradores` WHERE login='$_SESSION[login]'";
			$consulta = mysql_query($query);
			$dados = mysql_fetch_array($consulta);
			
			return $dados[id];
			
		}
		
		
		
		
		//retorna TRUE se for administrador e FALSE se for usuário comum
		function usuario_administrador(){
						
			$query = "SELECT * FROM `administradores` WHERE login='$_SESSION[login]'";
			$consulta = mysql_query($query);
			$dados = mysql_fetch_array($consulta);
			
			if($dados[administrador]=='Sim'){
				return true;
			} else {
				return false;
			}
		}

		
		
		
		
		
		
			/*
			 * Faz upload de arquivos
			 * Separar $types com ,
			 * 
			 	$up = upload('imagem', '../arquivos/', 'jpg,png');
				if($up==false){
					echo 'erro';
				} else {
					echo 'sucesso';
				}
			 * 
			 * 
			 * 
			 */
			function upload($file_id, $folder="", $types="") {
			    if(!$_FILES[$file_id]['name']) return array('','No file specified');
			
			    $file_title = $_FILES[$file_id]['name'];
			    //Get file extension
			    $ext_arr = split("\.",basename($file_title));
			    $ext = strtolower($ext_arr[count($ext_arr)-1]); //Get the last extension
			
			    //Not really uniqe - but for all practical reasons, it is
			    $uniqer = substr(md5(uniqid(rand(),1)),0,5);
			    $file_name = $uniqer . '_' . $file_title;//Get Unique Name
		
			    $all_types = explode(",",strtolower($types));
			    if($types) {
			        if(in_array($ext,$all_types));
			        else {
					    $result = "'".$_FILES[$file_id]['name']."' is not a valid file."; //Show error if any.
						return $saida['status'] = false;
			        }
			    }
			
			    //Where the file must be uploaded to
			    if($folder) $folder .= '/';//Add a '/' at the end of the folder
			    $uploadfile = $folder . $file_name;
		
			    $result = '';
			    //Move the file from the stored location to the new location
			    if (!move_uploaded_file($_FILES[$file_id]['tmp_name'], $uploadfile)) {
				
			        $result = "Cannot upload the file '".$_FILES[$file_id]['name']."'"; //Show error if any.
			        if(!file_exists($folder)) {
			            $result .= " : Folder don't exist.";
			        } elseif(!is_writable($folder)) {
			            $result .= " : Folder not writable.";
			        } elseif(!is_writable($uploadfile)) {
			            $result .= " : File not writable.";
			        }
			        $file_name = '';
			    
			    } else {
			        if(!$_FILES[$file_id]['size']) { //Check if the file is made
			            @unlink($uploadfile);//Delete the Empty file
			            $file_name = '';
			            $result = "Empty file found - please use a valid file."; //Show the error message
			            $status = 'erro';
			        } else {
			            chmod($uploadfile,0777);//Make it universally writable.
			        }
			    }
			
			
				$saida['nome'] = $file_name;
				$saida['status'] = $status;
			
			    return $saida;
			}



















		
		
		
		
		
		
		
		