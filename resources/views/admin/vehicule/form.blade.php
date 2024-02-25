<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Fromulaire des roles') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="card col-md-8">
            <div class="card-body">
                <form method="post" class="needs-validation vstack gap-2"
                      action="{{ route($role->exists ? 'admin.role.update' : 'admin.role.store', $role) }}"
                      novalidate
                >
                    @csrf
                    @method($role->exists ? "PUT" : "POST")

                    @include('shared.input', ['label' => "Nom", 'name' => "name", 'value' => $role->name])

                    <button type="submit" class="btn btn-primary">
                        @if($role->exists)
                            Modifier
                        @else
                            Creer
                        @endif
                    </button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
