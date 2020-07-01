<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncidentTypeRequest;
use App\IncidentType;
use Illuminate\Http\Request;

class IncidentTypeController extends Controller
{
    /**
     * Display records.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'page_title'            => 'Incident Types',
            'navi_group'            => 'incidentTypes',
            'navi_submenu'          => 'incidentTypes.index',
            'incident_types'        => IncidentType::orderBy('name')->get()
        ];

        return view('incident_types.index', $data);
    }

    /**
     * Display create form.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data = [
            'page_title'            => 'Create Incident Type',
            'navi_group'            => 'incidentTypes',
            'navi_submenu'          => 'incidentTypes.create',
            'incident_type'         => new IncidentType
        ];

        return view('incident_types.create',$data);
    }

    /**
     * Store record.
     * @param IncidentTypeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(IncidentTypeRequest $request)
    {
        if (IncidentType::storeRecord($request))
        {
            return back()->with('success', 'Incident type created.');
        }

        return back()->withInput()->with('error', 'Incident type failed to be created.');
    }

    /**
     * Edit record.
     * @param IncidentType $incidentType
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(IncidentType $incidentType)
    {
        $data = [
            'page_title'            => 'Edit Incident Type',
            'navi_group'            => 'incidentTypes',
            'navi_submenu'          => 'incidentTypes.edit',
            'incident_type'         => $incidentType,
            'has_incidents'         => IncidentType::where('id', $incidentType->id)
                                        ->has('incidents')
                                        ->count()
        ];

        return view('incident_types.edit', $data);
    }

    /**
     * Update record.
     * @param IncidentTypeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(IncidentTypeRequest $request)
    {
        if (IncidentType::updateRecord($request))
        {
            return back()->with('success', 'Incident type updated.');
        }

        return back()->withInput()->with('error', 'Incident type failed to be updated.');
    }

    /**
     * Delete record.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        if (IncidentType::deleteRecord($request))
        {
            return redirect()->route('incidentTypes.index')->with('success', 'Incident type deleted.');
        }

        return back()->with('error', 'Incident type failed to be deleted.');
    }
}
