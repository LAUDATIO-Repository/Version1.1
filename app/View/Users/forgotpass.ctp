<?php
/**
 * Created by PhpStorm.
 * User: DZielke
 * Date: 16.10.14
 * Time: 22:49
 */

if(!isset($mailsent)): ?>
    <div class="users form">
       <?php echo $this->Form->create('User', array('action' => 'forgotpass')); ?>
        <fieldset>
            <legend><?php echo 'Forgot password'; ?></legend>
                <?php
                    echo $this->Form->input('email');
                ?>
        </fieldset>
        <?php echo $this->Form->end('Send me new password'); ?>
        </div>
    <?php endif; ?>