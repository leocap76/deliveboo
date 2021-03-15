<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\InfoRestaurant;

class UserController extends Controller
{
    private $dataValidate = [
        'name' => 'required|max:255',
        'address' => 'required|max:255',
        'description' => 'required|max:1000',
        'img_path' => 'required|mimes:jpeg,png,jpg,gif,svg|image',
        'PIVA' => 'required|max:11|min:11',
        'opening_time' => 'required|max:8',
        'closing_time' => 'required|max:8'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::id())->first();

        return view('admin.users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['name']);

        $data['img_path'] = Storage::disk('public')->put('images', $data['img_path']);

        $restaurant = new InfoRestaurant();
        $restaurant->fill($data)->save();

        return redirect()->route('admin.users.index')
            ->with('message', 'Ristorante aggiunto correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //  
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infoRestaurant = InfoRestaurant::where('user_id', $id)->first();

        return view('admin.users.edit', compact('infoRestaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            $this->dataValidate
        );

        $data = $request->all();

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['name']);

        $data['img_path'] = Storage::disk('public')->put('images', $data['img_path']);

        $restaurant = InfoRestaurant::findOrFail($id);
        
        $restaurant->update($data);

        return redirect()->route('admin.users.index')
            ->with('message', 'Ristorante modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
