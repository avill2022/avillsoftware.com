<?php
class Module_user
{
    // DB Related
    private $conn;
    private $table = "user";

    // Post Properties
    public $id;
    public $name;
    public $password;
    public $email;
    public $type;

    // Construct with Database
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function delete()
    {
        $query = "DELETE FROM {$this->table} WHERE id=:id";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Sanitize data
        $this->id = htmlspecialchars(strip_tags(trim($this->id)));
        // Bind Data 
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        } else {
            printf("Database Error: %s\n", $stmt->error);
            return false;
        }
    }
    public function getOne()
    {
        $query = "SELECT 
        p.id,
        p.name,
        p.password,
        p.email,
        p.type
        FROM {$this->table} p
        WHERE p.id = ?
        LIMIT 0,1
        ";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            // Get the post
            $post = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id = $post["id"];
            $this->name = $post["name"];
            $this->password = $post["password"];
            $this->email = $post["email"];
            $this->type = $post["type"];

            return true;
        } else {
            printf("Database Error: %s\n", $stmt->error);
            return false;
        }
    }
    public function getAll()
    {
        $query = "SELECT
        p.id,
        p.name,
        p.password,
        p.email,
        p.type
        FROM {$this->table} p
        ORDER BY p.id DESC
        ";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    public function insert()
    {
        $query = "INSERT INTO {$this->table} 
        SET 
         name = :name,
         password= :password, 
         email= :email, 
         type= :type";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Sanitize data
        $this->name = htmlspecialchars(strip_tags(trim($this->name)));
        $this->password = htmlspecialchars(strip_tags(trim($this->password)));
        $this->email = htmlspecialchars(strip_tags(trim($this->email)));
        $this->type = htmlspecialchars(strip_tags(trim($this->type)));

        // Bind Data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":type", $this->type);

        if ($stmt->execute()) {
            return true;
        } else {
            printf("Database Error: %s\n", $stmt->error);
            return false;
        }
    }
    public function update()
    {
        $query = "UPDATE {$this->table} 
        SET 
         name = :name,
         password= :password, 
         email= :email, 
         type= :type 
         WHERE id = :id";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Sanitize data
        $this->id = htmlspecialchars(strip_tags(trim($this->id)));
        $this->name = htmlspecialchars(strip_tags(trim($this->name)));
        $this->password = htmlspecialchars(strip_tags(trim($this->password)));
        $this->type = htmlspecialchars(strip_tags(trim($this->type)));
        $this->email = htmlspecialchars(strip_tags(trim($this->email)));

        // Bind Data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":type", $this->type);

        if ($stmt->execute()) {
            return true;
        } else {
            printf("Database Error: %s\n", $stmt->error);
            return false;
        }
    }
}
