<div class="table-responsive">
    <table class="table" id="typecomptes-table">
        <thead>
            <tr>
                <th>Libelle</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($typecomptes as $typecompte)
            <tr>
                <td>{{ $typecompte->libelle }}</td>
                <td>
                    {!! Form::open(['route' => ['typecomptes.destroy', $typecompte->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('typecomptes.show', [$typecompte->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('typecomptes.edit', [$typecompte->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
