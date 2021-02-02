$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.sendP').click(function(){
var id =$(this).attr('data-id')
var myvalue = +$('.myvalue').html()
var uservalue =+$(this).find('span').html()
var this1 =$(this)

$.ajax({
url:'sendP',
type:'post',
data:{id},
success:(r)=>{
	// console.log(r)
	if(r!='my points 0'){		
	myvalue=myvalue-1
	uservalue=uservalue+1
$('.myvalue').html(myvalue)
this1.find('span').html(uservalue)
	}

}
})
})


$('.close').click(function(){
$('.receivePs').remove()
})











