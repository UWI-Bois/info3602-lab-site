<?php $myName = "Anansi";  // global variable?>
<!DOCTYPE html>
<html>
    <head>
        <title>Example</title>
    </head>
    <body>
        <h1><?php echo $myName?></h1>
        <?php
        echo "hi good day";
        echo "testing gitignore";
        echo 2+2;
        echo "<br>";
        echo "<br>";


        // wednesday lecture

        // This is a single-line comment
        # This is also a single-line comment
        /*
        This is a multiple-line comment block
        that spans over multiple
        lines
        */

        echo "this is a print <br/>";
        print "this is also a print <br/>";
        echo "this is a <b> serious </b> print <br/>";
        echo "this ", "is ", "a ", "6 ", "string ", "print <br/>";
        echo "<br>";
        echo "<br>";

        $logged_in = true; // boolean variable
        $page_number = 25; // integer variable
        $price = 29.99; // floating point variable
        $userName = 'lou'; // string variable
        echo $logged_in, "\n", "<br>";
        echo $page_number, "\n", "<br>";
        echo $price, "<br>";
        echo $userName, "<br>";
        echo "<br>";
        echo "<br>";

        function printGreeting(){ // function def
            $greeting = "Welcome"; // local variable
            echo $greeting , " ";
        }
        printGreeting(); // function call

        // global scope (global variable)
        // global variables cannot be accessed/called inside a function, only within the scope it was declared in.
        $userName = 'lou';
        function printUsername(){
            echo $userName; //this generates an error
        }
        echo $userName; // this is fine
        echo "<br>";
        echo "<br>";

        // static variables - retain their values after they are used in a function
        function testStatic(){
            echo "testing static <br>";
            static $howManyTimes = 1;
            echo ($howManyTimes);
            var_dump($howManyTimes); // shows the variable type and value
            $howManyTimes++;

        }
        testStatic();
        testStatic();
        testStatic();
        echo "<br>";
        echo "<br>";

        /*
         * constants:
         * - automatic global variables whose values cannot be changed
         * - defined using the define() function
         *      - define() takes 3 parameters: name, value, case-insensitive (false by default)
         * - the name MUST start with a letter or underscore
         * - does not use $ sign
         */
        define("GREETING", "This will be my greeting");
        echo GREETING;
        echo "<br>";
        echo "<br>";

        // conditional statements

        // if else

        $hour = date("H"); //H - 24-hour format of an hour (00 to 23)
        echo "time : $hour";
        var_dump($hour);
        if ((int)$hour < 18) {
            echo "Have a good day!";
        }
        else {
            echo "Have a good evening!";
        }
        echo "<br>";
        echo "<br>";

        // loops
        // while loop
        $x = 1;
        while($x <= 5) {
            echo "The number is: $x <br>";
            $x++;
        }
        echo "<br>";
        echo "<br>";

        // for loop
        for ($x = 0; $x <= 5; $x++){
            echo "the number is: $x <br>";
        }
        echo "<br>";
        echo "<br>";

        // do while loop - note: the condition is tested AFTER executing the statements within the loop.
        $x = 1;
        do{
            echo "the number is : $x <br>";
            $x++;
        } while($x <= 0);
        echo "<br>";
        echo "<br>";

        // for each
        $colors = array(
                "red", "green", "blue", "yellow"
        );
        foreach ($colors as $color){
            echo "$color <br>";
        }
        echo "<br>";
        echo "<br>";

        // functions:
        // returning values
        function sum(int $x, int $y){
            $z = $x + $y;
            return $z;
        }
        echo sum(12, 3);
        echo "<br>";
        echo "<br>";

        // arrays
        $cars = array("Volvo", "BMW", "Toyota"); // def
        echo "number of car types in array = count(\$cars) = ", count($cars);
        echo "<br>";
        // indexed arrays
        echo "i like " . $cars[0] .", " . $cars[1] . " and " . $cars[2] . ".";
        echo "<br>";
        // looping through arrays
        $arrlength = count($cars);

        for ($x = 0; $x < $arrlength; $x++){
            echo $cars[$x];
            echo "<br>";
        }
        echo "<br>";
        // associative arrays - use named keys that you assign to them.
        // option 1:
        $age = array(
            "Peter"=>"35",
            "Ben"=>"37",
            "Joe"=>"43"
        );
        // option 2
        $age['Peter'] = "35";
        $age['Ben'] = "37";
        $age['Joe'] = "43";
        // we can now use these named keys in a php script
        echo "Peter is " . $age['Peter'] . " years old.";
        echo "<br>";
        // looping through associative arrays, use a foreach loop
        foreach ($age as $x => $x_value){
            echo "Key: " . $x . " Value: " . $x_value;
            echo "<br>";
        }
        echo "<br>";
        echo "<br>";



        ?>
    </body>
</html>
