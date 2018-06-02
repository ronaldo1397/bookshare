<div id="thong-bao">
@if(session('thongbao'))
    <?php $thongbao = json_decode(session('thongbao')); ?>
    <div class="alert alert-{{$thongbao->status}} alert-dismissible fade show mb-2" role="alert">
        {!! $thongbao->message !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
@endif
</div>