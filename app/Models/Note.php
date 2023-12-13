<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Note extends Model
{
    use HasFactory;
    public function getAll()
    {
        return DB::table("notes")->where("del_flg","=",0)->orderBy("id","desc")->paginate(10);
    }
    public function addNote($request){
        DB::table("notes")
        ->insert([
            "title" => $request->title,
            "description" => $request->desc,
            "status" => $request->status
        ]);
    }
    public function getNoteByid($id){
        return DB::table("notes")->where("id","=",$id)->first();
    }
    public function updateNote($request,$id){
        DB::table("notes")
        ->where("id","=",$id)
        ->update([
            "title" => $request->title,
            "description" => $request->desc,
            "status" => $request->status
        ]);
        
    }

    public function deleteNote($id){
        // DB::table("notes")->where("id","=",$id)->delete();

        DB::table("notes")
        ->where("id","=",$id)
        ->update([
            "del_flg" => 1,
        ]);
    }

}
