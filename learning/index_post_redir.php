<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url_for('static', filename='css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   

    <pre>
    <?php
        session_start();
        #
        # debugging print post and get datat
        #
        #echo "<br>Printing Post Data: <br>"; 
        #print_r($_POST);
        #echo "<br>Printing Get Data: <br>";
        #print_r($_GET);
        #echo "<br>Printing Session Data: <br>";
        #print_r($_SESSION);
    ?>
    </pre>

</head>
<body>
    <div class="container">
    <h1 class="sticky-top bg-white"> PHP Log In Sample </h1>
    </div>

    <div class="container">
        <?php
        #
        # flash message parsing
        #
        if (isset($_SESSION["success"])) {
            echo ('<p style="color:green">' . $_SESSION["success"] . "</p>");
            unset($_SESSION['success']);
        } 
        ?>
    </div>

    <div class="container">
        <?php
            if ( !isset($_SESSION["account"])) { ?>
                <p> Please <a href="login_post_redir.php">Log In</a> to start.</p>
            <?php } else { ?>
                <p> Application code goes here as you're logged in. </p>
                <p> Please <a href="logout_post_redir.php">Log out</a> when you are done </p>
            <?php } ?>
        
    </div>

</body>
</html>