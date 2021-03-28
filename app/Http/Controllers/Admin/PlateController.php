<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Plate;
use App\User;

class PlateController extends Controller
{
    private $dataValidate = [
        'name' => 'required|max:255',
        'description' => 'required',
        'ingredients' => 'required',
        'price' => 'required|numeric|min:0.01',
        'img_path' => 'required|mimes:jpeg,png,jpg,gif,svg|image'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::id())->first();

        $plates = Plate::where('user_id', Auth::id())->get();
        
        return view('dashboard.plates.index', compact('user', 'plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.plates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            $this->dataValidate
        );

        $data = $request->all();

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['name']);

        $data['img_path'] = Storage::disk('public')->put('images', $data['img_path']);
        


        $plate = new Plate();

        $plate->fill($data);
        $plate->save();

        return redirect()->route('dashboard.plates.index')
            ->with('message', 'Piatto creato correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function edit(Plate $plate)
    {
        return view('dashboard.plates.edit', compact('plate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate)
    {
        $data = $request->all();

        
        if(empty($data['img_path'])) {
            $data['img_path'] = $plate->img_path;

            $request->validate(
                [
                    'name' => 'required|max:255',
                    'description' => 'required',
                    'ingredients' => 'required',
                    'price' => 'required|numeric|min:0.01'
                ]
            );

        } else {
            $request->validate(
                $this->dataValidate
            );

            $data['img_path'] = Storage::disk('public')->put('images', $data['img_path']);
        }

        if(empty($data['vegan'])){
            $data['vegan'] = 0;
         };

         if(empty($data['vegetarian'])){
            $data['vegetarian'] = 0;
        };

        if(empty($data['spicy'])){
            $data['spicy'] = 0;
        };

        if(empty($data['glutenfree'])){
            $data['glutenfree'] = 0;
        };

        if(empty($data['available'])){
            $data['available'] = 0;
        };

        $plate->update($data);

        return redirect()->route('dashboard.plates.index')
            ->with('message', 'Piatto modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        $plate->delete();

        return redirect()->route('dashboard.plates.index')
            ->with('message', 'Piatto cancellato correttamente');
    }
}
