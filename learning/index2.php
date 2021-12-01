<?php

require "bill.php";

echo "hello world" . "<br>";
echo "The most basic PHP program 6-Nov-21 <br>";

#
# dump your PHP info, but be wared its pages and pages long
#
#phpinfo();

#
# PHP Types: php has 10 primitive types.
# Scaler = 4; compound = 2; special = 2
#
# Scaler types: integer, float, boolean, string_iterate
# Compound: array, object
# special: Null, Resource (special handle to external resource)
#
#integer
$sample_int = 22;
echo $sample_int;
echo "<br>";

#float
$sample_float = 2.24;
echo "$sample_float <br>";
$float_type = var_dump($sample_float);
echo '$sample_float' . "$float_type <br>";

#boolean:
# true, True, TRUE; 
#false, False, FALSE; 
# all three posibilities are supported
$sample_true = true;
$sample_false = FALSE;
#note that true prints as 1 but false is simply mising. Peculiar PHP-ism
echo "$sample_true as well as $sample_false <br>";
echo '$sample_true:' . var_dump($sample_true) . "<br>";
echo '$sample_false:' . var_dump($sample_false) . "<br>";
echo "<br>";

#floating point conversion
$a = 56;
$b = 12;
$c = $a / $b;
echo " Here is the variable c: $c" . "<br>";

# type forcing
$d = "100" + 36 + true;
echo "Here is the variable d: $d <br>";

# manual type forcing
$e = (int) 9.9 - 1;
echo "here is the variable e: $e <br>";

# string conversion
$f = "sam" . 25;
echo "here is the variable f: $f <br>";

# this doesn't work in PHP8, but did previously
#$g = "sam" + 25;
#echo "here is the variable g: $g <br>";

# contractions like in C, common patter to use this to build up strings in a loop.
$contract = "My name is";
$contract .= " ";
$contract .= "Ava";
echo "contraction assembled string $contract <br>";

# += contraction
$contraction2 = 78;
$contraction2 += 1;
echo "contraction numeric $contraction2 <br>";
# like C works either side of the variable
$contraction2++;
++$contraction2;
echo "contraction++ numeric $contraction2 <br>";
$contraction2--;
echo "contraction-- numeric $contraction2 <br>";

#ternary operator makes an appearance
$NinersScore = 42;
$CardsScore = 38;

$winner = ($NinersScore > $CardsScore) ? "Niners" : "Cards";
echo "$winner win!" . "<br>";

#
# single quoted strings are more performant as they do not
# support variable interpolation. However, double quoted
# strings with variable interpolation are amazing.
#
$exclamation = "Let's Go Niners!!";
echo 'Here is $exclamation and\t\tGarappolo \n <br>';
echo "Here is $exclamation and\t\tGarappolo \n <br>";

# initial string manipulation, without using objects
$baby = "Ella is a good baby";
echo "Ella is at position " . strpos($baby, "Ella") . "<br>";
echo "baby is at position " . strpos($baby, 'baby') . "<br>";
# false doesn't produce any result
echo "mommy is at position " . strpos($baby, "mommy") . "<br>";

#you can use an index to iterate over the string
#strlen() provides the length
function string_iterate($arg_string) {
    for ($i=0; $i < strlen($arg_string); $i++) {
        echo "$arg_string[$i]" . " " . " ";
    }
    echo '<br>';
}

string_iterate("Look at all those chickens");

#
# control structures
#
#if statement syntax
$parker = 75;

if ($parker < 25) {
    echo "Parker was recently shaved <br>";
} elseif ($parker < 75) {
    echo "Parker is pretty furry <br>";
} else {
    echo "Paker is crazy fuzzy!! <br>";
}

# while loop syntax (zero pass loop)
$cycling = 0;
echo "Cycling mileage: ";
while ($cycling < 10) {
    echo "$cycling" . " ";
    $cycling++; 
}
echo ". and now the ride is over. <br>";

#do-while loop (one pass loop)
$bananas = 8;
echo "bananas remaining countdown:";
do {
 echo " $bananas";
 $bananas--;
} while ($bananas > 0);
echo ". Need to order Bananas.<br>";

# for loop syntax, again just like C
# using php to make a table, too
echo "<style>";
echo "table, th, td { border: 1px solid black; border-collapse: collapse; }";
echo "</style>";

echo "<br> <table>";
echo "<thead> <th> multiplier </th> <th> multiplicand </th> <th> product </th> </thead>";
echo "<tbody>";
$multiplicand = 8;
for ($multiplier = 1; $multiplier < 11; $multiplier++) {
    echo "<tr>";
    $product = $multiplier * $multiplicand;
    echo "<td> $multiplier </td> <td> $multiplicand </td> <td> $product </td>";
    echo "</tr>";
}
echo "</tbody> </table> <br>";

#
# php arrays (not object style)
#
# create empty array. create array with multiple entries using array() creator
$empty_basket = array();
$basket = array("Zee_big_toy" => "big minnie",
                "little_toy" => "giraffe",
                "tiny_toy" => "ball");

                # individually add items to array
$basket["ella_toy"] = "Exersaucer";
$basket["Lia_Toy"] = "Calico Critters";
echo $basket["little_toy"] . "<br>";

#create array with shorthand syntax
$shorthand_array = ['item one' => 22, 'item two' => 25];

# create an array with a numeric index
$numeric_index_array = array("one", "Dog", "Cat", "cloud", "Car");


# print arrays from above
echo "<pre>";
    echo "<br> var_dumpp and print_r of array with multiple items <br>";
    var_dump($basket);
    print_r($basket);
    $my_key = "Lia_Toy";
    echo "print item with key $my_key from basket array: $basket[$my_key] <br>";
    $myarray_count = count($basket);
    echo "basket array has $myarray_count items <br>";

    echo "<br>var_dump of empty array. add one item and print again <br>";
    $myarray_count = count($empty_basket);
    echo "empty array has $myarray_count items <br>";
    var_dump($empty_basket);
    $empty_basket["some_val"] = 'Hot Dog on a Stick';
    var_dump($empty_basket);

    echo "<br>display shortand created array <br>";
    print_r($shorthand_array);

    echo "dispaly numeric index array <br>";
    print_r($numeric_index_array);
    $index = 1;
    echo "print item #$index from numeric array is $numeric_index_array[$index]";

echo "</pre>";

# determine if array is empty or not. lmao empty returns false which doesn't print
$empty_array = array();
echo "empty function returns this for empty_array: " . empty($empty_array) . "<br>";
echo "count function returns this for empty_array: " . count($empty_array) . "<br>";
echo "sizeof function returns this for empty_array: " . sizeof($empty_array) . "<br>";
#use ! to determine if empty
if (!$empty_array) {
    echo "not of array returns this for empty_array: true! <br>";
} else {
    echo "not of array returns this for empty_array: false! <br>";
}
echo "<br>";

#isset method
echo isset($basket["Lia_Toy"]) ? "Lia_Toy is in basket" : "Lia_Toy is not in basket";
echo "<br>";
echo isset($basket["Park_Toy"]) ? "Parker_Toy is in basket" : "Parker_Toy is not in basket";
echo "<br>";

#null coalescing replaces syntax above
$test = $basket["Monkey_Toy"] ?? "Missing";
echo "Monkey's toy is $test <br>";

# foreach method to iterate over loop values
foreach($basket as $k => $v) {
    echo "key $k value $v <br>";
}


# iterate over the array using for loop and counters
for ($index = 0; $index < count($bag); $index++) {
    echo "Item $index is $bag[$index] <br>";
}

#remove an element from the array
unset($basket["Zee_big_toy"]);
#if you use $unset on the array, it will be completely deleted
unset($bag);
echo "<pre>";
print_r($basket);
echo print_r($bag);
echo "</pre>";

#
# Hello world function. accepts two arguments.
# $language is a string and $enable_strong is a boolean with a default value of true
# you can enable strict typing with declare(strict_types=1) at top of PHP file
#
function hello_world(string $language, bool $enable_strong = true) {
 
    if ($enable_strong) {
        $strong_tag = "<strong>";
        $strong_tag_end = "</strong>";
    } else {
        $strong_tag = "";
        $strong_tag_end = "";
    }
    echo "$strong_tag Hello World from $language $strong_tag_end <br>";
    return;
}
# calls with and without optional arg
for ($i=0; $i < 3; $i++) {
    hello_world("PHP Land", false);
    hello_world("PHP Land");
}
#
# function that returns a value whose type is declared at the function head
#
function cube_integer(int $number) : int {
    return pow($number, 3);
}

$cube_me = 9;
echo "taking $cube_me and cubing it " . cube_integer($cube_me) . "<br>";

#
# argument passing by value or pass by reference.
# pass by value provide the function with the data, but that data cannot is immutable from the functions perspect
# pass by references and the argument is mutable. So changes inside the function hold after the function returns.
#
$pass_by_value = 52;
$pass_by_reference = 16;

function by_val(int $val_integer) {
    $val_integer = 54;
}

function by_ref(int &$ref_integer) {
    $ref_integer = 8;
}

echo ($pass_by_value == 52 ?  "Favorie LB is Patrick Willis" : "Favorite LB is Fred Warner") . "<br>";
echo ($pass_by_reference == 16 ? "Fav QB is Joe Montana" : "Fav QB is Steve Young") . "<br>";

#
# call function required from bill.php
# note that we are modifying the string with call by reference for funzies
#
$bill_test_str = "Who is the chompion: ";
echo "$bill_test_str <br>";

bill_your_text($bill_test_str);
echo "$bill_test_str <br>";


?>