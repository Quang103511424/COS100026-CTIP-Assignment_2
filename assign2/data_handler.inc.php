<?php
/* process-input.inc
   Used to process input data
   Created by: 22 May 2022
   Author: [103511424] Minh Quang Vu
*/

   // Clean up input data
   function sanitise_input($data) {
      if (is_numeric($data)) {
         $data = trim ($data);
         $data = stripslashes ($data);
         $data = htmlspecialchars ($data);
      }  
      return $data;
   }

   // Validate input data and return error messages
   function validate_input($data, $data_name, $errCode, $char_min, $char_max, $charlgth_scope) {
      $errMsg = "";
      $errMsg1 = "";
      $errMsg2 = "";
      $data_name = "<strong>$data_name</strong>";
      
      if ($data == "") {
            $errMsg .= "<li>You must enter your $data_name.</li>";
      } else {
         if ($errCode == "CHAR_ALPHA_SPACE_HYPHEN") { 
            if (!preg_match("/^[a-zA-Z- ]*$/",$data)) {
               $errMsg1 .= " can contain <strong>ALPHA/SPACE/HYPHEN</strong> characters only";
            }
            if($charlgth_scope == "range") {
               if(strlen($data) < $char_min || strlen($data) > $char_max) {
                  $errMsg2 .= " can only have <strong>$char_min - $char_max</strong> characters";
               }
            } else {
               if(strlen($data) != $char_min || strlen($data) != $char_max) {
                  $errMsg2 .= " can only have <strong>$char_min or $char_max</strong> characters";
               }
            }
            
            if ($errMsg1 != "" || $errMsg2 != "") {
               $errMsg = "<li>Your ". $data_name . $errMsg1 . $errMsg2 . ".</li>";
            } 
            else if ($errMsg1 != "" && $errMsg2 != "") {
               $errMsg .= "<li>Your ". $data_name . $errMsg2 . " and" . $errMsg1 . ".</li>";
            }
         }
         else if ($errCode == "CHAR_NUMBER") { 
            if (!preg_match("/^[0-9]*$/",$data)) {
               $errMsg1 .= " can contain <strong>NUMBERS</strong> only";
            }
            if($charlgth_scope == "range") {
               if(strlen($data) < $char_min || strlen($data) > $char_max) {
                  $errMsg2 .= " can only have <strong>$char_min - $char_max</strong> characters";
               }
            } else {
               if(strlen($data) != $char_min || strlen($data) != $char_max) {
                  $errMsg2 .= " can only have <strong>$char_min or $char_max</strong> characters";
               }
            }

            if ($errMsg1 != "" || $errMsg2 != "") {
               $errMsg = "<li>Your ". $data_name . $errMsg1 . $errMsg2 . ".</li>";
            } 
            else if ($errMsg1 != "" && $errMsg2 != "") {
               $errMsg .= "<li>Your ". $data_name . $errMsg2 . " and" . $errMsg1 . ".</li>";
            }
         }
      }
     
      if ($errMsg != "") {
            return $errMsg;
      }
   }

   function convert_subArrays2string($data) {
      if (is_array($data)) {
         foreach($data as $key => $value) {
            if (is_array($value)) {
               $value = implode(", ", $value);
               $data[$key] = $value;
               if (is_array($value)) {
                  convert_subArrays2string($value);
               }
            } 
         }
      }
      return $data;
   } 

   function print_history($conn) {
      
   }
?>
