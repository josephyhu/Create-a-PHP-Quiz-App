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
session_start();
// Include questions
include 'generate_questions.php';
$score = 0;
// Keep track of which questions have been asked
$page = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_NUMBER_INT);
if (empty($page)) {
    session_destroy();
    $page = 1;
}

// Show which question they are on
// Show random question
// Shuffle answer buttons
function quiz() {
    global $page;
    global $questions;
    $array = ["correctAnswer", "firstIncorrectAnswer", "secondIncorrectAnswer"];
    shuffle($array);
    echo "<p class='breadcrumbs'>Question " . $page . " of 10</p>";
    echo "<p class='quiz'>" . "What is " . $questions[$page-1]["leftAdder"] . " + " . $questions[$page-1]["rightAdder"] . "?" . "</p>";
    echo "<form action='index.php?p=" . ($page+1) . "' method='post'>";
    echo "<input type='hidden' name='id' value='0' />";
    echo "<input type='submit' class='btn' name='answer' value='" . $questions[$page-1][$array[0]] . "'>";
    echo "<input type='submit' class='btn' name='answer' value='" . $questions[$page-1][$array[1]] . "'>";
    echo "<input type='submit' class='btn' name='answer' value='" . $questions[$page-1][$array[2]] . "'>";
    echo "</form>";
}

// Toast correct and incorrect answers
// Keep track of answers
// If all questions have been asked, give option to show score
// else give option to move to next question

function restart() {
    echo "<form action='index.php' method='post'>";
    echo "<input type='submit' class='btn' name='restart' value='Take the quiz again'>";
    echo "</form>";
}

// Show score
