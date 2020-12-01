<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class MembershipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->authorizeResource(Group::class, 'group');
    }
    public function index(Group $group)
    {
        $members = $group->members;

        return view('group.members.index')->with([
            'group' => $group,
            'members' => $members
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Group $group)
    {
        $group->members()->attach(auth()->user()->id, ['role' => 'member_request']);
        return redirect()->back();


    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group, User $member)
    {
        $member = $group->members()->find($member->id);
        return view('group.members.edit')->with([
            'group' => $group,
            'member' => $member
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group, User $member)
    {
        $member = $group->members()->find($member->id);

        $member->pivot->role = $request->role;
        $member->pivot->save();

        return redirect()->route('group.members.index', [$group, $member]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group, User $member)
    {
        $member->groups()->toggle($group);

        return redirect()->back();
    }
}
