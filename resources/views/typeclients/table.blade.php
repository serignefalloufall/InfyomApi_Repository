<div class="table-responsive">
    <table class="table" id="typeclients-table">
        <thead>
            <tr>
                <th>Libelle</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($typeclients as $typeclient)
            <tr>
                <td>{{ $typeclient->libelle }}</td>
                <td>
                    {!! Form::open(['route' => ['typeclients.destroy', $typeclient->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('typeclients.show', [$typeclient->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('typeclients.edit', [$typeclient->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
