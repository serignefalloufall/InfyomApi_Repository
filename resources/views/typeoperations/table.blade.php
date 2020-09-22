<div class="table-responsive">
    <table class="table" id="typeoperations-table">
        <thead>
            <tr>
                <th>Libelle</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($typeoperations as $typeoperation)
            <tr>
                <td>{{ $typeoperation->libelle }}</td>
                <td>
                    {!! Form::open(['route' => ['typeoperations.destroy', $typeoperation->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('typeoperations.show', [$typeoperation->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('typeoperations.edit', [$typeoperation->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
