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
        $this->middleware('roles:admin'); // ->except('show');

        // $this->middleware('roles:manager')->only('show');

    }

    public function index(Request $request)
    {

        $data = User::filter($request->all())->get();
        return response($data, 200);

    }

    // ****** ADMIN Section *******
    //Count****
    public function myAllAdminsManagersUsersNumbers()
    {

        $data = User::all()->count();
        return response($data, 200);

    }
    public function myAdminsNumbers()
    {
        $admins = User::IsAdmin()->get()->count();
        return $admins;

    }
    public function myManagersNumbers()
    {

        $managers = User::IsManager()->get()->count();
        return $managers;

    }
    public function myUsersNumbers()
    {

        $users = User::IsUser()->get()->count();
        return $users;

    }

    //END of Count
    //SHOW*****

    public function show($id)
    {
        return auth()->user();
        $anyUser = User::findOrFail($id);
        return $anyUser;
    }

    public function showAllAdminsManagersUsers()
    {

        $data = User::all();
        return response($data, 200);

    }

    public function showAllAdmins(Request $request)
    {
        $data = User::IsAdmin()->filter($request->all())->get();

        return $data;

    }

    public function showAllManagers(Request $request)
    {

        $data = User::IsManager()->filter($request->all())->get();

        return $data;

    }

    public function showAllUsers(Request $request)
    {

        $data = User::IsUser()->filter($request->all())->get();

        return $data;

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
        // return 'Admin created successfully';
        return response()->json([
            'success' => true, 'data' => 'Admin created successfully.', $user,
        ]);

    }

    public function updateAdmin(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'registration_number' => 'required',
            'profession' => 'required',
            'email' => 'email',

        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
        if ($request->password) {
            $user->update([
                'password' => bcrypt($request['password']),

            ]);
        }

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
        // return 'Manager created successfully';
        return response()->json([
            'success' => true, 'data' => 'Manager created successfully.', $user,
        ]);

    }

    public function updateManager(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'registration_number' => 'required',
            'profession' => 'required',
            'email' => 'email',

        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
        if ($request->password) {
            $user->update([
                'password' => bcrypt($request['password']),

            ]);
        }
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
        // return response()->json([
        //     'success' => true, 'data' => 'User created successfully.', $user,
        // ]);

    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'registration_number' => 'required',
            'profession' => 'required',
            'email' => 'email',

        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
        if ($request->password) {
            $user->update([
                'password' => bcrypt($request['password']),

            ]);
        }

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