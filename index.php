<?php

include('config.php');

if(strpos($_SERVER['REQUEST_URI'], '/api/insult') !== false)
{
    include('insult.php');
}
elseif(strpos($_SERVER['REQUEST_URI'], '/api/translate') !== false)
{
    include('translate.php');
}
elseif($_SERVER['REQUEST_URI'] == SITE_FOLDER.'/docs')
{
    include('docs.html');
}
elseif($_SERVER['REQUEST_URI'] == SITE_FOLDER.'/')
{
    include('sample.html');
}
else
{
    header('Location: /smurfs/');
}
