<?php
    $EXPECTED_SIGNATURE=file_get_contents("https://composer.github.io/installer.sig");
    copy('https://getcomposer.org/installer', 'composer-setup.php');
    $ACTUAL_SIGNATURE=hash_file('sha384', 'composer-setup.php');

    if ("$EXPECTED_SIGNATURE" != "$ACTUAL_SIGNATURE")
    {
        echo 'ERROR: Invalid installer signature';
        unlink('composer-setup.php');
        exit();
    }else
    {
        exec('php composer-setup.php --quiet');
        unlink('composer-setup.php');
        exec('php composer.phar install --no-cache');
        unlink('composer.phar');
        file_put_contents('version',exec('cd vendor/alienbrayn/stolyarovlib && git symbolic-ref --short -q HEAD'));
        file_put_contents('start.bat',"php index.php \npause");
        exit();
    }
