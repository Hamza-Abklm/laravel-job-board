<div>
    <h3>my name is : {{ $name }}</h3>
    <h1>job Board</h1>
    @foreach ($jobs as $job )
        <div>{{ $job['title'] }} : {{ $job['salary'] }}</div>
    @endforeach
</div>
