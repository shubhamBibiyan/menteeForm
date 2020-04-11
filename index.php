<?php

    // Database connection
    $dsn = "mysql:host=localhost; dbname=resultchecking";
    $username = "shubham";
    $password = "12345";

    try{
        $db = new PDO($dsn, $username, $password);
    
        //set pdo error mode to exception
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //display that database is successfully connected.
        echo "Connected to the database";

        if(isset($_POST['submit'])){
            // Data to be stored in database.
            $student_session     = $_POST['student_session'];
            $class               = $_POST['class'];
            $semester            = $_POST['semester'];
            $student_name        = $_POST['student_name'];
            $rollno              = $_POST['rollno'];
            $dob                 = $_POST['dob'];
            $gender              = $_POST['gender'];
            $blood               = $_POST['blood'];
            $nation              = $_POST['nation'];
            $youremail           = $_POST['student_mail'];
            $yourcontact         = $_POST['student_contact'];
            $country_coordinator = $_POST['country_coordinator'];
            $visa_expiry         = $_POST['visa_expiry'];
            $father_name         = $_POST['father_name'];
            $father_contact      = $_POST['father_contact'];
            $mother_name         = $_POST['mother_name'];
            $mother_contact      = $_POST['mother_contact'];
            $agency_name         = $_POST['agency_name'];
            $sponsered_contact   = $_POST['sponsered_contact'];         
            $permanent_address   = $_POST['permanent_address'];
            $temp_address        = $_POST['temp_address'];
            $curricular_act      = $_POST['curricular_activities'];
            $teaching            = $_POST['teaching'];
            $infrastructor       = $_POST['infrastructor'];
            $food                = $_POST['food'];
            $hostel              = $_POST['hostal'];
            $others              = $_POST['others'];
            $suggestion          = $_POST['suggestion'];
            $problem             = $_POST['problem'];
            $misc                = $_POST['misc'];
            $mentor              = $_POST['mentor'];
            $head_mentor         = $_POST['hmentor'];
            

            $sqlInsert = "INSERT INTO students (student_session, class, semester, student_name, rollno, dob, gender, blood, nation,  student_mail, student_contact, country_coordinator, visa_expiry,
                father_name, father_contact,mother_name, mother_contact, agency_name, sponsered_contact, permanent_address, temp_address,curricular_activities, teaching, infrastructure, food, hostel,
                others, suggestion, problems, misc, mentor, headmentor
            )
            VALUES (:student_session, :class, :semester, :student_name, :rollno, :dob, :gender, :blood, :nation,  :student_mail, :student_contact, :country_coordinator, :visa_expiry,
                :father_name, :father_contact,:mother_name, :mother_contact, :agency_name, :sponsered_contact, :permanent_address, :temp_address, :curricular_activities, :teaching, :infrastructure, 
                :food, :hostel, :others, :suggestion, :problems, :misc, :mentor, :headmentor
                )";

            //use PDO prepared to sanitize data
            $statement = $db->prepare($sqlInsert);

            //add the data into the database
            $statement->execute(array(':student_session' => $student_session, ':class' => $class, ':semester' => $semester, ':student_name' => $student_name, ':rollno' => $rollno, ':dob' => $dob, ':gender' => $gender, ':blood' => $blood, ':nation' => $nation,
              ':student_mail' => $youremail, ':student_contact' => $yourcontact, ':country_coordinator' => $country_coordinator, ':visa_expiry' => $visa_expiry, ':father_name' => $father_name, ':father_contact' => $father_name, ':mother_name' => $mother_name,
              ':mother_contact' => $mother_contact, ':agency_name' => $agency_name, ':sponsered_contact' => $sponsered_contact  , ':permanent_address' => $permanent_address, ':temp_address' => $temp_address, ':curricular_activities' => $curricular_act,
              ':teaching' => $teaching ,':infrastructure' => $infrastructor, ':food' => $food, ':hostel' => $hostel, ':others' => $others, ':suggestion' => $suggestion, ':problems' => $problem, ':misc' => $misc, 
              ':mentor' => $mentor, ':headmentor' => $head_mentor
            ));

            //check if one new row was created
            if($statement->rowCount() == 1){
                echo ("Registration Successful");
            }
        }
    }
    catch(PDOException $ex){
        echo "Connection failed due to ".$ex->getMessage();
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Mentee Form</title>
        <style>
            table,tr,td{
                border-collapse: collapse;
                border: 2px solid black; 
            }
            td{
                width: 450px;
                height: 20px;
            }
            #output_image
            {
            max-width:100px;
            }
        </style>
    </head>
    <body>
        <center>
            <h2>
                M.M. INSTITUTE OF COMPUTER TECHNOLOGY & BUSINESS MANAGEMENT<br>
                MAHARISHI MARKANDESHWAR(DEEMED TO BE UNIVESITY)<br>
                MULLANA-AMBALA, HARYANA (INDIA) - 133207
            </h2>
            <h4>
                (Established under Section 3 of the UGC Act, 1956)<br>
                <b>(Accredited by NAAC with Grade 'A')</b>
            </h4>
            <h3>
                <strong>Mentee Database Form</strong> 
            </h3>
        </center>
        <form method="POST" action="dashboard.php">
            <div class="container">
                <table border="0px" align="center">
                    <tr>
                        <td style="width: 80%;">
                            <p>
                                1. Session: <input type="text" name="student_session">
                                Class:      <input type="text" name="class">
                                Semester:   <input type="number" name="semester">
                            </p>
                            <p>
                                Name:       <input type="text" name="student_name">
                                Roll no. :  <input type="number" name="rollno">
                                DOB:        <input type="date" name="dob"> 
                            </p>
                            <p>
                                Gender:
                                            <input type="radio" name="gender" value="Male">Male
                                            <input type="radio" name="gender" value="Female">Female
                                Blood Group:<input type="text" name="blood">
                                Nationality:<input type="text" name="nation">
                        </p>
                            <p>
        
                                Email ID:   <input type="email" name="student_mail">
                                Contact No.:<input type="tel" name="student_contact"> 
                            </p>
                            <p>
                                Country Coordinator: <input type="text" name="country_coordinator">
                                Visa Expiry Date:    <input type="date" name="visa_expiry">
                            </p>
                        </td>
                        <td style="width: 20%;">
                            <input type="file" accept="image/*" onchange="preview_image(event)">
                            <img id="output_image"/>
                        </td> 
                    </tr>
                </table>
            </div>
            <hr>
            <div class="container">
                <p>
                    2. Father's Name: <input type="text" name="father_name">
                    Contact No.      <input type="number" name="father_contact">
                </p>
                <p>
                    Mother's Name:   <input type="text" name="mother_name">
                    Contact No:      <input type="number" name="mother_contact">
                </p>
                <p>
                    Name of Sponsered Agency:<input type="text" name="agency_name">
                    Contact No.      <input type="number" name="sponsered_contact">
                </p>
            </div>
            <hr>
            <div class="container">
                3. Personal Address: <textarea style="height: 10px; width: 200px;" name="permanent_address"></textarea><br>
                Local Address:    <textarea style="height: 10px; width: 200px;" name="temp_address"></textarea>
            </div>
            <hr>
            <div class="container">
                    <p>
                        4. Attendance and Sessional Marks
                    </p>
                    <table border="1px">
                        <tr>
                            <td>Subject Code:</td>
                            <td>1st Sessional: Attendance upto date <input type="date"></td>
                            <td>Marks</td>
                            <td>2st Sessional: Attendance upto date <input type="date"></td>
                            <td>Marks</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                        </tr>
                        <tr>
                            <td>Date of Progress Report Dispatched</td>
                            <td></td>
                            <td>Sign of Student</td>
                            <td></td>
                            <td>Sign of Student</td>
                        </tr>
                        <tr >
                            <td colspan="5">
                                <p><strong>Note: This is for the information of the student that minimum 75% attendance required for appearing in the Sessional and Final examination in each of the subjects.</strong></p>
                                <p style="text-align: right;"><strong>Signature of Student</strong></p>
                            </td>
                        </tr>
                    </table>
                </div>
                <hr>

                <div class="container">
                    <p>
                        <strong>5. Root cause of short attendance and Weak performance in Sessional</strong>
                    </p>
                    <table border="1px">
                        <tr>
                            <td>Upto/ In</td>
                            <td>Root cause of Short attendance/Weak performance</td>
                            <td>Student Signature's</td>
                        </tr>
                        <tr>
                            <td>1st Sessional</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2nd Sessional</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <hr>

                <div class="container">
                    <p>
                        <strong>
                            6. Mentor interaction with Parents/Guardian/Sponsored Agencies/Country Coordinator of Student(attach extra sheet, if required):<br>
                            Mode of Contact: P-Personally, T-Telephonically, E-Email
                        </strong>
                    </p>
                    <table border="1px"> 
                        <tr>
                            <td>Date</td>
                            <td>Mode of Contact</td>
                            <td>Contact Person</td>
                            <td>Conatact No.</td>
                            <td>Issue Discussed</td>
                            <td>Remarks</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <hr>

                <div class="container">
                    <p>
                        <strong>7. Participation in extra Curricular Activities/Sports/Tech-Fest etc.(id any, give details):</strong>
                    </p>
                    <p>
                        <textarea style="width: 1500px; height: 50px;" name="curricular_activities"></textarea>
                    </p>
                </div>
                <hr>
                <div class="container">
                    <p>
                        <strong>8. Status Report on Teaching, Infrastructure, Hostal Facilities, Food, etc.</strong> [Tick the appropriate point]
                    </p>
                    <table border="2px">
                        <tr>
                            <td>Teaching</td>
                            <td>
                                <input type="radio" name="teaching" value="excellent">Excellent
                                <input type="radio" name="teaching" value="very good">Very Good
                                <input type="radio" name="teaching" value="good">Good
                                <input type="radio" name="teaching" value="average">Average
                            </td>
                        </tr>
                        <tr>
                            <td>Infrastructure</td>
                            <td>
                                <input type="radio" name="infrastructor" value="excellent">Excellent
                                <input type="radio" name="infrastructor" value="very good">Very Good
                                <input type="radio" name="infrastructor" value="good">Good
                                <input type="radio" name="infrastructor" value="average">Average
                            </td>
                        </tr><tr>
                            <td>Hostal Facilities</td>
                            <td>
                                <input type="radio" name="hostal" value="excellent">Excellent
                                <input type="radio" name="hostal" value="very good">Very Good
                                <input type="radio" name="hostal" value="good">Good
                                <input type="radio" name="hostal" value="average">Average
                            </td>
                        </tr><tr>
                            <td>Food</td>
                            <td>
                                <input type="radio" name="food" value="excellent">Excellent
                                <input type="radio" name="food" value="very good">Very Good
                                <input type="radio" name="food" value="good">Good
                                <input type="radio" name="food" value="average">Average
                            </td>
                        </tr><tr>
                            <td>Others</td>
                            <td>
                                <input type="radio" name="others" value="excellent">Excellent
                                <input type="radio" name="others" value="very good">Very Good
                                <input type="radio" name="others" value="good">Good
                                <input type="radio" name="others" value="average">Average
                            </td>
                        </tr>
                    </table>
                </div>
                <hr>
                
                <div class="container">
                    <p>
                        <strong>9. Deficiency/Shortcoming with suggestion for further improvement in the Institution.</strong>
                    </p>
                    <p>
                        <textarea style="width: 1500px; height: 50px;" name="suggestion"></textarea>
                    </p>                
                </div>
                <hr>

                <div class="container">
                    <p>
                        <strong>10. Details of problem faced(if any) by student and remedial action taken.</strong>
                    </p>
                    <p>
                        <textarea style="width: 1500px; height: 50px;" name="problem"></textarea>
                    </p> 
                </div>
                <hr>

                <div class="container">
                    <p>
                        <strong>11. Misc.</strong>
                    </p>
                    <p>
                        <textarea style="width: 1500px; height: 50px;" name="misc"></textarea>
                    </p> 
                </div>
                <hr>

                <div class="container">
                    <p>
                        Name of Mentor: <input type="text" name="mentor">
                    </p>
                    <p>
                        Name of Head Mentor: <input type="text" name="hmentor"><br>
                    </p>
                    <p style="text-align: right;">
                        Mentor/ Head Mentor Signature
                    </p>
                </div>
            <input type="submit" name="submit">
        </form>
    </body>
</html>