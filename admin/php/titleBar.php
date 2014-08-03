<section id="titlebar" class="row">
	
	<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>
    
	<div class="col-md-4">
		<div class="input-group">
		    <input type="text" class="form-control" placeholder="Search">
		    <span class="input-group-btn">
		    	<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
		    </span>
	    </div><!-- /input-group -->
    </div> <!-- Search Bar Div end -->
	<div class="pull-left">
	  	<button class="btn btn-default" data-toggle="modal" data-target="#searchFilter">Filter Search</button>
		<div class="modal fade" id="searchFilter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3>Apply Search Filters</h3>
					</div>
					<div class="modal-body">
						<div class="searchFilters">
							<label for="gendre">Gendre</label>
							<select name="gendre" id="gendreDropDown">
								<option value="male">Male</option>
			  					<option value="female">Female</option>
			  					<option value="Other">Other</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary">Search with Filters</button>
						<button class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-inbox"></span> Messages</button>
	</div>
	<div class="pull-right" ng-controller = "UserController">
		<span class="logout-msg">Hello <em><strong>{{user.fname}} {{user.lname}}</strong></em></span>
		<button class="btn btn-danger">Sign Out</button>
	</div>
	<div class="clearfix"></div>
</section>