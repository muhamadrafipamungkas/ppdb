@extends('adminlte::page')

@section('title', 'Create Registry')

@section('content')
    <div class="row pt-4">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>New Registry</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('registries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" value="" placeholder="Jhon Snow">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" value=""  placeholder="jhon@email.com">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone Number:</strong>
                    <input type="text" name="phone" class="form-control number-only" value=""  placeholder="0812345678">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NISN:</strong>
                    <input type="number" name="nisn" class="form-control" value="" placeholder="1234567890">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Sex: </label>
                    <br/>
                    <select class="form-control select2" name="sex">
                        <option selected disabled>Sex</option>
                        <option value="F">Female</option>
                        <option value="M">Male</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Previous School:</strong>
                    <input type="text" name="previous_school" class="form-control" value="" placeholder="SMPN 1 Jakarta">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Birth Place:</strong>
                    <input type="text" name="birth_place" class="form-control" value="" placeholder="Taiwan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Birth Date:</strong>
                    <input type="text" name="birth_date" class="form-control datepicker" value=""  placeholder="1970-12-31">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Religion:</label>
                    <br/>
                    <select class="form-control select2" name="religion">
                        <option selected disabled>Religion</option>
                        <option value="buddhism">Buddhism</option>
                        <option value="catholicism">Catholicism</option>
                        <option value="confucianism">Confucianism</option>
                        <option value="hinduism">Hinduism</option>
                        <option value="islam">Islam</option>
                        <option value="protestantism">Protestantism</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <b>Attachment (.pdf)</b><br/>
                    <input type="file" name="attachment" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <h2>Father Data</h2>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="father_name" class="form-control" value="" placeholder="Jhon Snow">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Birth Place:</strong>
                    <input type="text" name="father_birth_place" class="form-control" value="" placeholder="Taiwan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Birth Date:</strong>
                    <input type="text" name="father_birth_date" class="form-control datepicker" value="" placeholder="1970-12-31">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="father_email" class="form-control" value=""  placeholder="jhon@email.com">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone Number:</strong>
                    <input type="text" name="father_phone" class="form-control number-only" value=""  placeholder="0812345678">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIK:</strong>
                    <input type="number" name="father_nik" class="form-control" value="" placeholder="1234567890">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <h2>Mother Data</h2>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="mother_name" class="form-control" value="" placeholder="Jhon Snow">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Birth Place:</strong>
                    <input type="text" name="mother_birth_place" class="form-control" value="" placeholder="Taiwan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Birth Date:</strong>
                    <input type="text" name="mother_birth_date" class="form-control datepicker" value=""  placeholder="1970-12-31">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="mother_email" class="form-control" value=""  placeholder="jhon@email.com">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone Number:</strong>
                    <input type="text" name="mother_phone" class="form-control number-only" value=""  placeholder="0812345678">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIK:</strong>
                    <input type="number" name="mother_nik" class="form-control" value="" placeholder="1234567890">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 d-flex flex-row justify-content-between">
                <h2>Sibling Data</h2>
                <button type="button" id="add-sibling" class="btn btn-primary pull-right">+ Add Sibling</button>
            </div>
            <input type="hidden" name="sibling_amount" id="sibling-amount" value="0"/>

            <div id="sibling-data" style="width: 100%">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/vendor/sweetalert2/sweetalert2.css">
@stop

@section('js')
    <script src="{{asset('vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('vendor/sweetalert2/sweetalert2.js')}}"></script>
    <script src="{{asset('vendor/moment/moment.min.js')}}"></script>
{{--    <script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>--}}

    <script>
        $(function() {
            // Select 2
            // $(".select2").select2();
            $("#sibling-amount").val(0);
            // Datepicker
            $(".datepicker").daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'),10),
                locale: {
                    format: "YYYY-MM-DD"
                }
            });

            $("input.number-only").keyup(function(e)
            {
                if (/\D/g.test(this.value))
                {
                    // Filter non-digits from input value.
                    this.value = this.value.replace(/\D/g, '');
                }
            });

            $("button#add-sibling").click(function(e) {
                e.preventDefault();
                let siblingElement = $("#sibling-data");
                const existingData = siblingElement.html();
                const siblingAmount = $("#sibling-amount");
                const siblingAmountNow = parseInt(siblingAmount.val()) + 1;
                const addData = existingData +
                    `
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h5>Sibling Data ${siblingAmountNow}</h5>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="sibling_name_${siblingAmountNow}" class="form-control" value="" placeholder="Jhon Snow">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Birth Place:</strong>
                        <input type="text" name="sibling_birth_place_${siblingAmountNow}" class="form-control" value="" placeholder="Taiwan">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Birth Date:</strong>
                        <input type="text" name="sibling_birth_date_${siblingAmountNow}"  id="sibling_birth_date_${siblingAmountNow}"  class="form-control sibling datepicker" value="" placeholder="1970-12-31">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="sibling_email_${siblingAmountNow}" class="form-control" value=""  placeholder="jhon@email.com">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Phone Number:</strong>
                        <input type="text" name="sibling_phone_${siblingAmountNow}" class="form-control number-only" value=""  placeholder="0812345678">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>NIK:</strong>
                        <input type="number" name="sibling_nik_${siblingAmountNow}" class="form-control" value="" placeholder="1234567890">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Relation: </label>
                        <br/>
                        <select class="form-control sibling select2" name="sibling_relation_${siblingAmountNow}">
                            <option selected disabled>Relation</option>
                            <option value="older_brother">Older Brother</option>
                            <option value="older_sister">Older Sister</option>
                            <option value="younger_brother">Younger Brother</option>
                            <option value="younger_sister">Younger Sister</option>
                        </select>
                    </div>
                </div>`;

                siblingAmount.val(siblingAmountNow);

                siblingElement.html(addData);


                $(`#sibling_relation_${siblingAmountNow}`).select2();
                $(`#sibling_birth_date_${siblingAmountNow}`).daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    minYear: 1901,
                    maxYear: parseInt(moment().format('YYYY'),10),
                    locale: {
                        format: "YYYY-MM-DD"
                    }
                });

            })
        });
    </script>

@stop
