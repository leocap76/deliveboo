<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\InfoRestaurant;
use App\Category;
use App\Order;

class UserController extends Controller
{
    private $dataValidate = [
        'name' => 'required|max:255',
        'address' => 'required|max:255',
        'description' => 'required|max:1000',
        'img_path' => 'required|mimes:jpeg,png,jpg,gif,svg|image',
        'PIVA' => 'required|max:11|min:11',
        'opening_time' => 'required|max:8',
        'closing_time' => 'required|max:8',
        'category_id' => 'required'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::id())->first();

        // $orders = $user->orders;
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        return view('dashboard.users.index', compact('user', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.users.create', compact('categories'));
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

        $user = User::where('id', $data['user_id'])->first();

        if (!empty($data["category_id"])) {
            $user->categories()->attach($data["category_id"]);
        }


        return redirect()->route('dashboard.users.index')
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

        $categories = Category::all();

        $user = User::where('id', $id)->first();

        return view('dashboard.users.edit', compact('infoRestaurant', 'categories', 'user'));
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

        $restaurant = InfoRestaurant::findOrFail($id);

        $data = $request->all();

        if(empty($data['img_path'])) {
            $data['img_path'] = $restaurant->img_path;

            $request->validate(
                [
                    'name' => 'required|max:255',
                    'address' => 'required|max:255',
                    'description' => 'required|max:1000',
                    'PIVA' => 'required|max:11|min:11',
                    'opening_time' => 'required|max:8',
                    'closing_time' => 'required|max:8',
                    'category_id' => 'required'
                ]
            );

        } else {
            $request->validate(
                $this->dataValidate
            );

            $data['img_path'] = Storage::disk('public')->put('images', $data['img_path']);
        };

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['name']);
        
        $user = User::where('id', $data['user_id'])->first();

        $restaurant->update($data);

        // dd($data['category_id']);

        if (empty($data['category_id'])) {
            $user->categories()->detach();
        } else {
            $user->categories()->sync($data['category_id']);
        }


        return redirect()->route('dashboard.users.index')
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
