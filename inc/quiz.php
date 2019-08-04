<?php
/*
 * PHP Techdegree Project 2: Build a Quiz App in PHP
 *
 * These comments are to help you get started.
 * You may split the file and move the comments around as needed.
 *
 * You will find examples of formating in the index.php script.
 * Make sure you update the index file to use this PHP script, and persist the users answers.
 *
 * For the questions, you may use:
 *  1. PHP array of questions
 *  2. json formated questions
 *  3. auto generate questions
 *
 */

// Include questions
include 'generate_questions.php';
// Keep track of which questions have been asked

// Show which question they are on
// Show random question
// Shuffle answer buttons
function quiz() {
    global $questions;
    $array = ["correctAnswer", "firstIncorrectAnswer", "secondIncorrectAnswer"];
    shuffle($array);
    $random = rand(0, 9);
    echo "<p class='breadcrumbs'>" . "Question # of 10" . "</p>";
    echo "<p class='quiz'>" . "What is " . $questions[$random]["leftAdder"] . " + " . $questions[$random]["rightAdder"] . "?" . "</p>";
    echo "<form action='index.php' method='post'>";
    echo "<input type='hidden' name='id' value='0' />";
    echo "<input type='submit' class='btn' name='answer' value='" . $questions[$random][$array[0]] . "'>";
    echo "<input type='submit' class='btn' name='answer' value='" . $questions[$random][$array[1]] . "'>";
    echo "<input type='submit' class='btn' name='answer' value='" . $questions[$random][$array[2]] . "'>";
    echo "</form>";
  }

// Toast correct and incorrect answers
// Keep track of answers
// If all questions have been asked, give option to show score
// else give option to move to next question


// Show score
