<?php

include('../sqlConnection.php');
include('../DAO/UserDAO.php');

class User extends sqlConnection implements UserDAO{
    private $name;
    private $age;

    public $conn;

    public function setName($name){
        $this->name = $name;
    }

    public function setAge($age){
        $this->age = $age;
    }

    public function getName(){
        return $this->name;
    }

    public function getAge(){
        return $this->age;
    }

    public function __construct($name = "", $age = 0)
    {
        $this->conn = parent::connector();
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * @Override
     */
    public function insertUser(User $user){
        $name = $user->getName();
        $age = $user->getAge();
        if($name != "" && $age != 0){
            $sql = "INSERT INTO users VALUES ('', '$name', $age)";
            $insert = mysqli_query($this->conn, $sql);
    
            if($insert){
                header('location: ../views/home.php');
            }else{
                echo mysqli_error($this->conn);
            }
    
            mysqli_close($this->conn);
        }
    }

    /**
     * @Override
     */
    public function searchUserById($id){
        $sql = "SELECT * FROM users WHERE id=$id";
        $select = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_assoc($select)){
            $name = $row['name'];
            $age = $row['age'];
        }
        echo '  <tr>
                    <td>'.
                        $name
                    .'</td>
                    <td>'.
                        $age
                    .'</td>
                </tr>
        ';
    }

    /**
     * @Override
     */
    public function getUser(){
        $sql = "SELECT * FROM users";
        $select = mysqli_query($this->conn, $sql);
        while($data = mysqli_fetch_array($select)){
            $href = '../views/show.php?id='.$data['id'];
            echo '
                <tr>
                    <td>
                        '.$data['name'].'
                    </td>
                    <td>
                        '.$data['age'].'
                    </td>'.
                    '<td>'.'<a href="'.$href.'">Link</a>'.'</td>'.    
                    '<td>'.'<a href="'.$href.'">Delete</a>'.'</td>'.    
                '
                </tr>    
                ';
        }
    }

    /**
     * @Override
     */
    public function destroyUser($id){
        $sql = "DELETE FROM users WHERE id=$id";
        if($this->conn->query($sql) === TRUE){
            header("locations: ../views/app.php");
        }   
        
        $this->conn->close();
    }
}