<?php
// Generate random questions
$questions = [];
// Loop for required number of questions
for ($i = 0; $i <= 9; $i++) {
// Get random numbers to add
    $a = rand(1, 100);
    $b = rand(1, 100);
// Calculate correct answer
    $answer = $a * $b;
    $wrongAnswer1 = abs($answer + rand(-10, 10));
    $wrongAnswer2 = abs($answer + rand(-10, 10));
    while ($wrongAnswer1 == $answer || $wrongAnswer1 == $wrongAnswer2 || $wrongAnswer1 == 0) {
        $wrongAnswer1 = abs($answer + rand(-10, 10));
    }
    while ($wrongAnswer2 == $answer || $wrongAnswer2 == 0) {
        $wrongAnswer2 = abs($answer + rand(-10, 10));
    }
    $questions[$i]["leftOperand"] = $a;
    $questions[$i]["rightOperand"] = $b;
    $questions[$i]["correctAnswer"] = $answer;
    $questions[$i]["firstIncorrectAnswer"] = $wrongAnswer1;
    $questions[$i]["secondIncorrectAnswer"] = $wrongAnswer2;
}
