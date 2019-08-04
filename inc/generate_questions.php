<?php
// Generate random questions
$questions = [];
// Loop for required number of questions
for ($i = 0; $i <= 9; $i++) {
// Get random numbers to add
    $a = rand(0, 100);
    $b = rand(0, 100);
// Calculate correct answer
    $answer = $a + $b;
// Get incorrect answers within 10 numbers either way of correct answer
// Make sure it is a unique answer
    if ($answer >= 10) {
      $wrongAnswer1 = $answer - rand(1, 10);
      $wrongAnswer2 = $answer + rand(1, 10);
    } else {
      $wrongAnswer1 = $answer + rand(1, 10);
      $wrongAnswer2 = $answer + rand(1, 10);
    }
// Add question and answer to questions array
    $questions[$i]["leftAdder"] = $a;
    $questions[$i]["rightAdder"] = $b;
    $questions[$i]["correctAnswer"] = $answer;
    $questions[$i]["firstIncorrectAnswer"] = $wrongAnswer1;
    $questions[$i]["secondIncorrectAnswer"] = $wrongAnswer2;
}
