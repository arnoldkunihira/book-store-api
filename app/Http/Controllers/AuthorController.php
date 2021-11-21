<?php

namespace App\Http\Controllers;

use App\Http\Requests\Author\StoreAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthorController extends Controller
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @param  Model $author
     * @return void
     */
    public function __construct(Author $author)
    {
        $this->model = $author;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->model->with('books')->get();
        return response()->json(['data' => $items], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        $this->model->create($request->all());
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $item = $this->model->with('books')->findOrFail($id);
            return response()->json(['data' => $item], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => $e, 'message' => 'Item Not Found!'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorRequest $request, $id)
    {
        try {
            $item = $this->model->with('books')->findOrFail($id);
            $item->update($request->all());
            return response()->json(['data' => $item], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => $e, 'message' => 'Item Not Found!'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $item = $this->model->with('books')->findOrFail($id);
            $item->books()->detach();
            $item->delete();
            return $this->index();
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => $e, 'message' => 'Item Not Found!'], 404);
        }
    }
}
