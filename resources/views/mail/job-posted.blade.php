<div>
    <h2>
        {{ $job->title }}
    </h2>

    <p>
        Congrats! Your job has been posted on our site.
    </p>

    <p>
        <a href="{{ url('/jobs/' . $job->id) }}"> View your job listing.</a>
    </p>
</div>

