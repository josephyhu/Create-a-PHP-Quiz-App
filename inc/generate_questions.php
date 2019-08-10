<?php
// Generate random questions
$questions = [];
$operators = ["+", "-", "*"];
$pick = rand(0, 2);
// Loop for required number of questions
for ($i = 0; $i <= 9; $i++) {
// Get random numbers to add
    $a = rand(1, 100);
    $b = rand(1, 100);
// Calculate correct answer
    switch($operators[$pick]) {
        case "+":
            $answer = $a + $b;
            break;
        case "-":
            $answer = $a - $b;
            break;
        case "*":
            $answer = $a * $b;
            break;
    }
    if ($operators[$pick] == "+" || $operators[$pick] == "*") {
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
        $questions[$i]["correctAnswer"] = $answer;
        $questions[$i]["firstIncorrectAnswer"] = $wrongAnswer1;
        $questions[$i]["secondIncorrectAnswer"] = $wrongAnswer2;
    } else {
        $wrongAnswer1 = $answer + rand(-10, 10);
        $wrongAnswer2 = $answer + rand(-10, 10);
        while ($wrongAnswer1 == $answer || $wrongAnswer1 == $wrongAnswer2) {
            $wrongAnswer1 = $answer + rand(-10, 10);
        }
        while ($wrongAnswer2 == $answer) {
            $wrongAnswer2 = $answer + rand(-10, 10);
        }
    }
        $questions[$i]["leftOperand"] = $a;
        $questions[$i]["rightOperand"] = $b;
        $questions[$i]["correctAnswer"] = $answer;
        $questions[$i]["firstIncorrectAnswer"] = $wrongAnswer1;
        $questions[$i]["secondIncorrectAnswer"] = $wrongAnswer2;
}

for ($i = 0, $j = 0; $i <= 9, $j <= 9; $i++, $j++) {
    while ($i != $j) {
        while (($questions[$i]["leftOperand"] == $questions[$j]["leftOperand"] &&
                $questions[$i]["rightOperand"] == $questions[$j]["rightOperand"]) ||
               ($questions[$i]["leftOperand"] == $questions[$j]["rightOperand"] &&
                $questions[$i]["rightOperand"] == $questions[$j]["leftOperand"])) {
                    $a = rand(1, 100);
                    $b = rand(1, 100);
                    $questions[$i]["leftOperand"] = $a;
                    $questions[$i]["rightOperand"] = $b;
        }
    }
}
