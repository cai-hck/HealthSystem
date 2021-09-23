<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Role;
use App\Admin;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\patient;
use App\clinical;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\Imports\PatientImport;

class HomeController extends Controller
{
    public function index()
    {
        $data = collect();
        $data->usersCount      = User::count();
        $data->adminCount      = Admin::count();
        $data->roleCount       = Role::count();
        $data->permissionCount = Permission::count();

        $data->roles = Role::all();
        $data->permissions = Permission::all();
        
        $patients = patient::select()
                            ->get();
        return view('admin.home', compact('data'))
                ->with('patients',$patients);
    }
    public function addpatient(Request $request)
    {
        $patient = new patient();
        $patient->patient_id = $request->id;
        $patient->name = $request->name;
        $patient->address = $request->address;
        $patient->email = $request->email;
        $patient->phone = $request->phone;
        $patient->age = $request->age;
        $patient->weight = $request->weight;
        $patient->height = $request->height;
        $patient->bmi = $request->bmi;
        
        if($request->diabetes == 'on'){
            $patient->diabetes = 'yes';
        }else{
            $patient->diabetes = 'no';
        }
        if($request->cholesterol == 'on'){
            $patient->cholesterol = 'yes';
        }else{
            $patient->cholesterol = 'no';
        }
        if($request->pressure == 'on'){
            $patient->pressure = 'yes';
        }else{
            $patient->pressure = 'no';
        }
        if($request->diseases == 'on'){
            $patient->diseases = 'yes';
        }else{
            $patient->diseases = 'no';
        }
        $patient->textarea_issues = $request->textarea_issues;
        if($request->others == 'on'){
            $patient->others = 'yes';
        }else{
            $patient->others = 'No';
            $patient->textarea_issues = 'no';
        }
        $patient->allergies = $request->allergies;
        if($request->smoking == 'on'){
            $patient->smoking = 'yes';
        }else{
            $patient->smoking = 'no';
        }
        if($request->alcohol == 'on'){
            $patient->alcohol = 'yes';
        }else{
            $patient->alcohol = 'no';
        }
        $patient->save();
        return back();
    }
    public function delpatient($id)
    {
        $patient = patient::select()
                    ->where('id',$id)
                    ->first();
        $patient->delete();
        return back();
    }
    public function clinicalpatient($id)
    {
        $patient = patient::select()
                    ->where('id',$id)
                    ->first();
        $clinical = clinical::select()
                    ->where('patient_table_id',$id)
                    ->first();
        if(!$clinical){
            $clinical = new clinical();
            $clinical->patient_table_id = $id;
            $clinical->save();
        }
        return view('admin.clinical')
                ->with('clinical',$clinical)
                ->with('patient',$patient);
    }
    public function sendpatientexcel(Request $request)
    {
        $uploads_dir = './upload/excel/';
        $tmp_name = $_FILES["file"]["tmp_name"];
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["file"]["name"]);
        if (move_uploaded_file($tmp_name, $uploads_dir.$name)) {            

            DB::raw('ALTER TABLE patients AUTO_INCREMENT=1;');
            try {
                $temp = Excel::import(new PatientImport, $uploads_dir.$name); 

            } catch (Exception $e) {
            }
        }
        return back();
    }
    public function updateclinicalpatient(Request $request)
    {
        $patient = patient::select()
                    ->where('id',$request->id)
                    ->first();
        $patient->patient_id = $request->patient_id;
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->phone = $request->phone;
        $patient->age = $request->age;
        $patient->weight = $request->weight;
        $patient->height = $request->height;
        $patient->save();
        $clinical = clinical::select()
                    ->where('patient_table_id',$request->id)
                    ->first();
        $clinical->chief_complaints = $request->chief_complaints;
        $doc = $request->file('upload_conset_form');
        if($doc){
            $name = $_FILES["upload_conset_form"]["name"];
            $destinationPath = public_path('/upload/form');
            $docPath = $destinationPath. "/".  $name;
            $doc->move($destinationPath, $name);
            $clinical->upload_conset_form = $name;
        }

        $clinical->albumin = $request->albumin;
        $clinical->sugar = $request->sugar;
        $clinical->acetone = $request->acetone;
        $clinical->history_of_present_illness = $request->history_of_present_illness;
        $clinical->past_history = $request->past_history;
        $clinical->social_history = $request->social_history;
        $clinical->family_history = $request->family_history;
        $clinical->drugs_history = $request->drugs_history;
        $clinical->general = $request->general;
        $clinical->head = $request->head;
        $clinical->mouth = $request->mouth;
        $clinical->neck = $request->neck;
        $clinical->breast = $request->breast;
        $clinical->cardio_vascular_system = $request->cardio_vascular_system;
        $clinical->lungs = $request->lungs;
        $clinical->lymph_nodes = $request->lymph_nodes;
        $clinical->abdomen = $request->abdomen;
        $clinical->genitalia = $request->genitalia;
        $clinical->cns = $request->cns;
        $clinical->joints = $request->joints;
        $clinical->provisional_diagnosis = $request->provisional_diagnosis;
        $clinical->differential_diagnosis = $request->differential_diagnosis;
        $clinical->visit_date = $request->visit_date;
        $clinical->attending_doctor = $request->attending_doctor;
        $clinical->save();
        return redirect('/admin');
    }
}
