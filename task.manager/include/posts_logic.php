<?php

$messages = getMessages($_SESSION['login']);

if ($messages) {
    $sections = getSections($_SESSION['userId']);
    $sectionsTree = createTree($sections);
    echo renderTemplate(['sectionsTree'=>$sectionsTree], ['messages'=>$messages]);
}
?>

<form>
    <a href="/posts/add/">Написать сообщение</a>
</form>
