<?php

namespace App\Jobs;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use App\Http\Requests\TagRequest;
use App\Services\SaveImageService;
use App\Http\Requests\StoreTagRequest;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CreateTag implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $name;
    private $image;
    private $description;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $name, ?string $image, ?string $description)
    {
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
    }

    public static function fromRequest(TagRequest $request): self
    {
        return new static(
            $request->name(),
            $request->image(),
            $request->description(),
        );
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): Tag
    {
        $tag = new Tag([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        SaveImageService::UploadImage($this->image, $tag, Tag::TABLE);

        return $tag;
    }
}
