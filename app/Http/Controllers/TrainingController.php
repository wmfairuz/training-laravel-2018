<?php

namespace App\Http\Controllers;

use App\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index2(Request $request)
    {
        $search = $request->get('txtsearch');

        if ($search == null){
            $training_list = Training::paginate(5);

            return view('trainings.index', compact('training_list'));
        }
        else {
            $training_list = Training::where('name','like','%'.$search.'%')->paginate(5);

            return view('trainings.index', compact('training_list'));
        }
    }



    public function index(Request $request)
    {
        $search = $request->get('txtsearch');

        if($search == null) {
            // paginate mcm biasa, ambil semua
            $training_list = Training::paginate(5);
        } else {
            // filter, lepas tu paginate
            $training_list = Training::
                where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('description', 'LIKE', '%'.$search.'%')
                ->paginate(5);
        }

        return view('trainings.index', compact('training_list'));
    }





    public function create()
    {
        return view('trainings.create');
    }

    public function store(Request $request)
    {
        //validate insert new record process is here
        $training = $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
            'trainer' => 'required'
        ]);

        Training::create($training);//insert record

        return back()->with('success', 'Training has been added');
    }

    public function show($id)
    {
        $training = Training::find($id);

        return view('trainings.show', compact('training'));
    }

    public function edit($id)
    {
        $training = Training::find($id);

        return view('trainings.edit',compact('training','id'));
    }

    public function update(Request $request, $id)
    {
        //save updated data
        $data = $this->validate($request, [
            'name'=>'required',
            'description'=> 'required',
            'trainer'=> 'required'
        ]);
        $data['id'] = $id;

        $training = Training::find($id);
        $training->name = $request->get('name');
        $training->description = $request->get('description');
        $training->trainer = $request->get('trainer');
        $training->save();

        return redirect('/trainings')->with('success',
            'Training info has been updated!!');
    }

    public function destroy($id)
    {
        $training = Training::find($id);

        $training->delete();
        
        return redirect('/trainings')->with('successdelete',
            'Information has been deleted');
    }

}
