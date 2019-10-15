<?php
// Generate random questions
$questions = [];
// Loop for required number of questions
for ($i = 0; $i <= 9; $i++) {
// Get random numbers to add
    $a = rand(1, 100);
    $b = rand(1, 100);
// Calculate correct answer
    $answer = intdiv(max($a, $b), min($a, $b));
    $remainder = max($a, $b) % min($a, $b);
    $wrongAnswer1 = abs($answer + rand(-10, 10));
    $wrongAnswer2 = abs($answer + rand(-10, 10));
    while ($wrongAnswer1 == $answer || $wrongAnswer1 == $wrongAnswer2 || $wrongAnswer1 == 0) {
        $wrongAnswer1 = abs($answer + rand(-10, 10));
    }
    while ($wrongAnswer2 == $answer || $wrongAnswer2 == 0) {
        $wrongAnswer2 = abs($answer + rand(-10, 10));
    }
    $wrongRemainder1 = abs($remainder + rand(-10, 10));
    $wrongRemainder2 = abs($remainder + rand(-10, 10));
    $remainders = [$remainder, $wrongRemainder1, $wrongRemainder2];
    $questions["leftOperand"] = max($a, $b);
    $questions["rightOperand"] = min($a, $b);
    $questions["correctAnswer"] = $answer . " R " . $remainder;
    $questions["firstIncorrectAnswer"] = $wrongAnswer1 . " R " . $remainders[rand(0 ,2)];
    $questions["secondIncorrectAnswer"] = $wrongAnswer2 . " R " . $remainders[rand(0, 2)];
}
