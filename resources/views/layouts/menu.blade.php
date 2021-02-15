
<li class="nav-item">
    <a href="{{ route('kotas.index') }}"
       class="nav-link {{ Request::is('kotas*') ? 'active' : '' }}">
        <p>Kotas</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('jams.index') }}"
       class="nav-link {{ Request::is('jams*') ? 'active' : '' }}">
        <p>Jams</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('levels.index') }}"
       class="nav-link {{ Request::is('levels*') ? 'active' : '' }}">
        <p>Levels</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('sektors.index') }}"
       class="nav-link {{ Request::is('sektors*') ? 'active' : '' }}">
        <p>Sektors</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('tmpImages.index') }}"
       class="nav-link {{ Request::is('tmpImages*') ? 'active' : '' }}">
        <p>Tmp Images</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('fotoRecognitions.index') }}"
       class="nav-link {{ Request::is('fotoRecognitions*') ? 'active' : '' }}">
        <p>Foto Recognitions</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('karyawans.index') }}"
       class="nav-link {{ Request::is('karyawans*') ? 'active' : '' }}">
        <p>Karyawans</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('namePositions.index') }}"
       class="nav-link {{ Request::is('namePositions*') ? 'active' : '' }}">
        <p>Name Positions</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('absensis.index') }}"
       class="nav-link {{ Request::is('absensis*') ? 'active' : '' }}">
        <p>Absensis</p>
    </a>
</li>


