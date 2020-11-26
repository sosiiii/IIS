<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;
use \Spatie\Searchable\Search;

class GroupsSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $results = (new Search())->registerModel(Group::class, ['name'])->search($request->input('query'));

        return response()->json($results);
    }
}
