@extends('admin.layout.default')
@section('css')
@endsection

@section('jsPostApp')

@endsection

@section('content')
<div class="main-container">
    <div class="row">
        <div class="col s12">
            <div class="card">
                
                <form  action="{{ url('/admin/updateclinicalpatient') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                    <input type="hidden" name="id" value="{{$patient->id}}">
                    <div class="card-content">
                        <h5>HISTORY SHEET</h5>
                        <div class="row">
                            <div class="input-field col s6">
                                <input type="text" id="id" name="patient_id" class="validate" value="{{$patient->patient_id}}" required>
                                <label for="id" class="active">Patient ID</label>
                            </div>
                            <div class="input-field col s6">
                                <input type="text" id="name" name="name" class="validate" value="{{$patient->name}}" required>
                                <label for="name" class="active">Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input type="email" id="email" name="email" class="validate" value="{{$patient->email}}" required>
                                <label for="email" class="active">Email</label>
                            </div>
                            <div class="input-field col s6">
                                <input type="text" id="phone" name="phone" class="validate" value="{{$patient->phone}}" required>
                                <label for="phone" class="active">Phone</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">CHIEF COMPLAINTS</p>
                            <div class="input-field col s12">
                                <textarea id="chief_complaints" name="chief_complaints" class="materialize-textarea">{{$clinical->chief_complaints}}</textarea>
                                <label for="chief_complaints" class="active">Type Here...</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">Upload Conset Form</p>
                            <div class="input-field col s12">
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>File</span>
                                        <input type="file" name="upload_conset_form">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text"  value="{{$clinical->upload_conset_form}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input type="number" id="age" name="age" class="validate" min="0" required  value="{{$patient->age}}" >
                                <label for="age" class="active">Age</label>
                            </div>
                            <div class="input-field col s4">
                                <input type="number" id="weight" name="weight" class="validate"  value="{{$patient->weight}}"  min="0" step="0.01">
                                <label for="weight" class="active">Weight(in Kg)</label>
                            </div>
                            <div class="input-field col s4">
                                <input type="number" id="height" name="height" class="validate"  value="{{$patient->height}}" min="0" step="0.01" >
                                <label for="height" class="active">Height(in meter)</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input type="text" id="albumin" name="albumin" class="validate"  value="{{$clinical->albumin}}" >
                                <label for="albumin" class="active">Albumin</label>
                            </div>
                            <div class="input-field col s4">
                                <input type="text" id="sugar" name="sugar" class="validate"  value="{{$clinical->sugar}}" >
                                <label for="sugar" class="active">Sugar</label>
                            </div>
                            <div class="input-field col s4">
                                <input type="text" id="acetone" name="acetone" class="validate"  value="{{$clinical->acetone}}" >
                                <label for="acetone" class="active">Acetone</label>
                            </div>
                        </div>
                        <div style="width:100%;height:2px;background-color:darkgray;margin: 40px 0 40px 0;"></div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">HISTORY OF PRESENT ILLNESS</p>
                            <div class="input-field col s12">
                                <textarea id="history_of_present_illness" name="history_of_present_illness" class="materialize-textarea">{{$clinical->history_of_present_illness}}</textarea>
                                <label for="history_of_present_illness" class="active">Type Here...</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">PAST HISTORY</p>
                            <div class="input-field col s12">
                                <textarea id="past_history" name="past_history" class="materialize-textarea">{{$clinical->past_history}}</textarea>
                                <label for="past_history" class="active">Type Here...</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">SOCIAL HISTORY</p>
                            <div class="input-field col s12">
                                <textarea id="social_history" name="social_history" class="materialize-textarea">{{$clinical->social_history}}</textarea>
                                <label for="social_history" class="active">Type Here...</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">FAMILY HISTORY</p>
                            <div class="input-field col s12">
                                <textarea id="family_history" name="family_history" class="materialize-textarea">{{$clinical->family_history}}</textarea>
                                <label for="family_history" class="active">Type Here...</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">DRUGS HISTORY</p>
                            <div class="input-field col s12">
                                <textarea id="drugs_history" name="drugs_history" class="materialize-textarea">{{$clinical->drugs_history}}</textarea>
                                <label for="drugs_history" class="active">Type Here...</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div style="width:100%;height:5px;background-color:darkgray;margin: 40px 0 40px 0;"></div>
                        <h5>PHSICAL EXAMINATION</h5>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">GENERAL</p>
                            <div class="input-field col s12">
                                <textarea id="general" name="general" class="materialize-textarea">{{$clinical->general}}</textarea>
                                <label for="general" class="active">Type Here...</label>
                            </div>
                        </div>  
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">HEAD</p>
                            <div class="input-field col s12">
                                <textarea id="head" name="head" class="materialize-textarea">{{$clinical->head}}</textarea>
                                <label for="head" class="active">Type Here...</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">MOUTH</p>
                            <div class="input-field col s12">
                                <textarea id="mouth" name="mouth" class="materialize-textarea">{{$clinical->mouth}}</textarea>
                                <label for="mouth" class="active">Type Here...</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">NECK</p>
                            <div class="input-field col s12">
                                <textarea id="neck" name="neck" class="materialize-textarea">{{$clinical->neck}}</textarea>
                                <label for="neck" class="active">Type Here...</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">BREAST</p>
                            <div class="input-field col s12">
                                <textarea id="breast" name="breast" class="materialize-textarea">{{$clinical->breast}}</textarea>
                                <label for="breast" class="active">Type Here...</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">CARDIO-VASCULAR SYSTEM</p>
                            <div class="input-field col s12">
                                <textarea id="cardio_vascular_system" name="cardio_vascular_system" class="materialize-textarea">{{$clinical->cardio_vascular_system}}</textarea>
                                <label for="cardio_vascular_system" class="active">Type Here...</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">LUNGS</p>
                            <div class="input-field col s12">
                                <textarea id="lungs" name="lungs" class="materialize-textarea">{{$clinical->lungs}}</textarea>
                                <label for="lungs" class="active">Type Here...</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">LYMPH NODES</p>
                            <div class="input-field col s12">
                                <textarea id="lymph_nodes" name="lymph_nodes" class="materialize-textarea">{{$clinical->lymph_nodes}}</textarea>
                                <label for="lymph_nodes" class="active">Type Here...</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">ABDOMEN</p>
                            <div class="input-field col s12">
                                <textarea id="abdomen" name="abdomen" class="materialize-textarea">{{$clinical->abdomen}}</textarea>
                                <label for="abdomen" class="active">Type Here...</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">GENITALIA</p>
                            <div class="input-field col s12">
                                <textarea id="genitalia" name="genitalia" class="materialize-textarea">{{$clinical->genitalia}}</textarea>
                                <label for="genitalia" class="active">Type Here...</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">CNS</p>
                            <div class="input-field col s12">
                                <textarea id="cns" name="cns" class="materialize-textarea">{{$clinical->cns}}</textarea>
                                <label for="cns" class="active">Type Here...</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">JOINTS</p>
                            <div class="input-field col s12">
                                <textarea id="joints" name="joints" class="materialize-textarea">{{$clinical->joints}}</textarea>
                                <label for="joints" class="active">Type Here...</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">PROVISIONAL DIAGNOSIS</p>
                            <div class="input-field col s12">
                                <textarea id="provisional_diagnosis" name="provisional_diagnosis" class="materialize-textarea">{{$clinical->provisional_diagnosis}}</textarea>
                                <label for="provisional_diagnosis" class="active">Type Here...</label>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px!important;">
                            <p class="content-headline">DIFFERENTIAL DIAGNOSIS</p>
                            <div class="input-field col s12">
                                <textarea id="differential_diagnosis" name="differential_diagnosis" class="materialize-textarea">{{$clinical->differential_diagnosis}}</textarea>
                                <label for="differential_diagnosis" class="active">Type Here...</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div style="width:100%;height:5px;background-color:darkgray;margin: 40px 0 40px 0;"></div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input type="date" id="visit_date" name="visit_date" class="validate" required  value="{{$clinical->visit_date}}">
                                <label for="visit_date" class="active">VIsit Date</label>
                            </div>
                            <div class="input-field col s6">
                                <input type="text" id="attending_doctor" name="attending_doctor" class="validate" required  value="{{$clinical->attending_doctor}}">
                                <label for="attending_doctor" class="active">Attending Doctor</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 right-align">
                        <button class="btn waves-effect waves-set" type="submit" name="update_profile">Update<i class="material-icons right">save</i>
                        </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')        

<script>
</script>
@endsection
