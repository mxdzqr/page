<?php

class Pagination
{
    

    public static function run($allArticles, $page, $value)
    {
        $limit = $value;
        if($page == NULL) {
            $page = 1;
        }

        $date['total'] = ceil($allArticles / $limit);
        $date['current'] = $page;
        

        return $date;
    }


}