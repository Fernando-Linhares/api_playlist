<?php
namespace App\Http\Controllers;

use App\Models\Playlist;
use Exception;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * @param App\Models\Playlist $playlist
     */

    private Playlist $playlist;

    public function __construct(Playlist $playlist)
    {
        $this->playlist = $playlist;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->playlist->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->playlist->create($request->all()))
            return response()->json(['massage'=>'created item succesfully'],201);

        return response()->json(['massage'=>'error on create item'],418);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist $playlist)
    {
        return response()->json(['item'=>$playlist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function update(Playlist $playlist, Request $request)
    {
        $playlist->title = $request->title;
        $playlist->favorite = $request->favorite;
        $playlist->category_id = $request->category;
        if($playlist->save())
            return response()->json(['message'=>'edited item successfully'],200);

        return response()->json(['message'=>'error on edit item'],418);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Playlist $playlist)
    {
        if($playlist->delete())
            return response()->json(['message'=>'item deleted successfully'],200);
    
        return response()->json(['message'=>'error on delete item'],418);
    }
}
