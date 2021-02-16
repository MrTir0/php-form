<?php
require_once 'baglan.php';

if (!isset($_GET['sayfa']))
    {
        $_GET['sayfa'] = 'index';
    }

    switch ($_GET['sayfa']){ 

        case 'form':
            require_once 'form.php';
        break;
    }

?>
