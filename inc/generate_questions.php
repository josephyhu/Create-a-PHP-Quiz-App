<?php
// Generate random questions
$questions = [];
$operators = [" + ", " - ", " * "];
$pick = rand(0, 2);
// Loop for required number of questions
for ($i = 0; $i <= 9; $i++) {
// Get random numbers to add
    $a = rand(-100, 100);
    $b = rand(-100, 100);
// Calculate correct answer
    switch($operators[$pick]) {
        case " + ":
            $answer = $a + $b;
            break;
        case " - ":
            $answer = $a - $b;
            break;
        case " * ":
            $answer = $a * $b;
            break;
    }
    if (abs($answer) > 10) {
        $wrongAnswer1 = $answer + rand(-10, 10);
        $wrongAnswer2 = $answer + rand(-10, 10);
        while ($wrongAnswer1 == $answer || $wrongAnswer1 == $wrongAnswer2) {
            $wrongAnswer1 = $answer + rand(-10, 10);
        }
        while ($wrongAnswer2 == $answer) {
            $wrongAnswer2 + $answer + rand(-10, 10);
        }
    } elseif ($answer >= -10 && $answer <= 0) {
        $wrongAnswer1 = $answer + rand(-10, -1);
        $wrongAnswer2 = $answer + rand(-10, -1);
        while ($wrongAnswer1 == $wrongAnswer2) {
            $wrongAnswer = $answer + rand(-10, -1);
        }
    } elseif ($answer >= 0 && $answer <= 10) {
        $wrongAnswer1 = $answer + rand(1, 10);
        $wrongAnswer2 = $answer + rand(1, 10);
        while ($wrongAnswer1 == $wrongAnswer2) {
            $wrongAnswer1 = $answer + rand(1, 10);
        }
    }
        $questions[$i]["leftOperand"] = $a;
        $questions[$i]["rightOperand"] = $b;
        $questions[$i]["correctAnswer"] = $answer;
        $questions[$i]["firstIncorrectAnswer"] = $wrongAnswer1;
        $questions[$i]["secondIncorrectAnswer"] = $wrongAnswer2;
}
