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
        # if we're not logged in, let user attempt login.
        #
        if (isset($_POST["account"]) && isset($_POST["pw"])) {
            #
            # login attempt: logout current user and verify credentials
            #
            unset($_SESSION["account"]);
            if ($_POST["pw"] == "BillyBaroo") {
                # login success, update session and redirect to app main route: index_*.php
                $_SESSION["account"] = $_POST["account"];
                $_SESSION["success"] = "logged in successfully!";
                header('Location: index_post_redir.php');
            } else {
                # login fail, leave message and restart login.php
                $_SESSION["error"] = "Incorrect password.";
                header('Location: login_post_redir.php');
            }
        }

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
            echo ('<p style="color:green">' . $_SESSION["success"] . "</p>\n");
            unset($_SESSION['success']);
        }
        if (isset($_SESSION["error"])) {
            echo ('<p style="color:red">' . $_SESSION["error"] . "</p>\n");
            unset($_SESSION['error']);
        }  
        ?>
    </div>

    <div class="container">
        <form method="post">
            <p> Account  : <input type="text" name="account" value=""></p>  
            <p> Password : <input type="text" name="pw" value=""></p>
            <p> <input type="Submit" value="Log In">
            <a href="index_post_redir.php">Cancel</a></p>
        </form>
    </div>

</body>
</html>