<x-app-layout>

  {{-- Header --}}
  <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-white">
          {{ __('Users') }}
      </h2>
  </x-slot>

  <section class="px-6">
      <div class="overflow-hidden border-b border-gray-200">
          <table class="min-w-full">
              <thead class="bg-theme-blue-100">
                  <tr>
                      <x-table.head>Name</x-table.head>
                      <x-table.head>Email</x-table.head>
                      <x-table.head class="text-center">Role</x-table.head>
                      <x-table.head class="text-center">Joined Date</x-table.head>
                      <x-table.head class="text-center">Action</x-table.head>
                  </tr>
              </thead>

              <tbody class="divide-y divide-gray-200 divide-solid">
                  @foreach($users as $user)
                  <tr>
                      <x-table.data>
                          <div>{{ $user->name() }}</div>
                      </x-table.data>
                      <x-table.data>
                          <div>{{ $user->emailAddress() }}</div>
                      </x-table.data>
                      <x-table.data>
                          @if($user->isWriter())
                          <div class="px-2 py-1 text-center text-gray-700 bg-yellow-300 rounded">
                              <span class="">Writer</span>
                          </div>
                          @endif
                          
                      </x-table.data>
                      <x-table.data>
                          <div class="text-center">{{ $user->joinedDate() }}</div>
                      </x-table.data>
                      <x-table.data>
                          <div class="text-center">Ban,Delete/div>
                      </x-table.data>
                  </tr>
                  @endforeach
              </tbody>

          </table>
          <div class="p-2 mt-6 bg-gray-200">
              {{ $users->render() }}
          </div>
      </div>
  </section>
</x-app-layout>
