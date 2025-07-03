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
    public $data = [];

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

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
    }

    public function __toString()
    {
        $email = $this->getEmail();
        $roles = implode(", ", $this->getRoles());
        $message = <<<EOT
            User detail.
            Name    : $this->name
            Email   : $email
            Roles   : $roles
            Address : $this->address\n
        EOT;

        return $message;
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

function checkAccess(Authenticatable $user) {
    echo "User ID: " . $user->getId() . "\n";
    echo "Roles: " . implode(", ", $user->getRoles()) . "\n";
}

$user = new User("Ammad", "ammadali.fikri@gmail.com");
$user->roles = ["user"];
$user->address = "Jakarta\n";
echo $user->address;
echo $user;

?>