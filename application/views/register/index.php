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

            <p>
                <label for="username" class="text-muted">Username</label>
                <input type="text" id="username" name="username"/>
            </p>
            <p>
                <label for="password" class="text-muted">Password</label>
                <input type="password" id="password" name="password"/>
            </p>


        <?php if (!count($user)): ?>
            <p>
                <label for="email" class="text-muted">Email</label>
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
            <p>
                <label for="roleId" class="text-muted">Account</label>
                <select id="roleId" name="roleId">
                    <option value="1">Tenant</option>
                    <option value="2">Landlord</option>
                </select>
            </p>

        <?php else: ?>

            <p>
                <label for="email" class="text-muted">Email</label>
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
            <p>
                <label for="roleId" class="text-muted">Account</label>
                <select id="roleId" name="roleId">
                    <?php if ($user->getRoleId() == 1): ?>
                        <option value="1" selected="selected">Tenant</option>
                        <option value="2">Landlord</option>
                    <?php elseif ($user->getRoleId() == 2): ?>
                        <option value="1">Tenant</option>
                        <option value="2" selected="selected">Landlord</option>
                    <?php else: ?>
                        <option value="1">Tenant</option>
                        <option value="2">Landlord</option>
                    <?php endif ?>
                </select>
            </p>

        <?php endif ?>

            <p>
                <input type="submit" value="Register"/>
            </p>




    </form>
</div>
