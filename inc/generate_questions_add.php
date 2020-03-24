<?php
// Generate random questions
$questions = [];
// Loop for required number of questions
for ($i = 0; $i <= 9; $i++) {
// Get random numbers to add
    $a = rand(1, 100);
    $b = rand(1, 100);
// Calculate correct answer
    $answer = $a + $b;
    do {
        $wrongAnswer1 = abs($answer + rand(-10, 10));
    } while ($wrongAnswer1 == $answer);
    do {
        $wrongAnswer2 = abs($answer + rand(-10, 10));
    } while ($wrongAnswer2 == $answer || $wrongAnswer2 == $wrongAnswer1);
    $questions["leftOperand"] = $a;
    $questions["rightOperand"] = $b;
    $questions["correctAnswer"] = $answer;
    $questions["firstIncorrectAnswer"] = $wrongAnswer1;
    $questions["secondIncorrectAnswer"] = $wrongAnswer2;
}
