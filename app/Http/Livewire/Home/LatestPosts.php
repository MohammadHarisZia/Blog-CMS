<?php

namespace App\Http\Livewire\Home;

use App\Models\Post;
use Livewire\Component;

class LatestPosts extends Component
{

    public $count = 4;

    public function loadMore()
    {
        $this->count += 4;
    }


    public function render()
    {
        return view('livewire.home.latest-posts', [
            'posts'     => Post::loadLatest($this->count),

        ]);
    }
}
