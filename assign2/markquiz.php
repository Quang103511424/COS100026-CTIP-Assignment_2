<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <meta charset="utf-8">
    <meta name="description"    content="Quiz">
    <meta name="keywords"       content="HTML, tags, Quiz, Internet Protocols">
    <meta name="author"         content="Minh QUang Vu">
    <title>Result- The Quiz?!</title>
</head>
<body>
    <header >
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="topic.php">IPv4/IPv6</a></li>
            <li><a href="quiz.php">Quiz</a></li>
            <li><a href="enhancements.html">Enhancements</a></li>
        </ul>
    </header>
<?php 
    if(!isset($_POST["fname"])) {
        header("location: quiz.php");
        exit();
    }
    $currentAttempt = 1;

    $combination = ($_POST["questionCombination"]);
    include ("data_handler.inc.php");

    $firstName = sanitise_input($_POST["fname"]);
    $lastName = sanitise_input($_POST["lname"]);
    $studentID = sanitise_input($_POST["student-id"]);
    
    $errMsg[] = validate_input($firstName, "First Name", "CHAR_ALPHA_SPACE_HYPHEN", 1, 30, "range");
    $errMsg[] = validate_input($lastName, "Last Name", "CHAR_ALPHA_SPACE_HYPHEN", 1, 30, "range");
    $errMsg[] = validate_input($studentID, "Student ID", "CHAR_NUMBER", 7, 10, "range");
    
    include ("result_screen.inc.php");

    if (implode("",$errMsg) != "") {
        showUserError_insufficientInput($errMsg);
    } else {
        foreach ($_POST as $key => $value) {
            $key = str_replace("Ans", "Q", $key);
            $key = str_replace("[]", "" , $key);
            $questions[] = $key;
            $value = sanitise_input($value);
            $responses[] = $value;            
        } 
        
        $responses = convert_subArrays2string($responses);
        
        require_once ("settings.php");
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);


        // Check if connection is successful
        if (!$conn) {
            // Display an error message
            showSystemError_dbConnection ();
        } else {
            // Upon successful connection

            // Record new User's attempt table or new attemp of existing user.
            //include ("generateAttemptQuery.php");
            $query = "CREATE TABLE IF NOT EXISTS Students (
                        Attempt INT(1) NOT NULL ,
                        StudentID VARCHAR(10) NOT NULL ,
                        Question VARCHAR(20) ,
                        Answer VARCHAR(20) ,
                        Score INT
                    )";
            $createTable = mysqli_query($conn, $query);

            if (!$createTable) {
                showSystemError_queryError("process");
            } else {
                $getAttempts_query ="SELECT MAX(Attempt) AS lastAttempt FROM Students WHERE StudentID = $studentID";

                $getAttempts = mysqli_query($conn, $getAttempts_query);

                if (!$getAttempts) {
                    showSystemError_queryError("process");
                } else {
                    $row = mysqli_fetch_assoc($getAttempts);
                    $lastAttempt = $row["lastAttempt"];
                    $currentAttempt = $lastAttempt + 1;
                
                    if ($currentAttempt > $allowedAttempts ) {reject_submission($conn, $studentID);}
                    else {
                        // mark and create new record for current attempt
                        require ("markingTools.inc.php");
                        markAttempt($conn, $studentID, $currentAttempt, $combination, $questions, $responses);
                    }
                }
            }
        }
        mysqli_close($conn);
    }
    
?>