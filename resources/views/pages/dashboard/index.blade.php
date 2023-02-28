@extends('layouts.main')

@section('title')
    {{ ucfirst($module) }}
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-sm-flex d-block pb-0 border-0">
                <div>
                    <h4 class="fs-20 text-black">Employee</h4>
                    <p class="mb-0 fs-12">Lorem ipsum dolor sit amet, consectetur</p>
                </div>
                <div class="dropdown custom-dropdown d-block mt-3 mt-sm-0 mb-0">
                    <a href="{{ route('create-employee') }}" type="button" class="btn btn-rounded btn-info"><span
                        class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                    </span>Add</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th><strong>rm_branch_id</strong></th>
                                <th><strong>rm_rep_id</strong></th>
                                <th><strong>rm_name</strong></th>
                                <th><strong>rm_current_position</strong></th>
                                <th><strong>rm_manager_id</strong></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employee as $item)
                            <tr>
                                <td>{{ $item->rm_branch_id }}</td>
                                <td>{{ $item->rm_rep_id }}</td>
                                <td>{{ $item->rm_name }}</td>
                                <td><span class="badge light badge-success">{{ $item->rm_current_position }}</span></td>
                                <td>{{ $item->rm_manager_id }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                           
                        
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
      
    </div>
    

    
    
</div>
@endsection