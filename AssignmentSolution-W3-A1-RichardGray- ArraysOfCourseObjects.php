<?php
/*      Richard Gray
 *      CMSC340
 *      Assignment 3: Develop a PHP Script to Create and Manipulate a PHP Array of Course Objects
 *      Date: August 29, 2024
*/


    $arrayOfCourses = array (
                                new Course("CMSC 340", "Web Programming", 3),
                                new Course("CMSC 315", "Data Structures and Analysis", 3),
                                new Course("CMSC 325", "Game Design and Development", 3),
                                new Course("CMST 325", "Image Editing", 3),
                                new Course("CMST 385", "Principles of Web Design & Technology I", 3),
                                new Course("CMST 311", "Advanced Electronic Publishing", 3),
                                new Course("CMST 315", "Game Design I", 3),
                                new Course("CMST 320", "Illustration Graphics", 3),
                                new Course("NUTR 100", "Elements of Nutrition", 3),
                                new Course("ANTH 102", "Intro to Cultural Anthropology", 3),
                                new Course("CMST 308", "User Experience Interface Design", 3),
                                new Course("CMST 310", "Fundamentals of Electronic Publishing", 3)
    );

    $courseCount = 1;

    //boolean operator to check if CMSC115 exists in array
    $courseFound = false;
    $courseToSearch = "CMSC 115";

    echo "The number of UMGC courses I took over the last 3 terms = " . count($arrayOfCourses) . "<br><br>";

    //loop through arrayOfCourses to display coiurse information and see if a $course has the code to search
    foreach ($arrayOfCourses as $course)
    {
        echo "Course $courseCount Information:<br>" . $course->printCourse() . "<br>";
        $courseCount++;
        if (str_contains($course->printCourse(), $courseToSearch))
        {
            $courseFound = true;
            break;
        }
    }


    if($courseFound){
        echo "Yes, I have taken the " . $courseToSearch . " course.<br>";
    } else {
        echo "No, I have not taken the " . $courseToSearch . " course.<br>";
    }

    /*
     * Course class has:
     * 
     *      constructor that takes in course code and credits associated
     *      get_course_info() function that returns course code and credits
     * 
    */
    class Course
    {
        private $code, $title, $credits;

        public function __construct($code, $title, $credits)
        {
            $this->code = $code;
            $this->title = $title;
            $this->credits = $credits;
        }

        //get course info function returns course code and 
        public function printCourse()
        {
            return "Code =          $this->code <br>
                    Title =         $this->title <br>       
                    Credit Hours =  $this->credits <br>";
        }
    }
?>