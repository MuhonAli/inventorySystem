<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;

use\App\Furniture;

use Session;

class FurnitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_fur = DB::table('furnitures')->get();

        $cse_fur = DB::table('furnitures')
        ->join('cse_furniture', 'cse_furniture.furniture_id', '=', 'furnitures.id')
        ->get();
        $ce_fur = DB::table('furnitures')
        ->join('ce_furniture', 'ce_furniture.furniture_id', '=', 'furnitures.id')
        ->get();
        $eee_fur = DB::table('furnitures')
        ->join('eee_furniture', 'eee_furniture.furniture_id', '=', 'furnitures.id')
        ->get();

        // for ($i=0; $i <count($cse_ins) ; $i++) { 
        //     $ins_name[$i] = $cse_ins[$i]['ins_name'];
        //     $total = $cse_ins[$i]['ins_name']; 
        // }
        $i = 0;
        $total = 0;
        foreach ($all_fur as $key => $value) {
            $fur[$i]['fur_name'] = $value->furniture_name;
            $fur[$i]['total'] = 0;
            $i++;
        }
        foreach ($cse_fur as $key => $value) {
            $fur[$i]['fur_name'] = $value->furniture_name;
            $fur[$i]['total'] = $total + $value->quantity;
            $i++;
        }
        foreach ($eee_fur as $key => $value) {
            $fur[$i]['fur_name'] = $value->furniture_name;
            $fur[$i]['total'] = $total + $value->quantity;
            $i++;
        }
        foreach ($ce_fur as $key => $value) {
            $fur[$i]['fur_name'] = $value->furniture_name;
            $fur[$i]['total'] = $total + $value->quantity;
            $i++;
        }

        // Count Total Instrument
        $result = array();
        foreach ($fur as $val) {
            if (!isset($result[$val['fur_name']])){
                $result[$val['fur_name']] = $val;
            }
            else{
                $result[$val['fur_name']]['total'] += $val['total'];
            }
        }
        $result = array_values($result);

        $furniture = Furniture::orderBy('id', 'asc')->paginate(500);
        return view('furniture.index',compact('result'))->withfurniture($furniture);
    }

     public function furnitureinfo()
    {
          $furniture = Furniture::orderBy('id', 'asc')->paginate(500);
        return view('furniture.furnitureinfo')->withfurniture($furniture);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('furniture.create');
    }

    public function furniture($name,$id)
    {
        $cse = DB::table('furnitures')
        ->join('cse_furniture', 'cse_furniture.furniture_id', '=', 'furnitures.id')
        ->join('Cses', 'Cses.id', '=', 'cse_furniture.cse_id')
        ->where('furnitures.id','=',$id)
        ->get();

        $ce = DB::table('furnitures')
        ->join('ce_furniture', 'ce_furniture.furniture_id', '=', 'furnitures.id')
        ->join('ces', 'ces.id', '=', 'ce_furniture.ce_id')
        ->where('furnitures.id','=',$id)
        ->get();

        $eee = DB::table('furnitures')
        ->join('eee_furniture', 'eee_furniture.furniture_id', '=', 'furnitures.id')
        ->join('eees', 'eees.id', '=', 'eee_furniture.eee_id')
        ->where('furnitures.id','=',$id)
        ->get();

                        
        return view('furniture.allfurniture',compact(['cse','ce','eee','name']));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
                'furniture_name'         => 'required|regex:/^[\pL\s\-]+$/u',
                'furniture_quantity'          => 'required|numeric'
                
                 ));

   $furniture = new Furniture;

        $furniture->furniture_name = $request->furniture_name;
        $furniture->furniture_quantity = $request->furniture_quantity;
        

         Session::flash('success', 'Added successfully.');

       

           $furniture->save();

            return redirect()->route('furniture.show', $furniture->id);
          
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $furniture = Furniture::find($id);
        return view('furniture.show')->withfurniture($furniture);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $furniture = Furniture::find($id);
        
        return view('furniture.edit')->withfurniture($furniture);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(

                'furniture_name'         => 'required|regex:/^[\pL\s\-]+$/u',
                'furniture_quantity'          => 'required|numeric'
               
                
                 ));
            


   $furniture = Furniture::find($id);

        $furniture->furniture_name = $request->input('furniture_name');
        $furniture->furniture_quantity = $request->input('furniture_quantity');
       
       
           $furniture->save();

             return redirect()->route('furniture.show', $furniture->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $furniture = Furniture::find($id);
         
        $furniture->delete();
    }
}
