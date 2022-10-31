<?php

namespace App\Http\Controllers\Permisos;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\permisos;
use App\Models\roles;
use App\Models\User;
use App\Models\permiso_asign_rol;
use App\Models\rol_asign_user;
class PermisosController extends Controller
{
    public function index() {
        $p = permisos::all();
        return view('permiso', compact('p'));
    }

    public function permisoS() {
        return view('permisoForm');
    }

    public function permisoC(Request $request) {
        $r = permisos::create(["name" => $request->name]); 
        return redirect()->back(); 
    }

    public function permisoD($id) {
        permisos::where('id',$id)->delete();
        return redirect()->back(); 
    }

    public function configP() {
        $users = DB::table('roles')
            ->select('roles.id','roles.name')
            ->leftjoin('permiso_asign_rols', 'permiso_asign_rols.id_rol', '=', 'roles.id')
            ->whereNull('permiso_asign_rols.id_rol')
            ->get();
        $usersID = DB::table('roles')
            ->select('roles.id')
            ->leftjoin('permiso_asign_rols', 'permiso_asign_rols.id_rol', '=', 'roles.id')
            ->whereNull('permiso_asign_rols.id_rol')
            ->pluck('roles.id');
 
        $r = roles::whereNotIn('id',$usersID)->get();
        $u = [];
            if (count($r) > 0) {                
                $i = 0;
                foreach ($r as $value) {
                    $u[$i] = $value;
                    $par = permiso_asign_rol::select('id_permiso')->where('id_rol',$value['id'])->get();
                    if (count($par) > 0) {
                        $u[$i]['permiso'] = permisos::select('name')->whereIn('id',$par)->get();
                    }
                    $i++;
                }
            }
        return view('configPList', compact('u', 'users'));
    }
    
    public function menu($id) {
        $rol = rol_asign_user::where('id_user',$id)->first();
        $rs = permisos::all();
        $r = [];
        $i = 0;
        foreach ($rs as $value) {            
            $raus = permiso_asign_rol::where('id_rol',$rol->id)->where('id_permiso',$value['id'])->first();
            if ($raus != null) {
                $r[$i] = $value['name'];               
            }
            $i++;
        }
        return $r;
    } 

    public function configPE($id) {
        $rs = permisos::all();
        $r = [];
        $i = 0;
        foreach ($rs as $value) {
            $r[$i] = $value;
            $raus = permiso_asign_rol::where('id_rol',$id)->where('id_permiso',$value['id'])->first();
            if ($raus != null) {
                $r[$i]['bool'] = true;
            } else {
                $r[$i]['bool'] = false;
            }
            $i++;
        }
        return view('configPListForm', compact('r', 'id'));
    } 

    public function configPU(Request $request) {
        $rau = permiso_asign_rol::where('id_rol',$request->id)->first();
        if($rau == null) {
            if (count($request->permiso) > 0) {
                foreach ($request->permiso as $value) {
                    permiso_asign_rol::create(["id_permiso" => $value, "id_rol" => $request->id]); 
                }
            }            
        } else {
            permiso_asign_rol::where('id_rol',$request->id)->delete();
            foreach ($request->permiso as $value) {
                permiso_asign_rol::create(["id_permiso" => $value, "id_rol" => $request->id]); 
            }            
        }
        return redirect()->route('configPE', ['id' => $request->id]);
    }            
}
