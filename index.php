<?php
include('answers.php');

//functie om een random answer uit answers te halen/maken
//answer komt binnen maar die moet random zijn
//index is genoeg omdat we die in url parameter steken
function shakeEightBall($answers)
{
    $randomAnswer = array_rand($answers);
    return $randomAnswer;
}

$index = @$_GET['id'];

// van functie shakeEightBall oproepen adhv variabele
$randomIndex = shakeEightBall($answers);

//de string answer laten zien adhv de randomIndex die in answers data zit
// $answer = $answers[$randomIndex]; //niet meer nodig => if else op 29

//if button has $randomIndex == $index
//then give button another $randomIndex
while ($randomIndex == $index) {
    $randomIndex; // = shakeEightBall($answers);
}

//if index/id is not null and isset as an index
//print the answer/string that has the index in answers
if ($index !== null && isset($answers[$index])) {
    $answer = $answers[$index];
} else { //if not then it gives a ranomdindex
    $randomIndex = shakeEightBall($answers);
    $answer = $answers[$randomIndex];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">

    <title>Ask the 8Ball</title>
</head>

<body>
    <main>
        <center>
            <?php
            if ($index !== null && isset($answers[$index])) : //If index/id= not null AND if index/id= not potato or not %?!# thus isset as a index that's in answers
            ?>
                <h1><?= $answer; ?></h1><!-- komt overeen met $randomIndex hieronder die button meegeeft: verandert in php bovenaan-->
                <!-- button click = random index AND random id parameter -->
                <a href="index.php?id=<?= $randomIndex ?>"><b style="background-color: black; border: black">Ask again</b></a>
            <?php else: ?>
                <a href="index.php?id=<?= $randomIndex ?>"><b style="background-color: black; border: black">Shake the 8ball</b></a>
            <?php endif; ?>
        </center>
    </main>
</body>

</html>
