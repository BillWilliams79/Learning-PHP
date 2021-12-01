<?php
    require_once "pdo.php";

    #
    # model code for create reading. Update SQL and
    # then view item with GET and the new item ID
    #
    function reading_create_model() {
        #step 1: get pdo
        $pdo = db_connect();
        #step 2: set SQL string
        $sql_string = "INSERT INTO 
                            chemicals_reading 
                            (date, time, chlorine_ppm, ph, alkalinity_ppm, cyanuric_acid_ppm)
                        VALUES
                            (:date, :time, :chlorine_ppm, :ph, :alkalinity_ppm, :cyanuric_acid_ppm)
                    ";
        #step 3: initialize prepared statement
        $stmt = $pdo->prepare($sql_string);
        #step 4: execute prepared statement with non-bound variables, sql injection protection provided
        $ph_filler = $_POST['ph'] ?? null;
        print_post_get_session();
        echo $ph_filler;
        $stmt->execute(array(
                        ':date' => $_POST['date'],
                        ':time' => $_POST['time'],
                        ':chlorine_ppm' => $_POST['chlorine_ppm'],
                        ':ph' => $ph_filler,
                        ':alkalinity_ppm' => $_POST['alkalinity_ppm'],
                        ':cyanuric_acid_ppm' => $_POST['cyanuric_acid_ppm']));
        #step 4: access new ID
        $new_id = $pdo->lastInsertId();
        #step 6: setup alert/flash message
        $_SESSION['success'] = "New Reading successfully added (id = $new_id).";
        #step 7: close/write session or the success message is dropped on redirect
        session_write_close();
        return $new_id;
    }

    function reading_read_model($id) {
        #step 1: get pdo
        $pdo = db_connect();
        #step 2: set SQL string
        $sql_string = "SELECT
                            reading_index, 
                            date,
                            time,
                            chlorine_ppm,
                            ph,
                            alkalinity_ppm,
                            cyanuric_acid_ppm
                        FROM
                            chemicals_reading
                        WHERE
                            reading_index = $id
                    ";
        #step 3: initialize prepared statement
        $stmt = $pdo->prepare($sql_string);
        #step 4: execute prepared statement with no variables passed.
        $stmt->execute();
        #step 5: fetch returns a single row (all we need) as associative array
        $reading = $stmt->fetch();
        #step 6: iterate over array storing the data as session variables
        foreach($reading as $k => $v) {
            $_SESSION[$k] = $v;
        }
        #finis
    }

    function reading_update_model() {
        #step 1: get pdo
        $pdo = db_connect();
        #step 2: set SQL string
        $id = $_POST['reading_index'];
        $sql_string =  "UPDATE
                            chemicals_reading
                        SET
                            date = :date,
                            time = :time,
                            chlorine_ppm = :chlorine_ppm,
                            ph = :ph,
                            alkalinity_ppm = :alkalinity_ppm,
                            cyanuric_acid_ppm = :cyanuric_acid_ppm
                        WHERE
                            reading_index = $id
                    ";
        #step 3: initialize prepared statement
        $stmt = $pdo->prepare($sql_string);
        #step 4: execute prepared statement with no variables passed.
        $stmt->execute(array(
                        ':date' => $_POST['date'],
                        ':time' => $_POST['time'],
                        ':chlorine_ppm' => $_POST['chlorine_ppm'],                    
                        ':ph' => $_POST['ph'],                   
                        ':alkalinity_ppm' => $_POST['alkalinity_ppm'],                    
                        ':cyanuric_acid_ppm' => $_POST['cyanuric_acid_ppm']));
        $_SESSION['success'] = "Reading $id successfully updated.";
        #step 7: close/write session or the success message is dropped on redirect
        session_write_close();
    }

    function reading_delete_model() {
        #step 1: get pdo
        $pdo = db_connect();
        #step 2: set SQL string
        #print_post_get_session();
        $id = $_POST['reading_index'];
        $sql_string = " DELETE FROM
                            chemicals_reading
                        WHERE
                            reading_index = $id
                    ";
        #step 3: initialize prepared statement
        $stmt = $pdo->prepare($sql_string);
        #step 4: execute prepared statement with no variables passed.
        $stmt->execute();
        # flash message
        $_SESSION['success'] = "Reading $id successfully deleted.";
        #step 7: close/write session or the success message is dropped on redirect
        session_write_close();
    }

    #
    # retrieve session value for use in displaying values and then unset.
    # null coalesce/html injection protect plus session unset.
    #
    function get_session_value($k, $default_value) {
        #
        # echo the retrieved session value or the provided default value
        # unset a session variable if used.
        #
        if (isset($_SESSION[$k])) {
            $session_key = $_SESSION[$k];
            unset($_SESSION[$k]);
            echo htmlentities($session_key);
            return;
        } else {
            echo  $default_value;
            return;
        }
    }
?>