
        function myFunction() {

            var navbar = document.getElementById("navbar");
            var sticky = navbar.offsetTop;

            if (window.pageYOffset >= sticky) {

                navbar.classList.add("sticky")

            } else {

               navbar.classList.remove("sticky");
            }

        }

        function scroll() {
            window.onscroll = function() {

                myFunction()

            };
        }

        $(document).ready(function() {
            $("#navbar").load("header.php");
            $(".footercontent").load("footer.html");

            $("#cart").click(function() {
                window.location.href = '#title4';
            });

            $(".title3").click(function() {
                $("#context").slideToggle("slow");

            });

            $(".title2").click(function() {
                $("#viewall").slideToggle("slow");
            });

            $(".title1").click(function() {
                $(".best").slideToggle("slow");

            });

        });


        function displayname() {
            var e6 = document.getElementById("divdishname");
            e6.style.display = "block";

        }

        function displaydesc() {
            var e7 = document.getElementById("divdishdesc");
            e7.style.display = "block";

        }

        function displayprice() {
            var e8 = document.getElementById("divdishprice");
            e8.style.display = "block";

        }

        function addToCart() {

            let productNumbers = localStorage.getItem('cartNumbers');

            productNumbers = parseInt(productNumbers);

            if (productNumbers) {

                localStorage.setItem('cartNumbers', productNumbers + 1);

                document.querySelector('.basket span').textContent = productNumbers + 1;

            } else {

                localStorage.setItem('cartNumbers', 1);

                document.querySelector('.basket span').textContent = 1;

            }

        }
        function cartNumbers() {

            let productNumber = localStorage.getItem('cartNumbers');

            if (productNumber) {

                document.querySelector('.basket span').textContent = productNumber;

            }

        }

        function getact() {
            var act = document.getElementById("promoe");
            act.value = act.value.toUpperCase();
            if (act.value == 'TREAT') {
                $('#promoe').css('color', 'green');
                $('#promoe').css('background-color', '#90ee90');
                $('#promoe').css('border-color', 'green');
            } else {
                $('#promoe').css('color', 'red');
                $('#promoe').css('background-color', '#ffcccb');
                $('#promoe').css('border-color', 'red');
            }


        }
        function showKids() {

            var x = document.getElementById("kids");

            var y = document.getElementById("meals");

            var z = document.getElementById("snacks");

            var w = document.getElementById("beverages");

            var c = document.getElementById("content");
            c.style.display = "block";

            x.style.display = "block";

            y.style.display = "none";

            z.style.display = "none";

            w.style.display = "none";

            document.getElementById("ki").style.border = "15px solid #111";

            document.getElementById("mea").style.border = "none";

            document.getElementById("sn").style.border = "none";

            document.getElementById("bev").style.border = "none";

        }
        function showMealMenu() {
            var x = document.getElementById("kids");

            var y = document.getElementById("meals");

            var z = document.getElementById("snacks");

            var w = document.getElementById("beverages");

            var c = document.getElementById("content");

            c.style.display = "block";

            y.style.display = "block";

            x.style.display = "none";

            z.style.display = "none";

            w.style.display = "none";

            document.getElementById("mea").style.border = "15px solid #111";

            document.getElementById("bev").style.border = "none";

            document.getElementById("sn").style.border = "none";

            document.getElementById("ki").style.border = "none";

        }
        function showBeverages() {

            var x = document.getElementById("kids");

            var y = document.getElementById("meals");

            var z = document.getElementById("snacks");

            var w = document.getElementById("beverages");

            var c = document.getElementById("content");



            c.style.display = "block";

            w.style.display = "block";

            x.style.display = "none";

            z.style.display = "none";

            y.style.display = "none";

            document.getElementById("bev").style.border = "15px solid #111";

            document.getElementById("mea").style.border = "none";

            document.getElementById("sn").style.border = "none";

            document.getElementById("ki").style.border = "none";

        }
        function showSnacks() {
            var x = document.getElementById("kids");

            var y = document.getElementById("meals");

            var z = document.getElementById("snacks");

            var w = document.getElementById("beverages");

            var c = document.getElementById("content");

            c.style.display = "block";

            z.style.display = "block";

            x.style.display = "none";

            w.style.display = "none";

            y.style.display = "none";
            document.getElementById("sn").style.border = "15px solid #111";

            document.getElementById("ki").style.border = "none";

            document.getElementById("mea").style.border = "none";

            document.getElementById("bev").style.border = "none";

        }
        function Cancel(e) {

            e.style.display = 'none';

        }

        function copyToClipboard() {

            const str = document.getElementById('cop').innerText;

            const el = document.createElement('textarea');

            el.value = str;

            document.body.appendChild(el);

            el.select();

            document.execCommand('copy');

            document.body.removeChild(el);

            var tooltip = document.getElementById("myTooltip");

            tooltip.innerHTML = "Copied to clipboard.";

        }

        function tool(e) {
            if (e.onmouseover) {


                var tooltip = document.getElementById("myTooltip");
                tooltip.style.display = "block";
                tooltip.innerHTML = "Click on coupon to copy.";
                tooltip.style.marginLeft = "-530px";

            }
        }

        function nodisplay(e) {

            var tooltip = document.getElementById("myTooltip");
            tooltip.style.marginLeft = "-470px";

            tooltip.style.display = "none";

        }

        document.addEventListener('DOMContentLoaded', function() {

            var checkbox = document.querySelector('input[type="checkbox"]');
            checkbox.addEventListener('change', function() {

                if (checkbox.checked) {

                    var novegan = document.getElementsByClassName("notvegan");

                    for (var i = 0; i < novegan.length; i++) {

                        novegan[i].style.display = "none";

                    }

                } else {

                    var novegan = document.getElementsByClassName("notvegan");

                    for (var i = 0; i < novegan.length; i++) {

                        novegan[i].style.display = "block";

                    }
                }

            });

        });