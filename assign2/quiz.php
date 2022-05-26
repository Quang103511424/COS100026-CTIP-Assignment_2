<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <meta charset="utf-8">
    <meta name="description"    content="Quiz">
    <meta name="keywords"       content="HTML, tags, Quiz, Internet Protocols">
    <meta name="author"         content="Minh QUang Vu">
    <title>The Quiz?!</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="topic.php">IPv4/IPv6</a></li>
            <li><a href="quiz.php">Quiz</a></li>
            <li><a href="enhancements.html">Enhancements</a></li>
        </ul>
    </header>

    <input type="checkbox" id="toggler">        
        <label for="toggler">
            <img id="btn" src="https://img.icons8.com/ios-filled/25/FFFFFF/menu-rounded.png" alt="menu-button" />
        </label>
        <nav class="nav-contents">

            <h3>Details</h3>
                <ul>
                    <li><a href="#start">Your Details</a></li>
                </ul>
            <hr>
            <h3>Questions</h3>
            <ul>
                <li><a href="#Q1">Question 1</a></li>
                <li><a href="#Q2">Question 2</a></li>
                <li><a href="#Q3">Question 3</a></li>
                <li><a href="#Q4">Question 4</a></li>  
                <li><a href="#Q5">Question 5</a></li>
                <li><a href="#Q6">Question 6</a></li>
                <li><a href="#Q7">Question 7</a></li>
                <li><a href="#Q8">Question 8</a></li>
                <li><a href="#final">Final Step</a></li>
            </ul>
        </nav>
    
        <div id="start">
            <div id="columns">
                <div id="left">
                    <h1>It's Quiz Time!</h1>
                    <p id="subheading"><strong>Let's test your knowledge.</strong></p> 
                    <p id="description">This 08-question quiz covers all the fundamental knowledge of the two common Internet Protocols: IPv4 and IPv6.</p>
    <form method="post" action="markquiz.php" novalidate="novalidate">               
                    <p><input type="text" pattern="[a-zA-Z- ]{1,30}" name="fname" placeholder="First Name" required /></p>
                    <p><input type="text" pattern="[a-zA-Z- ]{1,30}" name="lname" placeholder="Last Name" required /></p>
                    <p><input type="text" pattern="\d{7,10}" name="student-id" placeholder="Student ID" required /></p>
                    <p id="start-btn"><a href="#Q1">Start</a></p>
                </div>
                <div id="right">
                    <div>
                        <img src="images/quiz.png" alt="quiz.png" />
                    </div>
                </div>   
            </div>
        </div>

        <div class="scroll-container">
            <div class="questions-container">
            <?php
                require_once ("settings.php");

                $conn = @mysqli_connect ($host, $user, $pwd, $sql_db);

                // Check if connection is successful
                if (!$conn) {
                    // Display an error message
                    echo "<p>Database connection failure</p>";
                } else {
                    // Upon successful connection
                    $sql_table = "questions";

                    // Set up the SQL command to query or add data into the table
                    $query = "SELECT questionType, questionNumber, questionText, questionInstruction, questionRelated FROM $sql_table ORDER BY RAND()";

                    // execute the query
                    $getQuestion = mysqli_query ($conn, $query);
                    // check if the execution was successful
                    if (!$getQuestion) {
                        echo "<p>Something is wrong with ", $query, "</p>";
                    } else {
                        //Display the quiz
                        include ("generateQuiz.inc.php");
                        $question_no = 1;
                        while ($row = mysqli_fetch_assoc($getQuestion)) {
                            $questionNumber[] = $row["questionNumber"];
                            $questionType[] = $row["questionType"];
                            $questionText[] = $row["questionText"];
                            $questionInstruction[] = $row["questionInstruction"];
                            $questionRelated[] = $row["questionRelated"];
                        }
                        create_Question($conn, $question_no, mysqli_num_rows($getQuestion), $questionNumber, $questionType, $questionText, $questionInstruction, $questionRelated);
                        // Frees up the memory
                        mysqli_free_result($getQuestion);
                    } // if successful query operation
                    $qCombi = implode(",",$questionNumber);
                    echo "<input type=\"hidden\" name=\"questionCombination\" value=\"$qCombi\">";
                    //close the database connection
                    mysqli_close($conn);
                }// if successful database connection
            ?>

                <div class="question-container" id="final">
                    <div class="question-box">
                        <div class="qfieldset-container">
                            <fieldset class="final">
                                <legend>Final Step</legend>
                                <div class="question">
                                    <label>Have you checked your answers?</label>
                                </div>
                                <div class="ans">
                                    <div class="opt-container">
                                        <div id="colY-container">
                                            <p>
                                                <div id="colY">
                                                    <input type="radio" name="final" id="opt_y" value="y" />
                                                    <label for="opt_y">Yes</label>
                                                    <div id="conf_y">
                                                        <details>
                                                            <summary>All good?</summary>
                                                            <p> <input type="submit" value="Submit" />   your answers</p>  
                                                        </details>
                                                        <details>
                                                            <summary>I messed up!</summary>
                                                            <p>Let's   <input type="reset" value="Reset" /> ⇒ <a href="#start">Back to Top</a></p>
                                                        </details>
                                                    </div>
                                                </div>
                                            </p>
                                        </div>
                                        <div id="colN-container">
                                            <p>
                                                <div id="colN">    
                                                    <input type="radio" name="final" id="opt_n" value="n" />
                                                    <label for="opt_n"> No</label> 
                                                    <div id="conf_n">
                                                        <p>
                                                            <a href="#Q1">Review my answers</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <footer>
                                <div class="grid-item">
                                    <div class="card">
                                        <div class="container">
                                            <h2 id="Contact">Contact me:</h2>
                                            <p> Contact me:
                                                <img id="email" src="images/email.jpg" alt="email">
                                                103597453@student.swin.edu.au
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>