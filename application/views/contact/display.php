<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Grandlord</title>
        <meta name="description" content="Rate Your Landlord">
        <meta name="author" content="CIT">

        <link rel="stylesheet" href="<?php echo BASE_URL ?>/public/css/styles.css">
        <link rel="stylesheet" href="<?php echo BASE_URL ?>/public/css/bootstrap.css">
    </head>

    <body>

        <div id="main" class="row-fluid">

            <div class="well">
                <h4>Display Contacts</h4>
            </div>

            <?php if (!count($contacts)): ?>

                <div class="alert alert-warning">
                    <h2>No contacts found.</h2>
                </div>

            <?php else: ?>

                <table class="table table-bordered table-responsive table-striped">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date Of Birth</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($contacts as $contact): ?>

                        <tr>
                            <td><?php echo $contact['firstName'] ?></td>
                            <td><?php echo $contact['lastName'] ?></td>
                            <td><?php echo $contact['birthday'] ?></td>
                        </tr>

                    <?php endforeach ?>

                    </tbody>
                </table>

            <?php endif ?>
        </div>


        <script src="js/scripts.js"></script>
    </body>
</html>
