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
		<a href="/sach/{{$sach->id}}" title="{{$sach->ten}}">
			<img class="card-img-top" src="{{$sach_url}}" alt="{{$sach->ten}}">
		</a>
	</div>
</div>
<?php
}
?>