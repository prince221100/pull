<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Rule;

class RuleController extends Controller
{
    public function index()
    {
        $data = Rule::get();
       
        return view('rules.list' , compact('data'));
    }

    public function create()
    {
        return view('rules.add');
    }

    public function store(Request $request)
    {
        $request->validate([

            'rule' => 'required',

        ]);

        $rule = new Rule();
        $rule["rules"] = request()->rule;
        $rule->save();
        return  redirect()->route('rules.list');  
    }


    public function edit(Rule $Rule, $id)
    {
        $ruledata = Rule::find($id);
    
        return view('rules.edit', compact('ruledata'));
    }
    public function update(Request $request,Rule $Rule, $id){

        $request->validate([

            'rule' => 'required',
          
        ]);
        $ruleUpdate = Rule::where('id', $id)
            ->update([
                'rules' =>request()->rule,
               
            ]);
            return redirect()->route('rules.list');
    }
    public function destroy(Rule $Rule, $id)
    {

        $ruleDelete  = Rule::find($id)->delete();
        return redirect()->route('rules.list');
    }
}
