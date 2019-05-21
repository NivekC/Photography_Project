$('#ratingForm').on('submit', function(event){
event.preventDefault();
var formData = $(this).serialize();
$.ajax({
type : 'POST',
url : 'saveRating.php',
data : formData,
success:function(response){
$("#ratingForm")[0].reset();
window.setTimeout(function(){window.location.reload()},1000)
}
});
});
