<h2>About/Index page!!!</h2>
<!--Comment-- Piotr Baran rev 3-->
<!--Comment-- Gregory Jokiel rev4 -->
<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($names as $name) { ?>
            <tr>

            <td> <?php echo $name['firstName'] ?> </td>
            <td> <?php echo $name['lastName'] ?> </td>

            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
