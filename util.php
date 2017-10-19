<?php

function setFooter()
{
    echo file_get_contents( "lib/html/footer.html" );
}

function setStyle()
{
    echo file_get_contents( "lib/html/style.html" );
}

function setScripts()
{
    echo file_get_contents( "lib/html/scripts.html" );
}