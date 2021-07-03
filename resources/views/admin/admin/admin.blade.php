@extends('admin.admin_layout')
@section('main_contant')
<div class="container-fluid">
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>
        <div class="row">
            <div class="col-lg-6">
                @isset($pageHead)
                <div class="col-12"><h2 class="text-info ">{{$pageHead}}</h2></div>
                @endisset
            </div>
            <div class="col-lg-6">
                <div class="d-flex flex-row-reverse"><a class="btn btn-primary mb-3 text-right" href="{{route('user.create')}}" title="">New User <i class="fa fa-user"></i></a>
            </div>
        </div>
        
    </div>
    
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@if(session('msg'))
    <div class="alert alert-primary">
        {{session('msg')}}
    </div>
    @endif</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Name</th>
                            <th>Feature</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                    <tr>
                        <th>Name</th>
                        <th>Feature</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @isset ( $users )
                        @foreach ($users as $user)
                        <tr class="text-center text-capitalize">
                            <td>{{ $user->name }}</td>
                            <td><img class="w-50 h_100" src="{{asset('storage/assets/user/'. $user->image)}}" alt="user Feature"></td>
                            <td class="text-normal">{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->status}}</td>
                            <td>
                                <a class="btn px-3" title="{{$authUser->role}}" onclick="return {{($authUser->role==1 || $authUser->role=='2')? 'true' : 'false'}}" href="{{route('user.edit', $user->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                {{-- Delete user --}}
                                {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'delete']) !!}
                                <button title="{{( $authUser->id == $user->id || $user->sup_admin==1 || $authUser->role > $user->role )? 'disabled' : ''}}"
                                    
                                 {{( $authUser->id == $user->id || $user->sup_admin==1 || $authUser->role > $user->role )? 'disabled' : ''}}  class="btn-danger btn" onclick="return confirm('Are you Sure to delete the account of {{$user->name}}?')" type="submit"><i class="fa fa-trash"></i> Delet</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                        @endisset
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop


{{-- title=" {{( $authUser->role == 1 && $authUser->id != $user->id)? '' : 'You can only update info!'}}" {{( $authUser->role == 1 && $authUser->id != $user->id)? '' : 'disabled'}} --}}