<?php

function redimenciona($tw,$th,$imagem_original,$novo_caminho){
	$imagem_original = strtolower($imagem_original);
	$novo_caminho = strtolower($novo_caminho);
	
	if(trim(extencao($imagem_original)) == ".jpg" ||  extencao($imagem_original) == ".jpeg"){
			$Gimagem 	= imagecreatefromjpeg($imagem_original); 
			
			}
			if(trim(extencao($imagem_original))  == ".gif"){
			$Gimagem 	= imagecreatefromgif($imagem_original);
		
			}
	$w = @imagesx($Gimagem);
	
	$h = @imagesy($Gimagem);
	
	####################### Definindo tamanho #########################
	if($w > $tw){			
	$wn = $tw;
	$hn = $h / ($w / $tw);
	$redimensiona = true;
	}
	
if($redimensiona){

	if($hn > $th){			
	$hb = $hn;//tamanho antes de redimencionar
	$hn =$th;
	
	$wn = $wn / ($hb/$th);
	
	$redimensiona = true;
	
	}
}else{
if($h > $th){	
		
	$hn =$th;
	$wn = $w / ($h/$th);
	
	$redimensiona = true;
	
	}
}

		if($redimensiona){
		
		$wn = ceil($wn);
		$hn = ceil($hn);
		}
		//if(redimensiona){echo "true<br>";}
		

			if($redimensiona){
				
	
			$ni	= imageCreateTrueColor($wn,$hn); 
			$temp = imagecopyresampled($ni,$Gimagem,0,0,0,0,$wn,$hn,$w,$h);
			
			if(trim(extencao($imagem_original))  == ".gif"){
            $temp = imagegif($ni,$novo_caminho,100);
			}
			if(trim(extencao($imagem_original))  == ".jpg" || extencao($imagem_original)  == ".jpeg" ){
            $temp = imagejpeg($ni,$novo_caminho,100);
			}
            chmod($novo_caminho,0644);
			}else{
				//copy($imagem_original,$novo_caminho);
			}
			
			
}

function extencao($url){
$inicio = strrpos($url,".");
$fim = strlen($url);
$extencao = substr($url,$inicio,$fim);
return $extencao;
}

class marca_dagua 
{ 
    /** 
    * Construtor, verifica se h� GD no sistema 
    * @since Jul 26, 2004 
    * @access public 
    */ 
    function marca_dagua() 
    { 
        // Verifica se h� biblioteca GD no PHP 
        if(!function_exists("ImageCreateTrueColor")) // gd 2.* 
        { 
            if(!function_exists("ImageCreate")) // gd 1.* 
            { 
                echo "Voc� n�o pode rodar esse script, pois n�o possui biblioteca GD carregada no PHP!"; 
                exit; 
            } 
        } 
    } 

    /** 
    * Fun��o principal 
    * 
    * � poss�vel escolher a posi��o da marca d'�gua, basta dizer o n�mero 
    * da posi��o desejada no par�metro $pos. Os valores poss�veis, s�o: 
    * 0 = Centro 
    * 1 = Topo Esquerdo 
    * 2 = Topo Direito 
    * 3 = Rodap� Direito 
    * 4 = Rodap� Esquerdo 
    * 5 = Topo Centralizado 
    * 6 = Centro direito 
    * 7 = Rodap� Centralizado 
    * 8 = Centro Esquerdo 
    * 
    * Nos par�metros de imagem fonte, marca dagua e imagem destino, voc� pode 
    * usar ou imagens PNG ou JPEG ou ambos os tipos, exemplos: 
    * marca_dagua("foto.png", "agua.jpg", "foto.png", 1, 50); 
    * marca_dagua("foto.jpg", "agua.jpg", "foto.jpg", 1, 50); 
    * marca_dagua("foto.jpg", "agua.png", "foto.jpg", 1, 50); 
    * marca_dagua("foto.jpg", "agua.png", "foto.png", 1, 50); 
    * marca_dagua("foto.png", "agua.png", "foto.png", 1, 50); 
    * 
    * @param string $imagemfonte O caminho da imagem em que a marca da �gua ser� adicionada, ex: "imagens/foto.jpg" 
    * @param string $marcadagua O caminho da imagem marca d'�gua, ex: "imagens/marca.jpg" 
    * @param string $imagemdestino O nome da nova imagem, ex: "imagens/nova.png" 
    * @param integer $pos A posi��o da marca da �gua (veja acima) 
    * @param integer $transicao (0 a 100) Transpar�ncia da Marca d'�gua - Menor n�mero > Transpar�ncia 
    * @author Alfred R. Baudisch<alfred@auriumsoft.com.br> 
    * @since Mai 18, 2004 
    * @version 2.0 Jul 26, 2004 
    * @access public 
    */ 
    function gera($imagemfonte, $marcadagua, $imagemdestino, $pos = 0, $transicao = 100) 
    {  
        /** 
        * Obt�m o handle de ambas as imagens 
        */ 
        $funcao = $this->verifica_tipo($marcadagua, "abrir"); 
        $marcadagua_id  = $funcao($marcadagua); 
        $funcao = $this->verifica_tipo($imagemfonte, "abrir"); 
        $imagemfonte_id = $funcao($imagemfonte); 

        // Obt�m os tamanhos de ambas as imagens 
        $imagemfonte_data  = getimagesize($imagemfonte); 
        $marcadagua_data   = getimagesize($marcadagua);  
        $imagemfonte_largura = $imagemfonte_data[0]; 
        $imagemfonte_altura  = $imagemfonte_data[1]; 
        $marcadagua_largura  = $marcadagua_data[0]; 
        $marcadagua_altura   = $marcadagua_data[1]; 

        // Centralizado 
        if( $pos == 0 )  
        {  
           $dest_x = ( $imagemfonte_largura / 2 ) - ( $marcadagua_largura / 2 );  
           $dest_y = ( $imagemfonte_altura / 2 ) - ( $marcadagua_altura / 2 );  
        }  

        // Topo Esquerdo 
        if( $pos == 1 )  
        {  
           $dest_x = 0;  
           $dest_y = 0;  
        }  

        // Topo Direito 
        if( $pos == 2 )  
        {  
           $dest_x = $imagemfonte_largura - $marcadagua_largura;  
           $dest_y = 0;  
        }  

        // Rodap� Direito 
        if( $pos == 3 )  
        {  
           $dest_x = ($imagemfonte_largura - $marcadagua_largura) - 5;  
           $dest_y = ($imagemfonte_altura - $marcadagua_altura) - 5;  
        }  

        // Rodap� Esquerdo 
        if( $pos == 4 )  
        {  
           $dest_x = 0;  
           $dest_y = $imagemfonte_altura - $marcadagua_altura;  
        }  

        // Topo Centralizado 
        if( $pos == 5 )  
        {  
           $dest_x = ( ( $imagemfonte_largura - $marcadagua_largura ) / 2 );  
           $dest_y = 0;  
        }  

        // Centro Direito 
        if( $pos == 6 )  
        {  
           $dest_x = $imagemfonte_largura - $marcadagua_largura;  
           $dest_y = ( $imagemfonte_altura / 2 ) - ( $marcadagua_altura / 2 );  
        }  
            
        // Rodap� Centralizado 
        if( $pos == 7 )  
        {  
           $dest_x = ( ( $imagemfonte_largura - $marcadagua_largura ) / 2 );  
           $dest_y = $imagemfonte_altura - $marcadagua_altura;  
        }  

        // Centro Esquerdo 
        if( $pos == 8 )  
        {  
           $dest_x = 0;  
           $dest_y = ( $imagemfonte_altura / 2 ) - ( $marcadagua_altura / 2 );  
        }  

        // A fun��o principal: misturar as duas imagens 
        imageCopyMerge($imagemfonte_id, $marcadagua_id, $dest_x, $dest_y, 0, 0, $marcadagua_largura, $marcadagua_altura, $transicao);  

        // Cria a imagem com a marca da agua 
        $funcao = $this->verifica_tipo($imagemdestino, "salvar"); 
        $funcao($imagemfonte_id, $imagemdestino, 100); 
    } 
     
    /** 
    * Verifica o tipo da imagem e retorna a fun��o para uso 
    * 
    * @param string $nome Caminho da imagem a se verificar 
    * @param string $acao A��o a se retornar a fun��o: abrir ou salvar 
    * @since Jul 26, 2004 
    * @access private 
    */ 
    function verifica_tipo($nome, $acao) 
    { 
        if(eregi("^(.*)\.(jpeg|jpg)$", $nome)) 
        { 
            if($acao == "abrir") 
            { 
                return "imageCreateFromJPEG"; 
            } 
            else 
            { 
                return "imagejpeg"; 
            } 
        } 
        elseif(eregi("^(.*)\.(png)$", $nome)) 
        { 
            if($acao == "abrir") 
            { 
                return "imageCreateFromPNG"; 
            } 
            else 
            { 
                return "imagepng"; 
            } 
        }elseif (eregi("^(.*)\.(gif)$", $nome)) {
        	if($acao == "abrir") 
            { 
                return "imagecreatefromgif"; 
            } 
            else 
            { 
                return "imagegif"; 
            }
        }
        
    } 
} 






?>