<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $addresses = Address::where('user_id',Auth::user()->id)->get();

        return view('address.index', [
            'addresses' => $addresses
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:40',
            'cep' => 'required|max:9|min:9',
            'street' => 'required|max:191',
            'neighborhood' => 'required|max:191',
            'number' => 'required|max:6|',
            'complement' => 'required|max:191|min:10',
            'county' =>  'required|max:191',
            'uf' => 'required'
        ], [
            'required' => 'Esse campo é obrigatório',
            'max' => 'O número máximo de caracteres é :max',
            'min' => 'O número mínimo de caracteres é :min',
        ]);

        $data = $request->only([
            'title',
            'cep',
            'street',
            'neighborhood',
            'number',
            'complement',
            'county',
            'uf'
        ]);

        $data['user_id'] = Auth::user()->id;

        $this->createAddress($data);

        return redirect()->route('address.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = Address::find($id);

        return view('address.edit', [
            'address' => $address
        ]);
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
        $this->validate($request, [
            'title' => 'required|max:40',
            'cep' => 'required|max:9|min:9',
            'street' => 'required|max:191',
            'neighborhood' => 'required|max:191',
            'number' => 'required|max:6|',
            'complement' => 'required|max:191|min:10',
            'county' =>  'required|max:191',
            'uf' => 'required'
        ], [
            'required' => 'Esse campo é obrigatório',
            'max' => 'O número máximo de caracteres é :max',
            'min' => 'O número mínimo de caracteres é :min',
        ]);

        $data = $request->only([
            'title',
            'cep',
            'street',
            'neighborhood',
            'number',
            'complement',
            'county',
            'uf'
        ]);

        $this->updateAddress($data , $id);

        return redirect()->route('address.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::find($id);
        $address->deleted_at = NOW();
        $address->save();

        return redirect()->route('address.index');
    }

    protected function createAddress(array $data)
    {
        return Address::create([
            'title' => $data['title'],
            'cep' => $data['cep'],
            'street' => $data['street'],
            'neighborhood' => $data['neighborhood'],
            'number' => $data['number'],
            'complement' => $data['complement'],
            'county' => $data['county'],
            'uf' => $data['uf'],
            'user_id' => $data['user_id']
        ]);
    }

    protected function updateAddress(array $data, int $id)
    {
        return Address::where('id', $id)
            ->update([
                'title' => $data['title'],
                'cep' => $data['cep'],
                'street' => $data['street'],
                'neighborhood' => $data['neighborhood'],
                'number' => $data['number'],
                'complement' => $data['complement'],
                'county' => $data['county'],
                'uf' => $data['uf'],
            ]);
    }
}
