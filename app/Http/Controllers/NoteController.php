<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $noteClass = new Note();
        $notes = $noteClass->getAll();
        return view(
            "note.index",
            [
                "notes" => $notes
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("note.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "title"=>"required|min:3|max:20",
            "desc" =>"required|min:5",
            "status" =>"required"
        ]);
        $noteClass = new Note();
        $noteClass->addNote($request);
        return redirect("/note");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($id);
        $noteClass = new Note();
        $notes = $noteClass->getNoteByid($id);
        if($notes == null){
            // return redirect()->back();
            return abort(404);
        }
        return view("note.show",[
            "notes"=>$notes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $noteClass = new Note();
        $notes = $noteClass->getNoteByid($id); 
        if($notes == null){
            // return redirect()->back();
            return abort(404);
        }
        return view("note.edit",[
            "notes"=>$notes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "title"=>"required|min:3|max:20",
            "desc" =>"required|min:5",
            "status" =>"required"
        ]);
        $noteClass = new Note();
        $noteClass->updateNote($request,$id);
        return redirect("/note");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         
        $noteClass = new Note();
        $notes = $noteClass->getNoteByid($id);
        if($notes !== null){
            $noteClass->deleteNote($id);
        }
       
        return redirect("/note");
    }
}
