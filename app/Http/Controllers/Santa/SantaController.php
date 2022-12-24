<?php

namespace App\Http\Controllers\Santa;

use App\Http\Controllers\Controller;
use App\Models\Santa;
use App\Models\User;
use Illuminate\Http\Request;

class SantaController extends Controller
{
//    public function index(){
//        return view('santa.index');
//    }


public function index()
{
    $santa = Santa::query()->paginate(5);

    return view('santa.index')->with('santa', $santa);
}

protected function rulesBox(Request $request)
{

    $tableNameCategory = (new User())->getTable();
//            dd($tableNameCategory);

    $this->validate($request, [
        'title' => 'required|min:3|max:50',
        'description' => 'required|min:4',
        'isPrivate' => 'sometimes|in:1',
        'creator_id' => "required|exists:{$tableNameCategory},id"

    ], [], [
        'title' => 'Название коробки Санты',
        'description'=>'Список желаний',
        'creator_id' => 'Создатель коробки'
    ]);

}

public function create()
{
//crud
    $santa = new Santa();

    return view('santa.create', [
        'santa' => $santa,
        'users' => User::all()
    ]);
}


public function store(Santa $santa, Request $request)
{
    if ($request->isMethod('post')) {

        $this->rulesBox($request);
//
        $santa->fill($request->all());

        $result = $santa->save();
        if($result){
            return redirect()->route('santa.create')->with('success', 'Коробка успешно добавлена!');
        }else{
            return redirect()->route('santa.create')->with('error', 'Коробка не добавлена!');
        }

     // $request->flash();

    }
}

public
function edit(Santa $santa)
{


    return view('santa.create', [
        'santa' => $santa,
        'users' => User::all()

    ]);
}

public function update(Request $request, Santa $santa)
{

    $this->rulesBox($request);
//dd($request->all());
    $santa->fill($request->all());
    $santa->isPrivate = isset($request->isPrivate);
    $result = $santa->save();
    if($result){
        return redirect()->route('santa.create')->with('success', 'Коробка успешно изменена!');
    }else{
        return redirect()->route('santa.create')->with('error', 'Ошибка изменения Коробки!');
    }
}

public
function destroy(Santa $santa)
{
    $santa->delete();

    return redirect()->route('santa.index')->with('success', 'Коробка удалена успешно!');
}

}
