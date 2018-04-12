<!DOCTYPE html>
<html lang="pt">

<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109334806-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-109334806-1');
    </script>

    <meta name="google-site-verification" content="SSX_VSqnARk35VLX4tqi_llJKi_c-F7gtdvYYEOV_XM" />


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Daniel Rocha Lopes - Rolha T19 - danirolopes@gmail.com">

    <title>Centro Educacional Santos Dumont</title>
    <link rel="shortcut icon" href="<?php echo URL;?>images/favicon.ico" />

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo URL;?>css/bootstrap.css" rel="stylesheet">

    <!-- Theme CSS -->
    <?php if($this->controller != 'admin' && $this->controller != 'professor-admin') { ?>
    <link href="<?php echo URL;?>css/style.css" rel="stylesheet">
    <?php } ?>
    <?php if($this->controller == 'index') { ?>
    <link href="<?php echo URL;?>css/home.css" rel="stylesheet">
    <?php } ?>
    <?php if($this->controller == 'historia') { ?>
    <link href="<?php echo URL;?>css/historia.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
    <?php } ?>
    <?php if($this->controller == 'construcao') { ?>
    <link href="<?php echo URL;?>css/construcao.css" rel="stylesheet">
    <?php } ?>
    <?php if($this->controller == 'vestibulinho') { ?>
    <link href="<?php echo URL;?>css/vestibulinho.css" rel="stylesheet">
    <?php } ?>
    <?php if($this->controller == 'admin' || $this->controller == 'professor-admin') { ?>
    <link href="<?php echo URL;?>css/admin.css" rel="stylesheet">
    <?php } ?>
    <?php if($this->controller == 'admin-login') { ?>
    <link href="<?php echo URL;?>css/admin-login.css" rel="stylesheet">
    <?php } ?>
    <?php if($this->controller == 'professor-login') { ?>
    <link href="<?php echo URL;?>css/admin-login.css" rel="stylesheet">
    <?php } ?>
    <?php if($this->controller == 'professor-page' || $this->controller == 'professor') { ?>
    <link href="<?php echo URL;?>css/professor_page.css" rel="stylesheet">
    <?php } ?>
    <?php if($this->controller == 'professor-admin') { ?>
    <link href="<?php echo URL;?>js/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo URL;?>css/plugins/cropper/cropper.min.css" rel="stylesheet">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <?php } ?>
    <?php if($this->controller == 'doador' || $this->controller == 'parceiro' || $this->controller == 'voluntario') { ?>
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    <link href="<?php echo URL;?>css/queroAjudar.css" rel="stylesheet">
    <?php } ?>


    <!-- Custom Fonts -->
    <link href="<?php echo URL;?>font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Just+Another+Hand" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
    (function(h,e,a,t,m,p) {
    m=e.createElement(a);m.async=!0;m.src=t;
    p=e.getElementsByTagName(a)[0];p.parentNode.insertBefore(m,p);
    })(window,document,'script','https://u.heatmap.it/log.js');
    </script>

</head>
