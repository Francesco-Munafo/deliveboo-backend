<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return view("admin.dashboard", compact("restaurants"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        return view("admin.restaurants.create", compact("types"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        $validated = $request->validated();

        if ($request->has('image')) {
            $file_path = Storage::put('placeholders', $request->image);
            $validated['image'] = $file_path;
        }

        $validated['slug'] =  Restaurant::generateSlug($validated['name'], '-');

        $restaurant = Restaurant::create($validated);
        $restaurant->types()->attach($request->types);

        return to_route("admin.restaurants.index")->with('message', 'Ristorante creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurants.show', ['restaurant' => $restaurant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        $types = Type::all();
        return view('admin.restaurants.edit', compact('restaurant', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $validated = $request->validated();

        if ($request->has('image')) {
            $newImage = $request->image;
            $file_path = Storage::put('placeholders', $newImage);
            if (!is_null($restaurant->image) && Storage::fileExists($restaurant->image)) {
                Storage::delete($restaurant->image);
            }

            $validated['image'] = $file_path;
        }

        if (!Str::is($restaurant->getOriginal('name'), $request->name)) {
            $validated['slug'] = $restaurant->generateSlug($request->name);
        }

        $restaurant->types()->sync($request->type);
        $restaurant->update($validated);

        return to_route('admin.restaurant.show', $restaurant)->with('message', 'Informazioni aggiornate con successo!');
    }

    public function trashed()
    {
        $trashed = Restaurant::onlyTrashed()->paginate(5);

        return view('admin.restaurants.deleted', compact('trashed'));
    }

    public function restoreTrashed($slug)
    {
        $restaurant = Restaurant::withTrashed()->where('slug', '=', $slug)->first();

        $restaurant->restore();

        return to_route('admin.trash')->with('message', 'Ristorante ripristinato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $restaurant = Restaurant::withTrashed()->where('slug', '=', $slug)->first();

        $restaurant->delete();

        return to_route('admin.dashboard')->with('message', 'Ristorante aggiunto al cestino!');
    }

    public function forceDelete($slug)
    {
        $restaurant = Restaurant::withTrashed()->where('slug', '=', $slug)->first();

        $restaurant->types()->detach();

        $restaurant->forceDelete();

        return to_route('admin.trash')->with('message', 'Ristorante eliminato con successo!');
    }
}
