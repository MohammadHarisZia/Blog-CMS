<x-app-layout>


  @push('css')
    <link rel="stylesheet" href="{{ asset('css/choices.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    @endpush

  @push('styles')
      <link rel="stylesheet" href="{{ asset('css/choices.css')  }}">
  @endpush
  
      {{-- Header --}}
      <x-slot name="header">
          <h2 class="text-xl font-semibold leading-tight text-white">
              {{ __('Posts: Edit') }}
          </h2>
      </x-slot>
  
      <section class="mx-6">
          <div class="p-8">
              <x-form action="{{ route('admin.posts.update',$post) }}"  method="POST" has-files>
                @csrf 
                  <div class="space-y-8">
                      {{-- Image --}}
                      <div>
                          <x-form.label for="image" value="{{ __('Change Image') }}" />
                          <x-form.input id="image" class="block w-full mt-1" type="file" name="image"/>
                          <x-form.error for="image" required/>
                      </div>
  
  
                      {{-- Title --}}
                      <div>
                          <x-form.label for="title" value="{{ __('Title') }}" />
                          <x-form.input id="title" class="block w-full mt-1" type="text" name="title" :value="$post->title()"/>
                          <x-form.error for="title" />
                      </div>
  
  
                      {{-- Body --}}
                      <div>
                          <x-form.label for="body" value="{{ __('Content') }}" />
                          <x-trix name="body">
                            {{ $post->body() }}
                          </x-trix>
                          <x-form.error for="body" />
                      </div>
  
  
                      {{-- Published At --}}
                      <div>
                          <x-form.label for="published_at" value="{{ __('Published At') }}" />
                          <x-pikaday name="published_at" format="YYYY-MM-DD" class=" rounded-md" value="{{ $post->publishedAt()}}"/>
                          <x-form.error for="published_at" />
                      </div>
  
                      {{-- Type --}}
                      <div>
                        <x-form.label for="type" value="{{ __('Type') }}" />
                        <select name="type" id="type" class="rounded-md">
                            <option value="standard" 
                            @if ($post->type() === 'standard') selected @endif >Standard</option>
                            <option value="premium" @if ($post->type() === 'premium') selected @endif>Premium</option>
                        </select>
                        <x-form.error for="type" />
                    </div>
  
                      {{-- Tags --}}
                    <div>
                      <x-form.label for="tags" value="{{ __('Tags') }}" />
                      <select name="tags[]" id="tags" multiple x-data="{}" x-init=" function () { choices($el)}">
                          @foreach ($tags as $tag)
                              <option value="{{ $tag->id() }}" 
                                  @if (in_array($tag->id(), $selectedTags))
                                      selected
                                  @endif
                              > {{ $tag->name() }} </option>
                          @endforeach
                      </select>
                      <x-form.error for="tags" />
                  </div>

  
  
                      {{-- Photo Credit Text --}}
                    <div>
                      <x-form.label for="photo_credit_text" value="{{ __('Photo Credit Text') }}" />
                      <x-form.input id="photo_credit_text" class="block w-full mt-1" type="text" name="photo_credit_text" :value="$post->photoCreditText()"   />
                      <x-form.error for="photo_credit_text" />
                  </div>

                  {{-- Photo Credit Link --}}
                  <div>
                      <x-form.label for="photo_credit_link" value="{{ __('Photo Credit Link') }}" />
                      <x-form.input id="photo_credit_link" class="block w-full mt-1" type="text" name="photo_credit_link" :value="$post->photoCreditLink()"   />
                      <x-form.error for="photo_credit_link" />
                  </div>
  
  
                      {{-- Disable Comment --}}
                      <div>
                          <input type="checkbox" name="is_commentable" value="1" @if (!$post->isCommentable()) checked @endif />
                          <span class="text-xs font-semibold text-blue-500 uppercase">Disable Comments</span>
                          <x-form.error for="is_commentable" />
                      </div>
  
                      
  
                      {{-- Button --}}
                      <x-buttons.primary>
                          {{ __('Update') }}
                      </x-buttons.primary>
              </x-form>
          </div>
      </section>
  </x-app-layout>
  