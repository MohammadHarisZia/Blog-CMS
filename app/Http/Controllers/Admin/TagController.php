<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Jobs\CreateTag;
use App\Jobs\DeleteTag;
use App\Jobs\UpdateTag;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;

class TagController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Tag::class, 'tag');
    }


    public function index()
    {

        return view(
            'admin.tags.index',
            ['tags' => Tag::paginate(10),]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $this->dispatchSync(CreateTag::fromRequest($request));

        return redirect()->route('admin.tags.index')->with('success', 'Tag Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $this->dispatchSync(UpdateTag::fromRequest($tag, $request));

        return redirect()->route('admin.tags.index')->with('success', 'Tag Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $this->dispatchSync(new DeleteTag($tag));
        return redirect()->route('admin.tags.index')->with('success', 'Tag has been deleted!');
    }
}
