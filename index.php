<?php
if (file_exists(__DIR__.'/.env')) {  
    require_once __DIR__.'/public/index.php';
} else {    
    require_once __DIR__.'/public/pre-package/setup.php';
}