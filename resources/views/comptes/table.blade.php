<div class="table-responsive">
    <table class="table" id="comptes-table">
        <thead>
            <tr>
                <th>Clients Id</th>
        <th>Typecomptes Id</th>
        <th>Num Compte</th>
        <th>Cle Rip</th>
        <th>Frais Ouverture</th>
        <th>Agio</th>
        <th>Date Ouverture</th>
        <th>Date Fermuture</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($comptes as $compte)
            <tr>
                <td>{{ $compte->clients_id }}</td>
            <td>{{ $compte->typecomptes_id }}</td>
            <td>{{ $compte->num_compte }}</td>
            <td>{{ $compte->cle_rip }}</td>
            <td>{{ $compte->frais_ouverture }}</td>
            <td>{{ $compte->agio }}</td>
            <td>{{ $compte->date_ouverture }}</td>
            <td>{{ $compte->date_fermuture }}</td>
                <td>
                    {!! Form::open(['route' => ['comptes.destroy', $compte->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('comptes.show', [$compte->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('comptes.edit', [$compte->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
