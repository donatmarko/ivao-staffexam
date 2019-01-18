@extends("layouts.app")

@section("content")
	<div class="columns">
		<h1 class="title">Edit approval</h1>
	</div>	
	
	{{Form::open(["action" => ["ApprovalsController@update", $a->id], "method" => "PUT"])}}
		<div class="columns">
			<div class="column">
				<div class="field">
					{{Form::label("exam_nr", "Exam number", ["class" => "label"])}}
					<div class="control">
						{{Form::number("exam_nr", $a->exam_nr, ["required" => true, "class" => "input", "placeholder" => "exam number", "min" => 100000, "max" => 999999])}}
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					{{Form::label("requestdate", "Date of request", ["class" => "label"])}}
					<div class="control">
						{{Form::date("requestdate", $a->requestdate, ["required" => true, "class" => "input"])}}
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					{{Form::label("examdate", "Date/time of exam", ["class" => "label"])}}
					<div class="control">
						{{Form::text("examdate", $a->examdate, ["required" => true, "class" => "input"])}}
					</div>
				</div>
			</div>
			<div class="column">
				{{Form::label("division", "Division", ["class" => "label"])}}
				<div class="control">
					{{Form::text("division", $a->division, ["required" => true, "class" => "input", "maxlength" => 2, "minlength" => 2, "placeholder" => "e.g. HU"])}}
				</div>
			</div>
			<div class="column">
				{{Form::label("location", "Location", ["class" => "label"])}}
				<div class="control">
					{{Form::text("location", $a->location, ["required" => true, "class" => "input", "placeholder" => "e.g. LHBP_E_APP"])}}
				</div>
			</div>
			<div class="column">
				<div class="field">
					{{Form::label("rating", "Target rating", ["class" => "label"])}}
					<div class="select">
						{{Form::select("rating", $ratings, $a->rating, ["required" => true])}}
					</div>
				</div>
			</div>
		</div>

		<div class="columns">
			<div class="column">
				{{Form::label("examinee_vid", "Applicant VID", ["class" => "label"])}}
				<div class="control">
					{{Form::text("examinee_vid", $a->examinee_vid, ["required" => true, "class" => "input", "maxlength" => 6, "minlength" => 6])}}
				</div>
			</div>
			<div class="column">
				{{Form::label("examiner_staff", "Examiner staff", ["class" => "label"])}}
				<div class="control">
					{{Form::text("examiner_staff", $a->examiner_staff, ["required" => true, "class" => "input", "placeholder" => "e.g. HU-TC"])}}
				</div>
			</div>
			<div class="column">
				{{Form::label("examiner_vid", "Examiner VID", ["class" => "label"])}}
				<div class="control">
					{{Form::text("examiner_vid", $a->examiner_vid, ["required" => true, "class" => "input", "maxlength" => 6, "minlength" => 6])}}
				</div>
			</div>
			<div class="column">
				{{Form::label("observer_staff", "Observer staff", ["class" => "label"])}}
				<div class="control">
					{{Form::text("observer_staff", $a->observer_staff, ["required" => true, "class" => "input", "placeholder" => "e.g. HU-DIR"])}}
				</div>
			</div>
			<div class="column">
				{{Form::label("observer_vid", "Observer VID", ["class" => "label"])}}
				<div class="control">
					{{Form::text("observer_vid", $a->observer_vid, ["required" => true, "class" => "input", "maxlength" => 6, "minlength" => 6])}}
				</div>
			</div>
			<div class="column">
				{{Form::label("issuer_staff", "Approval issued by", ["class" => "label"])}}
				<div class="control">
					{{Form::text("issuer_staff", $a->issuer_staff, ["required" => true, "class" => "input", "placeholder" => "e.g. SRTA14"])}}
				</div>
			</div>
		</div>

		<div class="notification is-warning">
			<p>Be advised, that the ID part not, but the rest of the approval number will be <strong>regenerated</strong> with the newly supplied data!</p>
		</div>

		{{Form::submit("Modify approval", ["class" => "button is-primary"])}}
		<button class="button is-danger" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this staff exam approval?')) { document.getElementById('delete-form').submit(); }">Delete</button>
	{{Form::close()}}

	{{Form::open(["action" => ["ApprovalsController@destroy", $a->id], "method" => "DELETE", "id" => "delete-form"])}}
	{{Form::close()}}
@endsection