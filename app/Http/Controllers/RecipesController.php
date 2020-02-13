<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', ['recipes' => $recipes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'image' => 'required|image|mimes:jpeg,jpg,svg',
            'ingredients' => 'required|string',
            'preparation_method' => 'required|string'
        ], [
            'required' => 'Esse campo é obrigatório',
            'max' => 'O número máximo de caracteres é :max',
    
        ]);

        $data = $request->only([
            'name',
            'ingredients',
            'preparation_method'
        ]);

        $imageName = time().'.jpg';

        $request->image->move(public_path('app/imageRecipes/'),$imageName);

        $data['image'] = $imageName;


        $data['provider_id'] = Auth::user()->id;

        $this->createRecipe($data);

        return redirect()->route('recipes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        // dd ($recipe);
        $recipe = Recipe::find($id);
        return view('recipes.show', [
            'recipe' => $recipe
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::find($id);

        return view('recipes.edit', [
            'recipe' => $recipe
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'image' => 'required|image|mimes:jpeg,jpg,svg',
            'ingredients' => 'required|string',
            'preparation_method' => 'required|string'
        ], [
            'required' => 'Esse campo é obrigatório',
            'max' => 'O número máximo de caracteres é :max',
    
        ]);

        $data = $request->only([
            'name',
            'ingredients',
            'preparation_method'
        ]);

        $imageName = $request->image.'.jpg';

        $request->image->move(public_path('app/imageRecipes/'),$imageName);

        $data['image'] = $imageName;


        $this->updateRecipe($data, $id);

        return redirect()->route('recipes.show');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function createRecipe(array $data)
    {
        return Recipe::create([
            
        'provider_id' => $data['provider_id'],
        'name' => $data['name'],
        'image' => $data['image'],
        'ingredients' => $data['ingredients'],
        'preparation_method' => $data['preparation_method'],

        ]);
    }
}
