<?php
function printBreak(int $n){
    for($i = 0; $i < $n; $i++){
        echo "<br>";
    }
}
function printTable(int $x, int $y){
    echo '<table width = "', $x*50, 'px" cellspacing="0px" cellpadding="0px" border="1px" align="center">';

    for ($row = 1; $row <= $x; $row++){
        echo "<tr>";
        for($col = 1; $col <= $y; $col++){
            $total = $row+$col;
            if($total % 2 == 0)
                echo "<td class = 'halfnhalf' height=40px width=40px bgcolor=#FFFFFF></td>";
            else
                echo "<td height=40px width=30px bgcolor=#00000></td>";
            //echo "$row";
        }
        echo "</tr>";
    } // end for
    echo "</table>";
} // end printTable

function getHammingDistance(string $str1, string $str2){
    /*
     * find the differences in characters between string 1 and string 2,
     * highlight the differences in string 1 in red
     */
    printBreak(2);
    echo "Comparing $str1 and $str2";
    if(strlen($str1) != strlen($str2)){
        echo "error: String sizes are different.";
        printBreak(1);
        return;
    }
    $arr1 = str_split($str1);
    $arr2 = str_split($str2);
    $diffs = [];
    $size = count($arr1);
    // this for loop will grab the indexes with the differences
    printBreak(1);
    echo "Character Differences: ";
    for($i = 0; $i < $size; $i++){
        if($arr1[$i] != $arr2[$i]) array_push($diffs, $i);
    }
    for($i = 0; $i < $size; $i++){
        //todo  change bold to red color
        if(in_array($i, $diffs)) echo "<b>$arr1[$i]</b>";
        else echo "$arr1[$i]";
    }
    // print hamming distance
    printBreak(1);
    echo "Hamming Distance: " . count($diffs);
}// end hammingdistance

function getAllergenScore(string $pName, $allergens){
    printBreak(2);
    $list = array(
            "EGGS" => 1,
            "PEANUTS" => 2,
            "SHELLFISH" => 4,
            "STRAWBERRIES" => 8,
            "TOMATOES" => 16,
            "POLLEN" => 32,
    );
    foreach ($list as $name => $score) {
        echo"<br>$name, Score: $score";
    }
    $keys = array_keys($list);
    $scores = array_values($list);
    printBreak(2);
    $pScore = 0;
    echo "$pName :<br> ";
    foreach ($allergens as $allergen) {
        if(!in_array($allergen, $keys)) echo "$pName has an unknown allergen -> $allergen ... exiting.";
        else{
            echo "Allergic to: " . $allergen . "<br>";
            $pScore += $list[$allergen];
        }
        echo "Allergen Score: $pScore";
    }


}
?>
<!DOCTYPE html>
<style>
    td.halfnhalf{
        background: linear-gradient(to top right, #FF5733 49.5%, #C70039 50.5%);
        color: #fff;
    }
</style>
<html>
    <head>
        <title> Week 2 Lab 2 </title>
    </head>
    <body>
        <?php
        // task 1
        $players = array("Lou", "Sid", "Jim", "Frank");
        $first_msg = "The game will be played by <b>" . count($players) . "</b> players. <b>". $players[0] . "</b> and <b>" . $players[1] . "</b> will be paired and <b>" . $players[2] . "</b> and <b> " . $players[3] . "</b> will be paired.";
        echo $first_msg;
        echo "<br>";
        echo "<br>";

        // task 2
        printTable(8,8);
        echo "<br>";
        echo "<br>";

        //task 3
        getHammingDistance("cat", "bat");
        getHammingDistance("there", "their");
        getHammingDistance("wallpaper", "windpiper");
        getHammingDistance("live", "evil");
        getHammingDistance("bogota", "toyota");
        //getHammingDistance("ca2t", "bat");

        //task 4
        $person1 = array("EGGS", "TOMATOES");
        getAllergenScore("Person 1", $person1);
        ?>

    </body>
</html>