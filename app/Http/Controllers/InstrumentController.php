<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use\App\Instrument;

use Session;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_ins = DB::table('instruments')->get();

        $cse_ins = DB::table('instruments')
                ->join('cse_instrument', 'cse_instrument.instrument_id', '=', 'instruments.id')
                ->get();
        $ce_ins = DB::table('instruments')
                ->join('ce_instrument', 'ce_instrument.instrument_id', '=', 'instruments.id')
                ->get();
        $eee_ins = DB::table('instruments')
                ->join('eee_instrument', 'eee_instrument.instrument_id', '=', 'instruments.id')
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


        $instrument = Instrument::orderBy('id', 'asc')->paginate(500);

        return view('instrument.index',compact('result'))->withinstrument($instrument);

    }


     public function instrumentinfo()
    {
          $instrument = Instrument::orderBy('id', 'asc')->paginate(500);
        return view('instrument.instrumentinfo')->withinstrument($instrument);
    }

     public function instrument($name,$id)
    {
        $cse = DB::table('instruments')
        ->join('cse_instrument', 'cse_instrument.instrument_id', '=', 'instruments.id')
        ->join('Cses', 'Cses.id', '=', 'cse_instrument.cse_id')
        ->where('instruments.id','=',$id)
        ->get();


        $ce = DB::table('instruments')
        ->join('ce_instrument', 'ce_instrument.instrument_id', '=', 'instruments.id')
        ->join('ces', 'ces.id', '=', 'ce_instrument.ce_id')
        ->where('instruments.id','=',$id)
        ->get();

        $eee = DB::table('instruments')
        ->join('eee_instrument', 'eee_instrument.instrument_id', '=', 'instruments.id')
        ->join('eees', 'eees.id', '=', 'eee_instrument.eee_id')
        ->where('instruments.id','=',$id)
        ->get();
                        
        return view('instrument.allinstrument',compact(['cse','ce','eee','name']));

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instrument.create');
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
                'ins_name'         => 'required|regex:/^[\pL\s\-]+$/u',
                'ins_quantity'          => 'required|numeric'
                
                 ));
            

   $instrument = new Instrument;

        $instrument->ins_name = $request->ins_name;
        $instrument->ins_quantity = $request->ins_quantity;
        

         Session::flash('success', 'Added successfully.');

       

           $instrument->save();

            return redirect()->route('instrument.show', $instrument->id);
          
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instrument = Instrument::find($id);
        return view('instrument.show')->withinstrument($instrument);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instrument = Instrument::find($id);
        
        return view('instrument.edit')->withinstrument($instrument);
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

                'ins_name'         => 'required|regex:/^[\pL\s\-]+$/u',
                'ins_quantity'          => 'required|numeric'
               
                
                 ));
            


   $instrument = Instrument::find($id);

        $instrument->ins_name = $request->input('ins_name');
        $instrument->ins_quantity = $request->input('ins_quantity');
       
       
           $instrument->save();

             return redirect()->route('instrument.show', $instrument->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $instrument = Instrument::find($id);
         
        $instrument->delete();
    }
}
