<?php

namespace App\Http\Controllers;

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
}
