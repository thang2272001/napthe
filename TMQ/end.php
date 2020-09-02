  <footer>
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <p>Hệ thống đổi thẻ tự động, chiết khấu hấp dẫn</p>
                    <p>Địa chỉ: Nghê An, Việt Nam</p>
                    <p>Hotline: <?=caidat('phone');?> (Mr.Dũng)</p>
                    <p>Email: nhokw4tv@gmail.com</p>
                </div>
            </div>
        </div>
    </footer>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up" aria-hidden="true"></i></button>

 
     
  
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <script>
        $(document).ready(function () {

            $(".int").inputmask("integer", { radixPoint: ",", autoGroup: true, groupSeparator: ".", groupSize: 3 });
            $(".dec").inputmask("decimal", { radixPoint: ",", autoGroup: true, groupSeparator: ".", groupSize: 3 });

            function detectmob() {
                if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
                    return true;
                } else { return false; }
            }
            var t = { delay: 125, overlay: $(".fb-overlay"), widget: $(".fb-widget"), button: $(".fb-button") };
            setTimeout(function () { $("div.fb-livechat").fadeIn() }, 8 * t.delay);
            if (!detectmob()) {
                $(".ctrlq").on("click", function (e) { e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({ bottom: 0, opacity: 0 }, 2 * t.delay, function () { $(this).hide("slow"), t.button.show() })) : t.button.fadeOut("medium", function () { t.widget.stop().show().animate({ bottom: "30px", opacity: 1 }, 2 * t.delay), t.overlay.fadeIn(t.delay) }) })
            }


        });

    </script>




    <script>

    </script>
</body>
</html>