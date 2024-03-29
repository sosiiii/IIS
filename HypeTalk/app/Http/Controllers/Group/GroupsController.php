<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GroupsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Group::class, 'group');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = auth()->user()->groups()->wherePivot('role', '=', 'admin', 'or')->get();
        return view('group.index')->with('groups', $groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => ''
        ]);
        $group = auth()->user()->groups()->create($data);
        $member = $group->members()->find(auth()->user()->id);
        $member->pivot->role = 'admin';
        $member->pivot->save();
        return redirect(route('group.show', $group));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $role = 'not_in_table';
        if(auth()->check())
        {
            $member = $group->members()->find(auth()->user()->id);
            $role = 'not_in_table';
            if($member != null)
            {
                $role = $member->pivot->role;
            }
        }
        $posts = $group->posts->sortByDesc('rating');
        return view('group.show')->with([
            'group' => $group,
            'posts' => $posts,
            'role' => $role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('group.edit')->with('group', $group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $group->name = $request->name;
        $group->description = $request->description;
        $group->visibility = $request->visibility;
        $group->save();

        return redirect()->route('group.show', $group);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {

    }
}
