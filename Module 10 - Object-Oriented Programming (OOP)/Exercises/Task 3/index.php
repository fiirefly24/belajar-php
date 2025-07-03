<?php 

class User {
    public $name;
    private $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    protected function getInfo(){
        return "Nama: $this->name, Email: $this->email\n";
    }

    public function getEmail()
    {
        if (!empty($this->email)) {
            return $this->email;
        }
    }

}

class Admin extends User {
    public function banUser(User $user)
    {
        if (!empty($user)) {
            echo "Admin $this->name has banned $user->name\n";
            unset($user);
            return;
        }
        
    }
}

$user = new User("Ammad", "ammadalifikri2412@gmail.com");
echo $user->getEmail(); // Works as getter
echo $user->getInfo();
// When try to run $user->getInfo() get ammadalifikri2412@gmail.com Fatal error: Uncaught Error: Call to protected method User::getInfo() from global scope
// Because protected can be accessed only if it use on the class or it's child
?>