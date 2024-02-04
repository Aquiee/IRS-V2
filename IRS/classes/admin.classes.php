<?php

class Admin extends Dbh
{
    protected function setPaper($title, $date, $abstract, $author, $file) 
    {
        $stmt = $this->connect()->prepare('
            INSERT INTO research_papers (
                paper_title, 
                paper_date, 
                paper_abstract, 
                paper_author, 
                paper_file
            ) VALUES (?, ?, ?, ?, ?);
        ');
        
        if (!$stmt->execute(array($title, $date, $abstract, $author, $file))) 
        {
            $stmt = null;
            header("location: ../admin_insert.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    protected function updatePaper($id, $title, $date, $abstract, $author) 
    {
        $stmt = $this->connect()->prepare('
            UPDATE research_papers SET 
                paper_title=?, 
                paper_date=?, 
                paper_abstract=?, 
                paper_author=? 
                WHERE paper_id=?
        ');

        if (!$stmt->execute(array($title, $date, $abstract, $author , $id))) {
            $stmt = null;
            header("location: ../admin_insert.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
    

    protected function getPaper()
    {
        $stmt = $this->connect()->prepare('SELECT * FROM research_papers;');

        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../homepage.php?error=stmtfailed");
            exit();
        }
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    protected function paperRow($id)
    {
        $stmt = $this->connect()->prepare('
            SELECT * FROM 
                research_papers 
                WHERE paper_id = ?;
        ');
        
        if(!$stmt->execute(array($id))){
            $stmt = null;
            header("location: ../homepage.php?error=stmtfailed");
            exit();
        }
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$result) {
            $stmt = null;
            header("location: ../homepage.php?error=rownotfound");
            exit();
        }
        return $result;
    }

    protected function deletePaperRow($id)
    {
        $stmt = $this->connect()->prepare('
            DELETE FROM 
                research_papers 
                WHERE paper_id = ?;
        ');
        
        if(!$stmt->execute(array($id))){
            $stmt = null;
            header("location: ../homepage.php?error=stmtfailed");
            exit();
        }
        
        $rowCount = $stmt->rowCount();
    
        if ($rowCount === 0) {
            $stmt = null;
            header("location: ../homepage.php?error=rownotfound");
            exit();
        }
    
        $stmt = null;
        header("location: admin_delete.php?success=rowdeleted");
        exit();
    }

    protected function getPaperFile($id)
    {
        $stmt = $this->connect()->prepare('
            SELECT paper_file FROM 
                research_papers 
                WHERE paper_id = ?;
        ');
        
        if(!$stmt->execute(array($id))){
            $stmt = null;
            header("location: ../homepage.php?error=stmtfailed");
            exit();
        }
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$result) {
            $stmt = null;
            header("location: ../homepage.php?error=rownotfound");
            exit();
        }
        $folder = "files/" . $result["paper_file"]; 
        return $folder;
    }

    protected function sortPaper($columnsort, $searchkey, $sortOrder = 'ASC') 
    {
        $sortOrder = strtoupper($sortOrder);
        $stmt = $this->connect()->prepare("
            SELECT * FROM 
                research_papers 
                WHERE $columnsort LIKE 
                :searchkey ORDER BY 
                $columnsort $sortOrder
        ");
        $searchkey = '%' . $searchkey . '%';
        $stmt->bindParam(':searchkey', $searchkey);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}