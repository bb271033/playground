<div class="box">
	<ul class="w3-ul" style="">
		<?php
		$sql = $conn->query("SELECT id, img, day, txtday, details, saction, amount, path FROM diary ORDER BY day");
		$i = 0;
        while ($row = $sql->fetch_object()) {
            $id = $row->id;
            $myday = $row->day;
            $myday = strtotime($myday);
            $date = date('j', $myday); //วันที่
            $m = date('n', $myday);   //ลำดับของเดือนแบบไม่มี 0 นำหน้า(1-12)
            $year = date('Y', $myday) + 543;  //ปี พ.ศ.;
            $month = $months[$m];
            $txtday = "$date $month $year";
            $details = $row->details;
            $saction = $row->saction;
            $amount = $row->amount;
            $path = $pathDir . "/" . $row->path;
            $i++;
            echo "<li style='" . raw_color($i) . "'>";
            ?>
            <div class="w3-col s1 w3-left" style="text-align:center;height:3em;">
                <?php
                if ($row->path != "") {
                    ?>
                    <a href="#<?= $id; ?>" data-rel="popup" data-transition="flip" data-position-to="window">
                        <img src="<?= $path; ?>" height="100%" />
                    </a>
                    <?php
                } else {
                    echo "";
                }
                ?>
            </div>

            <div class="w3-col w3-right" style="width: 100px;text-align: right">
                <a data-ajax="false" href="JavaScript:if(confirm('Delete?')==true){window.location='action.php?action=<?= base64_encode("del"); ?>&id=<?= encode($id); ?>';}">
                    <i class="fa fa-trash w3-large"></i>
                </a>
                <br/>
                <span class="w3-small"> <?php echo $txtday; ?> </span>
            </div>

            <div class="w3-rest w3-container">
                <a data-ajax="false" href="./detail.php?id=<?= encode($id); ?>">
                    <big><?= $saction; ?>&nbsp;<?= number_format(abs($row->amount)); ?></big>
                    <br/>
                    <span style="color:#999;"><?= $details; ?></span>
                </a>
            </div>        
            <?php
            echo '</li>';
        }
        ?>
        <li class="bar-j">
            <p class="w3-center">รวม <?php echo number_format($Sum->total); ?> บาท</p>
        </li>
    </ul>

    <?php
    $qr = $conn->query("select id, img, type from diary where path != ''");
    while ($rs = $qr->fetch_object()) {
        $type = $rs->type;
        $img = $rs->img;
        $src = "data:$type;base64,$img";
        ?>
        <div data-role="popup" id="<?php echo $rs->id; ?>" class="w3-margin">
            <!--<a href="#" data-rel="back" class="w3-large ui-btn ui-btn-d ui-btn-right ui-icon-delete ui-btn-icon-notext ui-shadow ui-nodisc-icon ui-corner-all"></a>-->
            <img src="<?php echo $src; ?>" width="100%" />
        </div>
        <?php
    }
$conn->close;
    ?>
</div>



