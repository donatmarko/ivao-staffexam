@extends("layouts.app")

@section("content")
<h1 class="title">Staff exam approvals list</h1>

@if(count($approvals) > 0)
<table class="table is-hoverable is-fullwidth">
	<tr>
		<th>Exam nr.</th>
		<th>Request date</th>
		<th>Exam date</th>
		<th>Rating</th>		
		<th>Examinator</th>
		<th>Observator</th>
		<th>Examinant</th>
		<th>Location</th>
		<th>Division</th>		
		<th>Approval number</th>
	</tr>
	@foreach($approvals as $approval)
	<tr>
		<td><a href="https://www.ivao.aero/training/exam/admin/examdet.asp?Id={{$approval->exam_nr}}" target="_blank">{{$approval->exam_nr}}</a></td>
		<td>{{$approval->requestdate}}</td>
		<td>{{$approval->examdate}}</td>
		<td>{{$approval->rating}}</td>		
		<td><a href="https://www.ivao.aero/Member.aspx?ID={{$approval->examiner_vid}}" target="_blank">{{$approval->examiner_staff}} {{$approval->examiner_vid}}</a></td>
		<td><a href="https://www.ivao.aero/Member.aspx?ID={{$approval->observer_vid}}" target="_blank">{{$approval->observer_staff}} {{$approval->observer_vid}}</a></td>
		<td><a href="https://www.ivao.aero/Member.aspx?ID={{$approval->examinee_vid}}" target="_blank">{{$approval->examinee_vid}}</a></td>
		<td>{{$approval->location}}</td>
		<td><a href="https://www.ivao.aero/divisions/division.asp?Id={{$approval->division}}" target="_blank">{{$approval->division}}</a></td>
		<td><a href="/approvals/{{$approval->id}}">{{$approval->approval_nr}}</a></td>
	</tr>
	@endforeach
</table>
{{$approvals->links()}}
@else
<p>No approvals found.</p>
@endif

@endsection