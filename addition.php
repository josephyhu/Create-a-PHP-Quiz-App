<?php
$pageTitle = "Addition";

include 'inc/quiz_add.php';
include 'inc/header.php'; ?>
    <div class="container">
      <div id="quiz-box">
        <?php if ($page <= 10) { quiz(); } ?>
        <?php if ($page > 10) { score() . "<br>" . restart(); } ?>
      </div>
    </div>
<?php include 'inc/footer.php'; ?>
