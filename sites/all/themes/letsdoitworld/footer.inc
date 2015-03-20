<?php //footer ?>
<div id="footer-outer">
    <div id="footer-inner">
        <div id="footer">
            <div class="three-cols">
                <div class="col">
                    <div class="block">
                        <div class="hgroup">
                            <h2>Get connected</h2>
                            <p>
                                Get informed by email or through social networks
                            </p>
                        </div>
                        <?php
                        include ('newsletter.inc');
                        ?>
                        <ul class="social">
                            <li class="fb">
                                <a href="http://facebook.com/letsdoitworld">Facebook</a>
                            </li>
                            <li class="twitter">
                                <a href="http://twitter.com/letsdoitworld">Twitter</a>
                            </li>
                            <li class="youtube">
                                <a href="http://youtube.com/letsdoitworld">YouTube</a>
                            </li>
                            <li class="flickr">
                                <a href="http://flickr.com/groups/letsdoitworld">Flickr</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="block">
                        <div class="hgroup">
                            <h2>Twitter</h2>
                            <p>
                                Our account @letsdoitworld
                            </p>
                        </div>
                        <?php echo $footer_block_2;?>
                    </div>
                </div>
                <div class="col">
                    <div class="block">
                        <div class="hgroup">
                            <h2>Facebook</h2>
                            <p>
                                <?php echo letsoitworld_facebook_count('letsdoitworld')
                                ?>
                                people like Lets do it World
                            </p>
                        </div>
                        <div class="fb">
                            <script type="text/javascript" src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php/en_US"></script>
                            <script type="text/javascript">
								FB.init("");

                            </script>
                            <fb:fan profile_id="110496952324003" stream="0" connections="10" width="310px" height="200px" header="0" logobar="0"   css="http://letsdoitworld.org/sites/all/themes/letsdoitworld/gfx/fb.css"></fb:fan>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block">
                <div class="sponsors">
                    <p>
                    </p>
                    <p><img src="<?php print base_path() . path_to_theme();?>/images/logos.png" alt="" />
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php print $closure ?>
</body>
</html> 