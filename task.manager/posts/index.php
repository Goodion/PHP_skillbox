<?php
    
    if (! isset($_COOKIE['session_id']) && isset($_COOKIE['currentUser'])) {
        header('location: /?login=yes');
        exit;
    }
    
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
?>  
    
    <?php showBody($mainMenu); ?>
    </td>
    <td class="right-collum-index">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/authentication.php'; ?>
    </td>

<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
