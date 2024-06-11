
<div class="container py-6 mx-auto content">
            <div class="mx-auto">
                <div id="create-form" class="p-6 bg-white border-t-2 border-blue-500 hover:shadow">
                    <div class="flex ">
                        <h2 class="mb-5 text-lg font-semibold text-gray-800">Create New Todo</h2>
                    </div>
                    <div>
                        <form>
                            <div class="mb-6">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                                    Todo </label>
                                <input wire:model="name" type="text" id="name" placeholder="Todo.."
                                    class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">
@error('name')
    <span class="block mt-3 text-xs text-red-500 ">{{ $message}}</span>
@enderror
                                

                            </div>
                            <div wire:loading.delay>
                            <span class="text-green-500">Sending....</span>
                            </div>
                            <div class="flex items-center justify-between">
                            <button wire:loading.remove wire:click.prevent='create' type="submit"
                                class="px-4 py-2 font-semibold text-white bg-blue-500 rounded hover:bg-blue-600">Create
                                +</button>
                             <button @click="$dispatch('user-created')" type="button"
                                class="px-4 py-2 font-semibold text-white bg-blue-500 rounded hover:bg-blue-600">Reload List
                                </button>
                           
                            
                                @if (session('success'))
                                 <span class="text-xs text-green-500">{{ session('success') }}</span>   
                                @endif
                             </div>

                        </form>
                    </div>
                </div>
            </div>
</div>