<?php
    $address = $_GET['address']
?>

<html>
    <head>
        <title>NeXon Web</title>
        <link href="css/style.css" type="text/css" media="all"/>
    </head>

    <body>
        <div id="header">
            <img src="images/logo.png" id="logo"/>
            <img src="images/back.png" id="back" />
            <img src="images/fwd.png" id="fwd"/>
            <form method="GET" action="web.php">
                <input name="address" type="address" id="address" placeholder="Address..."/>
                <input type="submit" value="Go" id="submit"/>
            </form>
        </div>
        <div id="body">
          <iframe src="<?php echo $address; ?>" id="frame" height="800px" width="1100px" />
        </div>
    </body>
</html>
