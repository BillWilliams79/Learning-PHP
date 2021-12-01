<?php
    require_once "model.php";

    #function login_filter() {
    #    if ( !isset($_SESSION["account"])) {
    #        #
    #        # session is set during login to indicate we are logged in lol
    #        #
    #        header('Location: login.php');
    #    }
    #}

    function controller() {
        #
        # READ a reading
        #
        if (isset($_GET['id'])) {
            #
            # typical view object path (GET)
            # 
            $id = $_GET['id'];
            reading_read_model($id);
            #model code
            #...drop through to HTML
        } else if (isset($_SESSION['reading_index'])) {
            #
            # specail cases to dispaly while performing some other action
            # then the id is stored in session, but we are still going to display it
            #
            $id = $_SESSION['reading_index'];
            reading_read_model($id);
            #model code
            #...drop through to HTML
        } 

        #
        # vector: create button isset via POST
        # controler: create object
        # model: object: reading, action: create
        # view: redirect GET[id] to 'manage object' page.
        #
        if (isset($_POST['reading_create'])) {
            # model
            $new_id = reading_create_model();
            # view
            header("Location: manage_reading.php?id=$new_id");
        }

        #
        # vector: update button isset via POST
        # data: object values by $k in POST
        # controller: update object
        # model: object is 'reading', action is 'update'
        # view: redirect GET[id] to 'manage object' page
        #
        if (isset($_POST['reading_update'])) {
            # model code
            reading_update_model();
            # view code
            $id = $_POST['reading_index'];
            header("Location: manage_reading.php?id=$id");
        }

        if (isset($_POST['reading_delete'])) {
            # model code - session indicator to show confirm behavior 
            $_SESSION['reading_delete'] = $_POST['reading_delete'];
            $_SESSION['reading_index'] = $_POST['reading_index'];
            # view code
            session_write_close();
            header("Location: manage_reading.php");
        }

        #
        # vector: affirm delete button via POST
        # data: reading_index from POST
        # controller: delete object
        # model: object is 'reading", action is 'delete'
        # view: redirect/GET to index
        #
        if (isset($_POST['confirm_delete'])) {
            # model code
            reading_delete_model();
            # view code
            header("Location: index.php");
        }
    }

?>