<?php $newTenancyInfo = !count($tenancies) ? 'Your first' : 'New'; ?>

<br/>
<a href="<?php echo BASE_URL ?>/tenancy/add">Add <?php echo $newTenancyInfo; ?> Tenancy</a>

<?php if (count($tenancies)): ?>

    <table>
        <thead>
        <?php foreach ($tenancies as $tenancy): ?>
            <tr>
                <th>Id</th>
                <th>From</th>
                <th>To</th>
                <th>AvgRate</th>
            </tr>
        <?php endforeach ?>
        </thead>
        <tbody>
            <?php foreach ($tenancies as $tenancy): ?>
                <tr>
                    <td>Id</td>
                    <td>From</td>
                    <td>To</td>
                    <td>AvgRate</td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

<?php endif ?>
