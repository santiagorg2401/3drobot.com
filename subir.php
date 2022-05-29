<?php
$tfp_server="137.0.0.2";
$tfp_usuario="villarraga";
$ftp_pass="v1ll4rr4g4*";
$con_id=ftp_connect($tfp_server);
$lr=ftp_login($con_id,$tfp_usuario,$ftp_pass);
if((!$con_id) || (!$lr)){
    echo 'no se pudo conectar';
    exit;
}else{
    echo $lr;
    echo 'conectado correctamente';
    $temp=explode(".",$_FILES['archivp']['name']);
    //ftp_pass($icon_id,true);
    $subio=ftp_put($con_id,$destino.'/'.$nombre,$source_file,FTP_BINARY);
    if($subio){
        echo "ARCHIVO SUBIDO CORRECTAMENTE";
    }else{
        echo 'ha ocurrido un error';
    }

}