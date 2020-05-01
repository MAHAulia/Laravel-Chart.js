<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Graphs;

class ExampleController extends Controller
{
    //

    public function data() {
        $label = [];
        $Newlabel = [];
        $dataGraph = [];
        $NewdataGraph = [];

        $graphs = Graphs::all();

        foreach ($graphs as $row) {
            $label[] = $row->labels;
            $dataGraph[] = $row->data;
        }

        $Newlabel = "'" . implode("','", $label) . "'";
        $NewdataGraph = implode(',', $dataGraph);
        
        $data = array(
            'label' => $Newlabel,
            'data'  => $NewdataGraph
        );

        return view('fromData', $data);
    }

    public function javascript() {
        return view('fromJs');
    }

    public function getData()
    {
        $graph = Graphs::all();

        return response()->json([
            'data' => $graph
        ]);
    }
}
