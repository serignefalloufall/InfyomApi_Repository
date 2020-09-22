<div class="table-responsive">
    <table class="table" id="clients-table">
        <thead>
            <tr>
                <th>Typeclients Id</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Adresse</th>
        <th>Tel</th>
        <th>Email</th>
        <th>Profession</th>
        <th>Salaire</th>
        <th>Cni</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{ $client->typeclients_id }}</td>
            <td>{{ $client->nom }}</td>
            <td>{{ $client->prenom }}</td>
            <td>{{ $client->adresse }}</td>
            <td>{{ $client->tel }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->profession }}</td>
            <td>{{ $client->salaire }}</td>
            <td>{{ $client->cni }}</td>
                <td>
                    {!! Form::open(['route' => ['clients.destroy', $client->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('clients.show', [$client->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('clients.edit', [$client->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
