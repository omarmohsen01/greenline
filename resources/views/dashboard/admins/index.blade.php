@extends('layouts.master')
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Admin List</h4>
                      </div>
                   </div>
                   <x-dashboard.alert />
                   <div class="iq-card-body">
                      <div class="table-responsive">
                        <a class="btn btn-primary" style="margin-bottom: 15px" href="{{ route('dashboard.admins.create') }}">Add Admin</a>

                         <div class="row justify-content-between">
                            <div class="col-sm-12 col-md-6">
                               <div id="user_list_datatable_info" class="dataTables_filter">
                                <form class="mr-3 position-relative d-flex" action="{{ URL::current() }}" method="get">
                                    <div class="form-group mr-4 mb-0 flex-grow-1">
                                        <input type="input" name="name" class="form-control" id="exampleInputSearch" placeholder=" Name" aria-controls="user-list-table">
                                    </div>
                                    {{-- <div class="form-group mr-4 mb-0 flex-grow-1">
                                        <input type="input" name="last_name" class="form-control" id="exampleInputSearch" placeholder="Last Name" aria-controls="user-list-table">
                                    </div> --}}
                                    <div class="form-group mr-4 mb-0 flex-grow-1">
                                        <input type="email" name="email" class="form-control" id="exampleInputSearch" placeholder="Email" aria-controls="user-list-table">
                                    </div>
                                    <div class="form-group mr-4 mb-0 flex-grow-1">
                                        <input type="number" name="phone" class="form-control" id="exampleInputSearch" placeholder="Phone Number" aria-controls="user-list-table">
                                    </div>
                                    <div class="form-group mr-4 mb-0" >
                                        <select class="form-control" name="status" placeholder="Status" id="exampleFormControlSelect1" style="width:150px">
                                            <option selected="" value="">All</option>
                                            <option value="1" @selected(request('status')=='ACTIVE')>ACTIVE</option>
                                            <option value="0" @selected(request('status')=='INACTIVE')>INACTIVE</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-dark">Search</button>
                                </form>

                               </div>
                            </div>
                            {{-- <div class="col-sm-12 col-md-6">
                               <div class="user-list-files d-flex float-right">
                                  <a class="iq-bg-primary" href="javascript:void();" >
                                     Print
                                   </a>
                                  <a class="iq-bg-primary" href="javascript:void();">
                                     Excel
                                   </a>
                                   <a class="iq-bg-primary" href="javascript:void();">
                                     Pdf
                                   </a>
                                 </div>
                            </div> --}}
                         </div>
                         <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                               <tr>
                                  <th>Profile</th>
                                  <th>Name</th>
                                  <th>Contact</th>
                                  <th>Email</th>
                                  <th>Status</th>
                                  <th>Join Date</th>
                                  <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td class="text-center"><img class="rounded img-fluid avatar-40" src="{{ asset('storage/'.$admin->image) }}" alt="profile"></td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->phone }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td><span class="badge iq-bg-primary">{{ ($admin->status==='1')?'ACTIVE':'INACTIVE' }}</span></td>
                                    <td>{{ $admin->created_at }}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">

                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('dashboard.admins.edit',$admin->id) }}"><i class="ri-pencil-line"></i></a>
                                            <form method="POST" action="{{ route('dashboard.admins.destroy',$admin->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                           </tbody>
                         </table>
                      </div>
                         {{ $admins->withQueryString()->links() }}
                   </div>
                </div>
          </div>
       </div>
    </div>
 </div>
@endsection
