<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Maatwebsite\Excel\Facades\Excel;

class AppsController extends Controller
{
    public function login(Request $request)
    {

        $user = User::whereEmail($request->email)->first();
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found'], 401);
        }
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['status' => false, 'message' => 'Check your password'], 401);
        }
        return response()->json(['status' => true, 'message' => 'Success', 'data' => $user], 200);
    }

    public function getAllEmployee()
    {
        try {
            $data = Employee::all();
            return response()->json(['status' => true, 'data' => $data], 200);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'data' => []], 401);
        }
    }

    public function create_superior(Request $request)
    {
        try {
            if ($request->rm_manager == "" || $request->rm_manager == null) {
                $rm_manager = $request->rm_rep;
            } else {
                $rm_manager =   $request->rm_manager;
            }
            $data =  Employee::create([
                'id' =>  Uuid::uuid4(),
                'rm_branch_id' => $request->rm_branch,
                'rm_rep_id' =>  $request->rm_rep,
                'rm_name' =>  $request->rm_name,
                'rm_current_position' =>  $request->rm_current_position,
                'rm_manager_id' => $rm_manager,
            ]);
            return response()->json(['status' => true, 'data' => $data], 200);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'data' => 'failed'], 400);
        }
    }
    public function update_superior($id, Request $request)
    {
        try {
            if ($request->rm_manager == "" || $request->rm_manager == null) {
                $rm_manager = $request->rm_rep;
            } else {
                $rm_manager =   $request->rm_manager;
            }
            $employee = Employee::find($id);
            if ($employee == null) {
                return response()->json(['status' => false, 'message' => 'failed'], 400);
            }
            $employee->rm_branch_id = $request->rm_branch;
            $employee->rm_rep_id = $request->rm_rep;
            $employee->rm_name = $request->rm_name;
            $employee->rm_current_position = $request->rm_current_position;
            $employee->rm_manager_id = $rm_manager;
            $employee->save();
            DB::commit();
            return response()->json(['status' => true, 'data' => $employee], 200);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'data' => 'failed'], 400);
        }
    }

    public function delete($id)
    {
        try {
            Employee::destroy($id);
            return response()->json(['status' => true, 'message' => 'Success'], 200);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => 'failed'], 400);
        }
    }

    public function create_member(Request $request)
    {
        try {

            Employee::create([
                'id' =>  Uuid::uuid4(),
                'rm_branch_id' => $request->rm_branch,
                'rm_rep_id' =>  $request->rm_rep,
                'rm_name' =>  $request->rm_name,
                'rm_current_position' =>  $request->rm_current_position,
                'rm_manager_id' => $request->rm_manager,
            ]);
            return response()->json(['status' => true, 'message' => 'Success'], 200);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => 'failed'], 400);
        }
    }

    public function export()
    {
        return Excel::download(new EmployeeExport, 'users.xlsx');
    }
}
