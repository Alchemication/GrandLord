<!--
/**
 * Created by PhpStorm.
 * User: piotrbaran
 * Date: 01/03/2015
 * Time: 10:00
 */
-->

<div class="jumbotron">
    <form method="post" action="<?php echo BASE_URL ?>/register/validate">

        <?php if ($message !== ""): ?>
            <p class="lead"><?php echo $message ?></p>
        <?php endif?>



        <?php if (!count($user)): ?>
            <p>
                <label for="username" class="text-muted">Username</label>
                <input type="text" id="username" name="username"/>
            </p>
            <p>
                <label for="password" class="text-muted">Password</label>
                <input type="password" id="password" name="password"/>
            </p>

            <p>
                <label for="email" class="text-muted">Your Email</label>
                <input type="email" id="email" name="email"/>
            </p>
            <p>
                <label for="firstName" class="text-muted">First Name</label>
                <input type="text" id="firstName" name="firstName"/>
            </p>
            <p>
                <label for="secondName" class="text-muted">Last Name</label>
                <input type="text" id="secondName" name="secondName"/>
            </p>


        <?php else: ?>
            <p>
                <label for="username" class="text-muted">Username</label>
                <input type="text" id="username" name="username" value="<?php echo $user->getUsername() ?>"/>
            </p>
            <p>
                <label for="password" class="text-muted">Password</label>
                <input type="password" id="password" name="password" value="<?php echo $user->getPassword() ?>"/>
            </p>

            <p>
                <label for="email" class="text-muted">Your Email</label>
                <input type="email" id="email" name="email" value="<?php echo $user->getEmail() ?>"/>
            </p>
            <p>
                <label for="firstName" class="text-muted">First Name</label>
                <input type="text" id="firstName" name="firstName" value="<?php echo $user->getFirstName() ?>"/>
            </p>
            <p>
                <label for="secondName" class="text-muted">Last Name</label>
                <input type="text" id="secondName" name="secondName" value="<?php echo $user->getSecondName() ?>"/>
            </p>


        <?php endif ?>

            <p>
                <input type="submit" value="Register"/>
            </p>




    </form>
</div>
