<?php

namespace App\Http\Controllers;

use App\Models\Datahp;
use Illuminate\Http\Request;
use PDF;

class DatahpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Datahp::latest()->paginate(5);
    
        return view('list.index',compact('list'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('list.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        //Datahp::create($request->all());

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
  
        Datahp::create($input);
     
        return redirect()->route('list.index')
                        ->with('Sukses','Data berhasil di simpan');
    }

    public function edit(Datahp $list)
    {
        return view('list.edit',compact('list'));
    }
    

    public function update(Request $request, Datahp $list)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
        
        $list->update($input);
    
        //$datahp->update($request->all());
    
        return redirect()->route('list.index')
                        ->with('Sukses','Data berhasil di ubah');
    }
    

    public function destroy(Datahp $list)
    {
        $list->delete();
    
        return redirect()->route('list.index')
                        ->with('Sukses','Data berhasil di hapus');
    }

    public function exportpdf(){
        $list = Datahp::all();

        view()->share('list', $list);
        $pdf = PDF::loadview('data_pdf');
        return $pdf->download('data.pdf');
    }
}
