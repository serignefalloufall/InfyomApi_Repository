<div class="table-responsive">
    <table class="table" id="operations-table">
        <thead>
            <tr>
                <th>Typeoperations Id</th>
        <th>Comptes Id</th>
        <th>Montant</th>
        <th>Dateoperation</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($operations as $operation)
            <tr>
                <td>{{ $operation->typeoperations_id }}</td>
            <td>{{ $operation->comptes_id }}</td>
            <td>{{ $operation->montant }}</td>
            <td>{{ $operation->dateoperation }}</td>
                <td>
                    {!! Form::open(['route' => ['operations.destroy', $operation->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('operations.show', [$operation->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('operations.edit', [$operation->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
