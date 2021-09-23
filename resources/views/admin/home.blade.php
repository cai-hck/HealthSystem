@extends('admin.layout.default')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatable/jquery.dataTables.min.css') }}">
@endsection

@section('jsPostApp')
    <script src="{{ asset('plugins/datatable/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dashboard-permisionlist').DataTable({
                pagingType: "simple",
                pageLength: 4,
                language: {
                    paginate: {'next': 'Next &rarr;', 'previous': '&larr; Prev'}
                }
            });
        } );
    </script>
@endsection

@section('content')
<div class="main-container">
    <!--
    <div class="row">
        <div class="col s12 m6">
            <div class="card horizontal">
                <div class="card-image valign-wrapper pad-lr-20">
                    <i class="material-icons medium valign primary-text">supervisor_account</i>
                </div>
                <div class="card-stacked">
                    <div class="card-content right-align">
                        <div class="card-title" style="font-weight:bold;">{{ $data->adminCount }}</div>
                        <p>Administrators</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card horizontal">
                <div class="card-image valign-wrapper pad-lr-20">
                    <i class="material-icons medium valign secondary-text">person</i>
                </div>
                <div class="card-stacked">
                    <div class="card-content right-align">
                        <div class="card-title" style="font-weight:bold;">{{ $data->usersCount }}</div>
                        <p>Users</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card horizontal">
                <div class="card-image valign-wrapper pad-lr-20">
                    <i class="material-icons medium valign warning-text">accessibility</i>
                </div>
                <div class="card-stacked">
                    <div class="card-content right-align">
                        <div class="card-title" style="font-weight:bold;">{{$data->roleCount}}</div>
                        <p>Total Roles</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card horizontal">
                <div class="card-image valign-wrapper pad-lr-20">
                    <i class="material-icons medium valign success-text">fingerprint</i>
                </div>
                <div class="card-stacked">
                    <div class="card-content right-align">
                        <div class="card-title" style="font-weight:bold;">{{$data->permissionCount}}</div>
                        <p>Total Permissions</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Tables --}}
    <div class="row">
        <div class="col s12 l6">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Permissions</span>
                    @if ($data->permissions->count() > 0)
                        <div class="datatable-wrapper">
                            <table cellspacing="0" width="100%"
                                class="datatable-badges display cell-border dataTable"
                                id="dashboard-permisionlist">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Created On</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->label }}</td>
                                            <td>{{ Carbon\Carbon::parse($permission->created_at)->format('d-m-Y H:i:s') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th>Name</th>
                                    <th>Created On</th>
                                </tfoot>
                            </table>
                        </div>
                    @else
                        <p>No Records to show for permissions</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col s12 m12 l6">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Roles</span>
                    @if ($data->roles->count() > 0)
                        <table class="responsive-table">
                            <thead class="primary-text">
                                <tr>
                                    <th data-field="id">ID</th>
                                    <th data-field="name">Name</th>
                                    <th data-field="data">Created On</th>
                                </tr>
                            </thead>
                            <tbody class="black-text">
                                @foreach ($data->roles as $role)
                                    <tr>
                                        <td>#{{ $role->id }}</td>
                                        <td>{{ ucwords($role->name) }}</td>
                                        <td>{{ Carbon\Carbon::parse($role->created_at)->format('d-m-Y H:i:s') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No Records to show for Roles</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    -->
    <div class="row" id="div_addpatient" style="display:none">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h5>Add Patient Info</h5>
                    <form  action="{{ url('/admin/addpatient') }}" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="input-field col s6">
                                <input type="text" id="id" name="id" class="validate" required>
                                <label for="id" class="active">ID</label>
                            </div>
                            <div class="input-field col s6">
                                <input type="text" id="name" name="name" class="validate" required>
                                <label for="name" class="active">Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" id="address" name="address" class="validate" required>
                                <label for="address" class="active">Address</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input type="email" id="email" name="email" class="validate" required>
                                <label for="email" class="active">Email</label>
                            </div>
                            <div class="input-field col s6">
                                <input type="text" id="phone" name="phone" class="validate" required>
                                <label for="phone" class="active">Phone</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s3">
                                <input type="number" id="age" name="age" class="validate" min="0" value="0" required>
                                <label for="age" class="active">Age</label>
                            </div>
                            <div class="input-field col s3">
                                <input type="number" id="weight" name="weight" class="validate for_bmi" min="0" value="0" step="0.01" required>
                                <label for="weight" class="active">Weight(in Kg)</label>
                            </div>
                            <div class="input-field col s3">
                                <input type="number" id="height" name="height" class="validate for_bmi" min="0" value="0" step="0.01" required>
                                <label for="height" class="active">Height(in meter)</label>
                            </div>
                            <div class="input-field col s3">
                                <input type="text" id="bmi" name="bmi" class="validate" readonly  min="0" value="0" required >
                                <label for="bmi" class="active">BMI</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">Health Issues:</p>
                            <div class="input-field col s3" >
                                <p>
                                    <input type="checkbox" id="none" name="none"/>
                                    <label for="none">None</label>
                                </p>
                            </div>
                            <div class="input-field col s3">
                                <p>
                                    <input type="checkbox" id="diabetes" name="diabetes"/>
                                    <label for="diabetes">Diabetes</label>
                                </p>
                            </div>
                            <div class="input-field col s3">
                                <p>
                                    <input type="checkbox" id="cholesterol" name="cholesterol"/>
                                    <label for="cholesterol">High Cholesterol</label>
                                </p>
                            </div>
                            <div class="input-field col s3">
                                <p>
                                    <input type="checkbox" id="pressure" name="pressure"/>
                                    <label for="pressure">High Blood Pressure</label>
                                </p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <div class="input-field col s3">
                                <p>
                                    <input type="checkbox"  id="diseases" name="diseases"/>
                                    <label for="diseases">Heart Diseases</label>
                                </p>
                            </div>
                            <div class="input-field col s3" >
                                <p>
                                    <input type="checkbox" id="others" name="others"/>
                                    <label for="others">Others</label>
                                </p>
                            </div>
                            <div class="input-field col s6" style="display:none" id="div_issues" >
                                <textarea name="textarea" id="textarea_issues" name="textarea_issues" class="materialize-textarea"></textarea>
		                        <label for="textarea_issues" class="active">Other Issues</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <div class="input-field col s6">
                                <input type="text" id="allergies" name="allergies" class="validate">
                                <label for="allergies" class="active">Allergies</label>
                            </div>
                            <div class="input-field col s3">
                                <div class="switch">
                                    <label>
                                        Smoking : No
                                        <input type="checkbox" name="smoking">
                                        <span class="lever"></span>
                                        Yes
                                    </label>
                                </div>
                            </div>
                            <div class="input-field col s3">
                                <div class="switch">
                                    <label>
                                        Alcohol Consumption : No
                                        <input type="checkbox"  name="alcohol">
                                        <span class="lever"></span>
                                        Yes
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 right-align">
                            <button class="btn waves-effect waves-set" type="submit" name="update_profile">Save<i class="material-icons right">save</i>
                            </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- With Action-->
        <div class="col s12">
            <div class="card-panel">
                <div class="row box-title">
                    <div class="col s12">
                        <h5 class="content-headline">Patient Info Table</h5>
                    </div>

                    <a class="btn-floating btn-large waves-effect waves-light red tooltipped" id="open_addpatient"  data-position="bottom" data-delay="50" data-tooltip="Create new entry"><i class="material-icons">add</i></a>
                    <a class="btn-floating  green tooltipped" id="choose" onclick ="$('#loadfile').trigger('click');"   data-position="bottom" data-delay="50" data-tooltip="Import from excel"><i class="large material-icons">publish</i> </a>
                    <a class="btn-floating  blue tooltipped" id="import" data-position="bottom" data-delay="50" data-tooltip="Submit excel"><i class="large material-icons">send</i> </a>        
                    <form id="sendlotteryexcel" method="POST" action="{{ url('admin/sendpatientexcel') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" id="loadfile" value="path" name="file"  hidden data-input="false" data-buttonText="Upload Logo" data-badge="false"/>
                    </form>  
                    <!-- Modal Structure -->
                </div>
                <div class="row">
                    <div class="col s12">
                        <div class="datatable-wrapper" style="    overflow: auto;   position: relative;width: 100%;">
                            <table class="datatable-badges display cell-border" style="text-align:center;">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Age</th>
                                    <th>Weight</th>
                                    <th>Height</th>
                                    <th>BMI</th>
                                    <th>Health Issues</th>
                                    <th>Allergies</th>
                                    <th>Smoking</th>
                                    <th>Alcohol Consumption</th>
                                    <th>Created Time</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td>{{$patient->patient_id }}</td>
                                            <td>{{$patient->name }}</td>
                                            <td>{{$patient->address }}</td>
                                            <td>{{$patient->email }}</td>
                                            <td>{{$patient->phone }}</td>
                                            <td>{{$patient->age }}</td>
                                            <td>{{$patient->weight }}</td>
                                            <td>{{$patient->height }}</td>
                                            <td>{{$patient->bmi }}</td>
                                            <td>
                                            <?php $i = 0;?>
                                            @if ($patient->diabetes != 'no')
                                                Diabetes
                                            <?php $i++;?>
                                            @endif
                                            @if ($patient->cholesterol != 'no')
                                                @if($i == 0)
                                                High Cholesterol
                                                @else
                                                , High Cholesterol
                                                @endif
                                                <?php $i++;?>
                                            @endif
                                            @if ($patient->pressure != 'no')
                                                @if($i == 0)
                                                High Blood Pressure
                                                @else
                                                , High Blood Pressure
                                                @endif
                                                <?php $i++;?>
                                            @endif
                                            @if ($patient->diseases != 'no')
                                                @if($i == 0)
                                                Heart Diseases
                                                @else
                                                , Heart Diseases
                                                @endif
                                                <?php $i++;?>
                                            @endif
                                            @if ($patient->others != 'no')
                                                @if($i == 0)
                                                {{$patient->textarea_issues }}
                                                @else
                                                , {{$patient->textarea_issues }}
                                                @endif
                                                <?php $i++;?>
                                            @endif
                                            @if ($i == 0)
                                                None 
                                            @endif
                                            </td>
                                            <td>{{$patient->allergies }}</td>
                                            <td>{{$patient->smoking }}</td>
                                            <td>{{$patient->alcohol }}</td>
                                            <td>{{Carbon\Carbon::parse($patient->created_at)->format('d-m-Y H:i:s')}}</td>
                                            <td>
                                                <div class="action-btns">
                                                    <a class="btn-floating wornging-bg"href="{{ url('/admin/clinicalpatient/'.$patient->id)}}">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                </div>
                                                <div class="action-btns">
                                                    <a class="btn-floating error-bg" onclick="return confirm('Are you sure?')" href="{{ url('/admin/delpatient/'.$patient->id)}}">
                                                        <i class="material-icons">delete</i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')        

<script>
    $(document).ready(function() {
		$('select[name=dashboard-permisionlist_length]').show();
        $('#others').change(function(){
            if(this.checked) {
                $('#div_issues').show();
            }else{
                $('#div_issues').hide();
            }
        });
        $('#none').change(function(){
            if(this.checked) {
                $('#div_issues').hide();
                $('#diabetes').prop("checked", false);
                $('#cholesterol').prop("checked", false);
                $('#pressure').prop("checked", false);
                $('#diseases').prop("checked", false);
                $('#others').prop("checked", false);
                $('#diabetes').attr("disabled", true);
                $('#cholesterol').attr("disabled", true);
                $('#pressure').attr("disabled", true);
                $('#diseases').attr("disabled", true);
                $('#others').attr("disabled", true);
            }else{
                $('#diabetes').removeAttr("disabled");
                $('#cholesterol').removeAttr("disabled");
                $('#pressure').removeAttr("disabled");
                $('#diseases').removeAttr("disabled");
                $('#others').removeAttr("disabled");
            }
        });
        $('.for_bmi').change(function(){
            $('#bmi').val(parseFloat(parseFloat($('#weight').val())/(parseFloat($('#height').val()) * parseFloat($('#height').val()))).toFixed(2));
        });
        $('#import').on('click',function(){
            if($('#loadfile').val())
                $('#sendlotteryexcel').submit();
            else
            {
                Materialize.toast('please chooes excel file.', 4000);
            }
        })
        $('#open_addpatient').click(function(){
            $('#div_addpatient').show();
        })
        $('#DataTables_Table_0_wrapper').width($('.datatable-badges').width());
	});
    $('.datatable-badges').DataTable({
        columnDefs: [{
            width: '4%',
            targets: [0]
        }, {
            width: '8%',
            targets: [1]
        }, {
            width: '10%',
            targets: [2]
        }, {
            width: '8%',
            targets: [3]
        }, {
            width: '8%',
            targets: [4]
        },{
            width: '4%',
            targets: [5]
        },{
            width: '4%',
            targets: [6]
        },{
            width: '4%',
            targets: [7]
        },{
            width: '4%',
            targets: [8]
        },{
            width: '18%',
            targets: [9]
        },{
            width: '8%',
            targets: [10]
        },{
            width: '4%',
            targets: [11]
        },{
            width: '4%',
            targets: [12]
        },{
            width: '8%',
            targets: [13]
        },{
            width: 'auto',
            targets: [14]
        }]
    });
</script>
@endsection
