<div class="w3-center">
    <form class="w3-padding" method="post" id="payform">
        <span>เดือนละ </span>
        <select data-role="none" name="pay" id="pay" class="w3-white w3-round" onchange="javascript:form.submit();" style="padding: 0 10px">
            <?php
            $y = 1;
            $sum = 2000;
            while ($sum < 10000) {
                $sum = $sum + 1000;
                echo "<option value='" . $sum . "' ";
                if (@$_POST['pay'] == $sum) {
                    echo "selected";
                } else
                    echo "";
                echo ">" . number_format($sum) . "</option>";
                $y++;
            }
            ?>
        </select>
        <input type="hidden" name="total" id="total" value="150000" />
    </form>

    <script>
        $(document).ready(function () {
            $('#pay').change(function () {
                $('#payform').submit();
            });
        });
    </script>

    <div class="box">
        <?php
        if (isset($_POST['pay'])) {
            $pay = $_POST['pay'];
            $total = $_POST['total'] - $pay;
            $i = 0;
            for ($month_pay = 2000; $month_pay < $total; $month_pay++) {
                if ($pay == $month_pay) {
                    ?>
                    <table class="w3-center" width="80%" cellspacing="1" cellpadding="1">
                        <thead>
                            <tr class="bar-j">
                                <th>No.</th>
                                <th>เดือน/ปี</th>
                                <th>จำนวน</th>
                                <th>คงเหลือ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($total > 0) {
                                $i++;
                                $x = $m++ % 12;

                                if ($x < 1) {
                                    $year = $year + 1;
                                }
                                echo "
					<tr style='" . raw_color($i) . "'>
						<td align='center'>" . $i . "</td>
						<td>
							<div class=\"w3-half\" style='text-align:left;text-indent:20px'>" . $lmonths[$x + 1] . "</div> " . $year . "</td>
						<td align='center'>" . number_format($pay) . "</td>
						<td align='center'> " . number_format($total) . " บ.</td>
					</tr>";
                                $total = $total - $pay;
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                }
            }
        }
        ?>
    </div>
</div>