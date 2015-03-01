
<div class="jumbotron">

    <div class="form-group">
        <h2>Contact Us</h2>
    </div>

    <form class="form-horizontal">
        <div class="form-group">
            <label for="inputName3" class="col-sm-2 control-label">Your Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" placeholder="Name">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Your Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPhone3" class="col-sm-2 control-label">Your Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPhone3" placeholder="Phone Number">
            </div>
        </div>

        <div  class="form-group">
            <label for="inputQuery3" class="col-sm-2 control-label">Your Query</label>
            <div class="col-sm-10">
            <textarea class="form-control" rows="3"></textarea>
                </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>

<div class="well">
    <h4>Staff Members</h4>
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