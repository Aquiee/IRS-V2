<?php

if(isset($_POST["submit"])){

    $title = $_POST["title"];
    $date = $_POST["date"];
    $authors = $_POST["combinedAuthors"];
    $abstract = $_POST["abstract"];
    $filename = $_FILES["paperfile"]["name"];
    $tempfile = $_FILES["paperfile"]["tmp_name"];
    $folder = "../files/".$filename;

    if (!is_dir("../files/")) {
        mkdir("../files/");
    }

    include "classes/dbh.classes.php";
    include "classes/admin.classes.php";
    include "classes/admin-contr.classes.php";


    if (move_uploaded_file($tempfile, $folder)) {
        $insert = new PaperContr();
        $insert->initialize($title, $date , $abstract ,$authors ,$filename , $tempfile , $folder);
        $insert->insertPaper();
      header("location: homepage.php?error=none");
      } else {
        $error = error_get_last();
        header("location: admin_insert.php?error=fileuploadfailed&message=" . urlencode($error['message']));
        exit();
  }

}


?>

<script>
  let authorCount = 1;

  function addAuthor() {
    authorCount++;

    const newDiv = document.createElement('div');
    newDiv.className = 'authorInput';
    newDiv.id = `author${authorCount}Div`;
    newDiv.innerHTML = `
      <label for="author${authorCount}">Author ${authorCount}:</label>
      <input type="text" id="author${authorCount}" name="author${authorCount}" placeholder="Author ${authorCount}" required>
      <button type="button" onclick="removeAuthor('author${authorCount}Div')">Remove Author</button><br>
    `;

    document.getElementById('authorInputs').appendChild(newDiv);
  }

  function removeAuthor(divId) {
    const divToRemove = document.getElementById(divId);
    divToRemove.parentNode.removeChild(divToRemove);

    // Update the remaining authors' numbers
    const authorDivs = document.querySelectorAll('.authorInput');
    authorCount = 0;
    authorDivs.forEach((div, index) => {
      authorCount++;
      const label = div.querySelector('label');
      const input = div.querySelector('input');
      const button = div.querySelector('button');
      div.id = `author${authorCount}Div`;
      label.setAttribute('for', `author${authorCount}`);
      label.innerText = `Author ${authorCount}:`;
      input.id = `author${authorCount}`;
      input.name = `author${authorCount}`;
      input.placeholder = `Author ${authorCount}`;
      button.setAttribute('onclick', `removeAuthor('author${authorCount}Div')`);
    });
  }

  function combineAuthors() {
    let combinedAuthors = "";
    for (let i = 1; i <= authorCount; i++) {
      const authorInput = document.getElementById(`author${i}`);
      combinedAuthors += authorInput.value + ", ";
    }

    combinedAuthors = combinedAuthors.slice(0, -2);
    document.getElementById('combinedAuthors').value = combinedAuthors;
  }
</script>