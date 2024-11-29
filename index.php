<?php

if(strpos($_SERVER['REQUEST_URI'], '/api/insult'))
{
    include('insult.php');
}
elseif(strpos($_SERVER['REQUEST_URI'], '/api/translate'))
{
    include('translate.php');
}
else
{

    echo 'ERROR!';

}