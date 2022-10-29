<?php

namespace App\Jobs;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use App\Http\Requests\TagRequest;
use App\Services\SaveImageService;
use Illuminate\Support\Facades\File;
use Illuminate\Queue\SerializesModels;
use App\Http\Requests\UpdateTagRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class UpdateTag implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $tag;
    private $name;
    private $image;
    private $description;

    public function __construct(Tag $tag, string $name, ?string $image, ?string $description)
    {
        $this->tag = $tag;
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
    }

    public static function fromRequest(Tag $tag, TagRequest $request): self
    {
        return new static(
            $tag,
            $request->name(),
            $request->image(),
            $request->description(),
        );
    }

    public function handle(): Tag
    {
        $this->tag->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description,
        ]);

        if (!is_null($this->image)) {
            File::delete(storage_path('app/' . $this->tag->image));
            SaveImageService::UploadImage($this->image, $this->tag, Tag::TABLE);
        }

        return $this->tag;
    }
}
