<?php

namespace Admin\Libs;

use Exception;
use PDO;
use PDOException;

class User extends Database
{
    use UploadPhoto;
    protected static $db_table = "users";
    protected static $db_fields = array("firstname", "lastname", "phone", "photo", "email", "password");

    protected $id;
    protected $firstname;
    protected $lastname;
    protected $phone;
    protected $email;
    protected $password;
    protected $photo;
    protected $photoImage;


    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }
    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
    public function getLastname()
    {
        return $this->lastname;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    public function getPhone()
    {
        return $this->phone;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }
    public function getPhoto()
    {
        return $this->photo;
    }
    public function setPhotoImage($photoImage)
    {
        $this->photoImage = $photoImage;
    }
    public function getPhotoImage()
    {
        return $this->photoImage;
    }
    public function verifyUser($email, $password)
    {
        $sql = "SELECT * FROM users";
        $sql .= " WHERE email=:email AND password=:password";
        $result = $this->prepare($sql);
        $result->bindParam(':email', $email);
        $result->bindParam(':password', $password);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS, __NAMESPACE__ . "\\{$this->getClassName()}");
        return $result->fetch();
    }
    public function create()
    {
        try {
            $this->startupLoad($this->photoImage);
            $this->photo = $this->filename;
            $uploadFile = $this->uploadFile();
            if ($uploadFile) {
                if (parent::create()) {
                    return true;
                }
            } else {
                foreach ($this->errors as $error) {
                    echo $error . "<br>";
                }
            }
        } catch (Exception $e) {
            echo "User " . $e->getMessage();
        }
    }
    public function update()
    {
        try {
            if (isset($this->photoImage)) {
                $this->uploadfile = $this->src . $this->photo;
                unlink($this->uploadfile);
                $this->startupLoad($this->photoImage);
                $this->photo = $this->filename;
                $uploadFile = $this->uploadFile();
                if ($uploadFile) {
                    if (parent::update()) {
                        return true;
                    }
                } else {
                    foreach ($this->errors as $error) {
                        echo $error . "<br>";
                    }
                }
            }else{
                if (parent::update()) {
                    return true;
                }
            }
        } catch (Exception $e) {
            echo "User " . $e->getMessage();
        }
    }
    public function delete()
    {
        try {
            if (parent::delete()) {
                $this->uploadfile = $this->src . $this->photo;
                unlink($this->uploadfile);
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "User " . $e->getMessage();
        }
    }
}
