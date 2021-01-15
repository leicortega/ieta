@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6">
        <a href="admin/users">
            <div class="card bg-pattern">
                <div class="card-body">
                    <div class="float-right">
                        <i class="dripicons-user-group text-primary h4 ml-3"></i>
                    </div>
                    <h5 class="font-20 mt-0 pt-1">24</h5>
                    <p class="text-muted mb-0">Usuarios</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-pattern">
            <div class="card-body">
                <div class="float-right">
                    <i class="dripicons-trophy text-primary h4 ml-3"></i>
                </div>
                <h5 class="font-20 mt-0 pt-1">18</h5>
                <p class="text-muted mb-0">Completed Projects</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-pattern">
            <div class="card-body">
                <div class="float-right">
                    <i class="dripicons-hourglass text-primary h4 ml-3"></i>
                </div>
                <h5 class="font-20 mt-0 pt-1">06</h5>
                <p class="text-muted mb-0">Pending Projects</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="form-group mb-0">
                        <label>Search</label>
                        <div class="input-group mb-0">
                            <input type="text" class="form-control" placeholder="Search..." aria-describedby="project-search-addon">
                            <div class="input-group-append">
                                <button class="btn btn-danger" type="button" id="project-search-addon"><i class="mdi mdi-magnify search-icon font-12"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
