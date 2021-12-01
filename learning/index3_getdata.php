<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url_for('static', filename='css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
    <?php# 
         # retrieve GET data and use that to retain user values across a refresh.
         # use shorthand logic to insert values into fields and protect against
         # html insertion attacks with htmlentities. Specific code to deal with
         # radio button and checkboxes to retain settings across a get.
         #?>

    <pre>
    <?php
        
        if (sizeof($_GET) > 0) {
            $number_val = $_GET["sample_number"] ?? 1776;
            $text_val = $_GET["sample_text"] ?? "Sample McSample Face";
            $radio_val = $_GET["sample_radio"] ?? "beef";
        } else {
            $number_val = $_PUT["sample_number"] ?? 1776;
            $text_val = $_PUT["sample_text"] ?? "Sample McSample Face";
            $radio_val = $_PUT["sample_radio"] ?? "beef";
        }
        # set radio button
        $beef_chk = "";
        $chicken_chk = "";
        $pork_chk = "";
        switch ($radio_val) {
            case "Beef":
                $beef_chk = "checked";
                break;
            case "Chicken":
                $chicken_chk = "checked";
                break;
            case "Pork":
                $pork_chk = "checked";
                break;
            default:
                $beef_chk = "checked";
                break;
        }

        #set

        #
        # debugging print post and get datat
        #
        echo "<br>Printing Post Data: <br>"; 
        print_r($_POST);
        echo "<br>Printing Get Data: <br>";
        print_r($_GET);
    ?>
    </pre>

</head>
<body>
    <div class="container">
    <h1 class="sticky-top bg-white"> PHP Form Samples </h1>
    </div>

    <div class="container">
    <form>
        <p>
            <label for="num_id">Sample Number field/label>
            <input type="number" name="sample_number" size="40", id="num_id", value="<?= htmlentities($number_val) ?>"/>
            <br>
            <label for="texty_id">Sample text field</label>
            <input type="text" name="sample_text" size="40" id="texty_id" value="<?= htmlentities($text_val) ?>"/>
            <br>
            <label for="pw">Sample password field</label>
            <input type="password" name="sample_password" size="40" id="pw" value="Pooping sound from Camel"/>
            <br>
            <p>Sample Radio Button:<br></p>
            <input type="radio" name="sample_radio" value="Beef" <?= $beef_chk ?> > Big Beefy<br>
            <input type="radio" name="sample_radio" value="Chicken" <?= $chicken_chk ?>> Chunky Chicken<br>
            <input type="radio" name="sample_radio" value="Pork" <?= $pork_chk ?>> Porky Pig<br>
            <br>

            <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Default radio
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Default checked radio
  </label>
</div>




            
            <p>Sample checkbox:<br></p>
            <input type="checkbox" name="checkbox1" value="Carnitas"<?= (isset($_GET["checkbox1"])) ? "checked" : "" ?>>Mas Carnitas<br>
            <input type="checkbox" name="checkbox2" value="Pollo Asado"<?= (isset($_GET["checkbox2"])) ? "checked" : "" ?>>Pollo Asado<br>
            <input type="checkbox" name="checkbox3" value="Lengua"<?= (isset($_GET["checkbox3"])) ? "checked" : "" ?>>Lengua<br>
            <input type="checkbox" name="checkbox4" value="Cabesa"<?= (isset($_GET["checkbox4"])) ? "checked" : "" ?>>Cabesa Ooooo<br>

            <input type="submit" class="btn btn-primary"/>
        </p>
    </form>
    </div>


</body>
</html>