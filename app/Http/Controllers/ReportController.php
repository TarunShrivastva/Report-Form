<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use DataTables;
use Facade\FlareClient\Http\Response;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.reports.reports');
    }

    /**
     * Display a listing of the resource via ajax.
     *
     * @return \Illuminate\Http\Response
     */
    public function reportList(Request $request)
    {
        $params = $request->only('name', 'email');
        $reports = Report::filter($params)->get();
        $reportCollection = new Collection();
        foreach ($reports as $key => $report) {
            $reportCollection->push([
                'id' => $key+1,
                'name'  => $report->name,
                'email' => $report->email,
                'company_name' => $report->company_name,
                'phone' => $report->phone_no,
                'country'=> $report->country,
                'details'=> $report->details,
            ]);
        }

        return Datatables::of($reportCollection)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.reports.create-report');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
        $report = new Report;

        $report->name = $request->name;
        $report->email = $request->email;
        $report->company_name = $request->company;
        $report->phone = $request->phone;
        $report->country = $request->country;
        $report->details = $request->details;
        $report->save();

        return response()->json(array('msg'=> 'Data Added Succeddfully'), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReportRequest  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
