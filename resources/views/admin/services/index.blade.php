@extends('admin/layouts/navbar_content')

@section('title', 'Lawyers')

@section('content')
    @include('admin.layouts.flash-message')
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd" style="float: right;">Add Service</button>
            <h5 class="card-title">Lawyers</h5>
        </div>
        <div class="card-body">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th style="text-align: center;">Arbitration Area</th>
                        <th style="text-align: center;">Title</th>
                        <th style="text-align: center;">Description</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($services as $k => $service)
                        <tr style="text-align: center;">
                            <td>{{$service->arbitration->area}}</td>
                            <td>{{$service->title}}</td>
                            <td>{{$service->description}}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop{{$k}}" aria-controls="offcanvasTop"><i class="bx bx-detail me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="{{route('admin.service.delete', $service->id)}}" onclick="return confirm('Are you sure?')"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                                <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop{{$k}}" aria-labelledby="offcanvasTopLabel" style="height: 100%!important;">
                                    <div class="offcanvas-header">
                                        <h5 id="offcanvasTopLabel" class="offcanvas-title">Service: {{$service->title}}</h5>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <form action="{{route('admin.service.update', $service->id)}}" method="POST">
                                            @csrf()
                                            <div class="row">
                                                <div class="col-xl">
                                                    <div class="card mb-4">
                                                        <div class="card-header d-flex justify-content-between align-items-center">
                                                            <h5 class="mb-0">Service Info</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="basic-default-fullname">Arbitration Area</label>
                                                                <select name="area" id="" class="form-control">
                                                                    @foreach($arbitration as $k => $area)
                                                                        <option value="{{$k}}" {{$k == $service->arbitration_area_id ? 'selected' : ''}}>{{$area}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label" for="basic-default-company">Title</label>
                                                                <input type="text" class="form-control" id="basic-default-company" name="title" value="{{$service->title}}" />
                                                                @error('title')
                                                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label" for="basic-default-message">Description</label>
                                                                <textarea id="basic-default-message" class="form-control" name="description"> {{$service->description}}</textarea>
                                                                @error('description')
                                                                    <span class="error-msg" style="color:red;">{{ $message }}</span>
                                                                @enderror 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </div>                                      
                                            <button type="submit" class="btn btn-success">Update</button>
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Close</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <small class="text-light fw-semibold mb-3">End</small>
        <div class="mt-3">
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasEndLabel" class="offcanvas-title">Add Service</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                    <form action="{{route('admin.service.store')}}" method="POST">
                        @csrf()
                        <div class="row">
                            <div class="col-xl">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-fullname">Arbitration Area</label>
                                            <select name="area" id="" class="form-control">
                                                @foreach($arbitration as $k => $area)
                                                    <option value="{{$k}}">{{$area}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-company">Title</label>
                                            <input type="text" class="form-control" id="basic-default-company" name="title"/>
                                            @error('title')
                                                <span class="error-msg" style="color:red;">{{ $message }}</span>
                                            @enderror  
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-message">Description</label>
                                            <textarea id="basic-default-message" class="form-control" name="description"></textarea>
                                            @error('description')
                                                <span class="error-msg" style="color:red;">{{ $message }}</span>
                                            @enderror  
                                        </div>
                                    </div>
                                </div>
                            </div>                                                
                        </div>                                      
                        <button type="submit" class="btn btn-success">Add</button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function verifyLawyer(data) {
            status = data.checked == true ? 'Verify' : 'Unverify';
            Swal.fire({
                title: "Are you sure?",
                text: "Are you sure you want to "+status+" this Lawyer?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "green",
                confirmButtonText: "Yes, verify it!",
                cancelButtonColor: "red",
                cancelButtonText: "Cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
           })
            .then((verify) => {
                if (verify.isConfirmed) {
                    var lawyerId = $(data).attr('lawyer_id');
                    var status = $(data).val();
                    $.ajax({
                        method:"post",
                        url: "/admin/verify/lawyer/"+lawyerId,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'status': status
                        },
                        success: function(){
                            Swal.fire({
                                icon: 'success',
                                title: 'Verified',
                                text: 'Success'
                            })
                        }
                    });
                } else {
                    Swal.fire("Cancelled!");
                }
            });
        }
    </script>
@endpush
