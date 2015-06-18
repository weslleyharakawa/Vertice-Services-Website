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
    * Construtor, verifica se há GD no sistema 
    * @since Jul 26, 2004 
    * @access public 
    */ 
    function marca_dagua() 
    { 
        // Verifica se há biblioteca GD no PHP 
        if(!function_exists("ImageCreateTrueColor")) // gd 2.* 
        { 
            if(!function_exists("ImageCreate")) // gd 1.* 
            { 
                echo "Você não pode rodar esse script, pois não possui biblioteca GD carregada no PHP!"; 
                exit; 
            } 
        } 
    } 

    /** 
    * Função principal 
    * 
    * É possível escolher a posição da marca d'água, basta dizer o número 
    * da posição desejada no parâmetro $pos. Os valores possíveis, são: 
    * 0 = Centro 
    * 1 = Topo Esquerdo 
    * 2 = Topo Direito 
    * 3 = Rodapé Direito 
    * 4 = Rodapé Esquerdo 
    * 5 = Topo Centralizado 
    * 6 = Centro direito 
    * 7 = Rodapé Centralizado 
    * 8 = Centro Esquerdo 
    * 
    * Nos parâmetros de imagem fonte, marca dagua e imagem destino, você pode 
    * usar ou imagens PNG ou JPEG ou ambos os tipos, exemplos: 
    * marca_dagua("foto.png", "agua.jpg", "foto.png", 1, 50); 
    * marca_dagua("foto.jpg", "agua.jpg", "foto.jpg", 1, 50); 
    * marca_dagua("foto.jpg", "agua.png", "foto.jpg", 1, 50); 
    * marca_dagua("foto.jpg", "agua.png", "foto.png", 1, 50); 
    * marca_dagua("foto.png", "agua.png", "foto.png", 1, 50); 
    * 
    * @param string $imagemfonte O caminho da imagem em que a marca da água será adicionada, ex: "imagens/foto.jpg" 
    * @param string $marcadagua O caminho da imagem marca d'água, ex: "imagens/marca.jpg" 
    * @param string $imagemdestino O nome da nova imagem, ex: "imagens/nova.png" 
    * @param integer $pos A posição da marca da água (veja acima) 
    * @param integer $transicao (0 a 100) Transparência da Marca d'Água - Menor número > Transparência 
    * @author Alfred R. Baudisch<alfred@auriumsoft.com.br> 
    * @since Mai 18, 2004 
    * @version 2.0 Jul 26, 2004 
    * @access public 
    */ 
    function gera($imagemfonte, $marcadagua, $imagemdestino, $pos = 0, $transicao = 100) 
    {  
        /** 
        * Obtém o handle de ambas as imagens 
        */ 
        $funcao = $this->verifica_tipo($marcadagua, "abrir"); 
        $marcadagua_id  = $funcao($marcadagua); 
        $funcao = $this->verifica_tipo($imagemfonte, "abrir"); 
        $imagemfonte_id = $funcao($imagemfonte); 

        // Obtém os tamanhos de ambas as imagens 
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

        // Rodapé Direito 
        if( $pos == 3 )  
        {  
           $dest_x = ($imagemfonte_largura - $marcadagua_largura) - 5;  
           $dest_y = ($imagemfonte_altura - $marcadagua_altura) - 5;  
        }  

        // Rodapé Esquerdo 
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
            
        // Rodapé Centralizado 
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

        // A função principal: misturar as duas imagens 
        imageCopyMerge($imagemfonte_id, $marcadagua_id, $dest_x, $dest_y, 0, 0, $marcadagua_largura, $marcadagua_altura, $transicao);  

        // Cria a imagem com a marca da agua 
        $funcao = $this->verifica_tipo($imagemdestino, "salvar"); 
        $funcao($imagemfonte_id, $imagemdestino, 100); 
    } 
     
    /** 
    * Verifica o tipo da imagem e retorna a função para uso 
    * 
    * @param string $nome Caminho da imagem a se verificar 
    * @param string $acao Ação a se retornar a função: abrir ou salvar 
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