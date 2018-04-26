<!--分割线-->
<div class="ln_solid"></div>


<!--form类别-->
<div class="x_panel">
    <div class="x_title">
        <h2>Form Design
            <small>different form elements</small>
        </h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                            class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br>

        <h4>Horizontal labels</h4>
        <p class="font-gray-dark">
            Using the grid system you can control the position of the labels. The form example below has the <b>col-md-10</b>
            which sets the width to 10/12 and <b>center-margin</b> which centers it.
        </p>
        <form class="form-horizontal form-label-left">
            <div class="form-group">
                <label class="control-label col-md-3" for="first-name">First Name <span class="required">*</span>
                </label>
                <div class="col-md-7">
                    <input id="first-name2" required="required" class="form-control col-md-7 col-xs-12" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3" for="last-name">Last Name <span class="required">*</span>
                </label>
                <div class="col-md-7">
                    <input id="last-name2" name="last-name" required="required" class="form-control col-md-7 col-xs-12"
                           type="text">
                </div>
            </div>
        </form>


        <h4>Vertical labels</h4>
        <p class="font-gray-dark">
            For making labels vertical you have two options, either use the apropiate grid <b>.col-</b> class or wrap
            the form in the <b>form-vertical</b> class.
        </p>
        <div class="col-md-8 center-margin">
            <form class="form-horizontal form-label-left">
                <div class="form-group">
                    <label>Email address</label>
                    <input class="form-control" placeholder="Enter email" type="email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" placeholder="Password" type="password">
                </div>

            </form>
        </div>

        <h4>Inline Form </h4>
        <p class="font-gray-dark">
            Add .form-inline to your form (which doesn't have to be a &lt;form&gt;) for left-aligned and inline-block
            controls.
        </p>
        <form class="form-inline">
            <div class="form-group">
                <label for="ex3">Email address</label>
                <input id="ex3" class="form-control" placeholder=" " type="text">
            </div>
            <div class="form-group">
                <label for="ex4">Email address</label>
                <input id="ex4" class="form-control" placeholder=" " type="email">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-default">Send invitation</button>
        </form>
    </div>
</div>

