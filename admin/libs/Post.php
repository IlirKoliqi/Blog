<?php
namespace Admin\Libs;

use Exception;
use PDO;
use PDOException;

class Post extends Database{

    use UploadPhoto;
    protected static $db_table="posts";
    protected static $db_fields=array("categoryid","title",'content','author','photo','tags','publishedDate');

    protected $id;
    protected $categoryid;
    protected $title;
    protected $content;
    protected $author;
    protected $tags;
    protected $publishedDate;
    protected $photo;
    protected $photoImage;

    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }

    public function setCategoryId($categoryid){
        $this->categoryid=$categoryid;
    }
    public function getCategoryId(){
        return $this->categoryid;
    }

    public function setTitle($title){
        $this->title=$title;
    }
    public function getTitle(){
        return $this->title;
    }

    public function setContent($content){
        $this->content=$content;
    }
    public function getContent(){
        return $this->content;
    }

    public function setAuthor($author){
        $this->author=$author;
    }
    public function getAuthor(){
        return $this->author;
    }

    public function setPhoto($photo){
        $this->photo=$photo;
    }
    public function getPhoto(){
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

    public function setTags($tags){
        $this->tags=$tags;
    }
    public function getTags(){
        return $this->tags;
    }

    public function setPublishedDate($publishedDate){
        $this->publishedDate=$publishedDate;
    }
    public function getPublishedDate(){
        return $this->publishedDate;
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
            echo "Post " . $e->getMessage();
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
            echo "Post " . $e->getMessage();
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
            echo "Post " . $e->getMessage();
        }
    }
}
    
