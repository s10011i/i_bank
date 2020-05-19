<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $todo_items=Todo::all();
        return view('admin.index',['todo_items'=>$todo_items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'name'=>'required|min:5|max:255',
            'description'=>'required|min:10|max:255',
        ]);
        $todo=new Todo;
        $todo->name=$request->name;
        $todo->description=$request->description;
        if($todo->save()){
        //     return "<script>window.alert('Todo item added succesfully!!!')
        // window.location='/admin'</script>";
        return redirect('/admin')->with('message','Todo item stored');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo){
        return view('admin.show',compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo){
        return view('admin.edit')->with('todo',$todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Todo $todo){
        request()->validate([
            'name'=>'required|min:5|max:100',
            'description'=>['required','min:10','max:500']
        ]);
        $todo->update(request(['name','description']));
        return redirect('/admin')->with('message','Todo item updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo){
        $todo->delete();
        return redirect('/admin')->with('message','Todo  deleted');
    }

    public function adminPerm(){
        $todo_items=Todo::all();
        return view('admin.index',['todo_items'=>$todo_items]);
    }

    public function noPermission(){
        return view('admin.nopermission');
    }
}
