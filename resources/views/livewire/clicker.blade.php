<div>
@if (session('success'))
    {{ session('success') }}
@endif
<form action="" wire:submit='createNewUser'>
<input class="block px-3 py-3 mb-1 border border-gray-100 rounded" wire:model="name" type="text" placeholder="name">
@error('name')
    <span class="text-xs text-red-700 "> {{ $message }}
@enderror
<input class="block px-3 py-3 mb-1 border border-gray-100 rounded" wire:model="email" type="email" placeholder="email">
@error('email')
    <span class="text-xs text-red-700 "> {{ $message }}
@enderror
<input class="block px-3 py-3 mb-1 border border-gray-100 rounded" wire:model="password" type="password" placeholder="password">
@error('password')
    <span class="text-xs text-red-700 "> {{ $message }}
@enderror
<button class="block px-3 py-1 text-black bg-gray-400 rounded">Create</button>
</form>
<hr>
@foreach ($users as $user)
<h3 class=""> {{ $user->name }} </h3>
@endforeach
    
    {{ $users->links() }}
</div>
