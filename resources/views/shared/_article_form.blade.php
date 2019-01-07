<form action="{{ route('articles.store') }}" method="POST">
    @include('shared._errors')
    {{ csrf_field() }}
    <input class="form-control" type="text" placeholder="标题" name="title"/>
    <br>

    <textarea class="form-control" rows="3" placeholder="聊聊新鲜事儿..." name="cont">{{ old('cont') }}</textarea>
    <div class="text-right">
        <button type="submit" class="btn btn-primary mt-3">发布</button>
    </div>
</form>