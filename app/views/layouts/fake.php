<?php
    if (isset($_POST['edit-btn'])){
        foreach ($_POST as $key => $value) {
            echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
        }
    }
?>
<h1>Here is fake</h1>