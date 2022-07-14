<div class="mb-2 mt-2">
    <form method="post" action="{{ route('create-comment',$post->id) }}">
        @csrf
        <div class="form-group">

            <textarea placeholder="Add a comment" cols="80" rows="15" type="text" name="content" class="form-control"></textarea>
        </div>
        <button type="submit" class="primary-btn">Add comment</button>

    </form>

</div>
<hr/>
