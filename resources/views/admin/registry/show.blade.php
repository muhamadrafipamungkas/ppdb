@extends('adminlte::page')

@section('title', 'Registry')

@section('content')
    <div class="row pt-4">
        <div class="col-lg-12 margin-tb">
            <div class="float-left d-inline-block">
                <h2>Registry</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" value="{{$registry->name}}" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" value="{{$registry->email}}" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone Number:</strong>
                <input type="text" name="phone" class="form-control number-only" value="{{$registry->phone}}" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NISN:</strong>
                <input type="number" name="nisn" class="form-control" value="{{$registry->nisn}}" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Sex: </label>
                <br/>
                <select class="form-control select2" name="sex" disabled>
                    <option value="F" {{$registry->sex == "F" ? "selected" : ""}}>Female</option>
                    <option value="M" {{$registry->sex == "M" ? "selected" : ""}}>Male</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Previous School:</strong>
                <input type="text" name="previous_school" class="form-control"  value="{{$registry->previous_school}}" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Birth Place:</strong>
                <input type="text" name="birth_place" class="form-control" value="{{$registry->birth_place}}" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Birth Date:</strong>
                <input type="text" name="birth_date" class="form-control datepicker" value="{{$registry->birth_date}}" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Religion:</label>
                <br/>
                <select class="form-control select2" name="religion" disabled>
                    <option value="buddhism" {{$registry->religion == "buddhism" ? "selected" : ""}}>Buddhism</option>
                    <option value="catholicism" {{$registry->religion == "catholicism" ? "selected" : ""}}>Catholicism</option>
                    <option value="confucianism" {{$registry->religion == "confucianism" ? "selected" : ""}}>Confucianism</option>
                    <option value="hinduism" {{$registry->religion == "hinduism" ? "selected" : ""}}>Hinduism</option>
                    <option value="islam" {{$registry->religion == "islam" ? "selected" : ""}}>Islam</option>
                    <option value="protestantism" {{$registry->religion == "protestantism" ? "selected" : ""}}>Protestantism</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <b>Attachment (.pdf)</b><br/>
                <p>{{$attachment->filename}}</p>
                <a target="_blank" href="{{url('attachments/registry/'.$attachment->filename)}}">
                <button class="btn btn-primary" id="attachment">
                        Show
                </button>
                </a>

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <h2>Father Data</h2>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="father_name" class="form-control" value="{{$father->name}}" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Birth Place:</strong>
                <input type="text" name="father_birth_place" class="form-control" value="{{$father->birth_place}}" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Birth Date:</strong>
                <input type="text" name="father_birth_date" class="form-control datepicker" value="{{$father->birth_date}}" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="father_email" class="form-control" value="{{$father->email}}" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone Number:</strong>
                <input type="text" name="father_phone" class="form-control number-only" value="{{$father->phone}}" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIK:</strong>
                <input type="number" name="father_nik" class="form-control" value="{{$father->nik}}" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <h2>Mother Data</h2>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="mother_name" class="form-control" value="{{$mother->email}}" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Birth Place:</strong>
                <input type="text" name="mother_birth_place" class="form-control" value="{{$mother->birth_place}}" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Birth Date:</strong>
                <input type="text" name="mother_birth_date" class="form-control datepicker" value="{{$mother->birth_date}}" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="mother_email" class="form-control" value="{{$mother->email}}" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone Number:</strong>
                <input type="text" name="mother_phone" class="form-control number-only" value="{{$mother->phone}}" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIK:</strong>
                <input type="number" name="mother_nik" class="form-control" value="{{$mother->nik}}" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <h2>Sibling Data</h2></div>
        <input type="hidden" name="sibling_amount" id="sibling-amount" value="0"/>

        <div id="sibling-data" style="width: 100%">
            @foreach($siblings as $sibling)
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h5>Sibling Data {{$sibling->index+1}}</h5>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="sibling_name_{{$sibling->index+1}}" class="form-control" value="{{$sibling->name}}" disabled>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Birth Place:</strong>
                        <input type="text" name="sibling_birth_place_{{$sibling->index+1}}" class="form-control" value="{{$sibling->name}}" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Birth Date:</strong>
                        <input type="text" name="sibling_birth_date_{{$sibling->index+1}}"  id="sibling_birth_date_{{$sibling->index+1}}"  class="form-control sibling datepicker" class="form-control" value="{{$sibling->birth_date}}" disabled>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="sibling_email_{{$sibling->index+1}}" class="form-control" value="{{$sibling->email}}" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Phone Number:</strong>
                        <input type="text" name="sibling_phone_{{$sibling->index+1}}" class="form-control number-only" class="form-control" value="{{$sibling->phone}}" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>NIK:</strong>
                        <input type="number" name="sibling_nik_{{$sibling->index+1}}" class="form-control"  class="form-control" value="{{$sibling->nik}}" disabled>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Relation: </label>
                        <br/>
                        <select class="form-control sibling select2" name="sibling_relation_{{$sibling->index+1}}" disabled>
                            <option  {{$registry->religion == "older_brother" ? "selected" : ""}} value="older_brother">Older Brother</option>
                            <option  {{$registry->religion == "older_sister" ? "selected" : ""}} value="older_sister">Older Sister</option>
                            <option {{$registry->religion == "younger_brother" ? "selected" : ""}} value="younger_brother">Younger Brother</option>
                            <option {{$registry->religion == "younger_sister" ? "selected" : ""}} value="younger_sister">Younger Sister</option>
                        </select>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
            @if($registry->status === "AWAITING_APPROVAL")
                <button id="approve" class="btn btn-primary">Approve</button>
                <button id="reject" class="btn btn-danger">Reject</button>
            @elseif($registry->status === "APPROVED")
                <button class="btn btn-info">Approved</button>
            @elseif($registry->status === "REJECTED")
                <button class="btn btn-info">Rejected</button>
            @endif
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/sweetalert2/sweetalert2.css">
@stop

@section('js')
    <script src="{{asset('vendor/sweetalert2/sweetalert2.js')}}"></script>
    <script>
        const approveUrl = "/registries/" + {{$registry->id}} + "/approve";
        const rejectUrl = "/registries/" + {{$registry->id}} + "/reject";

        $('#approve').click(function() {
            Swal.fire({
                title: 'Do you want to approve this registry?',
                showCancelButton: true,
                confirmButtonText: 'Approve',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: approveUrl,
                        data: {},
                        type: "POST",
                        headers: {
                            'X-CSRF-Token': '{{ csrf_token() }}',
                        },
                        success: function(data){
                            if (data.status) {
                                Swal.fire('Approved!', '', 'success').then(() => {
                                    location.replace('/')
                                })
                            } else {
                                Swal.fire('Error!', 'Fail to approve registry', 'error')
                            }
                        },
                        error: function(){
                            Swal.fire('Error!', 'Fail to approve registry', 'error')
                        }
                    });
                }
            })
        });

        $('#reject').click(async function() {
            const { value: text } = await Swal.fire({
                input: 'textarea',
                inputLabel: 'Notes',
                inputPlaceholder: 'Type your message here...',
                inputAttributes: {
                    'aria-label': 'Type your message here'
                },
                showCancelButton: true
            })

            if (text) {
                $.ajax({
                    url: rejectUrl,
                    data: {
                        notes: text
                    },
                    type: "POST",
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    success: function(data){
                        if (data.status) {
                            Swal.fire('Rejected!', '', 'success').then(() => {
                                location.replace('/')
                            })
                        } else {
                            Swal.fire('Error!', 'Fail to reject registry', 'error')
                        }
                    },
                    error: function(){
                        Swal.fire('Error!', 'Fail to reject registry', 'error')
                    }
                });
            }
        })
    </script>
@stop
