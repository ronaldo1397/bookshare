<?php 
if(isset($user))
{
	$icon = '/images/icon/icon-user-you.png';
	if($user->anhdaidien != '' || $user->anhdaidien != null ) {
		$icon = $user->anhdaidien;
	}
?>
<div class="col-md-2 col-sm-6 text-center">
	<a href="/user/{{$user->id}}">
		<img class="rounded-circle" src="{{$icon}}" width="50%" />
	</a>
	<div>{{$user->username}}</div>
</div>
<?php 

}


?>