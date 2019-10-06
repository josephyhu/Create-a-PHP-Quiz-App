<?php
// Generate random questions
$questions = [];
// Loop for required number of questions
for ($i = 0; $i <= 9; $i++) {
// Get random numbers to add
    $a = rand(1, 100);
    $b = rand(1, 100);
// Calculate correct answer
    $answer = intdiv($a, $b);
    $remainder = $a % $b;
    if ($answer > 10) {
        $wrongAnswer1 = $answer + rand(-10, 10);
        $wrongAnswer2 = $answer + rand(-10, 10);
        while ($wrongAnswer1 == $answer || $wrongAnswer1 == $wrongAnswer2) {
            $wrongAnswer1 = $answer + rand(-10, 10);
        }
        while ($wrongAnswer2 == $answer) {
            $wrongAnswer2 = $answer + rand(-10, 10);
        }
    } else {
        $wrongAnswer1 = $answer + rand(1, 10);
        $wrongAnswer2 = $answer + rand(1, 10);
        while ($wrongAnswer1 == $wrongAnswer2) {
            $wrongAnswer1 = $answer + rand(1, 10);
        }
    }
        $questions[$i]["leftOperand"] = $a;
        $questions[$i]["rightOperand"] = $b;
        $questions[$i]["correctAnswer"] = $answer . " R " . $remainder;
        $questions[$i]["firstIncorrectAnswer"] = $wrongAnswer1 . " R " . $remainder;
        $questions[$i]["secondIncorrectAnswer"] = $wrongAnswer2 . " R " . $remainder;
}
