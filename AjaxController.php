<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /*$msg = "This is a simple message.";
        return response()->json(array('msg'=> $msg), 200);*/

        $pro_faqs_no = DB::table('KOSM_PROGRAM_QA')
                            ->select('KOSM_PROGRAM_QA.*')
                            ->get();

        return $pro_faqs_no;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /*$name = $request->name;
        $type = $request->type;
        $price = $request->price;
        $training = $request->training;*/
        $training = $request->get('training');


        $pro_faqs_no = DB::table('KOSM_PROGRAM_QA')
                            ->select('KOSM_PROGRAM_QA.*')
                            ->where('PROGRAM_ID', '=', $training)
                            ->orderBy('Q_NO', 'DESC')
                            ->limit(1)
                            ->get();

        

        /*$data = view('faq_no',compact('pro_faqs_no'))->render();*/
        /*$data = view('faq_no')->render();*/

        foreach ($pro_faqs_no as $pro_faq_no) {
            $output = $pro_faq_no->Q_NO + 1;
        }

        if (!empty($output)) {
            $data = '<input type="text" id="faq_no" placeholder="FAQ Number" name="number" value="'.$output.'" required="" class="form-control">';
        }
        else {
            $data = '<input type="text" id="faq_no" placeholder="FAQ Number" name="number" value="1" required="" class="form-control">';
        }
        

        return response()->json(['values'=> $data]);
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
    public function edit($id)
    {
        //
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
        //
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
