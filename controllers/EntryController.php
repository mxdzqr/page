<?php

class EntryController
{
    public function actionView($entryId)
    {
        
        $entry = Entry::getEntryById($entryId);

        if($entry == false){
            header("Location: /404");
        }

        require_once(ROOT. '/views/entry/view.php');
        
    }
}