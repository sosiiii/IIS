<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\Group;
use Illuminate\Http\Request;

class MembershipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $member = $group->members()->find(auth()->user()->id);
        if($member)
        {
            if(strcmp($member->pivot->role, 'member_request') == 0)
            {
                auth()->user()->groups()->toggle($group);
                return 'not_in_table';
            }
            else
            {
                auth()->user()->groups()->toggle($group);
                return 'member';
            }
        }
        else
        {
            $group->members()->attach(auth()->user()->id, ['role' => 'member_request']);
            return 'member_request';
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membership $membership)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
        //
    }
}
