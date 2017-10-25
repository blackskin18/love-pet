<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\AnimalHospital;
use App\AnimalImage;
use App\UserRole;
use Illuminate\Support\Facades\DB;
use Auth;

class HospitalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getListHospital()
    {
    	return view('hospital/list_hospital');
    }

    public function postListHospital()
    {
        $hospitals = Hospital::All();
        return $hospitals;
    }

    public function detailHospital($hospitalId){
        $hospital = Hospital::find($hospitalId);
        $listRemove = [];
        $userId = Auth::user()->id;
        $userRole = UserRole::where('user_info_id', $userId)->get();
        $animalHospitals = AnimalHospital::orderBy('animal_id')->where('hospital_id', $hospitalId)->get();
        foreach ($animalHospitals as $key => $animalHospital) {
            $animalImage = AnimalImage::where('animal_id', $animalHospital->animal_id)->get();
            if(!$animalImage->isEmpty()){
                $animalHospitals[$key]['file_name'] = $animalImage[0]->file_name;          
            }
            if($key > 0 && $animalHospitals[$key-1]->animal_id == $animalHospital->animal_id){
                $listRemove[] = $key;
            }
        }
        if($listRemove){
            foreach ($listRemove as $key => $value) {
                unset($animalHospitals[$value]);
            }
        }

        return view('hospital/detail_info')->with('animal_hospitals', $animalHospitals)->with('hospital', $hospital)->with('user_level', $userRole[0]->role_info_id);
    }

    public function editPhone($hospitalId, Request $request)
    {   
        $hospital = Hospital::find($hospitalId);
        $hospital->phone = $request->data;
        $hospital->save();
        return $hospital->phone;
    }

    public function editNote($hospitalId, Request $request)
    {
        $hospital = Hospital::find($hospitalId);
        $hospital->note = $request->data;
        $hospital->save();
        return $hospital->note;        
    }

    public function editAddress($hospitalId, Request $request)
    {
        $hospital = Hospital::find($hospitalId);
        $hospital->address = $request->data;
        $hospital->save();
        return $hospital->address;
    }

    public function editName(Request $request, $hospitalId)
    {
        $hospital = Hospital::find($hospitalId);
        $hospital->name = $request->data;
        $hospital->save();
        return $hospital->name;
    }


}