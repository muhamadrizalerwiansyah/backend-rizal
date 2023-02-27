@extends('layouts.main')

@section('title')
    {{ ucfirst($module) }}
@endsection

@section('content')
<div class="row">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Superior</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form method="post" action="{{ route('insert-employee') }}" class="needs-validation">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>rm branch</label>
                            <input name="rm_branch" type="text" class="form-control" placeholder="ex: BDG">
                        </div>
                        <div class="form-group col-md-6">
                            <label>rm rep</label>
                            <input name="rm_rep" type="text" class="form-control" placeholder="ex: BD0317">
                        </div>
                        <div class="form-group col-md-6">
                            <label>rm name</label>
                            <input name="rm_name" type="text" class="form-control" placeholder="ex: RIZAL ERWIANSYAH">
                        </div>
                        <div class="form-group col-md-6">
                            <label>rm current position</label>
                            <input name="rm_current_position" type="text" class="form-control" placeholder="ex: EPD">
                        </div>
                        <div class="form-group col-md-6">
                            <label>rm manager</label>
                            <select name="rm_manager" id="inputState" class="form-control default-select">
                                <option value="" selected>Choose...</option>
                                @foreach ($superior as $item)
                                <option value="{{ $item->rm_rep_id }}">{{ $item->rm_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Member</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form method="post" action="{{ route('insert-members') }}" class="needs-validation">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>rm branch</label>
                            <input name="rm_branch" type="text" class="form-control" placeholder="ex: BDG">
                        </div>
                        <div class="form-group col-md-6">
                            <label>rm rep</label>
                            <input name="rm_rep" type="text" class="form-control" placeholder="ex: BD0317">
                        </div>
                        <div class="form-group col-md-6">
                            <label>rm name</label>
                            <input name="rm_name" type="text" class="form-control" placeholder="ex: RIZAL ERWIANSYAH">
                        </div>
                        <div class="form-group col-md-6">
                            <label>rm current position</label>
                            <input name="rm_current_position" type="text" class="form-control" placeholder="ex: EPD">
                        </div>
                        <div class="form-group col-md-6">
                            <label>rm manager</label>
                            <select name="rm_manager" required id="inputState" class="form-control default-select">
                                <option value="" selected>Choose...</option>
                                @foreach ($superior as $item)
                                <option value="{{ $item->rm_rep_id }}">{{ $item->rm_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection