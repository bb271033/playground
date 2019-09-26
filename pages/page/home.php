<?php
$sql = $conn->query("SELECT id, img, day, txtday, details, trans, amount, path FROM diary ORDER BY day");
$sql2 = $conn->query("SELECT SUM(amount) AS total FROM diary");
$Sum = $sql2->fetch_object();
?>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

<ul class="w3-ul" style="max-width:450px;margin:0 auto">
	<?php
	$i = 0;
	while($row = $sql->fetch_object()){
		$i++;
		echo "<li style='".raw_color($i)."'>";
		?>
			<div class="w3-left w3-col s1" style="height:2.5em;">
				<a href="#<?=$row->id;?>" data-rel="popup" data-transition="flip" data-position-to="window">
					<?php
					$img = $row->path;
					echo "<img src='".$img."' alt=\"\" height=\"100%\" />";
					?>
				</a>
			</div>
			
			<div class="w3-col w3-right" style="width:70px">
				<a data-ajax="false" href="JavaScript:if(confirm('Delete?')==true){window.location='action.php?action=delete&id=<?=$row->id; ?>';}">
					<i class="fa fa-trash w3-large"></i>
				</a>
				<small><?=date('j/m/y', strtotime($row->day)); ?> </small>
			</div>
			
			<div class="w3-container w3-rest">
				<?php
				echo "<a data-ajax=\"false\" href='./detail.php?id={$row->id}'>".$row->trans." ";
				echo number_format(abs($row->amount));
				echo "<br/><span style=\"color:#999;white-space:nowrap\">{$row->details} </span>";
				echo "</a>";
				?>
			</div>
		<?php
	echo "</li>";
	}
	?>
	<li class="bar-j">
		<div class="w3-center">รวม <?php echo number_format($Sum->total); ?> บาท</div>
	</li>
</ul>

<?php
$query_popup = $conn->query("SELECT id, img, path FROM diary WHERE img != '' OR path != '';");
while($pop = $query_popup->fetch_object()){
	echo "<div data-role=\"popup\" id='{$pop->id}' class=\"w3-margin\">";
	echo '<a href="#" data-rel="back" class="w3-large ui-btn ui-btn-d ui-btn-right ui-icon-delete ui-btn-icon-notext ui-shadow ui-nodisc-icon ui-corner-all"></a>';
	echo "<img src='{$pop->path}' width=\"100%\" />";
	echo "</div>";
}