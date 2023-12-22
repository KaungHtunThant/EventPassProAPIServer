<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function index(Request $request){

        $user = Auth::user();

        (!isset($request->paginate)) ? $request->paginate = 10 : false;
        (!isset($request->orderBy)) ? $request->orderBy = 'id' : false;
        (!isset($request->page)) ? $request->page = '1' : false;

        $permission = '';
        if($user->can('Log.Read.All')){
            $permission = 'Log.Read.All';
        }
        elseif($user->can('Log.Read.Own')){
            $permission = 'Log.Read.Own';
        }

        $logs = Log::orderBy($request->orderBy)
                ->when(request('searchValue', false), function($query, $searchValue){
                    return $query->where('descriptions', 'LIKE', '%'.$searchValue.'%')
                                ->orwhere('http_code', 'LIKE', '%'.$searchValue.'%');
                })
                ->when(!$user->can('Log.Read.All'), function($query){
                    $user = Auth::user();
                    return $query->where('user_id', $user->id);
                })
                ->paginate($request->paginate);

        $logs->appends([
            'orderBy' => $request->orderBy,
            'searchValue' => $request->searchValue,
            'paginate' => $request->paginate
        ]);

        $user->Logs()->createMany($items = [
                [
                    'user_id' => $user->id,
                    'descriptions' => $permission,
                    'http_code' => '200',
                    'action_status' => 'Success',
                    'bookmark' => 0,
                    'remark' => '',
                ]
            ]);

        return response($logs, 200);
    }
}
