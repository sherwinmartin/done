<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncidentRequest;
use App\Incident;
use App\IncidentType;
use App\User;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin,owner,manager');
    }

    /**
     * Display records.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = [
            'page_title'        => 'Incidents',
            'navi_group'        => 'incidents',
            'navi_submenu'      => 'incidents.index',
            'incident_types'    => IncidentType::whereHas('incidents')
                                    ->orderBy('name')
                                    ->pluck('name', 'id')
                                    ->all(),
            'incidents'         => Incident::search($request)
                                    ->orderBy('incident_date', 'DESC')
                                    ->paginate(),
            'users'             => User::whereHas('incidents')
                                    ->orderBy('last_name')
                                    ->get()
                                    ->pluck('full_name', 'id')
                                    ->all()
        ];

        return view('incidents.index', $data);
    }

    /**
     * Edit record.
     * @param Incident $incident
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Incident $incident)
    {
        $data = [
            'page_title'        => 'Edit Incident',
            'navi_group'        => 'incidents',
            'navi_submenu'      => 'incidents.edit',
            'incident'          => $incident,
            'incident_types'    => IncidentType::orderBy('name')
                                    ->pluck('name', 'id')
                                    ->all(),
            'users'             => User::orderBy('last_name')
                                    ->get()
                                    ->pluck('full_name', 'id')
                                    ->all()
        ];

        return view('incidents.edit', $data);
    }

    /**
     * Update record.
     * @param IncidentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(IncidentRequest $request)
    {
        if (Incident::updateRecord($request))
        {
            return back()->with('success', 'Incident updated.');
        }

        return back()->withInput()->with('error', 'Incident failed to be updated.');
    }

    /**
     * Delete record.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        if (Incident::deleteRecord($request))
        {
            return redirect()->route('incidents.index')->with('success', 'Incident deleted.');
        }

        return back()->with('error', 'Incident failed to be deleted.');
    }
}
