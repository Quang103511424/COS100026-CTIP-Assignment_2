<?php
/* 
   markingTools.inc.php
   Used to create attempt query
   Created by: 23 May 2022
   Author: [103511424] Minh Quang Vu
*/    

   function markAttempt($conn, $studentID, $currentAttempt, $combination, $questions, $responses) {
      $questionNumber = explode(",", $combination);
      $answers = "";  $point = "";
      for ($i = 0; $i < count($questionNumber); $i++) { 
         $query = "SELECT questionNumber, questionType FROM questions WHERE questionNumber = $questionNumber[$i]";

         // execute the query
         $getData = mysqli_query($conn, $query);
         // check if the execution was successful
         if (!$getData) {
            showSystemError_queryError("process");
         } else {

            while ($row = mysqli_fetch_assoc($getData)) {
               $type = "";
               $type = $row["questionType"];
               //echo $type. "/ ";
               switch ($type) {
                  case "sub-questions":
                     $table = "sub-answers";
                     $get_subType_query = "SELECT `sub-questionType`, `sub-questionNumber` FROM `sub-questions` WHERE questionNumber = $questionNumber[$i]";

                     $get_subType = mysqli_query($conn, $get_subType_query);
                     if (!$get_subType) {
                        showSystemError_queryError("process");
                     } else {
                        while ($row = mysqli_fetch_assoc($get_subType)) {
                           $subType = $row["sub-questionType"];
                           $subNum = $row["sub-questionNumber"];
                           $condition = "`sub-questionNumber` = $subNum";
                           $getAnswer_query = build_query($subType, $table, $condition);  
                           $answers .= getAnswers($conn, $getAnswer_query, $subType) . ";";
                        }
                     }
                     break;
                     
                  case "table-questions": 
                     $table = "table-questions";
                     break;
                  default: 
                     $table = "answers";
               }
               
               if ($type != "sub-questions") {
                  $condition = "questionNumber = $questionNumber[$i]";
                  $getAnswer_query = build_query($type, $table, $condition);
                  $answers .= getAnswers($conn, $getAnswer_query, $type) . ";";
               }
            }
         }
         
      }
      $answers = substr($answers,0,-1);
      $answers = explode(";", $answers);
      
      // Compare responses and the retrieved answers and update to the Student Tables
      if($getData) {
         $score = 0;
         for ($i = 0; $i < count($answers); $i++) {
            $isCorrect = 0;
            if ($responses[$i+3] == $answers[$i]) {
               $isCorrect = 1;
               $score++;
            }
            $newQuestion = trim($questions[$i+3]);
            $newResponse = $responses[$i+3];
            $newRecord_query = "INSERT INTO Students
                                 (Attempt, StudentID, Question, Answer, Score)
                                 VALUES
                                 ('$currentAttempt', '$studentID', '$newQuestion', '$newResponse', '$isCorrect') 
                              "; 
            $newRecord = mysqli_query($conn, $newRecord_query);
         }
         if (!$newRecord) {showSystemError_queryError("newRecord");}
         else {
            showSuccessful($score, count($answers)-$score);
         }
      }
   }

   function build_query($type, $table, $condition) {
      $query = "";
      if ($type == "text-gap-fill-sentences" || $type == "text-answer-table-display" || $type == "text-answer") {
         $query = "SELECT correctAnswer FROM `$table` WHERE $condition";
      }
      elseif ($type == "table-questions") {
         $query = "SELECT correctAnswer1, correctAnswer2 FROM `$table` WHERE $condition";
      }  
      elseif ($type == "select-answer" || $type == "single-answer" || $type == "multiple-answers") {
         $query = "SELECT answerLabel FROM `$table` WHERE $condition and correctAnswer = 1";
      } 
      
      return $query;
   }

   function getAnswers($conn, $query, $type) {
      $answers = "";
      $get_correctAnswers = mysqli_query($conn, $query);
      if (!$get_correctAnswers) {
         showSystemError_queryError("newRecord");
      } else {
         $i = 1;
         while ($row = mysqli_fetch_assoc($get_correctAnswers)) {
            $count = mysqli_num_rows($get_correctAnswers);
            if ($type == "multiple-answers") {
               $answer = $row["answerLabel"];
               if ($i < $count) {$answer .= ",";}
               $i++;
               
            }
            else if ($type == "table-questions") {
               $answer = $row["correctAnswer1"];
               $answer .= ";";
               $answer .= $row["correctAnswer2"];
               if ($i < $count) {$answer .= ";";}
               $i++;
               
            }
            else if ($type == "select-answer" || $type == "single-answer") {
               $answer = $row["answerLabel"];
            }
            else if ($type == "text-gap-fill-sentences" || $type == "text-answer-table-display" || $type == "text-answer") {
               $answer = $row["correctAnswer"];
               if ($i < $count) {$answer .= ";";}
               $i++;
            }
            $answers .= $answer;
         }
         return $answers;
      }
   }
?> 