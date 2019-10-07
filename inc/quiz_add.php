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
include 'generate_questions_add.php';
session_start();
// Include questions
// Keep track of which questions have been asked
$page = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_NUMBER_INT);
if (empty($page)) {
    session_destroy();
    $page = 1;
}
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

// Show which question they are on
// Show random question
// Shuffle answer buttons
function quiz() {
    global $page;
    global $questions;
    $array = ["correctAnswer", "firstIncorrectAnswer", "secondIncorrectAnswer"];
    shuffle($array);
    checkAnswer();
    echo "<p class='breadcrumbs'>Question " . $page . " of 10</p>";
    echo "<p class='quiz'>What is " . $questions[$page-1]["leftOperand"] . " + " . $questions[$page-1]["rightOperand"] . "?</p>";
    echo "<form action='addition.php?p=" . ($page+1) . "' method='post'>";
    echo "<input type='hidden' name='id' value='0' />";
    echo "<input type='submit' class='btn' name='answer' value='" . $questions[$page-1][$array[0]] . "'>";
    echo "<input type='submit' class='btn' name='answer' value='" . $questions[$page-1][$array[1]] . "'>";
    echo "<input type='submit' class='btn' name='answer' value='" . $questions[$page-1][$array[2]] . "'>";
    echo "<input type='hidden' name='correct' value='" . $questions[$page-1]['correctAnswer'] . "'>";
    echo "</form>";
}

// Toast correct and incorrect answers
// Keep track of answers
// If all questions have been asked, give option to show score
// else give option to move to next question

function checkAnswer() {
    if (isset($_POST['answer'])) {
        $_SESSION['answer'] = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_NUMBER_INT);
    }
    if (isset($_POST['correct'])) {
        $_SESSION['correct'] = filter_input(INPUT_POST, 'correct', FILTER_SANITIZE_NUMBER_INT);
    }
    if ($_SESSION['answer'] == $_SESSION['correct']) {
        echo "<p class='breadcrumbs'>Correct!</p>";
        ++$_SESSION['score'];
    } else {
        echo "<p class='breadcrumbs'>Incorrect! The correct answer was " . $_SESSION['correct'] . ".</p>";
    }
    return $_SESSION['score'];
}

function restart() {
    echo "<form action='addition.php' method='post'>";
    echo "<input type='submit' class='btn' name='restart' value='Take the quiz again'>";
    echo "</form>";
}

// Show score
function score() {
    $score = checkAnswer();
    echo "<p class='quiz'>Your score is " . $score . " out of 10.</p>";
}
