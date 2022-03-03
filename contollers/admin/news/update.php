<?php

include __DIR__ . "/../../../functions/function.php";


if (isset($_POST['name'])) {

    $id = $_POST['id'];

    $name = $_POST['name'];
    validateEmpty($name, "name", "error in name ", getpage("news/create.php"));

    $image = $_POST['image'];
    validateEmpty($image, "image", "error in image ", getpage("news/create.php"));

    $date = $_POST['date'];
    validateEmpty($date, "date", "error in date ", getpage("news/create.php"));

    $title = $_POST['title'];
    validateEmpty($title, "title", "error in title ", getpage("news/create.php"));
    
    $description = $_POST['description'];
    validateEmpty($description, "description", "error in description ", getpage("news/create.php"));

    $data = array(
        "name" => $name,
        "image" => $image,
        "date" => $date,
        "title" => $title,
        "description" => $description,
    );


    $result =  updata($conn, "news", $data, $id);


    if ($result) {
        addSuccessToSession("db", "تم التعديل بنجاح");
    } else {
        addErrorsToSession("db", "there was an error sorry ");
    }

    redirect(getpage("news/index.php"));
} else {

    redirect(getpage("news/index.php"));
}
