<?php

namespace App\Http\Controllers;

use App\Http\Requests\Thread\CreateThreadRequest;
use App\Http\Resources\Thread\ThreadListResource;
use App\Http\Resources\Thread\ThreadSingleResource;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ThreadListResource::collection(Thread::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateThreadRequest $request)
    {
        $thread = auth()->user()->threads()->create($request->all());

        return response()->json([
            'message' => 'successfully registered',
            'data' => $thread
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Thread $thread
     * @return ThreadSingleResource
     */
    public function show(Thread $thread)
    {
        return new ThreadSingleResource($thread);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
