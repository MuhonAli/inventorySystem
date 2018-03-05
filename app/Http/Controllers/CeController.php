<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

use App\Furniture;
use App\Instrument;
use Illuminate\Support\Facades\Redirect;

use\App\Ce;

use Session;

class ceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tsc = Ce::orderBy('id', 'asc')->paginate(500);
        
        
        return view('building.ce.index',compact('tsc'));


    }

    public function ceinfo()
    {
          $ce = Ce::orderBy('id', 'asc')->paginate(500);
        return view('building.ce.ceinfo')->withce($ce);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('building.ce.create');
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
            

   $ce = new Ce;

        $ce->room_no = $request->room_no;
        $ce->capacity = $request->capacity;
        $ce->room_type = $request->room_type;


  session()->flash('roomaddce', 'Room Added Successfully');

            return redirect('ceinfo');
          
    }


    public function addce($type, $id)
    {
        if ($type == 'furniture') {            
            $data = Furniture::pluck('furniture_name', 'id')->toArray();
        }
        else{            
            $data = Instrument::pluck('ins_name', 'id')->toArray();            
        }

        return view('building.ce.addce',compact(['data','type','id']));
    }

    public function addtoce(Request $request)
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
                        DB::table('ce_furniture')->insert([
                        ['ce_id' => $request->id, 'furniture_id' => $request->furniture, 'quantity' => $request->quantity]
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
                   DB::table('ce_instrument')->insert([
                    ['ce_id' => $request->id, 'instrument_id' => $request->instrument, 'quantity' => $request->quantity]
                ]);
               }



            }

        return redirect('ceinfo');
    }


     public function showce($id)
    {

            $ce_fur = DB::table('furnitures')
            ->join('ce_furniture', 'ce_furniture.furniture_id', '=', 'furnitures.id')
            ->join('ces', 'ces.id', '=', 'ce_furniture.ce_id')
            ->where('ces.id','=',$id)
            ->get();

            $ce_ins = DB::table('instruments')
            ->join('ce_instrument', 'ce_instrument.instrument_id', '=', 'instruments.id')
            ->join('ces', 'ces.id', '=', 'ce_instrument.ce_id')
            ->where('ces.id','=',$id)
            ->get();

            return view('building.ce.ceshow', compact(['ce_fur', 'ce_ins', 'id']));       
    }   



    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ce = Ce::find($id);
        return view('building.ce.show')->withce($ce);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ce = Ce::find($id);
        
        return view('building.ce.edit')->withce($ce);
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
            


   $ce = Ce::find($id);

        $ce->room_no = $request->input('room_no');
        $ce->capacity = $request->input('capacity');
        $ce->room_type = $request->input('room_type');
       
           $ce->save();

             return redirect()->route('ce.show', $ce->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $ce = Ce::find($id);
         
        $ce->delete();
         $ce = Ce::orderBy('id', 'asc')->paginate(500);
        return view('building.ce.ceinfo')->withce($ce);
    }
}
