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
    public function index()
    {
        $recipes = Recipe::all();
        $categoryRecipes = CategoryRecipe::all();

        $data = [
            'recipes' => $recipes,
            'categoryRecipes' => $categoryRecipes
        ];

        return view('recipes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryRecipes = CategoryRecipe::all();

        return view('recipes.create',[
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

        $provider = Provider::where('user_id' , Auth::user()->id)->first();

        $data['provider_id'] = $provider->id;

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

        return json_encode($recipes);
    }
}
