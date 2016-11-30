<?php 
include_once '../inc/class.php';
$user = new User;
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Connection Error</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link href="theme/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body>
        <div class="panel panel-error">
            <div class="panel-head"> .:: ::. </div>
            <div class="panel-body">
                
            </div>
            <div class="panel-footer">
                <h5><?=$user->authorFooter()?></h5>
            </div>
        </div>
    </body>
</html>