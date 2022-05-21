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
            <li><a href="index.html">Home</a></li>
            <li><a href="topic.html">IPv4/IPv6</a></li>
            <li><a href="quiz.html">Quiz</a></li>
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
    <form method="post" action="https://mercury.swin.edu.au/it000000/formtest.php">               
                    <p><input type="text" pattern="[a-zA-Z- ]{,30}" name="fname" placeholder="First Name" required /></p>
                    <p><input type="text" pattern="[a-zA-Z- ]{,30}" name="lname" placeholder="Last Name" required /></p>
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
                <div class="question-container" id="Q1">
                    <div class="question-box">
                        <div class="qfieldset-container">
                            <fieldset>
                                <legend>Question 1</legend>
                                <div class="question">
                                    <label>What is IPv4?</label>
                                    <p class="instruction"><em>Complete the following statement.</em></p>
                                </div>
                                <div class="ans">
                                    <div class="text-ans-container">
                                        <p>IPv4 is the &nbsp;
                                        <input type="text" name="Ans1_1" placeholder="Enter your answer ..." required /> 
                                        &nbsp; of the &nbsp;
                                        <input type="text" name="Ans1_2" placeholder="Enter your answer ..." required />. 
                                        </p> 
                                    </div>
                                </div>
                            </fieldset>
                        </div> 
                    </div>
                    <div class="footer">
                        <a href="#Q2"><img src="https://img.icons8.com/material/64/000000/chevron-down--v1.png" alt="chevron-down--v1.png"/></a>
                    </div> 
                </div>
            

                <div class="question-container" id="Q2">
                    <div class="question-box">
                        <div class="qfieldset-container">
                            <fieldset>
                                <legend>Question 2</legend>
                                <div class="question">
                                    
                                    <label for="ans2">Which layer does IPv4 work at in the OSI model?</label>
                                    <p class="instruction"><em>Select the correct option.</em></p>
                                </div>
                                <div class="ans">
                                    <div class="select-ans-container">
                                        <select name="Ans2" id="ans2">
                                            <option value="app_layer">Application Layer</option>
                                            <option value="presentation_layer">Presentation Layer</option>
                                            <option value="session_layer">Session Layer</option>
                                            <option value="transport_layer">Transport Layer</option>
                                            <option value="network_layer">Network Layer</option>
                                            <option value="data_link_layer">Data Link Layer</option>
                                            <option value="physical_layer">Physical Layer</option>
                                        </select>
                                    </div>    
                                </div>
                            </fieldset>
                        </div> 
                    </div>
                    <div class="footer">
                        <a href="#Q3"><img src="https://img.icons8.com/material/64/000000/chevron-down--v1.png" alt="chevron-down--v1.png"/></a>
                    </div> 
                </div>

                <div class="question-container" id="Q3">
                    <div class="question-box">
                        <div class="qfieldset-container">
                            <fieldset>
                                <legend>Question 3</legend>
                                <div class="question">
                                    <label>What are the header fields of an IPv6 Packet Header?</label>
                                    <p class="instruction"><em>Tick <strong>ALL</strong> options that apply.</em></p>
                                </div>
                                <div class="ans">
                                    <div class="checkbox-ans-container">
                                        <p>
                                            <label for="ans3_1">Version
                                                <input type="checkbox" name="Ans3[]" id="ans3_1" value="ver" /> 
                                                <span class="custom_cb"></span>
                                            </label>
                                        </p>
                                        <p><label for="ans3_2">Protocol
                                            <input type="checkbox" name="Ans3[]" id="ans3_2" value="protoc" /> 
                                            <span class="custom_cb"></span>
                                        </label></p>
                                        <p><label for="ans3_3">Source Address
                                            <input type="checkbox" name="Ans3[]" id="ans3_3" value="src_add" /> 
                                            <span class="custom_cb"></span>
                                        </label></p>
                                        <p><label for="ans3_4">Payload Length
                                            <input type="checkbox" name="Ans3[]" id="ans3_4" value="payld_lgth" /> 
                                            <span class="custom_cb"></span>
                                        </label></p>
                                    </div>
                                </div>
                            </fieldset>
                        </div> 
                    </div>
                    <div class="footer">
                        <a href="#Q4"><img src="https://img.icons8.com/material/64/000000/chevron-down--v1.png" alt="chevron-down--v1.png"/></a>
                    </div> 
                </div>

                <div class="question-container" id="Q4">
                    <div class="question-box">
                        <div class="qfieldset-container">
                            <fieldset>
                                <legend>Question 4</legend>
                                <div class="question">
                                    <label>What is the host range of this network <span class="address">192.168.1.0</span> ?</label>
                                    <p class="instruction"><em>Select <strong>ONE</strong> option that applies.</em></p>
                                </div>
                                <div class="ans">
                                    <div class="radio-ans-container">
                                        <p>
                                            <label for="ans4_1">192.168.1.0 - 192.168.1.254
                                                <input type="radio" name="Ans4" id="ans4_1" value="0-254" /> 
                                                <span class="custom_radio"></span>
                                            </label>
                                        </p>
                                        <p>
                                            <label for="ans4_2">192.168.1.0 - 192.168.1.253
                                                <input type="radio" name="Ans4" id="ans4_2" value="0-253" /> 
                                                <span class="custom_radio"></span>
                                            </label>
                                        </p>
                                        <p>
                                            <label for="ans4_3">192.168.1.1 - 192.168.1.254
                                                <input type="radio" name="Ans4" id="ans4_3" value="1-254" /> 
                                                <span class="custom_radio"></span>
                                            </label>
                                        </p>
                                        <p>
                                            <label for="ans4_4">192.168.1.1 - 192.168.255
                                                <input type="radio" name="Ans4" id="ans4_4" value="1-255" /> 
                                                <span class="custom_radio"></span>
                                            </label>
                                        </p>
                                    </div>
                                </div>
                            </fieldset>
                        </div> 
                    </div>
                    <div class="footer">
                        <a href="#Q5"><img src="https://img.icons8.com/material/64/000000/chevron-down--v1.png" alt="chevron-down--v1.png"/></a>
                    </div> 
                </div>

                <div class="question-container" id="Q5">
                    <div class="question-box">
                        <div class="qfieldset-container">
                            <fieldset>
                                <legend>Question 5</legend>
                                <div class="question">
                                    <label>Convert the binary form of the below IPv4 address into <em>dotted decimal notation</em>.</label>
                                    <p class="instruction"><em>Enter <strong>A NUMBER</strong> for each textbox.</em></p>
                                </div>
                                <div class="ans">
                                    <div class="text-ans-container">
                                        <table>
                                            <tr>
                                                <td>11101111</td>
                                                <td>.</td>
                                                <td>01100010</td>
                                                <td>.</td>
                                                <td>11110000</td>
                                                <td>.</td>
                                                <td>11010011</td>
                                            </tr>

                                            <tr id="ddn">
                                                <td>
                                                    <input type="number" name="Ans5_1" placeholder="0-255" required /> 
                                                </td>
                                                <td>.</td>
                                                <td>
                                                    <input type="number" name="Ans5_2" placeholder="0-255" required /> 
                                                </td>
                                                <td>.</td>
                                                <td>
                                                    <input type="number" name="Ans5_3" placeholder="0-255" required /> 
                                                </td>
                                                <td>.</td>
                                                <td>
                                                    <input type="number" name="Ans5_4" placeholder="0-255" required /> 
                                                </td>
                                            </tr>
                                        </table> 
                                    </div>
                                </div>
                            </fieldset>
                        </div> 
                    </div>
                    <div class="footer">
                        <a href="#Q6"><img src="https://img.icons8.com/material/64/000000/chevron-down--v1.png" alt="chevron-down--v1.png"/></a>
                    </div> 
                </div>

                <div class="question-container" id="Q6">
                    <div class="question-box">
                        <div class="qfieldset-container">
                            <fieldset>
                                <legend>Question 6</legend>
                                <div class="question">
                                    <label>Related to Question 5</label>
                                    <p class="instruction"><em>Answer the following questions using the address in <strong>Question 5</strong>.</em></p>
                                </div>
                                <div class="ans">
                                    <div class="mixed-ans-container">
                                        <ol>
                                            <li>
                                                <p class="sub-question"> What is the class of the address?</p>
                                                <p>Class &nbsp;
                                                    <select name="Ans6_1">
                                                        <option value="classA">A</option>
                                                        <option value="classB">B</option>
                                                        <option value="classC">C</option>
                                                        <option value="classD">D</option>
                                                        <option value="classE">E</option>
                                                    </select>
                                                </p>
                                            </li>

                                            <li>
                                                <p class="sub-question"><label for="ans6_2">What is the Default Subnet Mask of the address?</label></p>
                                                <p><input type="text" name="Ans6_2" id="ans6_2" pattern="(\d{0-255}).(\d{0-255}).(\d{0-255}).(\d{0-255})" placeholder="x.x.x.x" /></p>
                                            </li>
                                        </ol>
                                        
                                    </div>
                                </div>
                            </fieldset>
                        </div> 
                    </div>
                    <div class="footer">
                        <a href="#Q7"><img src="https://img.icons8.com/material/64/000000/chevron-down--v1.png" alt="chevron-down--v1.png"/></a>
                    </div> 
                </div>

                <div class="question-container" id="Q7">
                    <div class="question-box">
                        <div class="qfieldset-container">
                            <fieldset>
                                <legend>Question 7</legend>
                                <div class="question">
                                    <label>Compare IPv4 and IPv6 address formats</label>
                                    <p class="instruction"><em>Complete the following table.</em></p>
                                </div>
                                <div class="ans">
                                    <div>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>IPv4</th>
                                                    <th>IPv6</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th class="char">Length of address</th>
                                                    <td><input type="text" name="Ans7.1" pattern="(\d+) bits" placeholder="bits" /></td>
                                                    <td><input type="text" name="Ans7.2" pattern="(\d+) bits" placeholder="bits" /></td>
                                                </tr>
                                                <tr>
                                                    <th class="char">Representation</th>
                                                    <td><input type="text" name="Ans7.3" pattern="(\d+) ([a-zA-Z])" placeholder="number + term" /></td>
                                                    <td><input type="text" name="Ans7.4" pattern="(\d+) ([a-zA-Z])" placeholder="number + term" /></td>
                                                </tr>
                                                <tr>
                                                    <th class="char">Bits block Delimiter</th>
                                                    <td><input type="text" name="Ans7.5" pattern="[!\#$\%\&\'\(\)\*\+\,.\/:\;\=\>?\@\^_\`{|}\~-]" placeholder="punctuation symbol" /> </td>
                                                    <td><input type="text" name="Ans7.6" pattern="[!\#$\%\&\'\(\)\*\+\,.\/:\;\=\>?\@\^_\`{|}\~-]" placeholder="punctuation symbol"/></td>
                                                </tr>
                                                <tr>
                                                    <th class="char">Conversion</th>
                                                    <td><textarea name="Ans7.7" cols="35" placeholder="bits block => bits" ></textarea></td>
                                                    <td><textarea name="Ans7.8" cols="35" placeholder="bits block => hexadecimals => bits" ></textarea></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset>
                        </div> 
                    </div>
                    <div class="footer">
                        <a href="#Q8"><img src="https://img.icons8.com/material/64/000000/chevron-down--v1.png" alt="chevron-down--v1.png"/></a>
                    </div> 
                </div>

                <div class="question-container" id="Q8">
                    <div class="question-box">
                        <div class="qfieldset-container">
                            <fieldset>
                                <legend>Question 8</legend>
                                <div class="question">
                                    <label>What is the valid compressed format of the following IPv6 address?</label>
                                    <p class="instruction"><em>Enter your answer.</em></p>
                                </div>
                                <div class="ans">
                                    <div class="text-ans-container">
                                        <p class="address"><span>IPv6 address ></span> FE80:0000:0000:0000:1698:7DFF:FE1F:C17E</p>
                                        <p>><input type="text" id="ans1" name="Ans1_2" placeholder="Enter your answer ..." maxlength="39" required /> 
                                        </p> 
                                    </div>
                                </div>
                            </fieldset>
                        </div> 
                    </div>
                    <div class="footer">
                        <a href="#final"><img src="https://img.icons8.com/material/64/000000/chevron-down--v1.png" alt="chevron-down--v1.png"/></a>
                    </div> 
                </div>

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