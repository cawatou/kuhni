<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BackController;
use Illuminate\Http\Request;
use App\User;
use App\Models\Item;
use Auth;

class UsersController extends BackController
{
    public function index()
    {
        return view('admin.users.index')->with(['items' => User::where('id', '!=', Auth::user()->id)->get()]);
    }
    
    public function add(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $item = new User;
            $item->name = $request->input('name');
            $item->email = $request->input('email');
            $item->password = bcrypt($request->input('password'));
            $item->item_id = $request->input('item_id');
            $item->is_admin = $request->input('is_admin', 0);
            
            if($request->input('perms'))
                $item->perms = json_encode($request->input('perms'));
            else
                $item->perms = json_encode([]);
            
            $item->save();
            
            return redirect('/administrator/users/edit/'.$item->id);
        }
        
        return view('admin.users.add')->with([
            'ditems' => Item::where('type', '!=', 2)->get()
        ]);
    }
    
    public function edit($id, Request $request)
    {
        $item = User::find($id);
        if ($request->isMethod('post'))
        {
            $item->name = $request->input('name');
            $item->email = $request->input('email');
            $item->item_id = $request->input('item_id');
            $item->is_admin = $request->input('is_admin', 0);
            
            if($request->input('password') != '')
                $item->password = bcrypt($request->input('password'));
            
            
            if($request->input('perms'))
                $item->perms = json_encode($request->input('perms'));
            else
                $item->perms = json_encode([]);
            
            $item->save();
            
            return redirect('/administrator/users/edit/'.$item->id);
        }
        
        $perms = json_decode($item->perms);
        
        if(!is_array($perms))
        {
            $perms = [];
        }
        
        return view('admin.users.edit')->with([
            'item' => $item,
            'perms' => $perms,
            'ditems' => Item::where('type', '!=', 2)->get()
        ]);
    }
}