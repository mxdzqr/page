<?php
    return array (
        'gallery' => 'gallery/view/',
        'mail' => 'mail/view/',
        'entry/mail' => 'mail/view/',
        'entry/([0-9]+)' => 'entry/view/$1',
        'page/([0-9]+)' => 'main/index/$1',
        '(^$)' => 'main/index',
    );

?>
