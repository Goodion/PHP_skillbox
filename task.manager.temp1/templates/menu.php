<?php

$resultMenuString = '';

foreach($menuSorted as $menuItem) {

        $isUnderlined = isCurrentUrl($menuItem['path']) ? 'class="decoration-underlined"' : 'class="decoration-none"';

        $cutMenuName = trimStr($menuItem['title']);
                
        $resultMenuString .= '<li><a href="' . $menuItem['path'] . '" '. $isUnderlined .'>' . $cutMenuName . '</a></li>';
    }

?>

<div class="<?= $divClass ?>">
        <ul class="<?= $ulClass ?>">
        <?= $resultMenuString ?>
        </ul>
</div>