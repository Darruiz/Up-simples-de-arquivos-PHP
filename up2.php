<?php


//Neste caso o arquivo temporario é $_FILES["arvt"]["tmp_name"]  // o arvt é derivado do "name" dado ao input 

try {

   //Escolhendo para onde subir os arquivos 
   $server_destiny = "enviados/";
   

   //impedir arquivo executavel de ficar no servidor 

   if (is_executable($_FILES["arvt"]["tmp_name"])) 
    throw new Exception("Proibido arvs executáveis"); 

   


   //Verificar se existe 
   if(!is_dir( $server_destiny))
   throw new Exception("diretório não encontarad."); 





   //sobre nomes 


    //pegando a ext do arquivo .pdf por expl
   $ext_arv = pathinfo($_FILES["arvt"]["name"], PATHINFO_EXTENSION);           //aqui vou passar uma constante que nunca muda diferente da váriavel 


   //dando uma id unica (Nome)


    //enviado_35358258.gif
   $name_u = uniqid("enviado_") . "." . $ext_arv;

   //caminho do novo arv no server 
   $nas =  $server_destiny . $name_u; 




   //movendo o arv temporario para local final 
  if(move_uploaded_file($_FILES["arvt"]["tmp_name"], $nas))
{
  echo "Arquivo enviado"; 

}  
else throw new Exception("Erro ao enviar. Erro: " . $_FILES["arvt"]["error"]);

} catch (Exception $e) {

   echo $e->getMessage();

}