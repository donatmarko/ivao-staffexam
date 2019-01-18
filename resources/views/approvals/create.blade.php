@extends("layouts.app")

@section("content")
	<div class="columns">
		<h1 class="title">New approval</h1>
	</div>	
	
	{{Form::open(["action" => "ApprovalsController@store", "method" => "POST"])}}
		<div class="columns">
			<div class="column">
				<div class="field">
					{{Form::label("exam_nr", "Exam number", ["class" => "label"])}}
					<div class="control">
						{{Form::number("exam_nr", "", ["required" => true, "class" => "input", "placeholder" => "exam number", "min" => 100000, "max" => 999999])}}
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					{{Form::label("requestdate", "Date of request", ["class" => "label"])}}
					<div class="control">
						{{Form::date("requestdate", date("Y-m-d"), ["required" => true, "class" => "input"])}}
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					{{Form::label("examdate", "Date/time of exam", ["class" => "label"])}}
					<div class="control">
						{{Form::text("examdate", "", ["required" => true, "class" => "input"])}}
					</div>
				</div>
			</div>
			<div class="column">
				{{Form::label("division", "Division", ["class" => "label"])}}
				<div class="control">
					{{Form::text("division", "", ["required" => true, "class" => "input", "maxlength" => 2, "minlength" => 2, "placeholder" => "e.g. HU"])}}
				</div>
			</div>
			<div class="column">
				{{Form::label("location", "Location", ["class" => "label"])}}
				<div class="control">
					{{Form::text("location", "", ["required" => true, "class" => "input", "placeholder" => "e.g. LHBP_E_APP"])}}
				</div>
			</div>
			<div class="column">
				<div class="field">
					{{Form::label("rating", "Target rating", ["class" => "label"])}}
					<div class="select">
						{{Form::select("rating", $ratings, ["required" => true])}}
					</div>
				</div>
			</div>
		</div>

		<div class="columns">
			<div class="column">
				{{Form::label("examinee_vid", "Applicant VID", ["class" => "label"])}}
				<div class="control">
					{{Form::text("examinee_vid", "", ["required" => true, "class" => "input", "maxlength" => 6, "minlength" => 6])}}
				</div>
			</div>
			<div class="column">
				{{Form::label("examiner_staff", "Examiner staff", ["class" => "label"])}}
				<div class="control">
					{{Form::text("examiner_staff", "", ["required" => true, "class" => "input", "placeholder" => "e.g. HU-TC"])}}
				</div>
			</div>
			<div class="column">
				{{Form::label("examiner_vid", "Examiner VID", ["class" => "label"])}}
				<div class="control">
					{{Form::text("examiner_vid", "", ["required" => true, "class" => "input", "maxlength" => 6, "minlength" => 6])}}
				</div>
			</div>
			<div class="column">
				{{Form::label("observer_staff", "Observer staff", ["class" => "label"])}}
				<div class="control">
					{{Form::text("observer_staff", "", ["required" => true, "class" => "input", "placeholder" => "e.g. HU-DIR"])}}
				</div>
			</div>
			<div class="column">
				{{Form::label("observer_vid", "Observer VID", ["class" => "label"])}}
				<div class="control">
					{{Form::text("observer_vid", "", ["required" => true, "class" => "input", "maxlength" => 6, "minlength" => 6])}}
				</div>
			</div>
			<div class="column">
				{{Form::label("issuer_staff", "Approval issued by", ["class" => "label"])}}
				<div class="control">
					{{Form::text("issuer_staff", Auth::user()->staff, ["required" => true, "class" => "input", "placeholder" => "e.g. SRTA14"])}}
				</div>
			</div>
		</div>

		{{Form::submit("Create approval", ["class" => "button is-primary"])}}
	{{Form::close()}}
@endsection