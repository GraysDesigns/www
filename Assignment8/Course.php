<?php
class Course
{
    private $code;
    private $title;
    private $creditHours;
    private $registered;

    public function __construct($code, $title, $creditHours, $registered)
    {
        $this->code = $code;
        $this->title = $title;
        $this->creditHours = $creditHours;
        $this->registered = $registered;

    }

    public function getCode()
    {
        return($this->code);
    }

    public function getTitle()
    {
        return($this->title);
    }

    public function getCreditHours()
    {
        return($this->creditHours);
    }

    public function getRegistered()
    {
        return($this->registered);
    }

}

?>