<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url_for('static', filename='css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
</head>
<body>
    <div class="container">
    <h1 class="sticky-top bg-white"> PHP Form Samples </h1>
    </div>

    <form>
        <p>
            <label for="num">Sample Number field/label>
            <input type="number" name="sample_number" size="40", id="num", value="451"/>
            <br>
            <label for="texty">Sample text field</label>
            <input type="text" name="sample_text" size="40" id="texy" value="Sample McSample Text"/>
            <br>
            <label for="pw">Sample password field</label>
            <input type="password" name="sample_password" size="40" id="pw" value="Pooping sound from Camel"/>
            <br>
            <p>Sample Radio Button:<br></p>
            <input type="radio" name="sample_radio" value="Beef" checked> Big Beefy<br>
            <input type="radio" name="sample_radio" value="Chicken"> Chicken<br>
            <input type="radio" name="sample_radio" value="Pork"> Porky Pig<br>
            <br>
            <p>Sample checkbox:<br></p>
            <input type="checkbox" name="sample_checkbox1" value="Carnitas" checked>Mas Carnitas<br>
            <input type="checkbox" name="sample_checkbox2" value="Pollo Asado" >Pollo Asado<br>
            <input type="checkbox" name="sample_checkbox3" value="Lengua">Lengua<br>
            <input type="checkbox" name="sample_checkbox4" value="Cabesa">Cabesa Ooooo<br>

            
            <input type="submit"/>
        </p>
    </form>

    <pre>
        <?php
            echo "<br>Test some field types and print GET/POST values<br>"
            echo "<br>Printing Post Data: <br>"; 
            print_r($_POST);
            echo "<br>Printing Get Data: <br>";
            print_r($_GET);
            $my_pw = $_GET['sample_password'];
            echo "The pw is $my_pw <br>";
            #<?php echo isset($_GET["Lia_Toy"]) ? $_GET("guess") : "" 
        ?>
    </pre>

</body>
</html>