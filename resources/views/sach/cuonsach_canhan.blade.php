<?php
if(isset($sach))
{
	$sach_url = '/images/sach/no.jpg';
    if($sach->hinhanh != '' || $sach->hinhanh != null ) {
    	$sach_url = $sach->hinhanh;
    }
?>
<div class="col-md-2 col-sm-6">
	<div class="card">
		<a href="/sach/{{$sach->id}}" title="{{$sach->tensach}}">
			<img class="card-img-top" src="{{$sach_url}}" alt="{{$sach->ten}}">
		</a>
		<div class="top-card">
			@if($sach->tinhtrang == 0)
			<div class="badge badge-warning">Chưa duyệt</div>
			@endif
		</div>
	</div>
</div>
<?php
}
?>