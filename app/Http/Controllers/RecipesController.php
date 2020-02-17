<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\CategoryRecipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Provider;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:is-provider');
    }

    public function index()
    {
        $provider = Auth::user()->provider()->first();
        $recipes = Recipe::where('provider_id' , $provider->id)->get();
        $categoryRecipes = CategoryRecipe::all();

        $data = [
            'recipes' => $recipes,
            'categoryRecipes' => $categoryRecipes
        ];

        return view('recipes.provider.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryRecipes = CategoryRecipe::all();

        return view('recipes.provider.create',[
            'categoryRecipes' => $categoryRecipes
        ]);
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
                'ingredients' => 'required|string',
                'preparation_method' => 'required|string',
                'category_recipes_id' => 'required',
                'imageRecipe' => 'required|image|mimes:jpeg,jpg,png',
            ], [
                'required' => 'Esse campo é obrigatório',
                'max' => 'O número máximo de caracteres é :max',
                'mimes' => 'Formato inválido',
                'image' => 'Coloque uma imagem',
                'required' => 'Campo obrigatório',
                'mimes' => 'Formato inválido',
            ]);

        $data = $request->only([
                    'name',
                    'ingredients',
                    'preparation_method',
                    'category_recipes_id'
                ]);


        $imageName = time().'.jpg';

        $request->imageRecipe->move(public_path('app/imageRecipes/'),$imageName);

        $data['imageRecipe'] = $imageName;

        $provider = Auth::user()->provider()->first();

        $data['provider_id'] = $provider->id;

        $this->createRecipe($data);

        return redirect()->route('recipes.provider.index');
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
        return view('recipes.provider.show', [
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

        return view('recipes.provider.edit', [
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
            'image' => 'image|mimes:jpeg,jpg,svg',
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

        $recipe = Recipe::find($id);

        if(!empty($request->input('image'))) {
            $imageName = $recipe->image;

            $request->image->move(public_path('app/imageRecipes/'),$imageName);

            $data['image'] = $imageName;
        }

        // $recipe->name = $data['name'];
        // $recipe->ingredients = $data['ingredients'];
        // $recipe->preparation_method = $data['preparation_method'];
        // $recipe->save();

        $this->updateRecipe($data, $id);

        return redirect()->route('recipes.provider.show',[
            'recipe'=> $id
        ]);

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
            'category_recipes_id' => intval($data['category_recipes_id']),
            'name' => $data['name'],
            'image' => $data['imageRecipe'],
            'ingredients' => $data['ingredients'],
            'preparation_method' => $data['preparation_method'],
        ]);
    }

    public function filter($category)
    {
        $recipes = Recipe::whereRaw("category_recipes_id IN ({$category})")->get()->toArray();

        echo json_encode($recipes);
    }

    protected function updateRecipe(array $data, int $id)
    {
        return Recipe::where('id', $id)
            ->update([
                'name' => $data['name'],
                'ingredients' => $data['ingredients'],
                'preparation_method' => $data['preparation_method'],
            ]);
    }
}
