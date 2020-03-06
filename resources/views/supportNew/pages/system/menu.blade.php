@include('support.pages.dashboard.inc.doctype')
		<div class="container">
			<div class="row">
				<div class="col col-xl-7 col-lg-7 col-md-6 col-sm-6 col-12">
				<form class="mb60" id ="menu">
					<div class="crumina-module crumina-heading with-title-decoration">
						<h5 class="heading-title">Menu</h5>
					</div>
					<div class="row">
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating">
								<label class="control-label">Name</label>
								<input class="form-control" type="text" name="name">
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating">
								<label class="control-label">Route</label>
								<input class="form-control" id="route" name="route">
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating">
								<label class="control-label">Seq</label>
								<input class="form-control" id="seq" name="seq">
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating">
								<label class="control-label">Is active?</label>
								<input class="form-control" id="is_active" name="is_active">
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating">
								<label class="control-label">Is deleted?</label>
								<input class="form-control" id="is_deleted" name="is_deleted">
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating">
								<label class="control-label">userc_date</label>
								<input class="form-control" id="userc_date" name="userc_date">
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating">
								<label class="control-label">useru_date</label>
								<input class="form-control" id="useru_date" name="useru_date">
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating">
								<label class="control-label">userc_time</label>
								<input class="form-control" id="userc_time" name="userc_time">
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating">
								<label class="control-label">useru_time</label>
								<input class="form-control" id="useru_time" name="useru_time">
						</div>
						<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="form-group label-floating">
								<label class="control-label">co_no</label>
								<input class="form-control" id="co_no" name="co_no">
						</div>
				</form>
			</div>
		</div>
	</div>
@include('support.pages.dashboard.inc.footer')