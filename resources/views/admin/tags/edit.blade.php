<x-app-layout>

  {{-- Header --}}
  <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-white">
          {{ __('Tag: Edit') }}
      </h2>
  </x-slot>

  <section class="mx-6">
      <div class="p-8">
          <x-form action="{{ route('admin.tags.update', $tag) }}" method="PUT" has-files>
            @csrf
              <div class="space-y-8">
                  {{-- image --}}
                  <div>
                      <x-form.label for="image" value="{{ __('Image') }}" />
                      <x-form.input id="image" class="block w-full mt-1" type="file" name="image" :value="old('image')"   />
                      <x-form.error for="image" />
                  </div>
                  {{-- Name --}}
                  <div>
                      <x-form.label for="name" value="{{ __('Name') }}" />
                      <x-form.input id="name" class="block w-full mt-1" type="text" name="name" :value="$tag->name()"   />
                      <x-form.error for="name" />
                  </div>
                  {{-- Description --}}
                  <div>
                      <x-form.label for="description" value="{{ __('Description') }}" />
                      <x-form.textarea id="description" class="block w-full mt-1" type="text" name="description">
                          {{ $tag->description() }}
                      </x-form.textarea>
                      <x-form.error for="description" />
                  </div>

                  {{-- Button --}}
                  <x-buttons.primary>
                      {{ __('Save') }}
                  </x-buttons.primary>
          </x-form>
      </div>
  </section>
</x-app-layout>