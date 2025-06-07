<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use App\Http\Requests\StoreArtigoRequest;
use App\Http\Requests\UpdateArtigoRequest;
use App\Http\Resources\ArtigoResource;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class ArtigoController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show'])
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ArtigoResource::collection(Artigo::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArtigoRequest $request)
    {
        $newArtigo = $request->user()->artigos()->create($request->validated());

        return new ArtigoResource($newArtigo);
    }

    /**
     * Display the specified resource.
     */
    public function show(Artigo $artigo)
    {
        return new ArtigoResource($artigo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArtigoRequest $request, Artigo $artigo)
    {

        Gate::authorize('modify', $artigo);

        $artigo->update(($request->validated()));

        return new ArtigoResource($artigo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artigo $artigo)
    {

        Gate::authorize('modify', $artigo);

        $artigo->delete();

        return ['message' => 'O artigo foi apagado'];
    }
}
