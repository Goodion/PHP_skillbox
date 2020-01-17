<ul style="margin-left:10px;">
 
    <?php foreach ($sectionsTree as $section) : ?>
        
        <li style="color: <?= $section['section_color'] ?>">
            <?= $section['section_caption'] ?>
        </li>

        <?php foreach ($messages as $key=>$message) : ?>
            <?php if ($message['section_id'] === $section['section_id']) : ?>
                <?php if ($message['is_read'] === '0') : ?>
                    <b><p>
                        <a href="/posts/message_read.php?message_id=<?= $message['message_id'] ?>&section=<?= $message['section_id'] ?>"> 
                            <?= $message['message_caption'] ?> 
                        </a>
                    </p></b>
                <?php else : ?>
                    <p>
                        <a href="/posts/message_read.php?message_id=<?= $message['message_id'] ?>&section=<?= $message['section_id'] ?>"> 
                            <?= $message['message_caption'] ?> 
                        </a>
                    </p>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php if (count($section['children']) > 0) : ?>
            <?= renderTemplate(['sectionsTree'=>$section['children']], ['messages'=>$messages]) ?>
        <?php  endif; ?>

    <?php endforeach; ?>

</ul>
