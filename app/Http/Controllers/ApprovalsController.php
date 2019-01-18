<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Approval;

class ApprovalsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public $ratings = [
        "ATC" => ["ADC" => "ADC", "APC" => "APC", "ACC" => "ACC", "SEC" => "SEC"],
        "Pilot" => ["PP" => "PP", "SPP" => "SPP", "CP" => "CP", "ATP" => "ATP"]
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $as = Approval::orderBy("created_at", "desc")->paginate(20);
        
        return view("approvals.index")->with([
            "approvals" => $as,
            "ratings" => $this->ratings
        ]);
    }

    public function create()
    {
        return view("approvals.create")->with("ratings", $this->ratings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "exam_nr" => "required",
            "examiner_vid" => "required",
            "examiner_staff" => "required",
            "observer_vid" => "required",
            "observer_staff" => "required",
            "examinee_vid" => "required",
            "rating" => "required",
            "division" => "required",
            "requestdate" => "required",
            "issuer_staff" => "required"
        ]);

        $a = new Approval();
        $a->exam_nr = $request->input("exam_nr");
        $a->examiner_vid = $request->input("examiner_vid");
        $a->examiner_staff = strtoupper($request->input("examiner_staff"));
        $a->observer_vid = $request->input("observer_vid");
        $a->observer_staff = strtoupper($request->input("observer_staff"));
        $a->examinee_vid = $request->input("examinee_vid");
        $a->issuer_staff = strtoupper($request->input("issuer_staff"));
        $a->rating = $request->input("rating");
        $a->division = strtoupper($request->input("division"));
        $a->location = strtoupper($request->input("location"));
        $a->requestdate = $request->input("requestdate");
        $a->examdate = $request->input("examdate");
        $a->nr = $this->getNextRandomNumber();
        $a->approval_nr = $a->exam_nr . "/" . $a->rating . "/" . $a->division . "/" . $a->issuer_staff . "-" . sprintf('%02d', $a->nr) . "/OBS-" . $a->observer_staff;
        $a->save();

        return redirect("/approvals")->with("success", "New staff exam approval created. Approval number: " . $a->approval_nr);
    }

    /**
     * Returns the next possible approval number. If no approvals added, returns 1.
     *
     * @return Integer
     * @author Donat Marko
     */
    protected function getNextNumber()
    {
        $nr = Approval::all()->max("nr");
        return ++$nr;
    }

    /**
     * Returns a random possible number for the next approval. Check whether number is already used or not.
     *
     * @return Integer
     * @author Donat Marko
     */
    protected function getNextRandomNumber()
    {
        $existings = Approval::all()->pluck('nr')->toArray();
        
        $nr = 0;
        do
        {
            $nr = rand(1, 99);
        } while (in_array($nr, $existings));

        return $nr;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $a = Approval::find($id);
        return view("approvals.edit")->with(["a" => $a, "ratings" => $this->ratings]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "exam_nr" => "required",
            "examiner_vid" => "required",
            "examiner_staff" => "required",
            "observer_vid" => "required",
            "observer_staff" => "required",
            "examinee_vid" => "required",
            "issuer_staff" => "required",
            "rating" => "required",
            "division" => "required",
            "requestdate" => "required",
            "examdate" => "required"
        ]);

        $a = Approval::find($id);
        $a->exam_nr = $request->input("exam_nr");
        $a->examiner_vid = $request->input("examiner_vid");
        $a->examiner_staff = strtoupper($request->input("examiner_staff"));
        $a->observer_vid = $request->input("observer_vid");
        $a->observer_staff = strtoupper($request->input("observer_staff"));
        $a->examinee_vid = $request->input("examinee_vid");
        $a->issuer_staff = strtoupper($request->input("issuer_staff"));
        $a->rating = $request->input("rating");
        $a->division = strtoupper($request->input("division"));
        $a->location = strtoupper($request->input("location"));
        $a->requestdate = $request->input("requestdate");
        $a->examdate = $request->input("examdate");
        $a->approval_nr = $a->exam_nr . "/" . $a->rating . "/" . $a->division . "/" . $a->issuer_staff . "-" . sprintf('%02d', $a->nr) . "/OBS-" . $a->observer_staff;
        $a->save();

        return redirect("/approvals")->with("success", "Staff exam approval modified. New approval number: " . $a->approval_nr);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = Approval::find($id);
        $a->delete();

        return redirect("/approvals")->with("success", "Staff exam approval removed");
    }
}
