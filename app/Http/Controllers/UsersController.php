<?php

namespace App\Http\Controllers;

use App\Classes\SendSms;
use App\Models\SystemActivityLog;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{

    public function index(){
        $users = User::latest()->get();

        log_user_activity(
            0,
            'users',
            'index',
            'User accessed the users index page',
            'users'
        );
        return view('admin.users.index', compact('users'));
    }

    public function create(){
        $roles = Role::all();

        log_user_activity(
            0,
            'users',
            'create',
            'User accessed the users create page',
            'users'

        );

        return view('admin.users.create', compact('roles'));


    }


    public function edit(User $user){
        $roles = Role::all();
log_user_activity(

                $user->id,
                'users',
                'edit',
                'User accessed edit user page for user id ' . $user->id,
                url()->current(),
                json_encode($user)
                );

        return view('admin.users.edit', compact('user', 'roles'));
    }

     public function store(Request $request)
    {
        $request->validate([
            'first_name'        => 'required|string|max:255',
            'middle_name'       => 'nullable|string|max:255',
            'last_name'         => 'required|string|max:255',
            'email'             => 'required|email|max:255|unique:users,email',
            'phone_number'      => 'required|string|max:20',
        ]);

        $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijklmnpqrstuvwxyz';
        $newPassword = Str::random(6, $characters);

        try{
            DB::beginTransaction();
            $user = User::create([
                'first_name'        => $request->input('first_name'),
                'middle_name'       => $request->input('middle_name'),
                'last_name'         => $request->input('last_name'),
                'email'             => $request->input('email'),
                'phone_number'      => $request->input('phone_number'),
                'password'          => bcrypt($newPassword),
                'role'              => $request->input('role')
                ]);
                $user->syncRoles($request->get('role'));

                $sendSms = new SendSms();
                $phoneNumber = $request->input('phone_number');

                
                $message = "Dear {$user->first_name}, your Laikipia ECDE  account has been created. Username: {$user->email}. One-Time Password: {$newPassword}. Login  and change your password immediately.";

                $sendSms->sendSms($phoneNumber, $message);

                DB::commit();   

        } catch (\Throwable $th) {
            
            DB::rollBack();

            throw $th;


            return redirect()->back()->with('error', $th->getMessage());
        }

          log_user_activity(
                $user->id,
                'users',
                'store',
                'User created a new user with email ' . $user->email,
                url()->current(),
                json_encode($user)
            );

    
  

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');



    }

    public function update(Request $request, User $user){

        $request->validate([
            'first_name'        => 'required|string|max:255',
            'middle_name'       => 'nullable|string|max:255',
            'last_name'         => 'required|string|max:255',
            'email'             => 'required|email|max:255',
            'phone_number'      => 'required|string|max:20',
        ]);

        $current_object = json_encode($user);

        $role = $request->get('role')??$user->role;

        $user->update([
            'first_name'        => $request->input('first_name'),
            'middle_name'       => $request->input('middle_name'),
            'last_name'         => $request->input('last_name'),
            'email'             => $request->input('email'),
            'phone_number'      => $request->input('phone_number'),
            'role'              => $role
        
            ]);
            $user->syncRoles($role);
        log_user_activity(
                $user->id,
                'users',
                'update',
                'User updated user with id ' . $user->id,
                url()->current(),
                json_encode($user),
                $current_object
            );

        return redirect()->back()->with('success', 'User updated successfully.');
    }



    //
    function register(User $user, Request $request)
    {

        $_data = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $_data['password'] = Hash::make( $_data['password'] );

        $user->create($_data);

        return redirect(route('login'))->with('success', 'Registration was success full please login.');

        # code...
    }

    public function systemLogs(Request $request)
{
    if ($request->ajax()) {

        $logs = SystemActivityLog::with('causer:id,first_name,last_name')
            ->select([
                'id',
                'action',
                'description',
                'asset_url',
                'created_at',
                'causer_id'
            ])
            // OPTIONAL: limit to recent logs (HIGHLY recommended)
            // ->whereDate('created_at', '>=', now()->subDays(30))
            ->latest('created_at');

        return DataTables::eloquent($logs)
            ->addIndexColumn()

            ->addColumn('time', function ($row) {
                return $row->created_at
                    ->timezone('Africa/Nairobi')
                    ->format('d M Y H:i') . ' EAT';
            })

            ->addColumn('action', function ($row) {
                return $row->action ?? '-';
            })

            ->addColumn('performed_by', function ($row) {
                return optional($row->causer)->first_name ?? '-';
            })

            ->addColumn('description', function ($row) {
                return '<div class="text-wrap">' . e($row->description) . '</div>';
            })

            ->addColumn('asset_url', function ($row) {
                return $row->asset_url
                    ? '<a href="' . url($row->asset_url) . '" target="_blank">'
                        . e($row->asset_url) .
                      '</a>'
                    : '-';
            })

            ->addColumn('view', function ($row) {
                return '<a href="' . route('admin.system_logs_details', $row->id) . '"
                           class="btn btn-sm bg-warning text-white"
                           title="View">
                           <i class="ti ti-eye"></i>
                        </a>';
            })

            ->rawColumns(['description', 'asset_url', 'view'])
            ->make(true);
    }

    // Log page access (runs ONCE, not on ajax)
    log_user_activity(
        0,
        'system_activity_logs',
        'index',
        'User accessed the system logs index page',
        'users'
    );

    return view('admin.users.system-logs');
}

  public function system_logs_details(Request $request, $id)
    {
        $log = SystemActivityLog::find($id);

        if (!$log) {
            toast('System log not found', 'error');
           return redirect()->back()->with('error', 'System log not found');
        }

        log_user_activity(
            $log->id,
            'system_activity_logs',
            'show',
            'User viewed system log details with id ' . $log->id,
            'users',
            json_encode($log)
        );

        return view('admin.users.systemlogs_details', compact('log'));


    }

    public function myAccount(){
        $user = auth()->user();
        $roles = Role::all();

        return view('admin.users.my-account', compact('user', 'roles'));
    }

    public function updatePassword($id, Request $request){
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }


        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}
