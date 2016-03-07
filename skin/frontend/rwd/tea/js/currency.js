
                    $j = jQuery.noConflict();
                    $j(document).ready(function () {
                        $j(".dropdown img.flag").addClass("flagvisibility");
                        $j(".dropdown dt a").click(function () {
                            $j(".dropdown dd ul").toggle();
                        });

                        $j(".dropdown dd ul li a").click(function () {
                            var text = $j(this).html();
                            $j(".dropdown dt a span").html(text);
                            $j(".dropdown dd ul").hide();
                            $j("#result").html("Selected value is: " + getSelectedValue("sample"));
                        });

                        function getSelectedValue(id) {
                            return $j("#" + id).find("dt a span.value").html();
                        }
                        $j(document).bind('click', function (e) {
                            var $clicked = $j(e.target);
                            if (!$clicked.parents().hasClass("dropdown"))
                                $j(".dropdown dd ul").hide();
                        });
                        $j("#flagSwitcher").click(function () {
                            $j(".dropdown img.flag").toggleClass("flagvisibility");
                        });
                    });
                    $j = jQuery.noConflict();
