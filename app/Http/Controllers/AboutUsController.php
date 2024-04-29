<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AccessLogMiddleware;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{

    public function __construct()
    {
        // comentando para inserir o middleware para todas as rotas de web
        // $this->middleware(AccessLogMiddleware::class);
        // $this->middleware(AccessLogMiddleware::class)->only('index');
        // $this->middleware(AccessLogMiddleware::class)->except('index');
        // $this->middleware(AccessLogMiddleware::class)->only(['index','show']);
        // $this->middleware(AccessLogMiddleware::class)->except(['index','show']);
        // $this->middleware(AccessLogMiddleware::class)->except(['index','show']);
        // funciona da mesma forma que a chamada dentro da web.php, porém chamando de um lugar diferente.
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Super Gestão - Sobre Nós";
        return view('site.about-us', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
