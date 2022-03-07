<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AdminStore;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdate;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.admin.admins.index');
    }

    public function getDataTables(Request $request)
    {
        // dd($request);
        return DataTables::of(Admin::all())
            ->addIndexColumn()
            ->addColumn('action', function($admin) {
                return '
                    <div class="btn-group">
                        <a class="btn btn-primary" href="' . route('admin-manager.edit', $admin). '">
                            EDIT
                        </a>
                        <form method="post" action="' .route('admin-manager.destroy',$admin). '">
                        <input name="_token" type="hidden" value="' . csrf_token(). '"/>
                        <input name="_method" type="hidden" value="delete"/>
                 
                          <button class="btn btn-danger"
                        
                              <i class="fa fa-times text-danger "> REMOVE</i></a>
                          </button>
                    </form>
                       
                    </div>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminStore $request)
    {
        $validated = $request->validated();
         $validated['password'] = Hash::make($validated['password']);
         try {
            Admin::create($validated);
            
             return redirect()->route('admin-manager.index')->with('error', 'tao thanh cong');;
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
      
       

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin  $admin_manager)
    {
        return view('pages.admin.admins.edit')->with('admin_manager', $admin_manager);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdate $request, Admin $admin_manager)
    {
        $validated = $request->validated();
       
        try {
        
            $admin_manager->update($validated);
        
       } catch (\Exception $e) {
        
           return redirect()->back()->with('error', $e->getMessage());
       }
       return redirect()->route('admin-manager.index')->with('error', 'tao thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin_manager)
    {
        $admin_manager->delete();
        return redirect()->route('admin-manager.index')->with('error', 'tao thanh cong');
    }
}
