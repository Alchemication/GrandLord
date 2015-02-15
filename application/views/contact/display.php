<h4>Display All Contacts</h4>

<?php if (!count($contacts)): ?>

    <h2>No contacts found.</h2>

<?php else: ?>

    <table>
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
