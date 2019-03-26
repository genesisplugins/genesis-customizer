<?php

header( "Content-type: text/css; charset: UTF-8" );

$size = $_REQUEST['size'];

echo \GenesisPlugins\GenesisCustomizer\_get_value( 'code_css-' . $size . '_custom' );
