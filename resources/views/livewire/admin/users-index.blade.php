<div>
    <div class="card">
        <div class="card-header">
            <input wire:keydown="limpiarPage"
                    class="form-control w-100"
                    type="text"
                    placeholder="Escriba lo que busca"
                    wire:model='search'>
        </div>
        @if ($users->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            email
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)

                    <tr>
                        <th>
                            {{ $user->id }}
                        </th>
                        <th>
                            {{ $user->name }}
                        </th>
                        <th>
                            {{ $user->email }}
                        </th>
                        <th>
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-secondary" width=10>
                                Asignar roles
                            </a>
                        </th>
                    </tr>

                    @endforeach

                </tbody>

            </table>
        </div>
        <div class="card-footer">
            {{ $users->links() }}
        </div>
        @else
            <div class="card-body">
                <strong>
                    No hay registros
                </strong>
            </div>
        @endif
    </div>
</div>
