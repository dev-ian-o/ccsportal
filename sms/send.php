<?php
    session_start();
    require ('src/GlobeApi.php');
    $globe = new GlobeApi();
    $auth = $globe->auth('GqAdounLyoGhRdiA6dTyMXhR9AxnuEAz','0fa9dcd70aba6dee0e04120b14508de54890fb2936192fdf0e70deb4b5970c60');
    
    if(!isset($_SESSION['code'])) {
        $loginUrl = $auth->getLoginUrl();
        header('Location: '.$loginUrl); 
        exit;
    }
    
    if(!isset($_SESSION['access_token'])) {
        $response = $auth->getAccessToken($_SESSION['code']);
        $_SESSION['access_token'] = $response['access_token'];
        $_SESSION['subscriber_number'] = $response['subscriber_number'];
    }

    $sms = $globe->sms(21583621);
    $response = $sms->sendMessage($_SESSION['access_token'], $_SESSION['subscriber_number'], 'sana mag work');

    $charge = $globe->payment(
        $_SESSION['access_token'],
        $_SESSION['subscriber_number']
    );

    $response = $charge->charge(
        0,
        '52861000001'
    );
?>