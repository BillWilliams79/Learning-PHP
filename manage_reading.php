<?php
    session_start();
    require_once "utils.php";
    require_once "controller.php";
    #login_filter();
    controller();
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
        </div class="container">
        <!-- Alert / flash message handling -->
        <?php process_alerts() ?>
        <!-- main view code for Add Reading page-->
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
                            <td>
                            <input type='number' class='form-control' id='reading_index', name='reading_index', <?php if ((!isset($_GET['id'])) &&(!isset($_SESSION['reading_index']))) {echo "disabled='disabled', ";} ?> value='<?php get_session_value('reading_index', '---') ?>'>
                            </td>
                            <td>
                            <input type='date' class='form-control' id='date', name='date', value='<?php get_session_value('date', '') ?>'>
                            </td>
                            <td>
                            <input type='time' class='form-control' id='time', name='time', value='<?php get_session_value('time', '') ?>'>
                            </td>
                            <td>
                            <input type='number' class='form-control' id='chrlorine', name='chlorine_ppm', min='0', max='100', value='<?php get_session_value('chlorine_ppm', '') ?>' >
                            </td>
                            <td>
                            <input type='number' class='form-control' id='ph', name='ph', min='7.2', max='8.0', step='0.2', value='<?php get_session_value('ph', '') ?>'>
                            </td>
                            <td>
                            <input type='number' class='form-control' id='alkalinity', name='alkalinity_ppm', min='0', max='300', value='<?php get_session_value('alkalinity_ppm', '') ?>'>
                            </td>
                            <td>
                            <input type='number' class='form-control' id='cyanuric', name='cyanuric_acid_ppm', min='0', max='200', value='<?php get_session_value('cyanuric_acid_ppm', '') ?>'>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="container">
                    <?php if (isset($_SESSION['reading_delete'])) { ?>
                        <!--<label name="confirm_label"> Confrim deletion of this reading </label>--->
                        <button name="confirm_delete" class='btn btn-danger btn-lg' id="confirm_delete">Confirm Delete</button>
                        <button name="cancel_delete" class='btn btn-dark btn-lg' id="cancel_delete" formaction='/index.php' formmethod="get">Cancel</button>
                    <?php unset($_SESSION['reading_delete']);
                        unset($_SESSION['reading_index']); 
                    } else { ?>
                        <?php if (!isset($_GET['id'])) { ?>
                            <button name="reading_create" class='btn btn-dark btn-lg' id='reading_create'>Create</button>
                        <?php } else { ?>
                            <button name="reading_update" class='btn btn-dark btn-lg' id='reading_update'>Update</button>
                        <?php } ?>
                        <button name="cancel" class='btn btn-dark btn-lg' id='cancel_id' formaction='/index.php' formmethod="get">Cancel</button>
                        <?php if (isset($_GET['id'])) { ?>
                            <button name="reading_delete" class='btn btn-danger btn-lg' id='reading_delete'>Delete</button>
                        <?php } ?>
                    <?php } ?>
                    </div>            
            </form>
        </div>
    </body>
</html>