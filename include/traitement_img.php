<?php
function traitement_img($name) {
    require_once "size_width_param.php";
    require_once "caract_speciaux.php";

    list($max_size, $max_width) = $size_param;

    $error_upload = $_FILES[$name]['error'];
            
    switch ($error_upload) {
        case 1:
            $error = true;
            $msg_error = "Taille du fichier superireur a 2m (valeur max php.ini)";
            break;

        //Ne pas s'en servir (facilement contournable)
        case 2:
            $error = true;
            $msg_error = "Taille du fichier plus grand que ce qui est specifie dans l'HTML". "<br>";
            break;
        case 3:
            $error = true;
            $msg_error = "Fichier partiellement charger". "<br>";
            break;
        case 4:
            $error = true;
            $msg_error = "Aucun fichier charger". "<br>";
            break;
        case 6:
            $error = true;
            $msg_error = "Missing a temporary folder". "<br>";
            break;
        case 7:
            $error = true;
            $msg_error = "Failed to write file to disk". "<br>";
            break;
        case 8:
            $error = true;
            $msg_error = "Une extension a interampu l'upload du fichier". "<br>";
            break;

        case 0:
            $size =  $_FILES[$name]['size'];
            if ($size > $max_size) {
                $error = true;
                $msg_error = "Taille du fichier superieur a ". round($max_size/1024, 0). "ko";
            }
            

            $type = $_FILES[$name]['type'];
            if (stristr($type, 'jpg') === false && stristr($type, 'png') === false && stristr($type, 'jpeg') === false) {
                $error = true;
                $msg_error = "Le fichier doit etre au format JPG ou JPEG";
            }


            $photo_tmp = $_FILES[$name]['tmp_name'];
            // var_dump(getimagesize($photo_tmp));
            ///destructuration
            list($width, $height) = getimagesize($photo_tmp);

            if ($width > $max_width) {
                $error = true;
                $msg_error = "La photo est trop grande(".$width."px) <br> Largeur max autoriséee : ".$max_width."px";
            }   
    }

    if (empty($error)) {
        //Creation d'un dossier
        if (!file_exists('upload')) {
            // var_dump('upload don\'t exist');
            $upload = mkdir('upload', 0777);
            var_dump($upload);
            if (!$upload) {
                $error = true;
                die('Dossier upload non crée'); //Stop l'execution du script
            }
        } 
        if (file_exists('upload')) {
            $upload_dir = "upload/";
            //On récupére le nom du fichier
            $photo_name = basename($_FILES[$name]['name']);
            $photo_name = strtolower($photo_name); //Tout en minuscule
            
            $photo_name = str_replace(' ', '', $photo_name); //Supprime les espaces
            
            //Traitement des caract speciaux en appelant une fonction d'un autre fichier
            $photo_name = replace_caract_speciaux($photo_name);
            

            $upload_file = $upload_dir.$photo_name;
            $move = move_uploaded_file($_FILES[$name]['tmp_name'], $upload_file);

            if ($move) {
                $msg = "La photo a bien été donwload ";
                $msg .= '<a href= "';
                $msg .= $upload_file;
                $msg .= '">Voir la photo</a>'. "<br>";
            } else {
                $error = true;
                $msg_error = "Problème de télèchargement";
            }
        }
    }
    if (isset($msg_error)) return $msg_error; 
}
?>