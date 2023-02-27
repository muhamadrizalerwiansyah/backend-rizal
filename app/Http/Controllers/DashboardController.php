<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\View;
use Ramsey\Uuid\Uuid;
use Exception;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->module = 'dashboard';
        View::share(['module' => $this->module]);
    }

    public function index()
    {
        $data['employee'] = Employee::all();
        // dd($data['employee']);
        return view('pages.' . $this->module . '.index', $data);
    }

    public function add_employe()
    {
        $data['superior'] = Employee::where('rm_current_position', 'EPD',)
            ->orWhere('rm_current_position', 'GEPD')->get();
        return view('pages.' . $this->module . '.add_employe', $data);
    }

    public function create_superior(Request $request)
    {
        try {
            if ($request->input('rm_manager') == "" || $request->input('rm_manager') == null) {
                $rm_manager = $request->input('rm_rep');
            } else {
                $rm_manager =   $request->input('rm_manager');
            }
            // DD($rm_manager);
            Employee::create([
                'id' =>  Uuid::uuid4(),
                'rm_branch_id' => $request->input('rm_branch'),
                'rm_rep_id' =>  $request->input('rm_rep'),
                'rm_name' =>  $request->input('rm_name'),
                'rm_current_position' =>  $request->input('rm_current_position'),
                'rm_manager_id' => $rm_manager,
            ]);
            return redirect("dashboard");
        } catch (Exception $e) {
            //throw $th;
            return redirect("create-employee");
        }
    }

    public function create_member(Request $request)
    {
        try {

            Employee::create([
                'id' =>  Uuid::uuid4(),
                'rm_branch_id' => $request->input('rm_branch'),
                'rm_rep_id' =>  $request->input('rm_rep'),
                'rm_name' =>  $request->input('rm_name'),
                'rm_current_position' =>  $request->input('rm_current_position'),
                'rm_manager_id' => $request->input('rm_manager'),
            ]);
            return redirect("dashboard");
        } catch (Exception $e) {
            //throw $th;
            return redirect("create-employee");
        }
    }
    public function edit_superior($id)
    {
        try {
            $data['superior'] = Employee::where('id', $id)->first();
            dd($data['superior']);
            return redirect("dashboard");
        } catch (Exception $e) {
            //throw $th;
            return redirect("create-employee");
        }
    }
}
