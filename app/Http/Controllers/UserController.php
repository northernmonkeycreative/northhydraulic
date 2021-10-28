<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Admin - User Controller
|--------------------------------------------------------------------------
|
| This is the user controller.
| This controller helps display and manage your application users. 
|
*/

class UserController extends Controller
{
    // Show all users screen
    public function index()
    {
        $users = User::withTrashed()->orderBy('id', 'desc')->paginate(25);
        return view('users.index', compact('users'));
    }

    // Show Selected User Screen
    public function show($user)
    {
        $theuser = User::where('id', $user)->firstOrFail();
        return view('users.show', compact('theuser'));
    }

    // Create New User Screen
    public function create()
    {
        return view('users.create');
    }

    // Save User
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:users'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);

        return redirect('users')->withSuccess('New User has been Created');
    }




    // Update User
    public function update(Request $request, $user)
    {
        // Find the user to update
        $theuser = User::where('id', $user)->firstOrFail();

        // Validate the fields
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user,
            'phone'=> 'min:10|nullable',
            'device_id'=> 'nullable',
        ]);
        
        
        // Handle the data
        $theuser->name = $request->name;
        $theuser->email = $request->email;
        if ($request->is_admin) {
            $theuser->is_admin = 1;
        } else {
            $theuser->is_admin = 0;
        }
        $theuser->phone = $request->phone;
        $theuser->device_id = $request->device_id;

        // if updating password
        if ($request->password) {
            $validatedData = $request->validate([
                'password' => 'min:5',
            ]);
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        

        // Update the user
        $theuser->update($validatedData);

        return back()->withSuccess('This User has been Updated');
    }

    

    // Delete User (soft deletes)
    public function destroy(User $user)
    {
        if($user->isAdmin() || auth()->user()->id == $user->id){
            return abort(401);
        }

        // Un-Assign All Jobs belonging to Engineer
        $jobs = Job::where('engineer_id', $user->id)->get();
        if($jobs) {
            foreach($jobs as $job) {
                $job->status = 'unassinged';
                $job->title = 'unassinged';
                $job->engineer_name = null;
                $job->engineer_id = null;
                $job->save();
            }
        }

        $user->delete();

        return back()->withSuccess($user->name . ' has been deactivated');

    }

    // Restore User
    public function restore($user_id)
    {
        $user = User::withTrashed()->where('id', $user_id)->firstOrFail();

        $user->restore();

        return back()->withSuccess($user->name . ' has been restored successfully');

    }



    

}
