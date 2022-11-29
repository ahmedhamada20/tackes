<!-- Modal -->
<div class="modal fade" id="editComment{{$comment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Comment : {{$comment->comment}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('comments.update',$comment->id)}}" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}">

                    <div class="row">
                        <div class="col">
                            <label class="text-primary">Edit Comment in post :: {{$post->title}}</label>
                            <textarea class="form-control @error('comment') is-invalid @enderror" rows="5" name="comment" required>
                                {{$comment->comment}}
                            </textarea>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
