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
            @if ($addresses->count() < '2')
            <div class="col-lg-6">
                <div class="d-flex flex-row-reverse"><a class="btn btn-primary mb-3 text-right" href="{{route('contact.create')}}" title="">Add Address <i class="fa fa-plus"></i></a>
            </div>
        </div>
        @endif
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
                            <th>Where Add</th>
                            <th>Location</th>
                            <th>Location Img</th>
                            <th>Phone</th>
                            <th>Phone Img</th>
                            <th>Email</th>
                            <th>Email Img</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tfoot class="text-center">
                    <tr>
                        <th>Where Add</th>
                        <th>Location</th>
                        <th>Location Img</th>
                        <th>Phone</th>
                        <th>Phone Img</th>
                        <th>Email</th>
                        <th>Email Img</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($addresses as $address )
                        <tr>
                            <td>{{$address->where}}</td>
                            <td>{{$address->location}}</td>
                            <td><img class="img-thumbnail" src="{{asset('storage/assets/contact/'.$address->locationsign)}}" alt=""></td>
                            <td>{{$address->phone_no}}</td>
                            <td><img class="img-thumbnail" src="{{asset('storage/assets/contact/'.$address->phonesign)}}" alt=""></td>
                            <td>{{$address->email}}</td>
                            <td><img class="img-thumbnail" src="{{asset('storage/assets/contact/'.$address->emailsign)}}" alt=""></td>
                            <td><a class="btn btn-danger" href="{{route('contact.edit',$address->id)}}" title="Edit"><i class="fa fa-edit">Edit</i></a>
                            {!! Form::open(['route'=> [ 'contact.destroy', $address->id], 'method' => 'DELETE']) !!}
                            <button class="btn btn-danger" onclick="return confirm('Are You Sure to Delete {{$address->where}} Address?')" type="submit"><i class="fa fa-trash"></i> Delete</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@stop