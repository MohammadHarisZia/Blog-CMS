<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class DeletePost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function handle()
    {
        if (!is_null($this->post->image)) {
            File::delete(storage_path('app/' . $this->post->image));
        }

        $this->post->delete();
    }
}
