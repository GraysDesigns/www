<?php
    //courses array, has course code as key and credits as value
    $courses = array(
                     'CMSC340' => "3",
                     'CMST495' => "3",
                     'CMSC315' => "3",
                     'CMSC325' => "3", 
                     'CMST311' => "3",
                     'CMST315' => "3",
                     'CMST320' => "3",
                     'NUTR100' => "3",
                     'ANTH102' => "3",
                     'CMST308' => "3",
                     'CMST310' => "3"
    );

    //initialize credits total
    $credits_total = 0;

    //for each loops through courses array and echos the course code and credits
    //adds credits to credits total
    echo "Associative arrays:";
    foreach($courses as $code => $credits)
    {
        echo "<br>$code => $credits";
        $credits_total += $credits;
    }
    echo "<br>Total credit hours over the last 3 terms = $credits_total <br><br><hr><br>";

    //initalize new $course_list array and reset $credits_total to 0
    $course_list = array();
    $credits_total = 0;

    //foreach loop to transfer associative array $courses to array of Course objects $course_list
    foreach($courses as $code => $credits)
    {
        $course_list[] = new Course($code, $credits);
        $credits_total += $credits;
    }

    echo "Array of Objects:";
    foreach($course_list as $course)
    {
        echo "<br>".$course->get_course_info();
    }

    echo "<br>Total credit hours over the last 3 terms = $credits_total";

    /*
     * Course class has:
     * 
     *      constructor that takes in course code and credits associated
     *      get_course_info() function that returns course code and credits
     * 
    */
    class Course
    {
        public $code, $credits;

        public function __construct($code, $credits)
        {
            $this->code = $code;
            $this->credits = $credits;
        }

        //get course info function returns course code and 
        public function get_course_info()
        {
            return "$this->code, $this->credits";
        }
    }
        
?>