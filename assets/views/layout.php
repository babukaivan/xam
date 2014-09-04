<!DOCTYPE html>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/js/main.js"></script>
<!--    <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true"></script>-->
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script type="text/javascript" src="/js/jquery.oauthpopup.js"></script>
    <script type="text/javascript" src="/js/jquery.geocomplete.js"></script>
    <script type="text/javascript" src="/js/gmaps.js"></script>
    <script type="text/javascript" src="/js/jquery.uploadifive.js"></script>
    <script type="text/javascript" src="/js/jquery.bxslider.js"></script>
    <script type="text/javascript" src="/js/jquery.form.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.js"></script>
    <script type="text/javascript" src="/js/jquery.datetimepicker.js"></script>
    <link rel="stylesheet" href="/css/formoid.css"/>
    <link rel="stylesheet" href="/css/style.css"/>
    <link rel="stylesheet" href="/css/jquery.bxslider.css"/>
    <link rel="stylesheet" href="/css/uploadifive.css"/>
    <link rel="stylesheet" href="/css/jquery.fancybox.css"/>
    <link rel="stylesheet" href="/css/jquery.datetimepicker.css"/>
    <title>XAM</title>
</head>
<body style="padding-top: 70px;">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Головна</a>
            <?php  if ( $user ) { ?>
                <a class="navbar-brand" href="/main/addbid">Додати порушення</a>
                <a class="navbar-brand" href="/main/logout">Logout</a>
            <?php } else{ ?>
                <a class="navbar-brand" href="/main/login">Login</a>
                <a class="navbar-brand" href="/main/register">Register</a>
            <?php } ?>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
            </ul>        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    <div id="logs">
        <?php foreach ($this->pixie->debug->logged as $log): ?>
            <pre><?php var_export($log);?></pre>
        <?php endforeach;?>
    </div>
    <?php if ( is_string($msg) ) print $msg ?>
    <?php include($subview.'.php');?>


</div> <!-- /container -->

<!--    <hr>-->

<footer>
    <!--        <p>&copy; 2005 - --><!--. All rights reserved.</p>-->
    <p></p>
</footer>

</body>
</html>