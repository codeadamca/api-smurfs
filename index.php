<?php

if(strpos($_SERVER['REQUEST_URI'], '/api/insult') !== false)
{
    include('insult.php');
}
elseif(strpos($_SERVER['REQUEST_URI'], '/api/translate') !== false)
{
    include('translate.php');
}
elseif($_SERVER['REQUEST_URI'] == '/smurfs/docs')
{
    include('docs.html');
}
elseif($_SERVER['REQUEST_URI'] == '/smurfs/')
{
    include('sample.html');
}
else
{
    header('Location: /smurfs/');
}