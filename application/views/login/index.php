<!--
/**
 * Created by PhpStorm.
 * User: piotrbaran
 * Date: 01/03/2015
 * Time: 10:00
 */
-->

<div class="jumbotron">
    <form  method="post" action="<?php echo BASE_URL ?>/login/validate" >

        <?php if ($message !== ""): ?>
            <p class="lead"><?php echo $message ?></p>
        <?php endif?>

        <p>
            <label for="username" class="text-muted">Username</label>
            <input type="text" id="username" name="username"/>
        </p>
        <p>
            <label for="password" class="text-muted">Password</label>
            <input type="password" id="password" name="password"/>
        </p>
        <p>
            <input type="submit" value="Login"/>
        </p>

    </form>
</div>