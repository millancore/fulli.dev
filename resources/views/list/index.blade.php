<div>
    <h1>List of Items</h1>
    <ul>
        @foreach ($lists as $item)
            <li>{{ $item["name"]}}</li>
        @endforeach
    </ul>
</div>
