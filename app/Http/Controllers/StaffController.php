<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::with('user')->get(); // recupere tous les staff avec leurs utilisateur
        return view('staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'firstname' => 'required|string|min:3',
            'lastname' => 'required|string|min:3',
            'gender' => 'required',
            'phone' => 'required|string|max:30|unique:users,phone',
            'birth_date' => 'required|date',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        // $user = User::create([
        //     'firstname' => $validated['firstname'],
        //     'lastname' => $validated['lastname'],
        //     'gender' => $validated['gender'],
        //     'phone' => $validated['phone'],
        //     'birth_day' => $validated['birth_date'],
        //     'email' => $validated['email'],
        //     'password' => $validated['password'],
        // ]);

        // Staff::create([
        //     'user_id' => $user->id,
        // ]);

        DB::transaction(function () use ($validated) {
            $user = User::create([
                'firstname' => $validated['firstname'],
                'lastname' => $validated['lastname'],
                'gender' => $validated['gender'],
                'phone' => $validated['phone'],
                'birth_day' => $validated['birth_date'],
                'email' => $validated['email'],
                'password' => $validated['password'],
            ]);

            Staff::create([
                'user_id' => $user->id,
            ]);
        });


        return redirect()->route('admin.staff.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        return view('staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'min:3'],
            'lastname' => ['required', 'string', 'min:3'],
            'gender' => ['required'],
            'phone' => ['required', 'string', 'max:30', Rule::unique('users')->ignore($staff->user_id)],
            'birth_date' => ['required', 'date'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($staff->user_id)],
            'password' => ['required', 'min:8'],
        ]);

        DB::transaction(function () use($staff,$validated){
            $user = $staff->user; // recupere l'utilisateur associer au staff
            $user->update([
                'firstname' => $validated['firstname'],
                'lastname' => $validated['lastname'],
                'gender' => $validated['gender'],
                'phone' => $validated['phone'],
                'birth_day' => $validated['birth_date'],
                'email' => $validated['email'],
                'password' => $validated['password'],
            ]);
        });
        return redirect()->route('admin.staff.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('admin.staff.index');
    }
}
