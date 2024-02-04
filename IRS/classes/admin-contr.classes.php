<?php

class PaperContr extends Admin
{
    private $title;
    private $date;
    private $abstract;
    private $author;
    private $file;
    private $tempfile;
    private $folder;

    public function initialize(
        $title, 
        $date, 
        $abstract, 
        $author, 
        $file, 
        $tempfile, 
        $folder
        ) {
            $this->title = $title;
            $this->date = $date;
            $this->abstract = $abstract;
            $this->author = $author;
            $this->file = $file;
            $this->tempfile = $tempfile;
            $this->folder = $folder;
        }

    public function insertPaper() 
    {
        if($this-> emptyInput() == false) {
            header("location: ../index.php?error=empty");
            exit();        
        }
        $this->setPaper(
            $this->title, 
            $this->date, 
            $this->abstract, 
            $this->author, 
            $this->file, 
            $this->tempfile, 
            $this->folder
        );
    }

    private function emptyInput()
    {
        $result = false;
        if(empty($this->title) || empty($this->date) || empty($this->abstract) || empty($this->abstract)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    public function displayPaper() 
    {
        $results = $this->getPaper();
        return $results;
    }

    public function getSortedPaper($columnsort, $searchkey , $sortOrder)
    {
        $results = $this->sortPaper($columnsort, $searchkey , $sortOrder);
        return $results;
    }

    public function getRowFile($id)
    {
        $results = $this->getPaperFile($id);
        return $results;
    }

    public function deleteRow($id)
    {
        $this->deletePaperRow($id);
    }

    public function updateRowPaper($id, $title, $date, $abstract, $author)
    {
        $this->updatePaper($id, $title, $date, $abstract, $author);
    }

    public function getPaperRow($id)
    {
        $results = $this->paperRow($id);
        return $results;
    }
}