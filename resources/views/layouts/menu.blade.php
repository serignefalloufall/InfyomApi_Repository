<li class="{{ Request::is('operations*') ? 'active' : '' }}">
    <a href="{{ route('operations.index') }}"><i class="fa fa-edit"></i><span>Operations</span></a>
</li>

<li class="{{ Request::is('typeoperations*') ? 'active' : '' }}">
    <a href="{{ route('typeoperations.index') }}"><i class="fa fa-edit"></i><span>Typeoperations</span></a>
</li>

<li class="{{ Request::is('clients*') ? 'active' : '' }}">
    <a href="{{ route('clients.index') }}"><i class="fa fa-edit"></i><span>Clients</span></a>
</li>

<li class="{{ Request::is('typeclients*') ? 'active' : '' }}">
    <a href="{{ route('typeclients.index') }}"><i class="fa fa-edit"></i><span>Typeclients</span></a>
</li>

<li class="{{ Request::is('comptes*') ? 'active' : '' }}">
    <a href="{{ route('comptes.index') }}"><i class="fa fa-edit"></i><span>Comptes</span></a>
</li>

<li class="{{ Request::is('typecomptes*') ? 'active' : '' }}">
    <a href="{{ route('typecomptes.index') }}"><i class="fa fa-edit"></i><span>Typecomptes</span></a>
</li>

