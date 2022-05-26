<?php
/* 
   generateQuiz.inc
   Used to create questions
   Created by: 22 May 2022
   Author: [103511424] Minh Quang Vu
*/
    function create_Question($conn, $question_no, $questionTotal, $questionNumber, $questionType, $questionText, $questionInstruction, $questionRelated) {
        for ($i = 0; $i < $questionTotal; $i++) { 
            
            if ($question_no < $questionTotal) {
                $nextQuestion = $question_no + 1;
                $nextQuestion = "Q" . $nextQuestion;
            } else {
                $nextQuestion = "final";
            }

            $ref_num = "";
            $ref_link = "";
            if ($questionRelated[$i] != 0) {
                for ($j = 0; $j < count($questionNumber); $j++) {
                    if ($questionNumber[$j] == $questionRelated[$i]) {
                        $ref_num = $j + 1;
                    }
                }
                $ref_link = " <a href=\"#Q$ref_num\"><strong>Question $ref_num</strong></a> ";
            }

            echo "
                <div class=\"question-container\" id=\"Q$question_no\">
                    <div class=\"question-box\">
                        <div class=\"qfieldset-container\">
                            <fieldset>
                                <legend>Question $question_no</legend>
                                <div class=\"question\">
                                    <label>$questionText[$i] $ref_num</label>
                                    <p class=\"instruction\"><em>$questionInstruction[$i]$ref_link.</em></p>
                                </div>
                                <div class=\"ans\">";
                                    
                                    create_Answer($conn, $question_no, $questionType[$i], $questionNumber[$i]);
                                    
            echo "              </div>
                            </fieldset>
                        </div> 
                    </div>
                    <div class=\"footer\">
                        <a href=\"#$nextQuestion\"><img src=\"https://img.icons8.com/material/64/000000/chevron-down--v1.png\" alt=\"chevron-down--v1.png\"/></a>
                    </div> 
                </div>";
            $question_no++;
        }
    }

    function create_subQuestion($conn, $currentQuestion) {
        $query = "SELECT questionNumber, `sub-questionNumber`, `sub-questionType`, `sub-questionText` FROM `sub-questions` WHERE questionNumber = $currentQuestion";
    
        // execute the query
        $get_subQuestions = mysqli_query ($conn, $query);
        // check if the execution was successful
        if (!$get_subQuestions) {
            echo "<p>Something is wrong with ", $query, "</p>";
        } else {
            // Display sub-questions
            echo "
                <div class=\"mixed-ans-container\">
                    <ol>";
                    while ($row = mysqli_fetch_assoc($get_subQuestions)) {
                        $sub_questionText = $row["sub-questionText"];
                        echo "
                            <li>
                                <p class=\"sub-question\">$sub_questionText</p>";
                                create_subAnswer($conn, $row["sub-questionType"], $currentQuestion, $row["sub-questionNumber"]);
                    echo "</li>";
                    }
             echo " </ol>
                </div>";    
        }

    }

    function create_Answer($conn, $question_no, $type, $currentQuestion) {
        $query = "SELECT questionNumber, answerLabel, `text-inputBox-order`, `input-type`, answerPlaceholder, answerDelimiter FROM answers WHERE questionNumber = $currentQuestion";
        

        // execute the query
        $getOptions = mysqli_query ($conn, $query);
        // check if the execution was successful
        if (!$getOptions) {
            echo "<p>Something is wrong with ", $query, "</p>";
        } else {
            // Display the options
            //$questionid = 1;
            
            $id = 1;
            $required_attr = "required";
            $checked_attr = "checked";
            switch ($type) {
            case "multiple-answers":
                echo "
                    <div class=\"checkbox-ans-container\">";
                    while ($row = mysqli_fetch_assoc($getOptions)) {
                        $answerLabel = $row["answerLabel"];

                        if ($id > 1) {$required_attr = ""; $checked_attr = "";}
                echo "  <p>
                            <label for=\"ans".$currentQuestion."_$id\">$answerLabel
                                <input type=\"checkbox\" name=\"Ans".$currentQuestion."[]\" id=\"ans".$currentQuestion."_$id\" value=\"$answerLabel\" $checked_attr $required_attr/> 
                                <span class=\"custom_cb\"></span>
                            </label>
                        </p>";
                        $id++;
                    }
            echo "  </div>";
                break;
            case "single-answer":
                echo "
                    <div class=\"radio-ans-container\">";
                    while ($row = mysqli_fetch_assoc($getOptions)) {
                        $answerLabel = $row["answerLabel"];
                        if ($id > 1) {$required_attr = ""; $checked_attr = "";}
                echo "  <p>
                            <label for=\"ans".$currentQuestion."_$id\">$answerLabel
                                <input type=\"radio\" name=\"Ans$currentQuestion\" id=\"ans".$currentQuestion."_$id\" value=\"$answerLabel\" $checked_attr $required_attr /> 
                                <span class=\"custom_radio\"></span>
                            </label>
                        </p>";
                        $id++;
                    }
            echo "  </div>";
                break;
            case "select-answer":
                echo "
                    <div class=\"select-ans-container\">
                        <select name=\"Ans$currentQuestion\">";
                            while ($row = mysqli_fetch_assoc($getOptions)) {
                                $answerLabel = $row["answerLabel"];
                                echo "<option value=\"$answerLabel\">$answerLabel</option>";
                            }
                echo "</select>
                    </div>";
                break;
            case "text-gap-fill-sentences":
                echo "
                    <div class=\"text-ans-container\">
                        <p>";
                        while ($row = mysqli_fetch_assoc($getOptions)) {
                            
                            $answerLabel = $row["answerLabel"];
                            $text_input_order = $row["text-inputBox-order"];
                            $placeholder = $row["answerPlaceholder"];
                            $input_type = $row["input-type"];

                            if ($text_input_order == "01") {
                                echo "$answerLabel
                                  &nbsp;<input class=\"gap\" type=\"$input_type\" name=\"Ans".$currentQuestion."_$id\" placeholder=\"$placeholder\" required />&nbsp; 
                                  ";
                            } 
                            else if ($text_input_order == "10") {
                                echo "
                                  <input class=\"gap\" type=\"$input_type\" name=\"Ans".$currentQuestion."_$id\" placeholder=\"$placeholder\" required /> 
                                  &nbsp;$answerLabel&nbsp;";
                            }
                            $id++;
                        } 
                 echo ".</p> 
                    </div>";
                break;
            case "text-answer":
                echo "
                    <div class=\"text-ans-container\">";
                        while ($row = mysqli_fetch_assoc($getOptions)) {
                            
                            $answerLabel = $row["answerLabel"];
                            $placeholder = $row["answerPlaceholder"];

                            echo "<p>$answerLabel</p>
                                  <p><input type=\"text\" class=\"long-text\" id=\"ans$currentQuestion\" name=\"Ans$currentQuestion\" placeholder=\"$placeholder\" maxlength=\"39\" required /> 
                                  </p>";
                        }
             echo " </div>";
                break;
            case "sub-questions":
                create_subQuestion($conn, $currentQuestion);
                break;
            case "text-answer-table-display":

                while ($row = mysqli_fetch_assoc($getOptions)) {
                   
                    $answerLabel[] = $row["answerLabel"];
                    $placeholder[] = $row["answerPlaceholder"];
                    $delimiter[] = $row["answerDelimiter"];
                    $input_type[] = $row["input-type"];
                }
                echo "
                    <div class=\"text-ans-container\">
                        <table class=\"borderless-table\">
                        <tr>";
                        for ($i = 0; $i < count($answerLabel); $i++) {
                    echo " <td>$answerLabel[$i]</td>";
                        if ($delimiter[$i] != "") {
                    echo "<td>$delimiter[$i]</td>";
                        }

                        }   
                echo " </tr>

                        <tr>";
                        for ($i = 0; $i < count($input_type); $i++) {
                        echo "
                            <td>
                                <input type=\"$input_type[$i]\" name=\"Ans".$currentQuestion."_".$id."\" placeholder=\"$placeholder[$i]\" required /> 
                            </td>";
                        if ($delimiter[$i] != "") {
                    echo "<td>$delimiter[$i]</td>";
                        }    
                            $id++;
                        }
                 echo " </tr>
                        </table>
                    </div>";
                break;
            case "table-questions":
                while ($row = mysqli_fetch_assoc($getOptions)) {
                   $col_header = explode(",", $row["answerLabel"]);
                }
                create_tableQuestion($conn, $currentQuestion, $col_header);
                break;
            }
        }
    }

    function create_tableQuestion ($conn, $currentQuestion, $col_h) {
        $query = "SELECT questionNumber, `row-h`, `input-type`, answerPlaceholder FROM `table-questions` WHERE questionNumber = $currentQuestion";

        // execute the query
        $get_tableQuestion = mysqli_query ($conn, $query);
        // check if the execution was successful    
        if (!$get_tableQuestion) {
            echo "<p>Something is wrong with ", $query, "</p>";
        } else {
            // Display the table

          echo "<div>
                    <table class=\"table-display\">
                        <thead>
                            <tr>";
                            for ($i = 0; $i < count($col_h); $i++) {
                           echo "
                                <th>$col_h[$i]</th>
                                ";
                            }  
                     echo " </tr>
                        </thead>
                        <tbody>";
                            $t_row = 1;
                            while ($row = mysqli_fetch_assoc($get_tableQuestion)) {
                                //
                                $row_h = $row["row-h"];
                                $input_type = $row["input-type"];
                                $placeholder = explode(",", $row["answerPlaceholder"]);

                     echo " <tr>
                                <th class=\"char\">$row_h</th>";
                                for ($i = 0; $i < count($col_h) - 1; $i++) {
                                    if ($i >= count($placeholder)) {
                                        $current_placeholder = $placeholder[count($placeholder) - 1];
                                    } else {
                                        $current_placeholder = $placeholder[$i];
                                    } 
                                
                                    if ($input_type == "textarea") {
                              echo "<td><textarea name=\"Ans".$currentQuestion."_".$t_row."_",$i + 1,"\" cols=\"35\" placeholder=\"$current_placeholder\" ></textarea></td>";
                                    } else {
                              echo "<td><input type=\"$input_type\" name=\"Ans".$currentQuestion."_".$t_row."_",$i + 1,"\" placeholder=\"$current_placeholder\" /></td>";     
                                    }
                                }
                                $t_row++;
                     echo " </tr>";
                            }
                 echo " </tbody>
                    </table>
                </div>";

        }

    }

    function create_subAnswer($conn, $type, $currentQuestion, $current_subQuestion) {
        $query = "SELECT questionNumber, `sub-questionNumber`, `answerLabel`, `sub-answerPlaceholder` FROM `sub-answers` WHERE questionNumber = $currentQuestion && `sub-questionNumber` = $current_subQuestion";
        
        // execute the query
        $get_subOptions = mysqli_query ($conn, $query);
        // check if the execution was successful    
        if (!$get_subOptions) {
            echo "<p>Something is wrong with ", $query, "</p>";
        } else {
            // Display options of sub-question

            switch ($type) {
            case "select-answer":
                echo "
                    <p>
                        <select name=\"Ans".$currentQuestion."_".$current_subQuestion."\">";
                            while ($row = mysqli_fetch_assoc($get_subOptions)) {
                                $answerLabel = $row["answerLabel"];
                                echo "<option value=\"$answerLabel\">$answerLabel</option>";
                            }
                echo "</select>
                    </p>";
                break;
            case "text-answer":
                echo "
                    <p>";
                        while ($row = mysqli_fetch_assoc($get_subOptions)) {
                            
                            $sub_questionNumber = $row["sub-questionNumber"];
                            $sub_placeholder = $row["sub-answerPlaceholder"];

                            echo "
                                  <p ><input type=\"text\" name=\"Ans".$currentQuestion."_".$sub_questionNumber."\" placeholder=\"$sub_placeholder\" maxlength=\"39\" required />
                                  </p>";
                        }
             echo " </p>";
                break;
            }
        }
    }
?>