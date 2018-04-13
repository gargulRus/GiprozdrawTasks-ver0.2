<?
print_r($_POST);

function upload_files($post=array()){
    header('Content-type:application/json;charset=utf-8');

    $default_dir_upload = $_SERVER['DOCUMENT_ROOT'].'/cache/'; //Папка по умолчанию, на всякий случай

    //Если переназначаем 
    if(isset($post['folder']) && !empty($post['folder'])){
        $dir_upload = $_SERVER['DOCUMENT_ROOT'].'/'.$post['folder'];
        if(!is_dir($dir_upload)){ $dir_upload=$default_dir_upload; }
    }
    
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $new_file_name = md5(md5(time().uniqid()).uniqid()).'.'.$ext;

    $new_file_path = $dir_upload.'/'.$new_file_name;

    try {
        if (!isset($_FILES['file']['error']) ||
            is_array($_FILES['file']['error'])
        ) {
            throw new RuntimeException('Invalid parameters.');
        }
    
        switch ($_FILES['file']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }
    
        if (!move_uploaded_file(
            $_FILES['file']['tmp_name'], $new_file_path
        )) {
            throw new RuntimeException('Failed to move uploaded file.');
        }
    
        // All good, send the response
        return json_encode(array(
            'status' => 'success',
            'name'=>$_FILES['file']['name'],
            'filename' => $new_file_name,
            'filepath'=>str_replace('//','/',str_replace($_SERVER['DOCUMENT_ROOT'],'',$new_file_path))
        ),JSON_UNESCAPED_UNICODE);
    
    } catch (RuntimeException $e) {
        // Something went wrong, send the err message as JSON
        http_response_code(400);
    
        return json_encode(array(
            'status' => 'error',
            'message' => $e->getMessage()
        ),JSON_UNESCAPED_UNICODE);
    }
}

echo upload_files($_POST);
?>