<?php
    session_start();
    require_once "utils.php";
    require_once "controller.php";
    #login_filter();
    controller();
    #print_post_get_session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> Pool Water Management </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="sticky-top bg-white"> Pool Water Management </h1>
    </div>
    <!-- Alert / flash message handling -->
    <?php process_alerts() ?>
    <!-- main View code for Index page -->
    <div class="container">
        <form method="post", action="\manage_reading.php">
            <table class='table table-hover'>
                <thead> 
                    <tr>
                        <th> Number </th>
                        <th> Collection Date </th>
                        <th> Collection Time </th>
                        <th> Chlorine PPM </th>
                        <th> PH Level </th>
                        <th> Alkalinity ppm </th>
                        <th> Cyanuric Acid ppm </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            $pdo = db_connect();
                            foreach($pdo->query('SELECT * from chemicals_reading') as $row) {
                                #
                                # foreach iterates across readings pulling each one as $row assoc array.
                                # then iterate over the array using foreach a second time to get at values
                                #print_r($row);
                                #
                                echo "<tr>";
                                foreach($row as $k => $v) {
                                    if ($k == 'reading_index') {
                                        echo "<td>";
                                        echo "<a href='\manage_reading.php?id=$v'> $v </a>";
                                        echo "</td>";
                                    } else {
                                        echo "<td> $v </td>";
                                    }
                                }
                                echo "</tr>";
                            }
                            $pdo = null;
                        ?>
                    </tbody>
                </table>
            <br>
            <!-- Buttons to add an entry --->
            <button name="add_reading" class='btn btn-dark btn-lg' id='add_reading_id'>Add Reading</button>
        </form>
    </div>
</body>
</html>