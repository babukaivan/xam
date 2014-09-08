<!DOCTYPE html>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/css/jquery.fancybox.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.js"></script>
    <title>Admin Panel</title>
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
            <a class="navbar-brand" href="/admin">Admin Panel</a>
            <?php  if ( $user ) { ?>
                <a class="navbar-brand" href="/admin/logout">Logout</a>
                <a class="navbar-brand" href="/admin/bids_list">Список Порушень</a>
            <?php  } ?>
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

