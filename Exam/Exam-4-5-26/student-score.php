<?php
$assoiciativeArray = array(
    "Mina" => 80,
    "Tina" => 90,
    "Rani" => 70,
    "Shuvo" => 85,
    "Shai" => 75
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1" width="60%" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>Name</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($assoiciativeArray as $name => $score) {
                echo "<tr>
                  <td>$name</td>
                  <td>$score</td>
                </tr>";
            }
            ?>

        </tbody>
    </table>

    <h3>Highest score: <?php echo max($assoiciativeArray);?></h3>
    <h3>Top Student: <?php echo array_search(max($assoiciativeArray), $assoiciativeArray);?></h3>


    <!-- <h3>Highest score: <?php //$max_score = max($assoiciativeArray); echo $max_score;?></h3>
    <h3>Top Student: <?php //echo array_search($max_score, $assoiciativeArray);?></h3> -->
    
</body>

</html>