<?php
/* 
   result_screen.inc.php
   Used to show user the reslt screen depending on situations
   Created by: 25 May 2022
   Author: [103511424] Minh Quang Vu
*/ 

function reject_submission($conn, $studentID) {
    $heading = "Sorry :(";
    $subheading = "You cannot attempt this quiz.";
    $description = "Attempts History:";
    $embedded = print_history($conn, $studentID);
    $image = "submission_rejection.png";
    print_r($_POST);
    template($heading, $subheading, $description, $embedded, $image);
 }

 function showUserError_insufficientInput($errMsg) {
    $heading = "Sorry :(";
    $subheading = "There is something wrong with your submission.";
    $description = "Remember";
    $embedded = $errMsg;
    $image = "invalid_data.png";
    template($heading, $subheading, $description, $embedded, $image);
 }

 function showSystemError_dbConnection () {
    $heading = "Sorry :(";
    $subheading = "We cannot connect to our database.";
    $description = "";
    $embedded = "";
    $image = "dbConnection_failure.png";
    template($heading, $subheading, $description, $embedded, $image);
 }

 function showSystemError_queryError ($queryType) {
    switch ($queryType) {
        case "process":
            $subheading = "We were unable to process your request. Please try again later.";
            break;
        case "newRecord":
            $subheading = "Your attempt cannot be recorded.";
            break;
    }
    $heading = "Sorry :(";
    $description = "";
    GLOBAL $currentAttempt;
    GLOBAL $allowedAttempts;
    $attemptleft = $allowedAttempts + 1 - $currentAttempt;
    $attemptleft = $attemptleft. "</strong> attempt";
    if ($attemptleft > 1) {$attemptleft .= "s";}
    $embedded = "You have<strong> ". $attemptleft ." left.";
    $image = "process_failure.png";
    
    template($heading, $subheading, $description, $embedded, $image);
 }

 function showSuccessful($score, $lostscore) {
    $description = "Your score is: <span id=\"score\">". $score/($score+$lostscore)*100 ."%</span>";
    $quizResult = "<ul>
                    <li>Correct answer(s): <strong>$score</strong></li>
                    <li>Incorrect answer(s): <strong>$lostscore</strong></li>
                 </ul><br/>";
    $embedded = "";
    GLOBAL $currentAttempt;
    GLOBAL $allowedAttempts;
    $attemptleft = $allowedAttempts - $currentAttempt;
    $attemptleft = $attemptleft. "</strong> more attempt";
    if ($attemptleft > 1) {$attemptleft .= "s";}
    $embedded .= "You can have<strong> " .$attemptleft." at this quiz.";
    if ($attemptleft == 1) {$embedded = "Next time is your last chance for this quiz.";}
    else if ($attemptleft < 1  ) {$embedded = "";}
    $embedded = $quizResult . $embedded;
    
    if ($attemptleft > 0) {
        if ($score/$lostscore >= 1) {
            $heading = "Well done";
            $subheading = "You have completed this quiz.";
            $image = "quiz_complete.png";
            $embedded .= "<p id=\"start-btn\"><a href=\"quiz.php\">Start</a></p>";
        } else {
            $heading = "Try harder";
            $subheading = "We believe you can do better."; 
            $image = "quiz_complete2.png";
            $embedded .= "<p id=\"try-again-btn\"><a href=\"quiz.php\">Try again</a></p>";
        }
    } else {
        $heading = "Thank you";
        $subheading = "for taking the quiz.";
        $image = "thankyou.png";
    }

    template($heading, $subheading, $description, $embedded, $image);
 }

 function template($heading, $subheading, $description, $embedded, $image) {
    echo "
        <div id=\"quizResult\">
              <div id=\"columns\">
                  <div id=\"left\">
                      <h1>$heading</h1>
                      <p id=\"subheading\"><strong>$subheading</strong></p> 
                      <p id=\"description\"><em><strong>$description</strong></em></p>";
                      if (is_array($embedded)) {
                          foreach ($embedded as $value) {
                              echo $value;
                          }
                      } else {
                          echo $embedded;
                      }
                  echo "</div>

                  <div id=\"right\">
                      <div>
                          <img src=\"images/$image\" alt=\"$image\" />
                      </div>
                  </div>   
              </div>
          </div>";
}
?>