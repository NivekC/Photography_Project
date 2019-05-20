<div class="row">
<div class="col-sm-7">
<hr/>
<div class="review-block">

<?php
$ratinguery = "SELECT ratingId, PhotographerID, userID, ratingNumber, comments FROM item_rating";
$ratingResult = mysqli_query($conn, $ratinguery) or die("database error:". mysqli_error($conn));
while($rating = mysqli_fetch_assoc($ratingResult)){

?>

<div class="row">
<div class="col-sm-3">
<img src="image/profile.png" class="img-rounded">
<div class="review-block-name">By <a href="#">phpzag</a></div>
<div class="review-block-date"><?php echo $reviewDate; ?></div>
</div>
<div class="col-sm-9">
<div class="review-block-rate">
<?php
for ($i = 1; $i <= 5; $i++) {
$ratingClass = "btn-default btn-grey";
if($i <= $rating['ratingNumber']) {
$ratingClass = "btn-warning";
}
?>
<button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<?php } ?>
</div>
<div class="review-block-title"><?php echo $rating['title']; ?></div>
<div class="review-block-description"><?php echo $rating['comments']; ?></div>
</div>
</div>
<hr/>
<?php } ?>
</div>
</div>
</div>
