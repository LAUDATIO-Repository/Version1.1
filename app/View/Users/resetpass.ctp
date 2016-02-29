<div class="users">
    <?php
        echo 'Your temporary password is <strong>' . $tempPass . '</strong>.<br>';
        echo 'Please ';
        echo $this->Html->link('log in', array('action' => 'edit', $uid));
        echo ' and change it right now.';
    ?>
</div>