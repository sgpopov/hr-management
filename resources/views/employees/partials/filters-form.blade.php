<employees-list-filters
        :departments="{{ $departments }}"
        department="{{ request()->input('department') }}"
        :teams="{{ $teams }}"
        team="{{ request()->input('team') }}">
</employees-list-filters>
