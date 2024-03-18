<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use Carbon\Carbon;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'ActivityController index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreActivityRequest $request)
    {
        //dd($request->id);
        return view('create_activity', ['project_id' => $request->id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request)
    {
        //dd($request);
        $data = $request->only(['title', 'description', 'priority', 'start_date', 'end_date', 'project_id']);
        $data['created_at'] = Carbon::now();

        Activity::create($data);
        return redirect('/projects/'.$request->project_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        return view('activity_detail', ['activity' => $activity]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //return $activity;
        return view('edit_activity', ['activity' => $activity]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        $activity['title'] = $request->title;
        $activity['description'] = $request->description;
        $activity['priority'] = $request->priority;
        $activity['start_date'] = $request->start_date;
        $activity['end_date'] = $request->end_date;
        $activity['updated_at'] = Carbon::now();

        $activity->update();
        return redirect('/projects/'.$request->project_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect('/projects/'.$activity->project_id);
    }
}
