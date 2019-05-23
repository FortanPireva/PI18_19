


<!DOCTYPE html>
<head>

    <title>
        <?php if (isset($header_titulli)) echo "  " . $header_titulli . "\r\n"; ?>
    </title>
    <?php
    if (isset($script_includes))
    {
        if (is_array($script_includes))
        {
            foreach ($script_includes as $src)
            {
                echo "\r\n<script src=\"$src\"></script>";
            }
        }
        elseif (is_string($script_includes))
        {
            echo "\r\n<script src=\"$script_includes\"></script>";
        }
    }
    if (isset($header_script))
    {
        echo "\r\n<script>\r\n".$header_script."\r\n</script>\r\n";
    }
    // Merr includes nga array ose string $css_includes
    if (isset($css_includes))
    {
        if (is_array($css_includes))
        {
            foreach ($css_includes as $href)
            {
                echo "\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"$href\">";
            }
        }
        elseif (is_string($css_includes))
        {
            echo "\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"$css_includes\">";
        }
    }
    

    echo "\r\n"; ?>
   
</head>

<body>