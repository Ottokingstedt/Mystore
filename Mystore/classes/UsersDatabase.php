<?php 

require_once __DIR__ . "/Database.php";
require_once __DIR__ . "/User.php";

// fetch products

class UserDatabase extends Database{

    public function get_one_by_id($id){
        $query = "SELECT * FROM users WHERE `id` = ?";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        $db_user = mysqli_fetch_assoc($result);

        $user = null;

        if($db_user){    
            $user = new User($db_user["username"], $db_user["role"], $db_user["id"]); 
            $user->set_password_hash($db_user["password-hash"]);
        }

        return $user;

    }

    public function get_one_by_username($username)
    {
        $query = "SELECT * FROM users WHERE `username` = ?";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("s", $username);

        $stmt->execute();

        $result = $stmt->get_result();

        $db_user = mysqli_fetch_assoc($result);

        $user = null;

        if($db_user){    
            $user = new User($db_user["username"], $db_user["role"], $db_user["id"]); 
            $user->set_password_hash($db_user["password-hash"]);
        }

        return $user;

    }


    public function get_all(){
        $query = "SELECT * FROM users";

        $result = mysqli_query($this->conn, $query);

        $db_users = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $users = [];

        foreach($db_users as $db_user){
            $user = new User($db_user["username"], $db_user["role"], $db_user["id"]);
            $users[] = $user;
        }

        return $users; 

    }

    // create 

    public function create(User $user){
        $query = "INSERT INTO users (username, `role`, `password-hash`) VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($this->conn, $query);

        $username = $user->username;
        $role = $user->role;
        $password_hash = $user->get_password_hash();

        $stmt->bind_param(
            "sss", 
            $username, 
            $role, 
            $password_hash
        );

        $success = $stmt->execute();

        return $success;
    }

    public function get_google_user_id(User $user){
        // 1. Kolla om användaren finns
        $db_user = $this->get_user_by_username($user->username);


        // 2. om inte, skapa användaren
        if($db_user == null){
            $query = "INSERT INTO users (username) VALUES (?)";

            $stmt = mysqli_prepare($this->conn, $query);
    
            $username = $user->username;
    
            $stmt->bind_param("s", $username);
    
            $success = $stmt->execute();

            if($success){
                $user->id = $stmt->insert_id;
            }
            else{
                var_dump($stmt->error);
                die("Error saving google user");
            }

        }
        else{
            $user = $db_user;
        }

        // 3. Skicka tillbaka ID
        return $user->id;
    }


    public function update($role, $id){
       $query =  "UPDATE users SET `role`=? WHERE id=?";

       $stmt = mysqli_prepare($this->conn, $query);

       $stmt->bind_param(
        "si",
        $role,
        $id
    );

    return $stmt->execute();

    }

    public function delete($id){

        $query = "DELETE FROM users WHERE id=?";
    
        $stmt = mysqli_prepare($this->conn, $query);
    
        $stmt->bind_param("i", $id);
    
        return $stmt->execute();
    
        }

}

