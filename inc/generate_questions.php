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
// Get incorrect answers within 10 numbers either way of correct answer
// Make sure it is a unique answer
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
// Add question and answer to questions array
    $questions[$i]["leftAdder"] = $a;
    $questions[$i]["rightAdder"] = $b;
    $questions[$i]["correctAnswer"] = $answer;
    $questions[$i]["firstIncorrectAnswer"] = $wrongAnswer1;
    $questions[$i]["secondIncorrectAnswer"] = $wrongAnswer2;
}

for ($i = 0, $j = 0; $i <= 9, $j <= 9; $i++, $j++) {
    while ($i != $j) {
        while (($questions[$i]["leftAdder"] == $questions[$j]["leftAdder"] &&
                $questions[$i]["rightAdder"] == $questions[$j]["rightAdder"]) ||
               ($questions[$i]["leftAdder"] == $questions[$j]["rightAdder"] &&
                $questions[$i]["rightAdder"] == $questions[$j]["leftAdder"])) {
                    $a = rand(1, 100);
                    $b = rand(1, 100);
                    $questions[$i]["leftAdder"] = $a;
                    $questions[$i]["rightAdder"] = $b;
        }
    }
}
