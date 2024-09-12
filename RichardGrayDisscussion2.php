<?php
    $user1              = new User;
    $user1->name        = "Oliver Craig";
    $user1->city        = "Pittsburgh";
    $user1->state       = "Pennsylvania"; 
    $user1->temperature = 82;

    $user2              = new User;
    $user2->name        = "Tina Livingston";
    $user2->city        = "Denver";
    $user2->state       = "Colorado"; 
    $user2->temperature = 81;


    echo "First User Information:<br>" . $user1->print_user_info();
    echo "<br><br>";
    echo "Second User Information:<br>" .$user2->print_user_info();


    class User
    {
        public $name, $city, $state, $temperature;

        function print_user_info()
        {
            $today_date = date("l F jS Y");
            $this->today_date = $today_date;

            return "name        = $this->name       <br>
                    city        = $this->city       <br>
                    state       = $this->state      <br>
                    temperature = $this->temperature<br>
                    todayDate   = $this->today_date
            ";
        }
    }
?>