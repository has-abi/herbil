<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'libelle'=>'required'
        ]);
        $c = new Categorie;
        $c->libelle = $request->get('libelle');
        $c->save();
        notify('success','');
        return redirect('admin/videos_table');
    }

    public function edit($id){
        $c = DB::table('categories')->find($id);
        return view('categorie/edit')->with('categorie',$c);
    }

    public function update(Request $request,$id){
        $request->validate([
            'libelle'=>'required'
        ]);
        DB::table('categories')->where(['id'=>$id])->update([
            'libelle'=>$request->libelle,
            'updated_at'=>now()
        ]);
        return redirect('admin/videos_table');
    }


}
