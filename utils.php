<?php
    #
    #
    #
    function process_alerts() {

        echo '<div class="container">';
        #
        # flash message parsing
        #
        if (isset($_SESSION["success"])) {
            echo ('<div class="alert alert-success" role="alert">' . $_SESSION["success"] . '</div>');
            unset($_SESSION['success']);
        }
        if (isset($_SESSION["error"])) {
            echo ('<div class="alert alert-danger" role="alert">' . $_SESSION["error"] . '</div>');
            unset($_SESSION['error']);
        }
        echo '</div>';
    }

    function print_post_get_session() {
        #
        #debugging print post and get data
        #
        echo "<br>Printing Post Data: <br>";         
        print_r($_POST);
        echo "<br>Printing Get Data: <br>";
        print_r($_GET);
        #session_start();
        echo "<br>Index Printing Session Data: <br>";
        print_r($_SESSION);
        #session_write_close();
    }
?>