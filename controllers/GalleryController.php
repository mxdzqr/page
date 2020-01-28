<?php

class GalleryController
{
    public function actionView($entryId)
    {
        
        if(isset($_POST['btn_upload'])) {
            $id = Gallery::getLastId();

            if($id == 0) {
                $id++;
            }

            $image = Gallery::getUpload($id);

            if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                   move_uploaded_file($_FILES["image"]["tmp_name"],$_SERVER['DOCUMENT_ROOT'] . "/upload/images/{$id}.jpg");
                }
            
                json_encode(array('success' => 1));
            } else {
                json_encode(array('success' => 0));
            }
        

          
        $showImage = Gallery::showImage();
        require_once (ROOT. '/views/gallery/view.php');     
    }
}