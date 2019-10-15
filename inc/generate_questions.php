<?php
// Generate random questions
$questions = [];
$operators = [" + ", " - ", " * ", " / "];
$pick = rand(0, 3);
// Loop for required number of questions
for ($i = 0; $i <= 9; $i++) {
// Get random numbers to add
    $a = rand(1, 100);
    $b = rand(1, 100);
// Calculate correct answer
    switch($operators[$pick]) {
        case " + ":
            $answer = $a + $b;
            break;
        case " - ":
            $answer = max($a, $b) - min($a, $b);
            break;
        case " * ":
            $answer = $a * $b;
            break;
        case " / ":
            $answer = intdiv(max($a, $b), min($a, $b));
            $remainder = max($a, $b) % min($a, $b);
            break;
    }
    $wrongAnswer1 = abs($answer + rand(-10, 10));
    $wrongAnswer2 = abs($answer + rand(-10, 10));
    while ($wrongAnswer1 == $answer || $wrongAnswer1 == $wrongAnswer2 || $wrongAnswer1 == 0) {
        $wrongAnswer1 = abs($answer + rand(-10, 10));
    }
    while ($wrongAnswer2 == $answer || $wrongAnswer2 == 0) {
        $wrongAnswer2 = abs($answer + rand(-10, 10));
    }
    if ($operators[$pick] == " - " || $operators[$pick] == " / ") {
        $questions["leftOperand"] = max($a, $b);
        $questions["rightOperand"] = min($a, $b);
    } else {
        $questions["leftOperand"] = $a;
        $questions["rightOperand"] = $b;
    }
    if ($operators[$pick] != " / ") {
        $questions["correctAnswer"] = $answer;
        $questions["firstIncorrectAnswer"] = $wrongAnswer1;
        $questions["secondIncorrectAnswer"] = $wrongAnswer2;
    } else {
        $wrongRemainder1 = abs($remainder + rand(-10, 10));
        $wrongRemainder2 = abs($remainder + rand(-10, 10));
        $remainders = [$remainder, $wrongRemainder1, $wrongRemainder2];
        $questions["correctAnswer"] = $answer . " R " . $remainder;
        $questions["firstIncorrectAnswer"] = $wrongAnswer1 . " R " . $remainders[rand(0, 2)];
        $questions["secondIncorrectAnswer"] = $wrongAnswer2 . " R " . $remainders[rand(0, 2)];
    }
}
