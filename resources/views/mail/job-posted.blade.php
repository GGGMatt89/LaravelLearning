<h2>
    {{$job->title}}
</h2>

<p>
    Congrats! Your new job post is now available on our website.

</p>

<p>
    <a href="{{ url('/jobs/' . $job->id) }}">View your new job post</a>
</p>
