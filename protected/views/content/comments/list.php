<?php if (count($comments) > 0):?>
    <?php foreach ($comments as $comment): ?>
        <div class="row">
            <?php echo $comment->text;?>
        </div>
    <?php endforeach;?>
<?php else:?>
    <div class="row">Не найдено</div>
<?php endif;?>