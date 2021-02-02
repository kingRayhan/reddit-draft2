<?php

namespace App\Http\Controllers;

use App\Http\Requests\Thread\CreateLinkThreadRequest;
use App\Http\Requests\Thread\CreateTextThreadRequest;
use App\Http\Resources\Thread\ThreadListResource;
use App\Http\Resources\Thread\ThreadSingleResource;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    /**
     * ThreadController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ThreadListResource::collection(Thread::latest()->paginate());
    }

    /**
     * Store link thread
     * @param CreateLinkThreadRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeLinkThread(CreateLinkThreadRequest $request)
    {
        $thread = auth()->user()->threads()->create(
            array_merge(
                $request->all(['title', 'thumbnail', 'link']),
                ['type' => 'LINK']
            )
        );

        return response()->json([
            'message' => 'successfully registered',
            'data' => new ThreadListResource($thread)
        ]);
    }

    /**
     * Store text thread
     * @param CreateTextThreadRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeTextThread(CreateTextThreadRequest $request)
    {
        $thread = auth()->user()->threads()->create(
            array_merge(
                $request->all(['title', 'thumbnail', 'body']),
                ['type' => 'TEXT']
            )
        );

        return response()->json([
            'message' => 'successfully registered',
            'data' => new ThreadListResource($thread)
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
