<?php

if(strpos($_SERVER['REQUEST_URI'], '/api/insult') !== false)
{
    include('insult.php');
}
elseif(strpos($_SERVER['REQUEST_URI'], '/api/translate') !== false)
{
    include('translate.php');
}
elseif($_SERVER['REQUEST_URI'] == '/docs')
{
    include('docs.html');
}
elseif($_SERVER['REQUEST_URI'] == '/')
{
    include('sample.html');
}
else
{
    include('404.html');
}