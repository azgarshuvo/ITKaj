<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Skills;
use DB;
use Session;
use App\Http\Controllers\Controller;

class SkillCrudController extends Controller
{
    public function getSkillAdd(){
        return view('admin.skill.addSkill');
    }

    public function postSkillAdd(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $skills = $request->all();
        Skills::create($skills);
        Session::flash('success', 'Skill added successfully!');
        return back()->withInput();
    }

    public function getSkillList(){
        $lists = DB::table('skills')->get();
        return view('admin.skill.skillList',['lists'=>$lists]);
    }

    public function getSkillEdit($id){
        $skill = Skills::find($id);
        return view('admin.skill.editSkill', ['skill'=>$skill]);
    }
    public function postSkillUpdate($id, Request $request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $skillData = $request->all();
        Skills::findOrFail($id)->update($skillData);
        Session::flash('success', 'Skills updated successfully!');
        return redirect()->route('skillList');

    }

    public function getSkillDelete($id)
    {
        Skills::findOrFail($id)->delete();
        Session::flash('success', 'Category deleted successfully!');
        return redirect()->route('skillList');
    }
}
