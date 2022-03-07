<?php

namespace App\Http\Controllers\Lops;
use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\LopStore;
use App\Http\Requests\LopUpdate;
use App\Models\Lop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;
class Lopcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.Lops.index');
    }
    public function getDataTables(Request $request)
    {
    
        return DataTables::of(Lop::all())
            ->addIndexColumn()
            ->editColumn('Khoa_id', function($lop) {
                return $lop->course->Ten_Khoa_Hoc;
            })
            ->addColumn('action', function($lop) {
                return '
                    <div class="btn-group">
                        <a class="btn btn-primary" href="' . route('lop-manager.edit',$lop). '">
                            EDIT
                        </a>
                        <form method="post" action="' .route('lop-manager.destroy',$lop). '">
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
        $Course = Course::all();
    return view('pages.admin.Lops.create')->with('Course',$Course);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LopStore $request )
    {
         //
         $validated = $request->validated();
       
         try {
            Lop::create($validated);
            
             return redirect()->route('lop-manager.index')->with('error', 'tao thanh cong');;
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
    public function edit(Lop $lop_manager)
    {
        $Course = Course::all();
        return view('pages.admin.Lops.edit',['Course' => $Course])->with('lop_manager',$lop_manager);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LopUpdate $request, Lop $lop_manager)
    {
        //
          //
          $validated = $request->validated();
          try{
              $lop_manager->update($validated);
          } catch(\Exception $e){
             
              return redirect()->back()->with('error',$e->getMessage());
          }
          return Redirect()->route('lop-manager.index')->with('error','sua thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
