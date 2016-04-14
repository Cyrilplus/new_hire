<?php

echo $_POST['new_hire_id'].'<br/>';
echo $_POST['new_hire_name'].'<br/>';
echo $_POST['manager_id'].'<br/>';
echo $_POST['manager_name'].'<br/>';
echo $_POST['new-hire'].'<br/>';
if (isset($_POST['new-hire'])) {
    echo 'get form';
}
