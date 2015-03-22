
<div class="jumbotron">

    <div class="form-group">
        <h2>Add Tenancy</h2>
    </div>

    <form class="form-horizontal">

        <div class="form-group">
            <label for="property" class="col-sm-2 control-label">Property</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="property" placeholder="Enter property address">
            </div>
        </div>

        <div class="form-group">
            <label for="from-to" class="col-sm-2 control-label">Time you stayed there</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="from-to" placeholder="Stayed there from/to">
            </div>
        </div>

        <div class="form-group">
            <h2>Rate Tenancy (1 poor, 5 excellent)</h2>
        </div>

        <div class="form-group">
            <label for="accessibility" class="col-sm-2 control-label">Landlord's Accessibility</label>
            <div class="col-sm-10">
                <input type="range" min="1" max="5" step="1" class="" id="accessibility">
            </div>
        </div>

        <div class="form-group">
            <label for="quality" class="col-sm-2 control-label">Flat Quality</label>
            <div class="col-sm-10">
                <input type="range" min="1" max="5" step="1" class="" id="quality">
            </div>
        </div>

        <div class="form-group">
            <label for="clean" class="col-sm-2 control-label">How Clean Place Was</label>
            <div class="col-sm-10">
                <input type="range" min="1" max="5" step="1" class="" id="clean">
            </div>
        </div>

        <div class="form-group">
            <h2>More info</h2>
        </div>

        <div  class="form-group">
            <label for="inputQuery3" class="col-sm-2 control-label">Comment</label>
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
</div>
