<div class="<?= $divClass ?>">
        <ul class="<?= $ulClass ?>">
 
<?php

foreach ($menuSorted as $menuItem) {
        $isUnderlined = isCurrentUrl($menuItem['path']) ? 'class="active"' : '';
        $cutMenuName = trimStr($menuItem['title']);
?>

        <li><a href="<?= $menuItem['path'] ?>"<?= $isUnderlined ?>><?= $cutMenuName ?></a></li>

<?php
        }
?>

        </ul>
</div>
