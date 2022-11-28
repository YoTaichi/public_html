<div class="row g-2 mt-0">
    @foreach($article_floor->message as $message)
    <div class="row px-0 mx-0">
        <div class="col-auto p-0 mx-2"><img src="/img/head.svg" class="img-fluid " alt="..."></div>
        <div class="col ps-1 pe-0">
            <!-- 名字、留言 -->
            <div class="row m-0 text-light">
                <a class="col-auto px-0 ink-info">{{ $message->user->name }}</a>
                <div class="col text-white-50 badge d-flex justify-content-end align-items-end">{{ $message->updated_at }}</div>
            </div>
            <!-- 時間、資訊 -->
            <div class="row m-0  text-light">{{ $message->message  }}<!-- 幹你老師我我我我我我我我我歸說我我我我我我歸說我我我我歸說我我我我我我我我我我我 -->
            </div>
        </div>
    </div>

    <div class="row">
        <hr class="mt-2">
    </div>
    @endforeach
    <!-- 輸入留言 -->
    <form action="{{ route('message.store') }}" class="mt-0" method="post">

        <div class="row ">
            @csrf
            <input type="hidden" name="article_id" value="{{ $data['article']->id }}">
            <input type="hidden" name="floor" value="{{ $article_floor->floor }}">
            <input type="hidden" name="article_floor_id" value="{{ $article_floor->id }}">
            <div class="col">
                <input id="message" type="text" name="message" class="form-control" placeholder="留言">
            </div>
            <div class="col-auto ps-0">
                <div class="actions">
                    <input type="submit" class="btn btn-primary mx-3">
                </div>
            </div>
        </div>
    </form>

</div>