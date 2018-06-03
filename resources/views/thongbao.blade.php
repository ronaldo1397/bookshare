<div id="thong-bao">
@if(session('thongbao'))
    <?php $thongbao = json_decode(session('thongbao')); ?>
    <div class="alert alert-{{$thongbao->status}} alert-dismissible fade show mt-2" role="alert">
        {!! $thongbao->message !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
@endif
</div>
@if($errors && count($errors) > 0)
<div id="errors">
	@foreach($errors->all() as $error)
	<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
        {{ $error }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
	@endforeach
</div>
@endif