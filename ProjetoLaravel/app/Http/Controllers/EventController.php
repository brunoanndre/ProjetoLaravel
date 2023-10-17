<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
class EventController extends Controller
{
    public function index(){

        $search = request('search');

        if($search){
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        }Else{
            $events = Event::all();
        }
        
        return view('welcome',['events' => $events,'search'=>$search]);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){
        $event = new Event;

        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;
        $event->date = $request->date;
        //image upload
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now"))  . "." . $request->image->getClientOriginalExtension();

            $requestImage->move(public_path('img/events'),$imageName);

            $event->image = $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;
        $event->save();

        return redirect('/')->with('msg','Evento criado com sucesso!');
    }

    public function show($id){
        $event = Event::findOrFail($id);

        return view('events.show',['event' => $event,]);

    }
}
 