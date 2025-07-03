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
echo $user->getInfo();

$admin = new Admin("TheAdmin", "imtheadmin@gmail.com");
echo $admin->getInfo();
$admin->banUser($user);

$user->getInfo();
?>