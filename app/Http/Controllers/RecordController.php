<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Record;
use App\Models\User;
use Carbon\Carbon; 
use App\Http\Requests\ClientRequest;


class RecordController extends Controller
{
    public function index(Request $request)
    {
        $now = Carbon::now();
        $name = Auth::user()->name;
        $record = Record::where('user_id',Auth::id())
                    ->orderby('id','desc');
        $attdtime = $record
                    ->value('attendance');
        $message = $request->session()->get('attdtxt');
        return view('index', compact('now','name','attdtime','message','record'));
        
    }

    public function attend(Request $request)
    {
        $request->session()->put('attdtxt','勤務を開始しました');
        
        $name = Auth::user()->name;
        $param = [    
                    'date' =>Carbon::now()->toDateString(),
                    'attendance' => Carbon::now()->toTimeString(),
                    'user_id'=> Auth::id(),
                ];
        Record::create($param);
        return redirect('/');
    }

    public function leave(Request $request)
    {
        $request->session()->put('lvetxt','勤務を終了しました');
        $message = $request->session()->get('lvetxt');
        
        $record=Record::where('user_id',Auth::id())->orderby('id','desc');
        $name = Auth::user()->name;
        $attdtime = $record->value('attendance');
        $lvetime = Carbon::now()->toTimeString();
        Record::find($record->first()->id)->update(['leave'=>$lvetime]);
        return view('leave', compact('name','attdtime','lvetime','message'));
    }

    public function mypage(Request $request)
    {
        $name = Auth::user()->name;
        $search_date = $request->input('search_date');
        $search_attn_from = $request->input('search_attn_from');
        $search_attn_to = $request->input('search_attn_to');
        $search_lve_from = $request->input('search_lve_from');
        $search_lve_to = $request->input('search_lve_to');

        $query = Record::where('user_id',Auth::id())
                ->WhereDate($search_date)
                ->WhereAttn($search_attn_from,$search_attn_to)
                ->WhereLve($search_lve_from,$search_lve_to);
        
        $items = $query->paginate(5);
        return view('mypage', ['name' => $name,'items' => $items]);
    }
    public function create(ClientRequest $request)
    {
        $form = $request->all();
        Record::create($form);
        return redirect('/mypage');
    }
    public function update(ClientRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Record::find($request->id)->update($form);
        return redirect('/mypage');
    }
    public function delete(Request $request)
    {
        Record::find($request->id)->delete();
        return redirect('/mypage');
    }
}
