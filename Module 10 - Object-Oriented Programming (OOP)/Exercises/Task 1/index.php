<?php 

class User {
    public $name;
    protected $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function getInfo(){
        return "Nama: $this->name, Email: $this->email\n";
    }

}

$user = new User("Ammad", "ammadalifikri2412@gmail.com");
echo $user->getInfo();
?>