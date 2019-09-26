<div class="w3-container w3-pale-blue w3-round" style="width:100%;max-width:400px;margin:auto">
    <link rel="stylesheet" href="./assets/css/datepicker.css" />
    <script src="./assets/js/jquery-3.4.1.slim.min.js"></script> 
    <script src="./assets/js/bootstrap.min.js"></script> 
    <script src="./assets/js/datepicker.js"></script> 
    <script>
        $(document).ready(function () {
            $('[data-toggle="datepicker"]').datepicker({
                autoHide: true,
                zIndex: 2048
            });
        });
    </script>
    <script>
        function CheckNum() {
            if (event.keyCode < 48 || event.keyCode > 57) {
                event.returnValue = false;
                alert('กรอกเฉพาะตัวเลข');
            }
        }
    </script>
    <form data-role="none" method="post" action="action.php?action=<?= base64_encode('add'); ?>" enctype="multipart/form-data" autocomplete="off">
        <p>วัน / เดือน / ปี <input data-role="none" data-toggle="datepicker" name="day" type="text" id="txtday" class="w3-input w3-round" /> </p>
        <p>โน๊ต	<input data-role="none" name="details" type="text" id="details" class="w3-input" /> </p>
        <div class="w3-row">
            <div class="w3-col s2 m2">
                <select data-role="none" name="trans" id="trans" class="w3-teal w3-round">
                    <option value="ยืม" selected>ยืม </option>
                    <option value="คืน"> คืน</option>
                </select>
            </div>
            <div class="w3-col s10 m10 w3-right">
                <input data-role="none" name="amount" type="text" id="amount" placeholder="จำนวน" required onkeyPress="CheckNum()" class="w3-input" />
            </div>
        </div>
        <br/><br/>
        <div class="w3-row w3-margin-bottom">
            <input data-role="none" name="picture" type="file" id="picture" />
            <button data-role="none" class="w3-button w3-teal w3-round w3-right">Add</button>
        </div>
    </form>
</div>
