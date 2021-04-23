<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:api']);
        $this->middleware('roles:admin');
        // $this->middleware(['middleware' => 'api', 'prefix' => 'admin']);

    }

    // ****** ADMIN Section *******

    //SHOW*****
    public function showAllAdminsManagersUsers()
    {

        $data = User::all();
        return response($data, 200);

    }

    public function showAllAdmins()
    {
        $admins = User::IsAdmin()->get();
        return $admins;

    }

    public function showAllManagers()
    {

        $managers = User::IsManager()->get();
        return $managers;

    }

    public function showAllUsers()
    {

        $users = User::IsUser()->get();
        return $users;

    }
    //END SHOW****

    //Create_Update_Delete_Admin ****
    public function createAdmin(Request $request)
    {
        // $user = auth()->user();
        // $user->assignRole('admin');
        // return 'done';

        $this->validate($request, [
            'name' => 'required',
            'last_name' => 'required',
            'registration_number' => 'required',
            'profession' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',

        ]);

        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'registration_number' => $request->registration_number,
            'profession' => $request->profession,
            'email' => $request->email,
            'password' => bcrypt($request['password']),

        ]);

        $user->assignRole('admin');
        return 'Admin created successfully';

    }

    public function updateAdmin(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'registration_number' => 'required',
            'profession' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',

        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json([
            'success' => true, 'data' => 'Admin updated successfully', $user,
        ]);

    }

    public function destroyAdmin(User $user, $id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return response()->json([
            'success' => true, 'data' => 'Admin deleted successfully',
        ]);

    }
    //END Create_Update_Delete_Admin****

//Create_Update_Delete_MANAGER ****
    public function createManager(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'last_name' => 'required',
            'registration_number' => 'required',
            'profession' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',

        ]);

        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'registration_number' => $request->registration_number,
            'profession' => $request->profession,
            'email' => $request->email,
            'password' => bcrypt($request['password']),

        ]);

        $user->assignRole('manager');
        return 'Manager created successfully';

    }

    public function updateManager(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'registration_number' => 'required',
            'profession' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',

        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json([
            'success' => true, 'data' => 'Manager updated successfully', $user,
        ]);

    }

    public function destroyManager(User $user, $id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return response()->json([
            'success' => true, 'data' => 'Manager deleted successfully',
        ]);

    }
    //END Create_Update_Delete_MANAGER****



//Create_Update_Delete_User ****
    public function createUser(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'last_name' => 'required',
            'registration_number' => 'required',
            'profession' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',

        ]);

        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'registration_number' => $request->registration_number,
            'profession' => $request->profession,
            'email' => $request->email,
            'password' => bcrypt($request['password']),

        ]);

        $user->assignRole('user');
        return 'User created successfully';

    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'registration_number' => 'required',
            'profession' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',

        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json([
            'success' => true, 'data' => 'User updated successfully', $user,
        ]);

    }

    public function destroyUser(User $user, $id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return response()->json([
            'success' => true, 'data' => 'User deleted successfully',
        ]);

    }
    //END Create_Update_Delete_USER****




    
    // ASSIGN
    public function removeAdminAssignManager(Request $request, User $user)
    {

        $user->removeRole('admin');
        $user->assignRole('manager');

    }

    public function removeAdminAssignUser(Request $request, User $user)
    {

        $user->removeRole('admin');
        $user->assignRole('user');

    }

    public function removeManagerAssignAdmin(Request $request, User $user)
    {

        $user->removeRole('manager');
        $user->assignRole('admin');

    }

    public function removeManagerAssignUser(Request $request, User $user)
    {

        $user->removeRole('manager');
        $user->assignRole('user');

    }

    public function removeUserAssignAdmin(Request $request, User $user)
    {

        $user->removeRole('user');
        $user->assignRole('admin');

    }

    public function removeUserAssignManager(Request $request, User $user)
    {

        $user->removeRole('user');
        $user->assignRole('manager');

    }

    //END of ASSIGN*****

    // ****** END of ADMIN Section ***************

    // ****** MANAGER Section *******
    // ****** END of MANAGER Section ***************

    // public function removeAdminAssignManager(Request $request)
    // {

    //     $users = User::where('id', '!=', 1, )->get();

    //     foreach ($users as $user) {

    //         $user->removeRole('admin');
    //         $user->assignRole('manager');

    //     }
    //     return 'done';

    // }
}