<?

class dados{
	
	var $default_imgW = 144;
	var $default_imgH = 199;
	
	var $maximoImgW = 600;
	var $maximoImgH = 800;
	var $error;
	
	var $folder_tumbs = '../tumbs/'; 
	var $folder_imgs = '../img_girl/';
	
	function add_dados(){
		
		$nome = check_string($_POST['nome'],'text');
		$descricao = check_string($_POST['descricao'],'text');
		$descricao2 = check_string($_POST['descricao2'],'text');
		$descricao3 = check_string($_POST['descricao3'],'text');
		$destaque = check_string($_POST['destaque'],'text');
		
		
		$Nationality = check_string($_POST['Nationality'],'text');
		$Age = check_string($_POST['Age'],'text');
		$Stats = check_string($_POST['Stats'],'text');
		$Height = check_string($_POST['Height'],'text');
		$Hair = check_string($_POST['Hair'],'text');
		$Eyes = check_string($_POST['Eyes'],'text');
		$Languages = check_string($_POST['Languages'],'text');
		$Residence = check_string($_POST['Residence'],'text');
		
		
		$in1 = check_string($_POST['in1'],'text');
		$out1 = check_string($_POST['out1'],'text');
		$in2 = check_string($_POST['in2'],'text');
		$out2 = check_string($_POST['out2'],'text');
		$in3 = check_string($_POST['in3'],'text');
		$out3 = check_string($_POST['out3'],'text');
		
		$DinnerIn = check_string($_POST['DinnerIn'],'text');
		$DinnerOut = check_string($_POST['DinnerOut'],'text');
		$OvernightIn = check_string($_POST['OvernightIn'],'text');
		$OvernightOut = check_string($_POST['OvernightOut'],'text');
		
		
		
		
		$restrito = $_POST['restrito'];
		
		$cat = (int)$_POST['cat'];
		
		if($restrito == 'yes'){
			
			$set_ret = 'yes';
		}else{
			
			$set_ret = 'no';
		}
		
		
		# busca a imagem principal
		
		
		
		if($img_default = check_string($this->add_img_default($_FILES['img_default']),'text')){
			
			
			/// img encontrada com sucesso insere os dados no banco de dados
			$img_private = check_string($this->add_img_default($_FILES['img_private']),'text');
			
			if($nome != 'NULL' || $descricao != 'NULL'){
			
			$sql = "insert into dados (nome,descricao,descricao2,descricao3,destaque,restrito,img_principal,img_private,cat,Nationality,Age,Stats,Height,Hair,Eyes,Languages,Residence,in1,out1,in2,out2,in3,out3,DinnerIn,DinnerOut,OvernightIn,OvernightOut) values ";
			$sql .= "($nome,$descricao,$descricao2,$descricao3,$destaque,'$set_ret',$img_default,$img_private,$cat,$Nationality,$Age,$Stats,$Height,$Hair,$Eyes,$Languages,$Residence,$in1,$out1,$in2,$out2,$in3,$out3,$DinnerIn,$DinnerOut,$OvernightIn,$OvernightOut)";
			
			
			mysql_query($sql);
			
			}else{
				$this->error = "Send Name end ABOUT";
				
			}
			
			
			if(mysql_error()){
				
				/// deleta a imagem que foi criada
				
				@unlink($this->folder_tumbs . $img_default);
				$this->error = "Error in database:" . mysql_error();
				return false;
			}else{
				
				/// coleta os ultimos ids
				
				
				$id = mysql_insert_id();
				
				// adiciona as fotos em um banco diferente
				
				$this->add_imagens($_FILES['file'],$id);
				
				///adiciona imagens privadas
				
				$this->add_imagens($_FILES['private'],$id,true);
				
				
				return true;
			}
			
			
			
			
		}else{
			$erro = "Image Default not send in server";
			
			return false;
			
		}
		

	}
	
	function edit_dados(){
		
			
		$nome = check_string($_POST['nome'],'text');
		$descricao = check_string($_POST['descricao'],'text');
		$descricao2 = check_string($_POST['descricao2'],'text');
		$descricao3 = check_string($_POST['descricao3'],'text');
		$destaque = check_string($_POST['destaque'],'text');
		
		$id_dados = (int)$_GET['id_dados'];
		
		
		
		
		$Nationality = check_string($_POST['Nationality'],'text');
		$Age = check_string($_POST['Age'],'text');
		$Stats = check_string($_POST['Stats'],'text');
		$Height = check_string($_POST['Height'],'text');
		$Hair = check_string($_POST['Hair'],'text');
		$Eyes = check_string($_POST['Eyes'],'text');
		$Languages = check_string($_POST['Languages'],'text');
		$Residence = check_string($_POST['Residence'],'text');
		
		
		$in1 = check_string($_POST['in1'],'text');
		$out1 = check_string($_POST['out1'],'text');
		$in2 = check_string($_POST['in2'],'text');
		$out2 = check_string($_POST['out2'],'text');
		$in3 = check_string($_POST['in3'],'text');
		$out3 = check_string($_POST['out3'],'text');
		
		$DinnerIn = check_string($_POST['DinnerIn'],'text');
		$DinnerOut = check_string($_POST['DinnerOut'],'text');
		$OvernightIn = check_string($_POST['OvernightIn'],'text');
		$OvernightOut = check_string($_POST['OvernightOut'],'text');
		
		$restrito = $_POST['restrito'];
		
		$cat = (int)$_POST['cat'];
		
		if($restrito == 'yes'){
			
			$set_ret = 'yes';
		}else{
			
			$set_ret = 'no';
		}
		
		
		if($nome && $descricao){
		
		$sql = "update dados set nome=$nome,descricao=$descricao,descricao2 = $descricao2, descricao3=$descricao3,destaque=$destaque,restrito='$set_ret',cat=$cat,Nationality=$Nationality,Age=$Age,Stats=$Stats,Height=$Height,Hair=$Hair,Eyes=$Eyes,Languages=$Languages,Residence=$Residence,in1=$in1,out1=$out1,in2=$in2,out2=$out2,in3=$in3,out3=$out3,DinnerIn=$DinnerIn,DinnerOut=$DinnerOut,OvernightIn=$OvernightIn,OvernightOut=$OvernightOut where id_dados = $id_dados";
		mysql_query($sql);
		
		}else{
			
			$this->error = "Dados insuficiente";
			return false;
		}
		
	
		
		if(mysql_error()){
			$this->error = "Database error:" . mysql_error();
			return false;
		}else{
			return true;
			
		}
		
		
		
	}
	
	
	function del_img(){
		$id = (int)$_GET['id_img'];
		
		$id_dados = (int)$_GET['id_dados'];
		/// deleta imagem
		$conn_img = $this->listar_imgs("where id_imgs = $id");
		if($conn_img){
			
			$li = mysql_fetch_array($conn_img);
			
			$nome = $li['img'];
			
			@unlink($this->folder_imgs . $nome);
		
		
		
		$sql = "delete from imgs where id_imgs =$id and id_dados=$id_dados";
		mysql_query($sql);
		}else{
			
			$this->error = "Error locate file";
		}
		if(mysql_error()){
			$this->error = "Database error:" . mysql_error();
			return false;
			
		}else{
			return true;
		}
		
		
		
	}
	
	 function add_imagens($files,$id,$tipo=false){
	 	$files_send_user = 0;
	 	$file_send_user_error = 0;
	 	
	 	$file_send_server = 0;
	 	
	 	for($x = 0 ; $x < count($files);$x++){
	 		
	 		if($files['name'][$x]){
	 			$files_send++;
	 			
	 			$name_file = md5(time() . $files['name'][$x]) . extencao($files['name'][$x]);
	 			
	 			
	 			$caminho = $this->folder_imgs . $name_file;
	 			if(img_permitidas($name_file)){
	 				
	 				if(move_uploaded_file($files['tmp_name'][$x],$caminho)){
	 					
	 					$file_send_server++;
	 					
	 					/// o tamanho maximo permitodo para a imagem
	 					
	 					redimenciona($this->maximoImgW,$this->maximoImgW,$caminho,$caminho);
	 					
	 					if(!$this->add_img_banco($name_file,$id,$tipo)){
	 						$file_send_user_error++;
	 					}
	 					
	 					
	 				}else{
	 					$file_send_user_error++;
	 					
	 				}
	 				
	 				
	 			}
	 			
	 			
	 		}
	 		
	 		
	 	}
	 	
	 	
	 	
	 	
	 	
	 	
	 }
	 
	 function add_img_banco($name_img,$id_dados,$tipo=false){
	 	
	 	$tipo_dados = ($tipo==false)? "'noprive'":"'prive'";
	 	
	 	
	 	$sql = "insert into imgs (img,id_dados,tipo) values ('$name_img',$id_dados,$tipo_dados)";
	 	
	 	mysql_query($sql);
	 	
	 	if(mysql_error()){
	 		return false;
	 		
	 		
	 	}else {
	 		
	 		return true;
	 	}
	 	
	 }
	
	
	function add_img_default($img,$id=false,$tipo_img=false){
		
		if($img['name']){
			
			$nome_arquivo = md5(time() . $img['name']) . extencao($img['name']);
			
			$caminho = $this->folder_tumbs . $nome_arquivo;
			
			if(move_uploaded_file($img['tmp_name'],$caminho)){
				
				### tamanho maximo da imagem
				
				redimenciona($this->default_imgW,$this->default_imgH,$caminho,$caminho);
				
				
				if($id){
					// update 19/07 /// detault img for private
					// aqui é para atualizar no banco de dados
					if($tipo_img == 'private'){
					$sql = "update dados set img_private= '$nome_arquivo' where id_dados=$id";
					}else{
					$sql = "update dados set img_principal= '$nome_arquivo' where id_dados=$id";	
					}
					mysql_query($sql);
				}
				
				return $nome_arquivo;
				
				
			}else {
				
				return false;
			}
			
			
		}else{
			
			return false;
		}
		
	}
	
	
	
	function listar($complemento = false){
		
		if(!$complemento) $complemento = "order by id_dados desc";
		
		$sql = "select * from dados $complemento";
		
		return mysql_query($sql);	
		
	}
	
	function listar_imgs($complemento = false){
		
		if(!$complemento) $complemento = "order by id_imgs desc";
		
		$sql = "select * from imgs $complemento";
		
		return mysql_query($sql);	
		
	}
	
	function del_dados($id){
		
		$sql = "delete from dados where id_dados=$id";
		
		mysql_query($sql);
		
		$sql = "delete from imgs where id_dados=$id";
		mysql_query($sql);

	}
	
	
	function set_position($id,$new_position,$type_position){
		
		$conn= $this->listar("where id_dados=$id");
		
		$li = mysql_fetch_array($conn);
		
		$position_int = $li[$type_position];
		
		
		
		
		$sql = "select * from dados where $type_position >= $new_position";
		
		$conn = mysql_query($sql);
		
			while ($li = mysql_fetch_array($conn)) {
				$seta = $li[$type_position]+1;
				
				$up = "update dados set $type_position = $seta where id_dados=" . $li['id_dados'];
				mysql_query($up);
								
				
			}
			
			$up2 = "update dados set $type_position = $new_position where id_dados = " . $id;
			
			mysql_query($up2);
		
		
			
			
		}
		
	
		
		
		
		
		
		
		
		
	
	
	
	
}


class usuarios extends dados {
	
	var $error;
	
	function add_user(){
		
		$name = check_string(trim($_POST['name']),'text');
		$phone_number = check_string(trim($_POST['phone_number']),'text');
		$mobile_number = check_string(trim($_POST['mobile_number']),'text');
		
		$email = check_string(trim($_POST['email']),'text');
		$used_agency = check_string(trim($_POST['used_agency']),'text'); // yes or no
		$feedback = check_string(trim($_POST['feedback']),'text'); // long text
		$login = check_string(strtolower(trim($_POST['login'])),'text'); // varchar
		
		$pw = check_string(strtolower(trim($_POST['pw'])),'text');
		$rpw = check_string(strtolower(trim($_POST['rpw'])),'text');
	
		
		
		if($name == 'NULL'){
			$this->error = "Invalid name";
			return false;
		}
		
		
		
		
		if($email== 'NULL'){
			
			$this->error = "Invalid last name";
			return false;
		}
		
		if($this->email_existe($email)){
			
			$this->error = "Invalid e-mail";
			return false;
			
		}
		
		if(!is_email_valid(trim($_POST['email']))){
			
			$this->error = "Invalid e-mail";
			
			return false;
			
		}
		
		/// verifica se a senha é igual a resenha
		
		if($pw != $rpw){
			$this->error = "Re-white you password";
			return false;
		}
		
		
		if(strlen($pw) < 2){
			$this->error = "Minimum 4 caracteres in password";
			return false;
		}
		
		/// chegou até aqui é que ta pronto
		$data = time();
		
		
		
		$sql = "insert into user (name,phone_number,mobile_number,email,used_agency,feedback,login,pw,data) values ";
		$sql .= "($name,$phone_number,$mobile_number,$email,$used_agency,$feedback,$login,$pw,$data)";
		
		mysql_query($sql);
		
		if(mysql_error()){
			
			$this->error = "Error in database: " . mysql_error();
		}else{
			$last_id = mysql_insert_id();
			$this->armazena_session($last_id);
			
			
			
			return true;
		}
		
		
		
	}
	
	function logar(){
		
		$login = check_string(trim($_POST['login']),'text');
		$pw = check_string(trim($_POST['pw']),'text');
		
		$sql = "select * from user where login = $login and pw = $pw";
		
		$conn = mysql_query($sql);
		
		if(mysql_error()){
			$this->error = "DataBase error;";
			return false;
		}
		
		$total = mysql_num_rows($conn);
		
		if($total > 0){
			
			$li = mysql_fetch_array($conn);
			$id = $li['id_user'];
			$access = $li['access'];
			if($access == 'No'){
				$this->error = "Access not release";
				return false;
			}else{
			
			$this->armazena_session($id);
			return true;
			}
		}else{
			$this->error = "Login or password invalid";
			return false;
		}
		
		
		
		
	}
	
	function email_existe($email){
		
		$sql = "select * from user where email = $email";
		
		$total = mysql_num_rows(mysql_query($sql));
		
		if($total == 0){
			return false;
		}else{
			
			return true;
		}
		
		
	}
	
	function armazena_session($id){
		$_SESSION['id_user'] = $id;
	}
	
	function get_status(){
		if($_SESSION['id_user']){
			
			return $_SESSION['id_user'];
			
			
		}else{
			
			return false;
		}
		
		
	}
	
	
		
	function listar_user($complemento = false){
		
		if(!$complemento) $complemento = "order by id_user desc";
		
		$sql = "select * from user $complemento";
		
		return mysql_query($sql);	
		
	}
	
	function add_access($id){
		
		$sql = "update user set access = 'Yes' where id_user=$id";
		mysql_query($sql) or die (mysql_error());
		
	}
	
		function block_access($id){
		
		$sql = "update user set access = 'No' where id_user=$id";
		mysql_query($sql) or die (mysql_error());
	}
	
	function view_access($id){
		
		$sql = "select * from user where id_user =$id";
		
		$conn = mysql_query($sql);
		
		if($conn){
			
			$li = mysql_fetch_array($conn);
			
			$access = $li['access'];
			
			if($access == 'Yes'){
				
				return true;
			}else{
				
				return false;
			}
			
		}
		
		
	}
}


?>