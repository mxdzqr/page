<?php

class Gallery
{

    public static function getImage($id)
    {
        $path = '/upload/images/';

        $pathImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathImage)) {
            return $pathImage;
        }
    }

    public static function getLastId()
    {
        $db = Db::getConnection();

        $sql = "SELECT count(img_id) FROM images";
        $result = $db->prepare($sql);
        $result->execute();

        return $result->fetchColumn();
    }

    public static function showImage()
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM images";
        $result = $db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        $i = 0;
        $image = array();
        while ($row = $result->fetch()) {
            $image[$i]['id']= $row['id'];
            $image[$i]['img_id']= $row['img_id'];
            $image[$i]['date']= date("d.m.Y", $row['date']);
            $i++;
        }
    
        return $image;       
    }

    public static function getUpload($id)
    {
        $db = Db::getConnection();

        $sql = "INSERT INTO images(img_id, date) VALUE (:id, UNIX_TIMESTAMP(NOW()))";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

}