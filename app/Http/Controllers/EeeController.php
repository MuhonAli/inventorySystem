<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Illuminate\Support\Facades\Redirect;

use App\Furniture;
use App\Instrument;

use\App\Eee;

use Session;

class EeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tsc = Eee::orderBy('id', 'asc')->paginate(500);
        
        return view('building.eee.index',compact('tsc'));


    }

      public function eeeinfo()
    {
          $eee = Eee::orderBy('id', 'asc')->paginate(500);
        return view('building.eee.eeeinfo')->witheee($eee);
    }



    public function addeee($type, $id)
    {
        if ($type == 'furniture') {            
            $data = Furniture::pluck('furniture_name', 'id')->toArray();
        }
        else{            
            $data = Instrument::pluck('ins_name', 'id')->toArray();            
        }

        return view('building.eee.addeee',compact(['data','type','id']));
    }

    public function addtoeee(Request $request)
    {
                     if ($request->type == 'furniture') {

                    $furniture = DB::table('furnitures')->where('id','=',$request->furniture)->first();

                    $all_fur = DB::table('furnitures')->get();

                    $cse_fur = DB::table('furnitures')
                    ->join('cse_furniture', 'cse_furniture.furniture_id', '=', 'furnitures.id')
                    ->where('furnitures.id','=',$request->furniture)
                    ->get();
                    $eee_fur = DB::table('furnitures')
                    ->join('eee_furniture', 'eee_furniture.furniture_id', '=', 'furnitures.id')
                    ->where('furnitures.id','=',$request->furniture)
                    ->get();
                    $ce_fur = DB::table('furnitures')
                    ->join('ce_furniture', 'ce_furniture.furniture_id', '=', 'furnitures.id')
                    ->where('furnitures.id','=',$request->furniture)
                    ->get();

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

                        // Count Total
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
                    $totals = 0;
                    for ($i=0; $i < count($result) ; $i++) { 
                        $totals = $result[$i]['total'];
                    }

                    $rem = $furniture->furniture_quantity - $totals;

                    if ($rem < $request->quantity) {
                        return Redirect::back()->withErrors(['Furniture not remain', 'msg']);
                    }
                    else{
                        DB::table('eee_furniture')->insert([
                        ['eee_id' => $request->id, 'furniture_id' => $request->furniture, 'quantity' => $request->quantity]
                    ]);
                 }

             }
             else{

                $instrument = DB::table('instruments')->where('id','=',$request->instrument)->first();

                $all_ins = DB::table('instruments')->get();
                $cse_ins = DB::table('instruments')
                ->join('cse_instrument', 'cse_instrument.instrument_id', '=', 'instruments.id')
                ->where('instruments.id','=',$request->instrument)
                ->get();
                $ce_ins = DB::table('instruments')
                ->join('ce_instrument', 'ce_instrument.instrument_id', '=', 'instruments.id')
                ->where('instruments.id','=',$request->instrument)
                ->get();
                $eee_ins = DB::table('instruments')
                ->join('eee_instrument', 'eee_instrument.instrument_id', '=', 'instruments.id')
                ->where('instruments.id','=',$request->instrument)
                ->get();


                $i = 0;
                $total = 0;
                foreach ($all_ins as $key => $value) {
                    $ins[$i]['ins_name'] = $value->ins_name;
                    $ins[$i]['total'] = 0;
                    $i++;
                }
                foreach ($cse_ins as $key => $value) {
                    $ins[$i]['ins_name'] = $value->ins_name;
                    $ins[$i]['total'] = $total + $value->quantity;
                    $i++;
                }
                foreach ($eee_ins as $key => $value) {
                    $ins[$i]['ins_name'] = $value->ins_name;
                    $ins[$i]['total'] = $total + $value->quantity;
                    $i++;
                }
                foreach ($ce_ins as $key => $value) {
                    $ins[$i]['ins_name'] = $value->ins_name;
                    $ins[$i]['total'] = $total + $value->quantity;
                    $i++;
                }

                    // Count Total Instrument
                $result = array();
                foreach ($ins as $val) {
                    if (!isset($result[$val['ins_name']])){
                        $result[$val['ins_name']] = $val;
                    }
                    else{
                        $result[$val['ins_name']]['total'] += $val['total'];
                    }
                }
                $result = array_values($result);

                $totals = 0;
                for ($i=0; $i < count($result) ; $i++) { 
                    $totals = $result[$i]['total'];
                }

                $rem = $instrument->ins_quantity - $totals;

                if ($rem < $request->quantity) {
                    return Redirect::back()->withErrors(['Instrument not remain', 'msg']);
                }
                else{
                   DB::table('eee_instrument')->insert([
                    ['eee_id' => $request->id, 'instrument_id' => $request->instrument, 'quantity' => $request->quantity]
                ]);
               }



            }


        return redirect('eeeinfo');
    }


     public function showeee($id)
    {

            $eee_fur = DB::table('furnitures')
            ->join('eee_furniture', 'eee_furniture.furniture_id', '=', 'furnitures.id')
            ->join('eees', 'eees.id', '=', 'eee_furniture.eee_id')
            ->where('eees.id','=',$id)
            ->get();

            $eee_ins = DB::table('instruments')
            ->join('eee_instrument', 'eee_instrument.instrument_id', '=', 'instruments.id')
            ->join('eees', 'eees.id', '=', 'eee_instrument.eee_id')
            ->where('eees.id','=',$id)
            ->get();

            return view('building.eee.eeeshow', compact(['eee_fur', 'eee_ins', 'id']));       
    }   




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('building.eee.create');
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
                 'room_no'         => 'required|numeric',
                'capacity'          => 'required|numeric',
                'room_type'          => 'required|regex:/^[\pL\s\-]+$/u'
            
                 ));
            

   $eee = new Eee;

        $eee->room_no = $request->room_no;
        $eee->capacity = $request->capacity;
        $eee->room_type = $request->room_type;

       
  session()->flash('roomaddeee', 'Room Added Successfully');

            return redirect('eeeinfo');
          
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eee = Eee::find($id);
        return view('building.eee.show')->witheee($eee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eee = Eee::find($id);
        
        return view('building.eee.edit')->witheee($eee);
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

                 'room_no'         => 'required|numeric',
                'capacity'          => 'required|numeric',
                'room_type'          => 'required|regex:/^[\pL\s\-]+$/u'
                
                 ));
            


   $eee = Eee::find($id);

        $eee->room_no = $request->input('room_no');
        $eee->capacity = $request->input('capacity');
        $eee->room_type = $request->input('room_type');
       
           $eee->save();

             return redirect()->route('eee.show', $eee->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $eee = Eee::find($id);
         
        $eee->delete();
        $eee = Eee::orderBy('id', 'asc')->paginate(500);
        return view('building.eee.eeeinfo')->witheee($eee);
    }
}
