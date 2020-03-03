    
        <div class="container mt-5 answer-form" style="display:none">
            <div>
                <form method="POST" action="{{route('answer.store')}}">
                    @csrf

                    <input type="hidden" name="parent_id" value="{{$post['id']}}">
                    <input type="hidden" name="type" value="1">
                    <input type="hidden" name="title" value="Re: {{$post['title']}}">
                    
                    <div class="form-group">
                        <label for="corpo"></label>
                        <textarea class="form-control bodyfield" name="content" id="content" rows="10"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary d-flex ml-auto">Publicar resposta</button>
                </form>
            </div>
        </div>
