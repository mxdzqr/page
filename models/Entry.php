<?php

class Entry
{

   

    public static function addEntry($title, $description, $text)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO news(title, description, text, date) VALUES (:title, :description, :text, UNIX_TIMESTAMP(NOW()))';

        $result = $db->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':description', $description, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
      
        return $result->execute();
    }

    public static function getEntryById($id){

        $db = Db::getConnection();

        $sql = 'SELECT * FROM news WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $result->execute();

        
        return $result->fetch();    

    }

    public static function checkSizeField($size)
    {
        if(strlen($size) >= 6){
            return true;  
        }
        return false;          
    }

    public static function getPagination($page = 1, $value)
    {   

        $limit = $value;
        
        $offset = ($page - 1) * $limit;
        $db = Db::getConnection();

        $sql = 'SELECT * FROM news ORDER BY id DESC LIMIT :limit OFFSET :offset';

        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();

        $i = 0;
        $pages = array();
        while ($row = $result->fetch()) {
            $pages[$i]['id']= $row['id'];
            $pages[$i]['title']= $row['title'];
            $pages[$i]['description']= $row['description'];
            $pages[$i]['text']= $row['text'];
            $pages[$i]['date']= date ("d.m.Y", $row['date']);
            $i++;
        }
        return $pages;       
    }

    public static function getNumPagination()
    {   
        $db = Db::getConnection();

        $sql = 'SELECT count(id) FROM news ';

        $result = $db->prepare($sql);
        $result->execute();

        return $result->fetchColumn();
    }
}
