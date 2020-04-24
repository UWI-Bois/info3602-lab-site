<!DOCTYPE html>
<html>
    <head>
        <title> My Third PHP Exercise </title>
    </head>
    <body>
    <?php
    function singItLionel(){
        static $count = 1;
        if($count == 1)
            echo "You're once..";
        elseif($count == 2)
            echo "Twice..";
        elseif($count == 3)
            echo "Three <b>times</b> a laaaydaaay..";
        echo "<br>";
        $count++;
    }
    singItLionel();
    singItLionel();
    singItLionel();
    ?>
    </body>
</html>