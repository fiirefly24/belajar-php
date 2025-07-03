<?php 

interface Authenticatable 
{
    public function getId(): int;
    public function getRoles(): array;
}

class User implements Authenticatable {
    public $id;
    public $name;
    private $email;
    public $roles = [];

    public function __construct($name, $email)
    {
        $this->id += 1;
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

    public function roles(Array $roles) {
        $this->roles = $roles;
    }

    public function getId(): int {
        return $this-> id;
    }

    public function getRoles(): array {
        return $this-> roles;
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

$user = new User("Ammad", "ammadalifikri@gmail.com");
$user->roles = ["user"];
$admin = new Admin("imAdmin", "theadmin@email.com");
$admin->roles = ["admin", "user"];


function checkAccess(Authenticatable $user) {
    echo "User ID: " . $user->getId() . "\n";
    echo "Roles: " . implode(", ", $user->getRoles()) . "\n";
}

checkAccess($user);
checkAccess($admin);
?>