<?php

namespace App\Http\Controllers\Rol;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\roles;
use App\Models\User;
use App\Models\rol_asign_user;
class RolesController extends Controller
{
    public function index() {
        $r = roles::all();
        return view('rol', compact('r'));
    }

    public function rolS() {
        return view('rolForm');
    }

    public function rolC(Request $request) {
        $r = roles::create(["name" => $request->name]); 
        return redirect()->back(); 
    }

    public function rolD($id) {
        roles::where('id',$id)->delete();
        return redirect()->back(); 
    }

    public function configR() {
        $u = DB::table('users')
            ->select('users.id','users.name', 'roles.name AS rol')
            ->join('rol_asign_users', 'users.id', '=', 'rol_asign_users.id_user')
            ->join('roles', 'rol_asign_users.id_rol', '=', 'roles.id')
            ->get();
        $users = DB::table('users')
            ->select('users.id','users.name')
            ->leftjoin('rol_asign_users', 'rol_asign_users.id_user', '=', 'users.id')
            ->whereNull('rol_asign_users.id_user')
            ->get();
        return view('configList', compact('u', 'users'));
    }

    public function configRE($id) {
        $rau = rol_asign_user::where('id_user',$id)->first();
        $r = roles::all();        
        if($rau == null) {
            $existingRecordId = 0;                        
            return view('configListForm', compact('r', 'existingRecordId', 'id'));
        } else {
            $existingRecordId = $rau->id_rol;
            return view('configListForm', compact('r', 'existingRecordId', 'id'));
        }
    } 

    public function configRU(Request $request) {
        $rau = rol_asign_user::where('id_user',$request->id)->first();
        if($rau == null) {
            rol_asign_user::create(["id_user" => $request->id, "id_rol" => $request->rol]); 
        } else {
            rol_asign_user::where('id_user',$request->id)->update(["id_rol" => $request->rol]); 
        }
        return redirect()->route('configRPE', ['id' => $request->id]);
    }        
}
