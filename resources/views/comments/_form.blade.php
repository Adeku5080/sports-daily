<div class="mb-2 mt-2">
    <form method="post" action="{{ route('create-comment',$post->id) }}">
        @csrf
        <div class="form-group">

            <textarea type="text" name="content" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add comment</button>

    </form>

</div>
<hr/>
