<div id="contactContact">
    <div class="form-group">
        <h2 class="pageTitle">Contact Us</h2>
    </div>

    <?php if ($message !== ""): ?>
        <p class="alert-warning"><?php echo $message ?></p>
    <?php endif?>

    <form class="form-horizontal"  method="post" action="<?php echo BASE_URL ?>/contact/validate">
        <div class="form-group">
            <label for="inputName3" class="col-sm-2 control-label">Your Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" placeholder="Name">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Your Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3"  name="inputEmail3" placeholder="Email">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPhone3" class="col-sm-2 control-label">Your Phone Number</label>
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

            <div class="col-sm-offset-2 col-sm-10"  >
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>

    </form>
</div>