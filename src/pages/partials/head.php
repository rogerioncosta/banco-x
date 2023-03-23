<?php    

function useHead(string $title = 'Banco X', string $description = 'Sistema Banco X para todos', ?string $custom = null) {
    echo '   
    <head>
        <title>' . $title .'</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="'. $description .'">
        '. $custom .'      
    </head>
    ';
}

